@extends('layouts.front')
@section('title')
    Login
@endsection
@section('content')

<div class="row justify-content-center">
    <div class="post-a-comment-area mb-30 clearfix" id="reply">
        <h4 class="mb-50">Login</h4>

        <div class="contact-form-area">
            <form action="#" method="post">
                <div class="row">
                    <div class="col-10">
                        <input type="text" class="form-control" id="name" placeholder="Name*">
                    </div>
                    <div class="col-10">
                        <input type="email" class="form-control" id="email" placeholder="Email*">
                    </div>
                    <div class="col-10">
                        <input type="text" class="form-control" id="subject" placeholder="Website">
                    </div>
                    <div class="col-10 col-md-5">
                        <button class="btn egames-btn w-100" type="submit">Login</button>
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
    <script src="{{ asset('js/login.js') }}"></script>
@endsection