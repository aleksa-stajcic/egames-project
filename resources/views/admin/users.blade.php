@include('shared.head')

{{-- {{ csrf_token() }} --}}

<table class="table table-striped ">
    <thead>
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Picture</th>
            <th scope="col">Username</th>
            <th scope="col">Email</th>
            <th scope="col">Account Status</th>
            <th scope="col">Role</th>
            <th scope="col">Date Added</th>
            <th scope="col">Date Modified</th>
            <th scope="col">Edit User</th>
            <th scope="col">Ban/Unban</th>
            <th scope="col">Delete</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($users as $u)
            <tr>
                <td>{{$u->Id}}</td>
                <td><img src="{{ asset($u->ProfileImage) }}" alt="" srcset="" width="50px" height="50px"></td>
                <td>{{$u->Username}}</td>
                <td>{{$u->Email}}</td>
                @if ($u->IsActive == 1)
                    <td>Active</td>
                @else
                    <td>Banned</td>
                @endif
                <td>{{$u->RoleName}}</td>
                <td>{{$u->DateAdded}}</td>
                <td>{{$u->DateModified}}</td>
                <td><a href="{{ route('users.edit', ['id'=>$u->Id]) }}" class="btn btn-xs btn-warning edit-user" data-id="{{ $u->Id }}">Edit</a></td>
                @if ($u->IsActive == 1)
                    <td><button class="btn btn-xs btn-danger ban-user" data-id="{{ $u->Id }}">Ban</button></td>
                @else
                    <td><button class="btn btn-xs btn-success activate-user" data-id="{{ $u->Id }}">Unban</button></td>
                @endif
                <td><button class="btn btn-xs btn-danger delete-user" data-id="{{ $u->Id }}">Delete</button></td>
            </tr>
        @endforeach
    </tbody>
</table>

@section('script')
    <script src="{{ asset('js/_admin.js') }}"></script>
@endsection

@include('partials.scripts')
