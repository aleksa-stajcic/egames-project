$(document).ready(function() {
    const URL = 'http://127.0.0.1:8000/'
    alert('Tu')
    var pathname = window.location.pathname; // Returns path only (/path/example.html)
    var res = pathname.split("/")[2];
    // console.log(res);
    
    /**
     * Put ajax call into function and call on load and in submit -> success
     */

    function loadComments(postId) {
        $.ajax({
            url: URL + 'comments/' + postId,
            method: 'get',
            headers: {
                Accept: 'application/json',
            },
            success: function (data) {
                if (data.length) {
                    $('#comments-ol').html(display(data))

                    $('.reply-form').hide()
                    $('a[href^="#"]').on('click', function (event) {
                        $('.reply-form').hide()
                        var target = $(this).attr('href');
                        $('.reply-form' + target).toggle();
                    });
                } else {
                    $('#comments-ol').html('No comments.')
                }
            },
            error: function (error) {
                console.log(error);

            }
        })
    }

    loadComments(res)

    function display(data) {
        var li = "";
        data.forEach(comment => {
            li += `<li class="single_comment_area">
                        <div class="comment-content d-flex">
                            <!-- Comment Author -->
                            <div class="comment-author">
                                <img src="`+ URL + 'img/' + comment['ProfileImage'] +`" alt="author">
                            </div>
                            <!-- Comment Meta -->
                            <div class="comment-meta">
                                <a href="#" class="post-author">`+ comment['Username'] +`</a>
                                <a href="#" class="post-date">July 12, 2018</a>
                                <p>`+ comment['Text'] +`</p>
                                <a href="#reply`+ comment['Id'] +`" class="reply">Reply</a>
                                <div class="reply-form" id="reply`+ comment['Id'] +`">
                                    <!-- Reply Form -->
                                    <div class="contact-form-area">
                                        <form action="" method="">
                                            <div class="row">
                                                <div class="col-12">
                                                    <textarea name="message" id="message`+ comment['Id'] +`" class="form-control" cols="30" rows="10" placeholder="Message"></textarea>
                                                </div>
                                                <div class="col-12">
                                                    <button class="btn egames-btn w-100" id="btnSubmitComment" type="submit" data-parent="`+ comment['Id'] +`" data-post="`+ comment['PostId'] +`">Submit Comment</button>
                                                </div>
                                            </div>
                                        </form>
                                        <div class="" id="reply-error`+ comment['Id'] +`"></div>
                                    </div>
                                </div>
                            </div>
                        </div>`

            if(comment['Children']){
                li += `<ol class="children">` + display(comment['Children']) + `</ol>`
            }
            li += `</li>`
        });
        return li;
    }


    $(document).on('click', '#btnSubmitComment', function(e) {
        /**
         * Only works for replys
         * Modify to work for regular comments OR make seperate function just for regular comments
         */
        e.preventDefault();
        let post = $(this).data('post')
        let parent = $(this).data('parent') ? $(this).data('parent') : null
        let text = parent != null ? $('textarea[id="message' + parent + '"]').val() : $('textarea[id="message0"]').val()
        let reply_error = parent != null ? $('div[id="reply-error' + parent + '"]') : $('div[id="reply-error"]')
        // alert(parent)
        // console.log(text);

        if(!text){
            // console.log('empty');
            reply_error.addClass('alert alert-danger')
            reply_error.html('Comment cant be empty')
            
        }else{
            /**
             * Make sure text is a certtain length
             */
            // console.log(text);
            reply_error.removeClass('alert alert-danger')
            reply_error.html('')
            $('textarea[id="message0"]').val('')

            let comment_data = {
                'PostId' : post,
                'ParentComment' : parent,
                'Text' : text
            }

            $.ajax({
                url: URL + 'comments',
                method: 'post',
                data: comment_data,
                headers: {
                    // Accept: "application/json",
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function (data) {
                    console.log(data);
                    // $('#comments-ol').html(display(data))

                    loadComments(res)
                    
                },
                error: function (xhr, status, error) {
                    console.log(xhr.responseJSON.message);
                    
                }
            })
        }
    })
});