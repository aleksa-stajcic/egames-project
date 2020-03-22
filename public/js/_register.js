/**
 * Use for register
 */

$(document).ready(function(){
    // alert("TU")

    $('#btnRegister').click(function(e) {

        // alert('TU')

        e.preventDefault();
        // var formElement = document.querySelector("form");
        // var form = document.forms.namedItem("fileinfo");
        var forma = $('#reg-form')[0]
        var formData = new FormData(forma)
        
        console.log(forma);
        
        console.log(formData.get('image'));

        // callAjax(getData())
        

        var reUsername = /^[A-z0-9\-\_]{6,20}$/;
        var rePassword = /^[A-z0-9\@\-\_\)\(\!\?\.\,\#\$\%\^\&\*]{7,20}$/;

        function getData() {
            let data = {
                "email" : $('#email').val(),
                "username" : $('#username').val(),
                "password" : $('#password').val(),
                "confirm" : $('#confirm').val(),
            }
            return data;
        }

        function callAjax(obj) {
            $.ajax({
                url: 'http://127.0.0.1:8000/register',
                method : 'post',
                data : obj,
                // dataType: 'json',
                contentType: false, // NEEDED, DON'T OMIT THIS (requires jQuery 1.6+)
                processData: false,
                success: function (data, xhr) {
                    // console.log(data);
                    // console.log(xhr);
                    window.location.replace("http://127.0.0.1:8000/login");
                },
                error: function(xhr, status, error){
                    console.log(xhr.responseJSON.message);
                    console.log(error);
                    console.log(status);
                    
                    
                    $('#err-msg').html("");
                    $('#err-msg').append("<ul>")
                    for (const error in xhr.responseJSON.errors) {
                        if (xhr.responseJSON.errors.hasOwnProperty(error)) {
                            const element = xhr.responseJSON.errors[error];
                            $('#err-msg').append('<li>' + element + '</li>')
                        }
                    }
                    $('#err-msg').append('</ul>');
                    // $('#larry').html(xhr.responseJSON.message);
                }
            });            
        }

        let errors = [];

        let userData = getData();

        if(userData['password'] !== userData['confirm']){
            errors.push('Didn\'t confirm password')
        }

        if(!reUsername.test(userData['username'])){
            errors.push('Username in the wrong format.')
        }

        if (!rePassword.test(userData['password'])) {
            errors.push('Password in the wrong format.')
        }

        // callAjax(userData);

        if(errors.length > 0){
            fillList(errors)
        }else{
            // console.log('OK');
            $('#err-msg').html('')
            callAjax(formData)
        }

    })

    function fillList(arr) {
        $('#err-msg').html("")
        $('#err-msg').append('<ul class="unordered-list">')
        for (let index = 0; index < arr.length; index++) {
            const element = arr[index];
            $('#err-msg').append("<li>" + element + "</li>");
        }
        $('#err-msg').append("</ul>")
    }
});