@extends('layouts.front')
@section('title')
    Posts
@endsection
@section('content')

<section class="articles-area section-padding-0-100">
        <div class="container">
            <div class="row justify-content-center">
                <!-- Articles Post Area -->
                <div class="col-12 col-lg-8">
                    <div class="mt-100">

                        @foreach ($posts as $p)
                        {{-- Explode DateAdded in PostModel::get_all() --}}
                        @php
                            $datum = explode(' ', $p->DateAdded)[0];
                        @endphp
                            <!-- *** Single Articles Area *** -->
                            <div class="single-articles-area d-flex flex-wrap mb-30">
                                <div class="article-thumbnail">
                                    <img src="{{ asset('img/bg-img/6.jpg') }}" alt="">
                                </div>
                                <div class="article-content">
                                    <a href="{{ route('posts.show', ['post'=>$p->Id]) }}" class="post-title">{{ $p->Title }}</a>
                                    <div class="post-meta">
                                        <a href="#" class="post-author">By {{ $p->Username }}</a>
                                        <a href="#" class="post-date">{{ $datum }}</a>
                                    </div>
                                    <p>{{ $p->Text }}</p>
                                </div>
                            </div>
                        @endforeach

                        <!-- ### Pagination Area ### -->
                        {{-- <nav aria-label="Page navigation example">
                            <ul class="pagination mt-100">
                                <li class="page-item active"><a class="page-link" href="#">01</a></li>
                                <li class="page-item"><a class="page-link" href="#">02</a></li>
                                <li class="page-item"><a class="page-link" href="#">03</a></li>
                            </ul>
                        </nav> --}}
                        {{ $posts->links() }}
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection