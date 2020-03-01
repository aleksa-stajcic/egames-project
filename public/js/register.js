/**
 * Use for register
 */

$(document).ready(function(){
    // alert("TU")

    $('#btnRegister').click(function() {

        alert('TU')

        function getData() {
            let formData = {
                "email" : $('#email').val(),
                "username" : $('#username').val(),
                "password" : $('#password').val(),
                '_token' : $('input[name=_token]').val(),
                "send" : true
            }
            return formData;
        }

        function callAjax(obj) {
            $.ajax({
                url: 'http://127.0.0.1:8000/register',
                method : 'post',
                data : obj,
                dataType: 'json',
                success: function (data, xhr) {
                    console.log(data);
                    console.log(xhr);
                },
                error: function(xhr, status, error){
                    console.log(xhr.responseJSON);
                    $('#larry').html(xhr.responseJSON.message);
                }
            });

            
        }

        let userData = getData();

        callAjax(userData);

    })
});