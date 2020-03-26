$(document).ready(function () {
    $(document).on('click', '#btnSubmitReview', function (e) {
        e.preventDefault()

        // alert('tu')

        let stars = $('input[name="rating"]:checked').val();

        console.log(stars);
        

    })
})