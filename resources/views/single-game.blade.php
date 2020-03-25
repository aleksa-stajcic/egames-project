@extends('layouts.front')

@section('title')
    {{ $game->Title . ' Reviews' }}
@endsection

@section('content')

{{-- @section('breadcrumb')
    Game Review Doom
@endsection --}}

@component('partials.breadcrumb', ['breadcrumb' => 'Review: ' . $game->Title, 'banner' => $game->BannerPath])
    
@endcomponent

<!-- ##### Single Game Review Area Start ##### -->
<section class="single-game-review-area section-padding-100">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="single-game-img-slides">
                    {{-- <div id="gameSlides" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img class="d-block w-100" src="{{ asset('img/bg-img/35.jpg') }}" alt="">
                            </div>
                            <div class="carousel-item">
                                <img class="d-block w-100" src="{{ asset('img/bg-img/36.jpg') }}" alt="">
                            </div>
                            <div class="carousel-item">
                                <img class="d-block w-100" src="{{ asset('img/bg-img/37.jpg') }}" alt="">
                            </div>
                            <div class="carousel-item">
                                <img class="d-block w-100" src="{{ asset('img/bg-img/38.jpg') }}" alt="">
                            </div>
                            <div class="carousel-item">
                                <img class="d-block w-100" src="{{ asset('img/bg-img/39.jpg') }}" alt="">
                            </div>
                            <div class="carousel-item">
                                <img class="d-block w-100" src="{{ asset('img/bg-img/39.jpg') }}" alt="">
                            </div>
                        </div>
                        <ol class="carousel-indicators">
                            <li data-target="#gameSlides" data-slide-to="0" class="active" style="background-image: url(img/bg-img/35.jpg);"></li>
                            <li data-target="#gameSlides" data-slide-to="1" style="background-image: url(img/bg-img/36.jpg);"></li>
                            <li data-target="#gameSlides" data-slide-to="2" style="background-image: url(img/bg-img/37.jpg);"></li>
                            <li data-target="#gameSlides" data-slide-to="3" style="background-image: url(img/bg-img/38.jpg);"></li>
                            <li data-target="#gameSlides" data-slide-to="4" style="background-image: url(img/bg-img/39.jpg);"></li>
                            <li data-target="#gameSlides" data-slide-to="5" style="background-image: url(img/bg-img/40.jpg);"></li>
                        </ol>
                    </div> --}}
                </div>
            </div>
        </div>

        <div class="row align-items-center">
            <!-- *** Review Area *** -->
            <div class="col-12 col-md-6">
                <div class="single-game-review-area style-2 mt-70">
                    <div class="game-content">
                        <span class="game-tag">Adventure</span>
                        <a href="single-game-review.html" class="game-title">{{ $game->Title }}</a>
                        <div class="game-meta">
                            <a href="#" class="game-date">July 12, 2018</a>
                            <a href="#" class="game-comments">2 Comments</a>
                        </div>
                        <p> {{ $game->Description }} <p>
                        <!-- Download & Rating Area -->
                        <div class="download-rating-area">
                            {{-- <div class="download-area">
                                <a href="#"><img src="{{ asset('img/core-img/app-store.png') }}" alt=""></a>
                                <a href="#"><img src="{{ asset('img/core-img/google-play.png') }}" alt=""></a>
                            </div> --}}
                            <div class="rating-area mt-30">
                                <h3>8.2</h3>
                                <div class="stars">
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star-half-o" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- *** Barfiller Area *** -->
            <div class="col-12 col-md-6">
                <div class="egames-barfiller">
                    <!-- Single Barfiller -->
                    <div class="single-barfiller-area">
                        <div id="bar1" class="barfiller">
                            <span class="tip"></span>
                            <span class="fill" data-percentage="90"></span>
                            <p>User Experience</p>
                        </div>
                    </div>
                    <!-- Single Barfiller -->
                    <div class="single-barfiller-area">
                        <div id="bar2" class="barfiller">
                            <span class="tip"></span>
                            <span class="fill" data-percentage="80"></span>
                            <p>Marketing</p>
                        </div>
                    </div>
                    <!-- Single Barfiller -->
                    <div class="single-barfiller-area">
                        <div id="bar3" class="barfiller">
                            <span class="tip"></span>
                            <span class="fill" data-percentage="95"></span>
                            <p>Solutions</p>
                        </div>
                    </div>
                    <!-- Single Barfiller -->
                    <div class="single-barfiller-area">
                        <div id="bar4" class="barfiller">
                            <span class="tip"></span>
                            <span class="fill" data-percentage="60"></span>
                            <p>Price</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ##### Single Game Review Area End ##### -->
@endsection
