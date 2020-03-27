$(document).ready(function (e) {
    const URL = 'http://127.0.0.1:8000/';
    // alert('editor')

    $(document).on('click', '.delete-game', function (e) {
        e.preventDefault()

        let id = $(this).data('id')

        // alert('deleted: ' + id)

        
        $.ajax({
            url: URL + 'games/' + id,
            method: 'delete',
            headers: {
                "Accept": "application/json",
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (data) {
                console.log(data);

                refreshTableBody()

            },
            error: function (xhr, status, error) {
                console.log(error);
                console.log(xhr.responseJSON.message);

            }
        })

    })

    $(document).on('change', '.ed-choice', function (e) {
        let id = $(this).data('id')

        // console.log(id);
        let value = $(this).is(':checked') ? 1 : 0

        // console.log(value);
        

        $.ajax({
            url: URL + 'games/' + id,
            method: 'put',
            headers: {
                "Accept": "application/json",
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                'IsEditorsChoice' : value,
            },
            success: function (data) {
                // console.log(data);

                refreshTableBody()

            },
            error: function (xhr, status, error) {
                console.log(error);
                console.log(xhr.responseJSON.message);

            }
        })
        
    })

    function refreshTableBody() {

        let url_params = new URLSearchParams(window.location.search);
        let page = 1;
        if (url_params.has('page')) {
            page = url_params.get('page')
        }

        $.ajax({
            url: URL + 'api/games?page=' + page,
            method: "get",
            headers: {
                "Accept": "application/json",
            },
            success: function (data) {
                // console.log(data.data);
                makeTableBody(data, page)
            },
            error: function (xhr, status, error) {
                console.log(error);
                console.log(status);

            }
        })
    }

    function makeTableBody(data, page = 1) {
        let tbody = $('tbody')

        tbody.html('')

        let html = "";

        perPage = 10
        i = page == 1 ? page : ((page-1) * perPage) + 1

        let games_list = data.data

        for (let index = 0; index < games_list.length; index++) {
            html += makeTr(games_list[index]);
        }

        tbody.html(html)

        function makeTr(game) {

            let modified = game.DateModified === null ? "" : game.DateModified;
            let choice = game.IsEditorsChoice == 1 ? 'checked' : ''
            // console.log(choice);
            

            return `<tr>
                        <td>` + i++ + `</td>
                        <td><img src="http://127.0.0.1:8000/img/` + game.Path + `" alt="" srcset="" width="50px" height="50px"></td>
                        <td>` + game.Title + `</td>
                        <td>` + game.Developer + `</td>
                        <td>` + game.Publisher + `</td>
                        <td>` + game.Year + `</td>
                        <td><input class="ed-choice" data-id="` + game.Id + `" type="checkbox" ` + choice + `/></td>
                        <td>` + game.DateAdded + `</td>
                        <td>` + modified + `</td>
                        <td><button class="btn btn-xs btn-danger delete-game" data-id="` + game.Id + `">Delete</button></td>
                    </tr>`
        }
    }

})