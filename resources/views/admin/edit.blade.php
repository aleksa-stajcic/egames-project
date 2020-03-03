@include('shared.head')

<table class="table table-striped table-dark">
    <thead>
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Picture</th>
            <th scope="col">Username</th>
            <th scope="col">Email</th>
            <th scope="col">Active</th>
            <th scope="col">Role</th>
            <th scope="col">Date Added</th>
            <th scope="col">Date Modified</th>
        </tr>
    </thead>
    <tbody>
            <tr>
                <td>{{$user->Id}}</td>
                <td><img src="{{ asset($user->ProfileImage) }}" alt="" srcset="" width="100px" height="100px"></td>
                <td>{{$user->Username}}</td>
                <td>{{$user->Email}}</td>
                <td>{{$user->IsActive}}</td>
                <td>{{$user->RoleId}}</td>
                <td>{{$user->DateAdded}}</td>
                <td>{{$user->DateModified}}</td>
            </tr>
    </tbody>
</table>