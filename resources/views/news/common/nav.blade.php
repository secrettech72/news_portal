<header class="header-area">
    <!-- Top Header Area -->
    <div class="top-header-area">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
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

                            {{-- <div class="search-form">
                                    <form action="#" method="post">
                                        <input type="search" name="search" class="form-control" placeholder="Search">
                                        <button type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
                                    </form>
                                </div> --}}

                            <div class="search-form">
                                <form action="{{ route('news.search_result') }}" method="post">
                                    <input type="search" name="search" placeholder="Search" class="form-control" id="search">
                                    {{ csrf_field() }}
                                    <button type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
                            <div class="search_list">
                    
                            </div>
                            </form>

                            </div>
                             <div class="col-sm-2 pull-right" >
                                <ul class="nav navbar-nav navbar-right">
                                    @if(auth()->check())
                                    @if(auth()->user()->notifications)
                                    {{ auth()->user()->unReadNotifications->count() }}
                                   

                                    <li class="dropdown">
                                        <a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true"><span class="caret"></span>
                                        </a>

                                         <ul class="dropdown-menu">
                                            
                                             @foreach(auth()->user()->notifications as $ns)
                                                @php
                                                 $news = DB::table('news')->where('id',$ns->data['letter']['id'])->first(); 
                                                @endphp
                                                @if($ns->read_at !="") 
                                                <li><a href="{{ route('news.full_news',$news->id) }}"><p class="help-block" style="color: green">{{ $ns->data['letter']['title'] }}</p></a></li>
                                                 @else
                                                <li><a href="{{ route('news.full_news',$news->id) }}"><p class="help-block" style="color: red">{{ $ns->data['letter']['title'] }}</p></a></li>
                                                 @endif
                                                 @endforeach
                                        </ul>
                                    </li>
                                   
                                    @endif
                                    @endif
                                </ul>
                            </div>
                        </div> 
                    </div>
                                
                </div>
            </div>
 
        </div>

    </div>

<div class="dropdown">
  <a id="dLabel" role="button" data-toggle="dropdown" data-target="#" href="/page.html">
    <i class="glyphicon glyphicon-bell"></i>
  </a>
  
  <ul class="dropdown-menu notifications" role="menu" aria-labelledby="dLabel">
    
    <div class="notification-heading"><h4 class="menu-title">Notifications</h4><h4 class="menu-title pull-right">View all<i class="glyphicon glyphicon-circle-arrow-right"></i></h4>
    </div>
    <li class="divider"></li>
   <div class="notifications-wrapper">
     <a class="content" href="#">
      
       <div class="notification-item">
        <h4 class="item-title">Evaluation Deadline 1 · day ago</h4>
        <p class="item-info">Marketing 101, Video Assignment</p>
      </div>
       
    </a>
     <a class="content" href="#">
      <div class="notification-item">
        <h4 class="item-title">Evaluation Deadline 1 · day ago</h4>
        <p class="item-info">Marketing 101, Video Assignment</p>
      </div>
    </a>
     <a class="content" href="#">
      <div class="notification-item">
        <h4 class="item-title">Evaluation Deadline 1 • day ago</h4>
        <p class="item-info">Marketing 101, Video Assignment</p>
      </div>
    </a>
     <a class="content" href="#">
      <div class="notification-item">
        <h4 class="item-title">Evaluation Deadline 1 • day ago</h4>
        <p class="item-info">Marketing 101, Video Assignment</p>
      </div>

    </a>
     <a class="content" href="#">
      <div class="notification-item">
        <h4 class="item-title">Evaluation Deadline 1 • day ago</h4>
        <p class="item-info">Marketing 101, Video Assignment</p>
      </div>
    </a>
     <a class="content" href="#">
      <div class="notification-item">
        <h4 class="item-title">Evaluation Deadline 1 • day ago</h4>
        <p class="item-info">Marketing 101, Video Assignment</p>
      </div>
    </a>

   </div>
    <li class="divider"></li>
    <div class="notification-footer"><h4 class="menu-title">View all<i class="glyphicon glyphicon-circle-arrow-right"></i></h4></div>
  </ul>
  
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
                                <li class=""><a href="{{ route('news') }}">Home</a></li>
                                @if($all_categories->count() >0)
                                    @foreach($all_categories as $key=>$cats)
                                        <li class="{{ \URL::current() == 'http://localhost/news_portal/public/news/category/'.$cats->slug 
                                            ? 'active' : null
                                        }}">
                                            <a href="{{ route('news.category',$cats->slug) }}">{{ $cats->title }}</a></li>
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
