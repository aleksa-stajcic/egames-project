@extends('layouts.admin')

@section('content')
@php
    // var_dump($roles);
    // var_dump($user);
@endphp
<form action="" method="post" enctype="multipart/form-data">
    @csrf
    @method('put')
    <div class="row">
        <div class="col-10">
            <strong>Username</strong>
            <input type="text" class="form-control" id="username" name="username" placeholder="Username" value="{{$user->Username}}" readonly>
        </div>
        <div class="col-10">
            <strong>Email</strong>
            <input type="email" class="form-control" id="email" name="email" placeholder="Email" value="{{$user->Email}}" readonly>
        </div>
        
        <div class="col-10">
            <strong>Role</strong>
            <select class="form-control" name="ddlRoles" id="ddlRoles">
                <option value="0">Select user role</option>
            @foreach ($roles as $r)
                <option value="{{ $r->Id }}" {{ $r->Id == $user->RoleId ? 'selected' : '' }}>{{ $r->Name }}</option>
            @endforeach
            </select> 
        </div>
        <div class="col-10">
            <strong>User status</strong><br>
            <div class="form-check">
                <input type="checkbox" class="form-check-input" id="isActive" name="isActive" placeholder="" value="" {{ $user->IsActive == 1 ? 'checked' : ''}}>
                <label for="isActive" class="form-check-label"> Active</label>
            </div>
        </div>
        
        <div class="col-10 col-md-5 btn">
            <button class="btn btn-info btn-icon-split form-control" id="btnEditUser" name="btnEditUser" type="submit" data-id="{{ $user->Id }}">Edit</button>
        </div>
        <div class="col-10 col-md-5 btn">
            <button class="btn btn-danger btn-icon-split form-control" id="btnDeleteUser" name="btnDeleteUser" type="submit" data-id="{{ $user->Id }}">Delete</button>
        </div>
    </div>
</form>


<div id="error-msg"></div>
<div id="success-msg"></div>

@endsection
