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
            }
            return data;
        }

        let errors = [];

        let userData = getData();

        if (!reUsername.test(userData['username'])) {
            errors.push('Username in the wrong format.')
        }

        if (errors.length > 0) {
            fillList(errors)
        } else {
            // console.log('OK');
            $('#err-msg').html('')
            callAjax(formData)
        }

        function fillList(arr) {
            $('#err-msg').html("")
            $('#err-msg').append('<ul class="unordered-list">')
            for (let index = 0; index < arr.length; index++) {
                const element = arr[index];
                $('#err-msg').append("<li>" + element + "</li>");
            }
            $('#err-msg').append("</ul>")
        }
    })
})