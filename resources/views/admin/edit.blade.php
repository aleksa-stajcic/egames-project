@include('shared.head')

<form action="" method="post" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-10">
            <strong>Username</strong>
            <input type="text" class="form-control" id="username" name="username" placeholder="Username" value="{{$user->Username}}">
        </div>
        <div class="col-10">
            <strong>Email</strong>
            <input type="email" class="form-control" id="email" name="email" placeholder="Email" value="{{$user->Email}}">
        </div>
        
        <div class="col-10">
            <strong>Role</strong>
            <input type="text" class="form-control" id="RoleId" name="RoleId" placeholder="RoleId" value="{{$user->RoleId}}">
        </div>
        <div class="col-10">
            <strong>Active</strong>
            <input type="text" class="form-control" id="isActive" name="isActive" placeholder="Active" value="{{$user->IsActive}}">
        </div>
        {{-- OPTION TO ADD AVATAR AFTER REGISTRATION --}}
        {{-- <div class="col-10">
            <strong>Profile image</strong>
            <input type="file" class="form-control" id="image" name="image" placeholder="Profile picture"> 
        </div> --}}
        <div class="col-10 col-md-5">
            <button class="btn egames-btn w-100" id="btnEdit" name="btnEdit" type="submit" disabled>Edit</button>
        </div>
        {{-- <div class="col-10 col-md-5">
            <button class="btn egames-btn w-100" type="submit">Submit Comment</button>
        </div> --}}
    </div>
</form>