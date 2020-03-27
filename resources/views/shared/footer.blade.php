<!-- ##### Footer Area Start ##### -->
<footer class="footer-area">
    <!-- Main Footer Area -->
    <div class="main-footer-area section-padding-100-0">
        <div class="container">
            <div class="row">
                <!-- Single Footer Widget -->
                <div class="col-12 col-sm-6 col-lg-3">
                    <div class="single-footer-widget mb-70 wow fadeInUp" data-wow-delay="100ms">
                        <div class="widget-title">
                            <a href="index.html"><img src="{{ asset('img/core-img/logo2.png') }}" alt=""></a>
                        </div>
                        <div class="widget-content">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris velit arcu, scelerisque dignissim massa quis, mattis facilisis erat. Aliquam erat volutpat. Sed efficitur diam ut interdum ultricies.</p>
                        </div>
                    </div>
                </div>

                <!-- Single Footer Widget -->
                @if (isset($latest))
                    <div class="col-12 col-sm-6 col-lg-3">
                        <div class="single-footer-widget mb-70 wow fadeInUp" data-wow-delay="300ms">
                            <div class="widget-title">
                                <h4>Game Reviews</h4>
                            </div>
                            <div class="widget-content">
                                <nav>
                                    <ul>
                                        @for ($i = 0; $i < 5; $i++)
                                            <li><a href="{{ route('games.show', ['id'=>$latest[$i]->Id]) }}">{{ $latest[$i]->Title }}</a></li>
                                        @endfor
                                        
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                @endif

                <!-- Single Footer Widget -->
                <div class="col-12 col-sm-6 col-lg-3">
                    <div class="single-footer-widget mb-70 wow fadeInUp" data-wow-delay="500ms">
                        <div class="widget-title">
                            <h4>Usefull Links</h4>
                        </div>
                        <div class="widget-content">
                            <nav>
                                <ul>
                                    <li><a href="{{ route('home') }}">Home</a></li>
                                    <li><a href="{{ route('games.index') }}">Games</a></li>
                                    <li><a href="{{ route('posts.index') }}">Articles</a></li>
                                    <li><a href="{{ route('contact.index') }}">Contact</a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- Copywrite Area -->
    <div class="copywrite-content">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12 col-sm-5">
                    <!-- Copywrite Text -->
                    <p class="copywrite-text"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    </p>
                </div>
                
            </div>
        </div>
    </div>
</footer>
<!-- ##### Footer Area End ##### -->

@include('partials.scripts')

</body>

</html>
