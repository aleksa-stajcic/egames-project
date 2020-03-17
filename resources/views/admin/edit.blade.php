@extends('layouts.admin')

@section('content')
@php
    var_dump($roles);
    var_dump($user);
@endphp
<form action="" method="post" enctype="multipart/form-data">
    @csrf
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
            {{-- <input type="text" class="form-control" id="RoleId" name="RoleId" placeholder="RoleId" value="{{$user->RoleId}}"> --}}
            <select class="form-control" name="" id="">
                <option value="0">Select user role</option>
            @foreach ($roles as $r)
                <option value="{{ $r->Id }}" {{ $r->Id == $user->RoleId ? 'selected' : '' }}>{{ $r->Name }}</option>
            @endforeach
            </select> 
        </div>
        <div class="col-10 form-check">
            <strong>Active</strong><br>
            <input type="checkbox" class="form-check-input" id="isActive" name="isActive" placeholder="" value="" {{ $user->IsActive == 1 ? 'checked' : ''}}>
            <label for="isActive" class="form-check-label"> Active</label>
        </div>
        {{-- OPTION TO ADD AVATAR AFTER REGISTRATION --}}
        {{-- <div class="col-10">
            <strong>Profile image</strong>
            <input type="file" class="form-control" id="image" name="image" placeholder="Profile picture"> 
        </div> --}}
        <div class="col-10 col-md-5 btn">
            <button class="btn btn-info btn-icon-split w-100" id="btnEdit" name="btnEdit" type="submit">Edit</button>
        </div>
        {{-- <div class="col-10 col-md-5">
            <button class="btn egames-btn w-100" type="submit">Submit Comment</button>
        </div> --}}
    </div>
</form>

@endsection