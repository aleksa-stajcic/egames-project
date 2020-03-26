$(document).ready(function () {
    const URL = 'http://127.0.0.1:8000/'
    var pathname = window.location.pathname
    var res = pathname.split('/')[2]

    // console.log(res);
    
    loadReviews(res)

    function loadReviews(gameId) {
        $.ajax({
            url: URL + 'reviews/' + gameId,
            method: 'get',
            headers: {
                Accept: 'application/json',
            },
            success: function (data) {
                console.log(data);
                
                if (data.length) {
                    $('#reviews-ol').html(display(data))

                    $('#review-count').html(data.length + " review(s)")

                } else {
                    $('#reviews-ol').html('No reviews.')
                }
            },
            error: function (xhr, status, error) {
                console.log(xhr.responseJSON.message);
            }
        })
    }

    function display(data) {
        var li = "";


        data.forEach(review => {
            datum = review['DateAdded'].split(' ')[0]

            const d = new Date(datum)
            const dtf = new Intl.DateTimeFormat('en', { year: 'numeric', month: 'short', day: '2-digit' })
            const [{ value: mo }, , { value: da }, , { value: ye }] = dtf.formatToParts(d)

            // console.log(`${da}-${mo}-${ye}`)
            // console.log(`${da}👠${mo}👢${ye}`)

            li += `<li class="single_comment_area">
                        <div class="comment-content d-flex">
                            <!-- Comment Author -->
                            <div class="comment-author">
                                <img src="`+ URL + 'img/' + review['ProfileImage'] + `" alt="author">
                            </div>
                            <!-- Comment Meta -->
                            <div class="comment-meta">
                                <a href="#" class="post-author">`+ review['Username'] + `</a>
                                <a href="#" class="post-date">${mo} ${da}, ${ye}</a>
                                <strong>`+ review['Grade'] +`</strong><i class="fa fa-star" aria-hidden="true"></i>
                                <p>`+ review['Text'] + `</p>
                            </div>
                        </div>`
        })
        return li;
    }

    $(document).on('click', '#btnSubmitReview', function (e) {
        e.preventDefault()

        // alert('tu')

        let stars = $('input[name="rating"]:checked').val();
        let game = $(this).data('game')
        let text = $('#review-text').val()

        console.log(typeof stars);

        /**
         * Verify data
         */

        let review_data = {
            'GameId' : game,
            'Text' : text,
            'Grade' : stars
        }
        
        $.ajax({
            url: URL + 'reviews',
            method: 'post',
            data: review_data,
            headers: {
                // Accept: "application/json",
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (data) {
                console.log(data);

                loadReviews(res)

                setTimeout(
                    function () {
                        location.reload();
                    }, 0001);

            },
            error: function (xhr, status, error) {
                console.log(xhr.responseJSON.message);

            }
        })
    })
})

