$(document).ready(function () {
    const URL = 'http://127.0.0.1:8000/';
    // alert('contact')

    $(document).on('click', '#btnSendEmail', function (e) {
        // alert()
        e.preventDefault()
        
        let email = $('#email').val();
        let username = $('#name').val();
        let subject = $('#subject').val();
        let message = $('#message').val();

        /**
         * Pregmatch if valid info
         */

        let email_data = {
            'Email' : email,
            'Username' : username,
            'Subject' : subject,
            'Message' : message,
        }

        $.ajax({
            url: URL + 'contact',
            method: 'post',
            data: email_data,
            headers: {
                // Accept: "application/json",
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (data) {
                console.log(data);
                // refreshTableBody()
            },
            error: function (xhr, status, error) {
                console.log(xhr.responseJSON.message);
                console.log(status);
            }
        })

    });

});