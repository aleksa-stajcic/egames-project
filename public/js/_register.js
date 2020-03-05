/**
 * Use for register
 */

$(document).ready(function(){
    // alert("TU")

    $('#btnRegister').click(function(e) {

        alert('TU')

        e.preventDefault();

        var reUsername = /^[A-z0-9\-\_]{6,20}$/;
        var rePassword = /^[A-z0-9\@\-\_\)\(\!\?\.\,\#\$\%\^\&\*]{7,20}$/;

        function getData() {
            let formData = {
                "email" : $('#email').val(),
                "username" : $('#username').val(),
                "password" : $('#password').val(),
                "confirm" : $('#confirm').val(),
                "_token" : $('input[name=_token]').val(),
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
                    // console.log(data);
                    // console.log(xhr);
                    window.location.replace("http://127.0.0.1:8000/");
                },
                error: function(xhr, status, error){
                    console.log(xhr.responseJSON);
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
            callAjax(userData)
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