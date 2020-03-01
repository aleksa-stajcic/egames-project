@extends('layouts.front')
@section('title')
    Login
@endsection
@section('content')

<div class="row justify-content-center">
    <div class="post-a-comment-area mb-30 clearfix" id="reply">
        <h4 class="mb-50">Register</h4>

        <div class="contact-form-area">
            <form action="{{ route('register.store') }}" method="post">
                @csrf
                <div class="row">
                    <div class="col-10">
                        <input type="text" class="form-control" id="username" name="username" placeholder="Username" required>
                    </div>
                    <div class="col-10">
                        <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
                    </div>
                    <div class="col-10">
                        <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                    </div>
                    <div class="col-10">
                        <strong>Profile image</strong>
                        <input type="file" class="form-control" id="image" name="image" placeholder="Profile picture"> 
                    </div>
                    <div class="col-10 col-md-5">
                        <button class="btn egames-btn w-100" id="btnRegister" name="btnRegister" type="submit">Register</button>
                    </div>
                    {{-- <div class="col-10 col-md-5">
                        <button class="btn egames-btn w-100" type="submit">Submit Comment</button>
                    </div> --}}
                </div>
            </form>
        </div>
    </div>
</div>

@endsection

@section('script')
    <script src="{{ asset('js/register.js') }}"></script>
@endsection