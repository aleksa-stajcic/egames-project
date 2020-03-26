$(document).ready(function () {

    // alert('TU')

    $(document).on('click', '#btnEditUser', function (e) {
        e.preventDefault()

        // alert('tu')
        var forma = $('#user-form')[0]
        var formData = new FormData(forma)

        console.log(forma);

        console.log(formData.get('image'));

        var reUsername = /^[A-z0-9\-\_]{6,20}$/;
        var rePassword = /^[A-z0-9\@\-\_\)\(\!\?\.\,\#\$\%\^\&\*]{7,20}$/;

        function getData() {
            let data = {
                "email": $('#email').val(),
                "username": $('#username').val(),
                "password": $('#password').val(),
                "confirm": $('#confirm').val(),
            }
            return data;
        }
    })
})