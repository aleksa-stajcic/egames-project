$(document).ready(function() {
    const URL = 'http://127.0.0.1:8000/'
    // alert('Tu')
    var pathname = window.location.pathname; // Returns path only (/path/example.html)
    var res = pathname.split("/")[2];
    console.log(res);
    

    $.ajax({
        url: URL + 'comments/' + res,
        method: 'get',
        headers: {
            Accept: 'application/json',
        },
        success: function (data) {
            // console.log(data);
            if(data.length){
                $('#comments-ol').html(display(data))
            }else{
                $('#comments-ol').html('No comments.')
            }
            
            // console.log(display(data));
            
        },
        error: function (error) {
            console.log(error);
            
        }
    })

    // function display(data) {
    //     var x = "";
    //     data.forEach(comment => {
    //         x += comment['Username'] + "\n"
    //         if (comment['Children']) {
    //             x += display(comment['Children'])
    //         }
    //     });

    //     return x;
    // }

    function display(data) {
        var li = "";
        data.forEach(comment => {
            li += `<li class="single_comment_area">
                        <div class="comment-content d-flex">
                            <!-- Comment Author -->
                            <div class="comment-author">
                                <img src="`+ URL + comment['ProfileImage'] +`" alt="author">
                            </div>
                            <!-- Comment Meta -->
                            <div class="comment-meta">
                                <a href="#" class="post-author">`+ comment['Username'] +`</a>
                                <a href="#" class="post-date">July 12, 2018</a>
                                <p>`+ comment['Text'] +`</p>
                                <a href="#reply" class="reply">Reply</a>
                            </div>
                        </div>`

            if(comment['Children']){
                li += `<ol class="children">` + display(comment['Children']) + `</ol>`
            }
            li += `</li>`
        });
        return li;
    }
});