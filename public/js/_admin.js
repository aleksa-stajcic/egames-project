$(document).ready(function(){
    
    $('.ban-user').click(function(){
        // alert('admin panel')
        // alert($(this).data('id') + " delete.")
        let id = $(this).data('id')
        confirm("You are about to ban user: " + id + ". Are you sure?");
        banUser(id)

    });

    function banUser(id) {
        $.ajax({
            url: 'http://127.0.0.1:8000/users/' + id, // users/{id}/ban
            method: 'delete', // put/patch
            headers: {
                Accept: "application/json",
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(data) {
                // console.log(data);
                
                refreshTableBody()
            },
            error: function(xhr, status, error){
                console.log(error);
                console.log(status);
                
            }
        })
    };

    function refreshTableBody(){
        alert('refresh')
        $.ajax({
            url: "http://127.0.0.1:8000/api/users",
            method: "get",
            headers: {
                "Accept": "application/json",
            },
            success: function(data){
                // console.log(data);
                makeTableBody(data)
            },
            error: function (xhr, status, error) {
                console.log(error);
                console.log(status);

            }
        })
    }

    function makeTableBody(data) {
        let tbody = $('tbody')
        // console.log(data);
        
        tbody.html('')

        let html = "";

        // for (var user in data) {
        //     console.log(data);
            
        //     console.log(user);
            
        //     html += makeTr(user)
        // }

        for (let index = 0; index < data.length; index++) {
            html += makeTr(data[index]);
            // console.log(element);
        }

        tbody.html(html)

        function makeTr(user) {

            let modified = user.DateModified === null ? "" : user.DateModified;
            let active = user.IsActive;
            let button = ""
            let status = ""

            if(active == 1){
                button = `<td><button class="btn btn-xs btn-danger ban-user" data-id="` + user.Id + `">Ban</button></td>`
                status = `<td>Active</td>`
            }else{
                button = `<td><button class="btn btn-xs btn-success activate-user" data-id="` + user.Id + `">Unban</button></td>`
                status = `<td>Banned</td>`
            }

            return `<tr>
                    <td>` + user.Id + `</td>
                    <td><img src="http://127.0.0.1:8000/` + user.ProfileImage + `" alt="" srcset="" width="50px" height="50px"></td>
                    <td>` + user.Username + `</td>
                    <td>` + user.Email + `</td>
                    `+ status +`
                    <td>` + user.RoleName + `</td>
                    <td>` + user.DateAdded + `</td>
                    <td>` + modified + `</td>
                    <td><a href="http://127.0.0.1:8000/users/` + user.Id + `/edit" class="btn btn-xs btn-warning edit-user" data-id="` + user.Id + `">Edit</a></td>
                    `+ button +`
                    <td><button class="btn btn-xs btn-success delete-user" data-id="` + user.Id + `">Delete</button></td>
                </tr>`
        }
    }

    $('.delete-user').click(function() {
        // delete from Users -> insert into DeletedUsers
    })

});