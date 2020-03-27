@extends('layouts.front')
@section('title')
    {{ $post->Title }}
@endsection
@section('content')

@php
    $datum = explode(" ", $post->DateAdded)[0];
    // var_dump($datum);
@endphp

<!-- ##### Post Details Area Start ##### -->
    <section class="post-news-area section-padding-0-100">
        <div class="container">
            <div class="row justify-content-center">

                <!-- Post Details Content Area -->
                <div class="col-12 col-lg-8">
                    <div class="mt-100">
                        <div class="post-details-content mb-100">
                            <div class="blog-thumbnail mb-50">
                                <img src="{{ asset('img/bg-img/24.jpg') }}" alt="">
                            </div>
                            <div class="blog-content">
                                <h4 class="post-title">{{ $post->Title }}</h4>
                                <div class="post-meta mb-30">
                                    <a href="#" class="post-date">{{ $datum }}</a>
                                    <a href="#" class="post-author">By {{ $post->Username }}</a>
                                    <a href="#" class="post-comments" id="comment-count"></a>
                                </div>
                                <p>{{ $post->Text }}</p>
                                {{-- <div class="row mt-50">
                                    <div class="col-6">
                                        <img src="img/bg-img/25.jpg" alt="">
                                    </div>
                                    <div class="col-6">
                                        <img src="img/bg-img/26.jpg" alt="">
                                    </div>
                                </div> --}}
                            </div>
                        </div>

                        <!-- Comment Area Start -->
                        <div class="comment_area clearfix mb-70">
                            <h4 class="mb-50">Comments</h4>

                            <ol id="comments-ol">
                                
                            </ol>
                        </div>

                        <div id="larry"></div>

                        @if (session('user') && session('user')->IsDeleted != 1 && session('user')->IsActive == 1)
                            <div class="post-a-comment-area mb-30 clearfix" id="reply-form">
                            <h4 class="mb-50">Leave a reply</h4>

                            <!-- Reply Form -->
                            <div class="contact-form-area">
                                <form action="" method="">
                                    <div class="row">
                                        <div class="col-12">
                                            <textarea name="message" id="message0" class="form-control" cols="30" rows="10" placeholder="Message"></textarea>
                                        </div>
                                        <div class="col-12">
                                            <button class="btn egames-btn w-100" id="btnSubmitComment" type="submit" data-post="{{ $post->Id }}">Submit Comment</button>
                                        </div>
                                    </div>
                                </form>
                                <div id="reply-error"></div>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>

                
            </div>
        </div>
    </section>
    <!-- ##### Post Details Area End ##### -->

@endsection

@section('scripts')
    <script src="{{ asset('js/_comments.js') }}"></script>
@endsection