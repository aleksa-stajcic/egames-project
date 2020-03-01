
<!-- ##### Header Area Start ##### -->
<header class="header-area wow fadeInDown" data-wow-delay="500ms">
    <!-- Top Header Area -->
    <div class="top-header-area">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12 d-flex align-items-center justify-content-between">
                    <!-- Logo Area -->
                    <div class="logo">
                        <a href="{{route('home')}}"><img src="{{asset('img/core-img/logo.png')}}" alt=""></a>
                    </div>

                    <!-- Search & Login Area -->
                    <div class="search-login-area d-flex align-items-center">
                        <!-- Top Search Area -->
                        <div class="top-search-area">
                            <form action="#" method="post">
                                <input type="search" name="top-search" id="topSearch" placeholder="Search">
                                <button type="submit" class="btn"><i class="fa fa-search"></i></button>
                            </form>
                        </div>
                        <!-- Login Area -->
                        <div class="login-area">
                            <a href="{{ route('login.index') }}"><span>Login / Register</span> <i class="fa fa-lock" aria-hidden="true"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
