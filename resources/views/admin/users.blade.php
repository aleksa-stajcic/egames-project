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
        @foreach ($users as $u)
            <tr>
                <td>{{$u->Id}}</td>
                <td><img src="{{ asset($u->ProfileImage) }}" alt="" srcset="" width="100px" height="100px"></td>
                <td>{{$u->Username}}</td>
                <td>{{$u->Email}}</td>
                <td>{{$u->IsActive}}</td>
                <td>{{$u->RoleName}}</td>
                <td>{{$u->DateAdded}}</td>
                <td>{{$u->DateModified}}</td>
            </tr>
        @endforeach
    </tbody>
</table>

