$(document).ready(function(){
    // alert('TU')
    const URL = 'http://127.0.0.1:8000/';
    
    $(document).on('click', '.ban-user', function (e) {
        e.preventDefault();

        let id = $(this).data('id')
        let status = $(this).data('status')
        confirm("You are about to ban user: " + id + ". Are you sure?");
        banUser(id, status)
    })

    function banUser(id, status) {
        $.ajax({
            url: URL + 'admin/users/' + id + '/ban',
            method: 'put',
            data: {
                'id' : id,
                'status' : status
            },
            headers: {
                Accept: "application/json",
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (data) {
                // console.log(data);
                refreshTableBody()
            },
            error: function (xhr, status, error) {
                // console.log(xhr.responseJSON.message);
                console.log(xhr);
                console.log(status);
                
                
            }
        })
    }

    function refreshTableBody(){

        let url_params = new URLSearchParams(window.location.search);
        let page = 1;
        if(url_params.has('page')){
            page = url_params.get('page')
        }
        // console.log(url_params.get('page'));
        
        // alert('refresh')
        $.ajax({
            url: URL + 'api/users?page=' + page,
            method: "get",
            headers: {
                "Accept": "application/json",
            },
            success: function(data){
                console.log(data);
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

        let users_list = data.data

        // for (var user in data) {
        //     console.log(data);
            
        //     console.log(user);
            
        //     html += makeTr(user)
        // }

        for (let index = 0; index < users_list.length; index++) {
            html += makeTr(users_list[index]);
            // console.log(element);
        }

        tbody.html(html)
        // console.log(html);
        

        function makeTr(user) {

            let modified = user.DateModified === null ? "" : user.DateModified;
            let active = user.IsActive;
            let button = {
                btn : "",
                msg : ""
            }
            let status = {
                msg : "",
                class : ""
            }

            if(active == 1){
                // button = `<td><button class="btn btn-xs btn-danger ban-user" data-id="` + user.Id + `">Ban</button></td>`
                button.btn = `btn-danger`
                button.msg = `Ban`
                status.msg = `Active`
                status.class = `bg-primary`
            }else{
                // button = `<td><button class="btn btn-xs btn-success activate-user" data-id="` + user.Id + `">Unban</button></td>`
                button.btn = `btn-success`
                button.msg = `Unban`
                status.msg = `Banned`
                status.class = `bg-danger`
            }

            return `<tr>
                        <td>` + user.Id + `</td>
                        <td><img src="http://127.0.0.1:8000/` + user.ProfileImage + `" alt="" srcset="" width="50px" height="50px"></td>
                        <td>` + user.Username + `</td>
                        <td>` + user.Email + `</td>
                        <td class="`+ status.class +`">` + status.msg + `</td>
                        <td>` + user.RoleName + `</td>
                        <td>` + user.DateAdded + `</td>
                        <td>` + modified + `</td>
                        <td><a style="color: black;" href="http://127.0.0.1:8000/admin/users/` + user.Id + `/edit" class="btn btn-xs btn-warning edit-user" data-id="` + user.Id + `">Edit</a></td>
                        <td><button class="btn btn-xs ban-user `+ button.btn + `" data-id="` + user.Id + `" data-status="`+ active +`">` + button.msg +`</button></td>
                    </tr>`
                     //<td><button class="btn btn-xs btn-success delete-user" data-id="` + user.Id + `">Delete</button></td>
        }
    }

    $(document).on('click', '#btnDeleteUser', function (e) {
        e.preventDefault();
        // alert('Obrisan')
        let id = $(this).data('id');
        $.ajax({
            url: URL + 'admin/users/' + id,
            method: 'delete',
            headers: {
                Accept: "application/json",
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (data) {
                console.log(data);
            },
            error: function (xhr, status, error) {
                console.log(xhr.responseJSON.message);
                
            }
        })

    })

    $(document).on('click', '#btnEditUser', function (e) {
        e.preventDefault();
        $('#error-msg').html('');
        let roleId = $('select#ddlRoles').children("option:selected").val();
        let userId = $(this).data('id');

        let status = $('#isActive').is(':checked') ? 1 : 0;

        let editData = {
            "roleId" : roleId,
            "status" : status
        };

        // console.log(URL + 'admin/users/' + userId);
        // alert(userId);

        if(roleId == 0){
            $('#error-msg').html('<div class="alert alert-danger">User role must be selected.</div>')
        }else{
            $.ajax({
                url: URL + 'admin/users/' + userId,
                method: 'put',
                data: editData,
                headers: {
                    Accept: "application/json",
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function (data) {
                    console.log(typeof data);
                },
                error: function (xhr, status, error) {
                    console.log(xhr.responseJSON.message);
                    console.log(error);
                    console.log(status);
                    
                }
            })
        }
    })
});