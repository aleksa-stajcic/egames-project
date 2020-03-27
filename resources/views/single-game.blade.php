@extends('layouts.front')

@section('title')
    {{ $game->Title . ' Reviews' }}
@endsection

@section('content')


@component('partials.breadcrumb', ['breadcrumb' => 'Review: ' . $game->Title, 'banner' => $game->BannerPath])
    
@endcomponent

<!-- ##### Single Game Review Area Start ##### -->
<section class="single-game-review-area section-padding-100">
    <div class="container">

        <div class=" align-items-center">
            <!-- *** Review Area *** -->
            <div class="col-xl-12">
                <div class="single-game-review-area style-2 mt-70">
                    <div class="game-content">
                        {{-- <span class="game-tag">Adventure</span> --}}
                        <a href="single-game-review.html" class="game-title">{{ $game->Title }}</a>
                        <div class="game-meta">
                            <a href="#" class="game-date">{{ $game->Year }}</a>
                            <a href="#" class="game-comments" id="review-count"></a>
                        </div>
                        <p> {{ $game->Description }} <p>
                        <!-- Download & Rating Area -->
                        <div class="download-rating-area">
                            {{-- <div class="download-area">
                                <a href="#"><img src="{{ asset('img/core-img/app-store.png') }}" alt=""></a>
                                <a href="#"><img src="{{ asset('img/core-img/google-play.png') }}" alt=""></a>
                            </div> --}}
                            <div class="rating-area mt-30">
                                <h3>{{ $game->Grade }}<i class="fa fa-star" aria-hidden="true"></i></h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="comment_area clearfix mb-70">
                <h4 class="mb-50">Reviews</h4>

                <ol id="reviews-ol">
                    
                </ol>
            </div>

            @if (session('user') && session('user')->IsDeleted != 1 && session('user')->IsActive == 1)
                <div class="post-a-comment-area mb-30 clearfix align-items-center">
                    <div class="col-md-6 ">
                        <div id="review-form">
                            <h5 class="mb-50">Leave a review</h5>
                            <form class="review-form contact-form-area">
                                <textarea class="form-control input" cols="1000"  placeholder="Your Review" id="review-text"></textarea>
                                <div class="input-rating form-control">
                                    <span>Your Rating: </span>
                                    <div class="stars" id="grade">
                                        <input id="star10" name="rating" value="10" type="radio"><label for="star10"></label>
                                        <input id="star9" name="rating" value="9" type="radio"><label for="star9"></label>
                                        <input id="star8" name="rating" value="8" type="radio"><label for="star8"></label>
                                        <input id="star7" name="rating" value="7" type="radio"><label for="star7"></label>
                                        <input id="star6" name="rating" value="6" type="radio"><label for="star6"></label>
                                        <input id="star5" name="rating" value="5" type="radio"><label for="star5"></label>
                                        <input id="star4" name="rating" value="4" type="radio"><label for="star4"></label>
                                        <input id="star3" name="rating" value="3" type="radio"><label for="star3"></label>
                                        <input id="star2" name="rating" value="2" type="radio"><label for="star2"></label>
                                        <input id="star1" name="rating" value="1" type="radio"><label for="star1"></label>
                                    </div>
                                </div>
                                <button id="btnSubmitReview" class="btn egames-btn w-100" data-game="{{ $game->Id }}">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
                
            @endif
            <!-- *** Barfiller Area *** -->
            {{-- <div class="col-12 col-md-6">
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
            </div> --}}
        </div>
    </div>
</section>
<!-- ##### Single Game Review Area End ##### -->
@endsection


@section('scripts')
    <script src="{{ asset('js/_reviews.js') }}"></script>
@endsection
