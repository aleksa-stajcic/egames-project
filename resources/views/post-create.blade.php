@extends('layouts.front')
@section('title')
    Create a post
@endsection
@section('content')

<div class="row justify-content-center">
    <div class="post-a-comment-area mb-30 clearfix" id="reply">
        <h4 class="mb-50">New post</h4>

        <div class="contact-form-area">
            <form action="{{ route('posts.store') }}" method="post">
                @csrf
                <div class="row">
                    <div class="col-10">
                        <input type="text" class="form-control" id="title" name="title" placeholder="Title" required>
                    </div>
                    <div class="col-10">
                        <textarea type="password" class="form-control" id="post-text" name="post-text" placeholder="What is your post about?" required></textarea>
                    </div>
                    <div class="col-10 col-md-5">
                        <button class="btn egames-btn w-100" id="" name="" type="submit">Submit post</button>
                    </div>
                </div>
            </form>
            @if(session('msg'))
                <div class="alert alert-warning">
                    {{ session('msg') }}
                </div>
            @endif
        </div>
    </div>
</div>

@endsection
