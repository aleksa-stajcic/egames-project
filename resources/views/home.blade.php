@extends('layouts.front')
@section('title')
    Home page
@endsection
@section('content')
@include('partials.home.slider')

<?php var_dump($podaci); ?>

<!-- ##### Games Area Start ##### -->
<div class="games-area section-padding-100-0">
    <div class="container">
        <div class="row">
            <!-- Single Games Area -->
            <div class="col-12 col-md-4">
                <div class="single-games-area text-center mb-100 wow fadeInUp" data-wow-delay="100ms">
                    <img src="{{asset('img/bg-img/game1.jpg')}}" alt="">
                    <a href="#" class="btn egames-btn mt-30">View Games</a>
                </div>
            </div>

            <!-- Single Games Area -->
            <div class="col-12 col-md-4">
                <div class="single-games-area text-center mb-100 wow fadeInUp" data-wow-delay="300ms">
                    <img src="{{asset('img/bg-img/game2.jpg')}}" alt="">
                    <a href="#" class="btn egames-btn mt-30">View Games</a>
                </div>
            </div>

            <!-- Single Games Area -->
            <div class="col-12 col-md-4">
                <div class="single-games-area text-center mb-100 wow fadeInUp" data-wow-delay="500ms">
                    <img src="{{asset('img/bg-img/game3.jpg')}}" alt="">
                    <a href="#" class="btn egames-btn mt-30">View Games</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ##### Games Area End ##### -->

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
                        <a class="nav-link active" id="popular-tab" data-toggle="tab" href="#popular" role="tab" aria-controls="popular" aria-selected="true">Popular</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="latest-tab" data-toggle="tab" href="#latest" role="tab" aria-controls="latest" aria-selected="false">Latest</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="editor-tab" data-toggle="tab" href="#editor" role="tab" aria-controls="editor" aria-selected="false">Editor’s Pick</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <div class="tab-content wow fadeInUp" data-wow-delay="500ms" id="myTabContent">
        <div class="tab-pane fade show active" id="popular" role="tabpanel" aria-labelledby="popular-tab">
            <!-- Popular Games Slideshow -->
            <div class="popular-games-slideshow owl-carousel">

                <!-- Single Games -->
                <div class="single-games-slide">
                    <img src="{{asset('img/bg-img/50.jpg')}}" alt="">
                    <div class="slide-text">
                        <a href="#" class="game-title">Grand Theft Auto V</a>
                        <div class="meta-data">
                            <a href="#">User: 9.1/10</a>
                            <a href="#">Action</a>
                        </div>
                    </div>
                </div>

                <!-- Single Games -->
                <div class="single-games-slide">
                    <img src="{{asset('img/bg-img/51.jpg')}}" alt="">
                    <div class="slide-text">
                        <a href="#" class="game-title">Doom</a>
                        <div class="meta-data">
                            <a href="#">User: 9.1/10</a>
                            <a href="#">Adventure</a>
                        </div>
                    </div>
                </div>

                <!-- Single Games -->
                <div class="single-games-slide">
                    <img src="{{asset('img/bg-img/52.jpg')}}" alt="">
                    <div class="slide-text">
                        <a href="#" class="game-title">God of War</a>
                        <div class="meta-data">
                            <a href="#">User: 9.1/10</a>
                            <a href="#">Action</a>
                        </div>
                    </div>
                </div>

                <!-- Single Games -->
                <div class="single-games-slide">
                    <img src="{{asset('img/bg-img/53.jpg')}}" alt="">
                    <div class="slide-text">
                        <a href="#" class="game-title">Bloodborne</a>
                        <div class="meta-data">
                            <a href="#">User: 9.1/10</a>
                            <a href="#">Adventure</a>
                        </div>
                    </div>
                </div>

                <!-- Single Games -->
                <div class="single-games-slide">
                    <img src="{{asset('img/bg-img/54.jpg')}}" alt="">
                    <div class="slide-text">
                        <a href="#" class="game-title">Persona 5</a>
                        <div class="meta-data">
                            <a href="#">User: 9.1/10</a>
                            <a href="#">Action</a>
                        </div>
                    </div>
                </div>

                <!-- Single Games -->
                <div class="single-games-slide">
                    <img src="{{asset('img/bg-img/52.jpg')}}" alt="">
                    <div class="slide-text">
                        <a href="#" class="game-title">God of War</a>
                        <div class="meta-data">
                            <a href="#">User: 9.1/10</a>
                            <a href="#">Action</a>
                        </div>
                    </div>
                </div>

                <!-- Single Games -->
                <div class="single-games-slide">
                    <img src="{{asset('img/bg-img/53.jpg')}}" alt="">
                    <div class="slide-text">
                        <a href="#" class="game-title">Bloodborne</a>
                        <div class="meta-data">
                            <a href="#">User: 9.1/10</a>
                            <a href="#">Adventure</a>
                        </div>
                    </div>
                </div>

                <!-- Single Games -->
                <div class="single-games-slide">
                    <img src="{{asset('img/bg-img/54.jpg')}}" alt="">
                    <div class="slide-text">
                        <a href="#" class="game-title">Persona 5</a>
                        <div class="meta-data">
                            <a href="#">User: 9.1/10</a>
                            <a href="#">Action</a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div class="tab-pane fade" id="latest" role="tabpanel" aria-labelledby="latest-tab">
            <!-- Latest Games Slideshow -->
            <div class="latest-games-slideshow owl-carousel">

                <!-- Single Games -->
                <div class="single-games-slide">
                    <img src="{{asset('img/bg-img/50.jpg')}}" alt="">
                    <div class="slide-text">
                        <a href="#" class="game-title">Grand Theft Auto V</a>
                        <div class="meta-data">
                            <a href="#">User: 9.1/10</a>
                            <a href="#">Action</a>
                        </div>
                    </div>
                </div>

                <!-- Single Games -->
                <div class="single-games-slide">
                    <img src="{{asset('img/bg-img/51.jpg')}}" alt="">
                    <div class="slide-text">
                        <a href="#" class="game-title">Doom</a>
                        <div class="meta-data">
                            <a href="#">User: 9.1/10</a>
                            <a href="#">Adventure</a>
                        </div>
                    </div>
                </div>

                <!-- Single Games -->
                <div class="single-games-slide">
                    <img src="{{asset('img/bg-img/52.jpg')}}" alt="">
                    <div class="slide-text">
                        <a href="#" class="game-title">God of War</a>
                        <div class="meta-data">
                            <a href="#">User: 9.1/10</a>
                            <a href="#">Action</a>
                        </div>
                    </div>
                </div>

                <!-- Single Games -->
                <div class="single-games-slide">
                    <img src="{{asset('img/bg-img/53.jpg')}}" alt="">
                    <div class="slide-text">
                        <a href="#" class="game-title">Bloodborne</a>
                        <div class="meta-data">
                            <a href="#">User: 9.1/10</a>
                            <a href="#">Adventure</a>
                        </div>
                    </div>
                </div>

                <!-- Single Games -->
                <div class="single-games-slide">
                    <img src="{{asset('img/bg-img/54.jpg')}}" alt="">
                    <div class="slide-text">
                        <a href="#" class="game-title">Persona 5</a>
                        <div class="meta-data">
                            <a href="#">User: 9.1/10</a>
                            <a href="#">Action</a>
                        </div>
                    </div>
                </div>

                <!-- Single Games -->
                <div class="single-games-slide">
                    <img src="{{asset('img/bg-img/52.jpg')}}" alt="">
                    <div class="slide-text">
                        <a href="#" class="game-title">God of War</a>
                        <div class="meta-data">
                            <a href="#">User: 9.1/10</a>
                            <a href="#">Action</a>
                        </div>
                    </div>
                </div>

                <!-- Single Games -->
                <div class="single-games-slide">
                    <img src="{{asset('img/bg-img/53.jpg')}}" alt="">
                    <div class="slide-text">
                        <a href="#" class="game-title">Bloodborne</a>
                        <div class="meta-data">
                            <a href="#">User: 9.1/10</a>
                            <a href="#">Adventure</a>
                        </div>
                    </div>
                </div>

                <!-- Single Games -->
                <div class="single-games-slide">
                    <img src="{{asset('img/bg-img/54.jpg')}}" alt="">
                    <div class="slide-text">
                        <a href="#" class="game-title">Persona 5</a>
                        <div class="meta-data">
                            <a href="#">User: 9.1/10</a>
                            <a href="#">Action</a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div class="tab-pane fade" id="editor" role="tabpanel" aria-labelledby="editor-tab">
            <!-- Editor Games Slideshow -->
            <div class="editor-games-slideshow owl-carousel">

                <!-- Single Games -->
                <div class="single-games-slide">
                    <img src="img/bg-img/50.jpg" alt="">
                    <div class="slide-text">
                        <a href="#" class="game-title">Grand Theft Auto V</a>
                        <div class="meta-data">
                            <a href="#">User: 9.1/10</a>
                            <a href="#">Action</a>
                        </div>
                    </div>
                </div>

                <!-- Single Games -->
                <div class="single-games-slide">
                    <img src="img/bg-img/51.jpg" alt="">
                    <div class="slide-text">
                        <a href="#" class="game-title">Doom</a>
                        <div class="meta-data">
                            <a href="#">User: 9.1/10</a>
                            <a href="#">Adventure</a>
                        </div>
                    </div>
                </div>

                <!-- Single Games -->
                <div class="single-games-slide">
                    <img src="img/bg-img/52.jpg" alt="">
                    <div class="slide-text">
                        <a href="#" class="game-title">God of War</a>
                        <div class="meta-data">
                            <a href="#">User: 9.1/10</a>
                            <a href="#">Action</a>
                        </div>
                    </div>
                </div>

                <!-- Single Games -->
                <div class="single-games-slide">
                    <img src="img/bg-img/53.jpg" alt="">
                    <div class="slide-text">
                        <a href="#" class="game-title">Bloodborne</a>
                        <div class="meta-data">
                            <a href="#">User: 9.1/10</a>
                            <a href="#">Adventure</a>
                        </div>
                    </div>
                </div>

                <!-- Single Games -->
                <div class="single-games-slide">
                    <img src="img/bg-img/54.jpg" alt="">
                    <div class="slide-text">
                        <a href="#" class="game-title">Persona 5</a>
                        <div class="meta-data">
                            <a href="#">User: 9.1/10</a>
                            <a href="#">Action</a>
                        </div>
                    </div>
                </div>

                <!-- Single Games -->
                <div class="single-games-slide">
                    <img src="img/bg-img/52.jpg" alt="">
                    <div class="slide-text">
                        <a href="#" class="game-title">God of War</a>
                        <div class="meta-data">
                            <a href="#">User: 9.1/10</a>
                            <a href="#">Action</a>
                        </div>
                    </div>
                </div>

                <!-- Single Games -->
                <div class="single-games-slide">
                    <img src="img/bg-img/53.jpg" alt="">
                    <div class="slide-text">
                        <a href="#" class="game-title">Bloodborne</a>
                        <div class="meta-data">
                            <a href="#">User: 9.1/10</a>
                            <a href="#">Adventure</a>
                        </div>
                    </div>
                </div>

                <!-- Single Games -->
                <div class="single-games-slide">
                    <img src="img/bg-img/54.jpg" alt="">
                    <div class="slide-text">
                        <a href="#" class="game-title">Persona 5</a>
                        <div class="meta-data">
                            <a href="#">User: 9.1/10</a>
                            <a href="#">Action</a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>
<!-- ##### Monthly Picks Area End ##### -->

<!-- ##### Video Area Start ##### -->
<div class="egames-video-area section-padding-100 bg-pattern2">
    <div class="container">
        <div class="row no-gutters">
            <div class="col-12 col-md-6 col-lg-4">
                <div class="egames-nav-btn">
                    <div class="nav flex-column" id="video-tab" role="tablist" aria-orientation="vertical">
                        <a class="nav-link active" id="video1" data-toggle="pill" href="#video-1" role="tab" aria-controls="video-1" aria-selected="true">
                            <!-- Single Video Widget -->
                            <div class="single-video-widget d-flex wow fadeInUp" data-wow-delay="100ms">
                                <div class="video-thumbnail">
                                    <img src="img/bg-img/14.jpg" alt="">
                                </div>
                                <div class="video-text">
                                    <p class="video-title mb-0">Assemble Your Squad and Join the Battle</p>
                                    <span>Nintendo Wii, PS4, XBox 360</span>
                                </div>
                                <div class="video-rating">8.3/10</div>
                            </div>
                        </a>

                        <a class="nav-link" id="video2" data-toggle="pill" href="#video-2" role="tab" aria-controls="video-2" aria-selected="false">
                            <!-- Single Video Widget -->
                            <div class="single-video-widget d-flex wow fadeInUp" data-wow-delay="200ms">
                                <div class="video-thumbnail">
                                    <img src="img/bg-img/15.jpg" alt="">
                                </div>
                                <div class="video-text">
                                    <p class="video-title mb-0">Tips to improve your game</p>
                                    <span>Nintendo Wii, PS4, XBox 360</span>
                                </div>
                                <div class="video-rating">8.3/10</div>
                            </div>
                        </a>

                        <a class="nav-link" id="video3" data-toggle="pill" href="#video-3" role="tab" aria-controls="video-3" aria-selected="false">
                            <!-- Single Video Widget -->
                            <div class="single-video-widget d-flex wow fadeInUp" data-wow-delay="300ms">
                                <div class="video-thumbnail">
                                    <img src="img/bg-img/16.jpg" alt="">
                                </div>
                                <div class="video-text">
                                    <p class="video-title mb-0">Game reviews: the best of 2018</p>
                                    <span>Nintendo Wii, PS4, XBox 360</span>
                                </div>
                                <div class="video-rating">8.3/10</div>
                            </div>
                        </a>

                        <a class="nav-link" id="video4" data-toggle="pill" href="#video-4" role="tab" aria-controls="video-4" aria-selected="false">
                            <!-- Single Video Widget -->
                            <div class="single-video-widget d-flex wow fadeInUp" data-wow-delay="400ms">
                                <div class="video-thumbnail">
                                    <img src="img/bg-img/17.jpg" alt="">
                                </div>
                                <div class="video-text">
                                    <p class="video-title mb-0">Assemble Your Squad and Join the Battle</p>
                                    <span>Nintendo Wii, PS4, XBox 360</span>
                                </div>
                                <div class="video-rating">8.3/10</div>
                            </div>
                        </a>

                        <a class="nav-link" id="video5" data-toggle="pill" href="#video-5" role="tab" aria-controls="video-5" aria-selected="false">
                            <!-- Single Video Widget -->
                            <div class="single-video-widget d-flex wow fadeInUp" data-wow-delay="500ms">
                                <div class="video-thumbnail">
                                    <img src="img/bg-img/18.jpg" alt="">
                                </div>
                                <div class="video-text">
                                    <p class="video-title mb-0">Tips to improve your game</p>
                                    <span>Nintendo Wii, PS4, XBox 360</span>
                                </div>
                                <div class="video-rating">8.3/10</div>
                            </div>
                        </a>

                        <a class="nav-link" id="video6" data-toggle="pill" href="#video-6" role="tab" aria-controls="video-6" aria-selected="false">
                            <!-- Single Video Widget -->
                            <div class="single-video-widget d-flex wow fadeInUp" data-wow-delay="600ms">
                                <div class="video-thumbnail">
                                    <img src="img/bg-img/14.jpg" alt="">
                                </div>
                                <div class="video-text">
                                    <p class="video-title mb-0">Game reviews: the best of 2018</p>
                                    <span>Nintendo Wii, PS4, XBox 360</span>
                                </div>
                                <div class="video-rating">8.3/10</div>
                            </div>
                        </a>

                        <a class="nav-link" id="video7" data-toggle="pill" href="#video-7" role="tab" aria-controls="video-7" aria-selected="false">
                            <!-- Single Video Widget -->
                            <div class="single-video-widget d-flex wow fadeInUp" data-wow-delay="700ms">
                                <div class="video-thumbnail">
                                    <img src="img/bg-img/15.jpg" alt="">
                                </div>
                                <div class="video-text">
                                    <p class="video-title mb-0">Tips to improve your game</p>
                                    <span>Nintendo Wii, PS4, XBox 360</span>
                                </div>
                                <div class="video-rating">8.3/10</div>
                            </div>
                        </a>

                        <a class="nav-link" id="video8" data-toggle="pill" href="#video-8" role="tab" aria-controls="video-8" aria-selected="false">
                            <!-- Single Video Widget -->
                            <div class="single-video-widget d-flex wow fadeInUp" data-wow-delay="800ms">
                                <div class="video-thumbnail">
                                    <img src="img/bg-img/16.jpg" alt="">
                                </div>
                                <div class="video-text">
                                    <p class="video-title mb-0">Game reviews: the best of 2018</p>
                                    <span>Nintendo Wii, PS4, XBox 360</span>
                                </div>
                                <div class="video-rating">8.3/10</div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-6 col-lg-8">
                <div class="tab-content" id="video-tabContent">
                    <div class="tab-pane fade show active" id="video-1" role="tabpanel" aria-labelledby="video1">
                        <div class="video-playground bg-img" style="background-image: url({{asset('img/bg-img/45.jpg')}});">
                            <!-- Play Button -->
                            <div class="play-btn">
                                <a href="https://www.youtube.com/watch?v=7HKoqNJtMTQ" class="play-button"><img src="img/core-img/play.png" alt=""></a>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="video-2" role="tabpanel" aria-labelledby="video2">
                        <div class="video-playground bg-img" style="background-image: url(img/bg-img/46.jpg);">
                            <!-- Play Button -->
                            <div class="play-btn">
                                <a href="https://www.youtube.com/watch?v=7HKoqNJtMTQ" class="play-button"><img src="img/core-img/play.png" alt=""></a>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="video-3" role="tabpanel" aria-labelledby="video3">
                        <div class="video-playground bg-img" style="background-image: url(img/bg-img/47.jpg);">
                            <!-- Play Button -->
                            <div class="play-btn">
                                <a href="https://www.youtube.com/watch?v=7HKoqNJtMTQ" class="play-button"><img src="img/core-img/play.png" alt=""></a>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="video-4" role="tabpanel" aria-labelledby="video4">
                        <div class="video-playground bg-img" style="background-image: url(img/bg-img/48.jpg);">
                            <!-- Play Button -->
                            <div class="play-btn">
                                <a href="https://www.youtube.com/watch?v=7HKoqNJtMTQ" class="play-button"><img src="img/core-img/play.png" alt=""></a>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="video-5" role="tabpanel" aria-labelledby="video5">
                        <div class="video-playground bg-img" style="background-image: url(img/bg-img/49.jpg);">
                            <!-- Play Button -->
                            <div class="play-btn">
                                <a href="https://www.youtube.com/watch?v=7HKoqNJtMTQ" class="play-button"><img src="img/core-img/play.png" alt=""></a>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="video-6" role="tabpanel" aria-labelledby="video6">
                        <div class="video-playground bg-img" style="background-image: url(img/bg-img/45.jpg);">
                            <!-- Play Button -->
                            <div class="play-btn">
                                <a href="https://www.youtube.com/watch?v=7HKoqNJtMTQ" class="play-button"><img src="img/core-img/play.png" alt=""></a>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="video-7" role="tabpanel" aria-labelledby="video7">
                        <div class="video-playground bg-img" style="background-image: url(img/bg-img/46.jpg);">
                            <!-- Play Button -->
                            <div class="play-btn">
                                <a href="https://www.youtube.com/watch?v=7HKoqNJtMTQ" class="play-button"><img src="img/core-img/play.png" alt=""></a>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="video-8" role="tabpanel" aria-labelledby="video8">
                        <div class="video-playground bg-img" style="background-image: url(img/bg-img/47.jpg);">
                            <!-- Play Button -->
                            <div class="play-btn">
                                <a href="https://www.youtube.com/watch?v=7HKoqNJtMTQ" class="play-button"><img src="img/core-img/play.png" alt=""></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ##### Video Area End ##### -->

<!-- ##### Articles Area Start ##### -->
<section class="latest-articles-area section-padding-100-0 bg-img bg-pattern bg-fixed" style="background-image: url(img/bg-img/5.jpg);">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-8">
                <div class="mb-100">
                    <!-- Title -->
                    <h2 class="section-title mb-70 wow fadeInUp" data-wow-delay="100ms">Latest Articles</h2>

                    <!-- *** Single Articles Area *** -->
                    <div class="single-articles-area style-2 d-flex flex-wrap mb-30 wow fadeInUp" data-wow-delay="300ms">
                        <div class="article-thumbnail">
                            <img src="img/bg-img/6.jpg" alt="">
                        </div>
                        <div class="article-content">
                            <a href="single-post.html" class="post-title">Sony’s new releases for 2018</a>
                            <div class="post-meta">
                                <a href="#" class="post-date">July 12, 2018</a>
                                <a href="#" class="post-comments">2 Comments</a>
                            </div>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris velit arcu, scelerisque dignissim massa quis, mattis facilisis erat. Aliquam erat volutpat. Sed efficitur diam.</p>
                        </div>
                    </div>

                    <!-- *** Single Articles Area *** -->
                    <div class="single-articles-area style-2 d-flex flex-wrap mb-30 wow fadeInUp" data-wow-delay="500ms">
                        <div class="article-thumbnail">
                            <img src="img/bg-img/7.jpg" alt="">
                        </div>
                        <div class="article-content">
                            <a href="single-post.html" class="post-title">10 Tips to be a better gamer</a>
                            <div class="post-meta">
                                <a href="#" class="post-date">July 12, 2018</a>
                                <a href="#" class="post-comments">2 Comments</a>
                            </div>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris velit arcu, scelerisque dignissim massa quis, mattis facilisis erat. Aliquam erat volutpat. Sed efficitur diam.</p>
                        </div>
                    </div>

                    <!-- *** Single Articles Area *** -->
                    <div class="single-articles-area style-2 d-flex flex-wrap mb-30 wow fadeInUp" data-wow-delay="700ms">
                        <div class="article-thumbnail">
                            <img src="img/bg-img/8.jpg" alt="">
                        </div>
                        <div class="article-content">
                            <a href="single-post.html" class="post-title">Microsoft has some new tips</a>
                            <div class="post-meta">
                                <a href="#" class="post-date">July 12, 2018</a>
                                <a href="#" class="post-comments">2 Comments</a>
                            </div>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris velit arcu, scelerisque dignissim massa quis, mattis facilisis erat. Aliquam erat volutpat. Sed efficitur diam.</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-6 col-lg-4">
                <!-- Title -->
                <h2 class="section-title mb-70 wow fadeInUp" data-wow-delay="100ms">This week’s deal</h2>

                <!-- Single Widget Area -->
                <div class="single-widget-area add-widget wow fadeInUp" data-wow-delay="300ms">
                    <a href="#"><img src="img/bg-img/add.png" alt=""></a>
                    <!-- Side Img -->
                    <img src="img/bg-img/side-img.png" class="side-img" alt="">
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ##### Articles Area End ##### -->
@endsection

