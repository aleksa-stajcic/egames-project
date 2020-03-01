/**
 * Use for register
 */

$(document).ready(function(){
    // alert("TU")

    $('#btnRegister').click(function() {
        let x = {
            'a' : $('#username').val(),
            'b' : $('#email').val(),
            'c' : $('#password').val(),
            'd' : $('#image').val()
        }
        console.log(x);
        alert("poslato")
    })
});