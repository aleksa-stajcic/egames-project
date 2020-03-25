<!-- Navbar Area -->
<div class="egames-main-menu" id="sticker">
    <div class="classy-nav-container breakpoint-off">
        <div class="container">
            <!-- Menu -->
            <nav class="classy-navbar justify-content-between" id="egamesNav">

                <!-- Navbar Toggler -->
                <div class="classy-navbar-toggler">
                    <span class="navbarToggler"><span></span><span></span><span></span></span>
                </div>

                <!-- Menu -->
                <div class="classy-menu">

                    <!-- Close Button -->
                    <div class="classycloseIcon">
                        <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                    </div>

                    <!-- Nav Start -->
                    <div class="classynav">
                        <ul>
                            <li><a href="{{route('home')}}">Home</a></li>
                            <li><a href="{{route('games.create')}}">Add Game</a></li>
                            <li><a href="#">Pages</a>
                                <ul class="dropdown">
                                    {{-- <li><a href="{{route('reviews')}}">Game Reviews</a></li> --}}
                                    <li><a href="{{route('single')}}">Single Game Review</a></li>
                                    <li><a href="{{ route('posts.index') }}">Articles</a></li>
                                </ul>
                            </li>
                            <li><a href="{{ route('contact.index') }}">Contact</a></li>
                            @if (session('user'))
                                <li><a href="{{ route('profile', ['username' => session('user')->Username]) }}">Profile</a></li>
                                @if(session('user')->Id == 1)
                                    <li><a href="{{ route('users.index') }}">Admin</a></li>
                                @endif
                            @endif
                        </ul>
                    </div>
                    <!-- Nav End -->
                </div>

                <!-- Top Social Info -->
                <div class="top-social-info">
                    <a href="#" data-toggle="tooltip" data-placement="top" title="Pinterest"><i class="fa fa-pinterest" aria-hidden="true"></i></a>
                    <a href="#" data-toggle="tooltip" data-placement="top" title="Facebook"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                    <a href="#" data-toggle="tooltip" data-placement="top" title="Twitter"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                    <a href="#" data-toggle="tooltip" data-placement="top" title="Dribbble"><i class="fa fa-dribbble" aria-hidden="true"></i></a>
                    <a href="#" data-toggle="tooltip" data-placement="top" title="Behance"><i class="fa fa-behance" aria-hidden="true"></i></a>
                    <a href="#" data-toggle="tooltip" data-placement="top" title="Linkedin"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
                </div>
            </nav>
        </div>
    </div>
</div>
</header>
<!-- ##### Header Area End ##### -->
