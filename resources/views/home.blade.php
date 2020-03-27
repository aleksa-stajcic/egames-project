@extends('layouts.front')
@section('title')
    Home page
@endsection
@section('content')
{{-- @include('partials.home.slider') --}}

{{-- @php var_dump(session('user')); @endphp --}}

<!-- ##### Monthly Picks Area Start ##### -->
<section class="monthly-picks-area section-padding-100 bg-pattern">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="left-right-pattern"></div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-12">
                <!-- Title -->
                <h2 class="section-title mb-70 wow fadeInUp" data-wow-delay="100ms">This Month’s Pick</h2>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <ul class="nav nav-tabs wow fadeInUp" data-wow-delay="300ms" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="latest-tab" data-toggle="tab" href="#latest" role="tab" aria-controls="latest" aria-selected="true">Latest</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="editor-tab" data-toggle="tab" href="#editor" role="tab" aria-controls="editor" aria-selected="false">Editor’s Pick</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <div class="tab-content wow fadeInUp" data-wow-delay="500ms" id="myTabContent">
        <div class="tab-pane fade show active" id="latest" role="tabpanel" aria-labelledby="latest-tab">
            <!-- Latest Games Slideshow -->
            <div class="latest-games-slideshow owl-carousel">

                @foreach ($latest as $l)
                    <!-- Single Games -->
                    <div class="single-games-slide">
                        <img src="{{asset('img/' . $l->Cover)}}" alt="{{ $l->Alt }}" height="">
                        <div class="slide-text">
                            <a href="{{ route('games.show', ['id'=>$l->Id]) }}" class="game-title">{{ $l->Title }}</a>
                            <div class="meta-data">
                                <a href="#">User: {{ $l->Grade }}/10</a>
                                <a href="#" hidden>Action</a>
                            </div>
                        </div>
                    </div>
                @endforeach


            </div>
        </div>
        <div class="tab-pane fade" id="editor" role="tabpanel" aria-labelledby="editor-tab">
            <!-- Editor Games Slideshow -->
            <div class="editor-games-slideshow owl-carousel">

                @foreach ($choice as $c)
                    <div class="single-games-slide">
                        <img src="{{ asset('img/' . $c->Cover) }}" alt="{{ $c->Alt }}">
                        <div class="slide-text">
                            <a href="{{ route('games.show', ['id'=>$c->Id]) }}" class="game-title">{{ $c->Title }}</a>
                            <div class="meta-data">
                                <a href="#">User: {{ $c->Grade }}/10</a>
                                <a href="#" hidden>Action</a>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </div>
</section>
<!-- ##### Monthly Picks Area End ##### -->

<!-- ##### Games Area Start ##### -->
<div class="games-area section-padding-100-0">
    <div class="container">
        <div class="row">
            @foreach ($platforms as $p)
                <!-- Single Games Area -->
                <div class="col-12 col-lg-4">
                    <div class="single-games-area text-center mb-100 wow fadeInUp" data-wow-delay="100ms">
                        <img src="{{asset('img/' . $p->Logo)}}" alt="">
                        <a href="{{ route('games.platform', ['id'=>$p->Id]) }}" class="btn egames-btn mt-30">View Games</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
<!-- ##### Games Area End ##### -->



<!-- ##### Articles Area Start ##### -->
<section class="latest-articles-area section-padding-100-0 bg-img bg-pattern bg-fixed" style="background-image: url(img/bg-img/5.jpg);">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-8">
                <div class="mb-100">
                    <!-- Title -->
                    <h2 class="section-title mb-70 wow fadeInUp" data-wow-delay="100ms">Latest Articles</h2>

                    <!-- *** Single Articles Area *** -->
                    @foreach ($articles as $a)
                        @php
                            $datum = explode(' ', $a->DateAdded)[0];
                            $string = explode(".", $a->Text, 2);
                            $string = $string[0] . '...';
                        @endphp
                        <div class="single-articles-area style-2 d-flex flex-wrap mb-30 wow fadeInUp" data-wow-delay="300ms">
                            <div class="article-thumbnail">
                                <img src="img/bg-img/6.jpg" alt="">
                            </div>
                            <div class="article-content">
                                <a href="{{ route('posts.show', ['post' => $a->Id]) }}" class="post-title">{{ $a->Title }}</a>
                                <div class="post-meta">
                                    <a href="{{ route('profile', ['username' => $a->Username]) }}" class="post-author">{{ $a->Username }}</a>
                                    <a href="#" class="post-date">{{ $datum }}</a>
                                </div>
                                <p>{{ $string }}</p>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>

            {{-- <div class="col-12 col-md-6 col-lg-4">
                <!-- Title -->
                <h2 class="section-title mb-70 wow fadeInUp" data-wow-delay="100ms">This week’s deal</h2>

                <!-- Single Widget Area -->
                <div class="single-widget-area add-widget wow fadeInUp" data-wow-delay="300ms">
                    <a href="#"><img src="img/bg-img/add.png" alt=""></a>
                    <!-- Side Img -->
                    <img src="img/bg-img/side-img.png" class="side-img" alt="">
                </div>
            </div> --}}
        </div>
    </div>
</section>
<!-- ##### Articles Area End ##### -->
@endsection

