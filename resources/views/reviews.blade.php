@extends('layouts.front')
@section('title')
    Game reviews
@endsection
@section('content')

@section('breadcrumb')
    Reviews
@endsection

@component('partials.breadcrumb', ['breadcrumb' => 'Reviews'])
    
@endcomponent

<!-- ##### Game Review Area Start ##### -->
<section class="game-review-area section-padding-100">
    <div class="container">
        <div class="row">
            <div class="col-12">

                <!-- *** Single Review Area *** -->
                <div class="single-game-review-area d-flex flex-wrap mb-30">
                    <div class="game-thumbnail">
                        <img src="img/bg-img/28.jpg" alt="">
                    </div>
                    <div class="game-content">
                        <span class="game-tag">Adventure</span>
                        <a href="single-game-review.html" class="game-title">NFS 2018</a>
                        <div class="game-meta">
                            <a href="#" class="game-date">July 12, 2018</a>
                            <a href="#" class="game-comments">2 Comments</a>
                        </div>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris velit arcu, scelerisque dignissim massa quis, mattis facilisis erat. Aliquam erat volutpat. Sed efficitur diam. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris velit arcu, scelerisque dignissim massa quis, mattis facilisis erat. Aliquam erat volutpat. Sed efficitur diam.</p>
                        <!-- Download & Rating Area -->
                        <div class="download-rating-area d-flex align-items-center justify-content-between">
                            <div class="download-area">
                                <a href="#"><img src="img/core-img/app-store.png" alt=""></a>
                                <a href="#"><img src="img/core-img/google-play.png" alt=""></a>
                            </div>
                            <div class="rating-area text-center">
                                <h3>9.1</h3>
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

                <!-- *** Single Review Area *** -->
                <div class="single-game-review-area d-flex flex-wrap mb-30">
                    <div class="game-thumbnail">
                        <img src="img/bg-img/29.jpg" alt="">
                    </div>
                    <div class="game-content">
                        <span class="game-tag">Adventure</span>
                        <a href="single-game-review.html" class="game-title">Call of Duty</a>
                        <div class="game-meta">
                            <a href="#" class="game-date">July 12, 2018</a>
                            <a href="#" class="game-comments">2 Comments</a>
                        </div>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris velit arcu, scelerisque dignissim massa quis, mattis facilisis erat. Aliquam erat volutpat. Sed efficitur diam. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris velit arcu, scelerisque dignissim massa quis, mattis facilisis erat. Aliquam erat volutpat. Sed efficitur diam.</p>
                        <!-- Download & Rating Area -->
                        <div class="download-rating-area d-flex align-items-center justify-content-between">
                            <div class="download-area">
                                <a href="#"><img src="img/core-img/app-store.png" alt=""></a>
                                <a href="#"><img src="img/core-img/google-play.png" alt=""></a>
                            </div>
                            <div class="rating-area text-center">
                                <h3>8.1</h3>
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

                <!-- *** Single Review Area *** -->
                <div class="single-game-review-area d-flex flex-wrap mb-30">
                    <div class="game-thumbnail">
                        <img src="img/bg-img/30.jpg" alt="">
                    </div>
                    <div class="game-content">
                        <span class="game-tag">Adventure</span>
                        <a href="single-game-review.html" class="game-title">Star Wars</a>
                        <div class="game-meta">
                            <a href="#" class="game-date">July 12, 2018</a>
                            <a href="#" class="game-comments">2 Comments</a>
                        </div>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris velit arcu, scelerisque dignissim massa quis, mattis facilisis erat. Aliquam erat volutpat. Sed efficitur diam. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris velit arcu, scelerisque dignissim massa quis, mattis facilisis erat. Aliquam erat volutpat. Sed efficitur diam.</p>
                        <!-- Download & Rating Area -->
                        <div class="download-rating-area d-flex align-items-center justify-content-between">
                            <div class="download-area">
                                <a href="#"><img src="img/core-img/app-store.png" alt=""></a>
                                <a href="#"><img src="img/core-img/google-play.png" alt=""></a>
                            </div>
                            <div class="rating-area text-center">
                                <h3>9.3</h3>
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

                <!-- *** Single Review Area *** -->
                <div class="single-game-review-area d-flex flex-wrap mb-30">
                    <div class="game-thumbnail">
                        <img src="img/bg-img/31.jpg" alt="">
                    </div>
                    <div class="game-content">
                        <span class="game-tag">Adventure</span>
                        <a href="single-game-review.html" class="game-title">DOOM 2018</a>
                        <div class="game-meta">
                            <a href="#" class="game-date">July 12, 2018</a>
                            <a href="#" class="game-comments">2 Comments</a>
                        </div>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris velit arcu, scelerisque dignissim massa quis, mattis facilisis erat. Aliquam erat volutpat. Sed efficitur diam. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris velit arcu, scelerisque dignissim massa quis, mattis facilisis erat. Aliquam erat volutpat. Sed efficitur diam.</p>
                        <!-- Download & Rating Area -->
                        <div class="download-rating-area d-flex align-items-center justify-content-between">
                            <div class="download-area">
                                <a href="#"><img src="img/core-img/app-store.png" alt=""></a>
                                <a href="#"><img src="img/core-img/google-play.png" alt=""></a>
                            </div>
                            <div class="rating-area text-center">
                                <h3>9.1</h3>
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

                <!-- *** Single Review Area *** -->
                <div class="single-game-review-area d-flex flex-wrap mb-30">
                    <div class="game-thumbnail">
                        <img src="img/bg-img/34.jpg" alt="">
                    </div>
                    <div class="game-content">
                        <span class="game-tag">Adventure</span>
                        <a href="single-game-review.html" class="game-title">Destiny 2</a>
                        <div class="game-meta">
                            <a href="#" class="game-date">July 12, 2018</a>
                            <a href="#" class="game-comments">2 Comments</a>
                        </div>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris velit arcu, scelerisque dignissim massa quis, mattis facilisis erat. Aliquam erat volutpat. Sed efficitur diam. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris velit arcu, scelerisque dignissim massa quis, mattis facilisis erat. Aliquam erat volutpat. Sed efficitur diam.</p>
                        <!-- Download & Rating Area -->
                        <div class="download-rating-area d-flex align-items-center justify-content-between">
                            <div class="download-area">
                                <a href="#"><img src="img/core-img/app-store.png" alt=""></a>
                                <a href="#"><img src="img/core-img/google-play.png" alt=""></a>
                            </div>
                            <div class="rating-area text-center">
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

                <!-- ### Pagination Area ### -->
                <nav aria-label="Page navigation example">
                    <ul class="pagination mt-100">
                        <li class="page-item active"><a class="page-link" href="#">01</a></li>
                        <li class="page-item"><a class="page-link" href="#">02</a></li>
                        <li class="page-item"><a class="page-link" href="#">03</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</section>
<!-- ##### Game Review Area End ##### -->

@endsection


