<header class="header-area">

    <!-- Top Header Area -->
    <div class="top-header-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="top-header-content d-flex align-items-center justify-content-between">
                        <!-- Logo -->
                        <div class="logo">
                            <a href="index.html"><img src="{{ asset('newspaper/img/core-img/logo.png') }}" alt=""></a>
                        </div>

                        <!-- Login Search Area -->
                        <div class="login-search-area d-flex align-items-center">
                            <!-- Login -->
                            <div class="login d-flex">
                                <a href="{{ route('admin.login') }}">Login</a>
                                <a href="{{ route('news.register') }}">Register</a>
                            </div>
                            <!-- Search Form -->
                            <div class="search-form">
                                <form action="#" method="post">
                                    <input type="search" name="search" class="form-control" placeholder="Search">
                                    <button type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Navbar Area -->
    <div class="newspaper-main-menu" id="stickyMenu">
        <div class="classy-nav-container breakpoint-off">
            <div class="container">
                <!-- Menu -->
                <nav class="classy-navbar justify-content-between" id="newspaperNav">

                    <!-- Logo -->
                    <div class="logo">
                        <a href="index.html"><img src="{{ asset('newspapers/img/core-img/logo.png') }}" alt=""></a>
                    </div>

                    <!-- Navbar Toggler -->
                    <div class="classy-navbar-toggler">
                        <span class="navbarToggler"><span></span><span></span><span></span></span>
                    </div>

                    <!-- Menu -->
                    <div class="classy-menu">

                        <!-- close btn -->
                        <div class="classycloseIcon">
                            <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                        </div>

                        <!-- Nav Start -->
                        <div class="classynav">
                            <ul>
                                <li class="active"><a href="index.html">Home</a></li>
                                @if($all_categories->count() >0)
                                    @foreach($all_categories as $key=>$cats)
                                        <li class="active"><a href="{{ route('news.category',$cats->slug) }}">{{ $cats->title }}</a></li>
                                    @endforeach
                                @endif
                            </ul>

                                    </div>
                        </div>
                        <!-- Nav End -->
                </nav>
                    </div>
                </nav>
            </div>
        </div>
    </div>
</header>