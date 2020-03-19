@extends('layouts.admin')
@section('content')
@php
    // var_dump(session('user'))
@endphp

<table class="table table-striped table-dark">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Picture</th>
            <th scope="col">Username</th>
            <th scope="col">Email</th>
            <th scope="col">Account Status</th>
            <th scope="col">Role</th>
            <th scope="col">Date Added</th>
            <th scope="col">Date Modified</th>
            <th scope="col">Edit User</th>
            <th scope="col">Ban/Unban</th>
            {{-- <th scope="col">Delete</th> --}}
        </tr>
    </thead>
    <tbody>
        @foreach ($users as $u)
            <tr>
                <td>{{$u->Id}}</td>
                <td><img src="{{ asset($u->ProfileImage) }}" alt="" srcset="" width="50px" height="50px"></td>
                <td>{{$u->Username}}</td>
                <td>{{$u->Email}}</td>
                <td class="{{ $u->IsActive ? "bg-primary" : "bg-danger" }}">{{ $u->IsActive ? 'Active' : 'Banned' }}</td>
                <td>{{$u->RoleName}}</td>
                <td>{{$u->DateAdded}}</td>
                <td>{{$u->DateModified}}</td>
                <td><a style="color: black;" href="{{ route('users.edit', ['id'=>$u->Id]) }}" class="btn btn-xs btn-warning edit-user" data-id="{{ $u->Id }}">Edit</a></td>
                <td><button class="btn btn-xs ban-user {{ $u->IsActive ? 'btn-danger' : 'btn-success' }}" data-id="{{ $u->Id }}" data-status="{{ $u->IsActive }}">{{ $u->IsActive ? 'Ban' : 'Unban' }}</button></td>
                {{-- <td><button class="btn btn-xs btn-danger delete-user" data-id="{{ $u->Id }}">Delete</button></td> --}}
            </tr>
        @endforeach
    </tbody>
</table>

{{ $users->links() }}

@endsection
