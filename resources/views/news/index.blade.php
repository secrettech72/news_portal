@extends('news.common.layouts')
@section('content')
<div class="hero-area">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-12 col-lg-8">
                    <!-- Breaking News Widget -->
                    <div class="breaking-news-area d-flex align-items-center">
                        <div class="news-title">
                            <p>Breaking News</p>
                        </div>
                        <div id="breakingNewsTicker" class="ticker">
                            <ul>
                                @if($top_news)
                                @foreach($top_news as $key=>$bs)
                                <li><a href="">{{ $bs->title }}.</a></li>
                                @endforeach
                                @endif
                            </ul>
                        </div>
                    </div>

                    <!-- Breaking News Widget -->
                    <div class="breaking-news-area d-flex align-items-center mt-15">
                        <div class="news-title title2">
                            <p>International</p>
                        </div>
                        <div id="internationalTicker" class="ticker">
                            <ul>
                                @if($top_news_internations)
                                @foreach($top_news_internations as $key=>$tns)
                                <li><a href="#">{{ $tns->title }}.</a></li>
                                @endforeach 
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Hero Add -->
                 <div class="col-12 col-lg-4" class="pull-right">
                    <div class="hero-add" >
                        <a href="#"><img src="{{ asset('newspaper/img/bg-img/hero-add.gif') }}" alt=""></a>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <div class="featured-post-area">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-6 col-lg-8">
                    <div class="row">
                        @if(isset($top_news) && $top_news->count() >0)
                        <!-- Single Featured Post -->
                        <div class="col-12 col-lg-7">
                            <div class="single-blog-post featured-post">
                                <div class="post-thumb">
                                    @if(file_exists(public_path().DIRECTORY_SEPARATOR.'Images'.DIRECTORY_SEPARATOR.'News'.DIRECTORY_SEPARATOR.$top_news[0]->news_images))
                                    <a href="{{ route('news.full_news',$top_news[0]->id) }}"><img src="{{ asset('Images'.DIRECTORY_SEPARATOR.'News'.DIRECTORY_SEPARATOR.$featured_news[0]->news_images) }}"  style="width:411px;height:310px;" alt=""></a>
                                        @endif
                                </div>
                                <div class="post-data">
                                    <a href="{{ route('news.category',$top_news[0]->category->slug) }}" class="post-catagory">{{ $top_news[0]->titles }}</a>
                                    <a href="{{ route('news.full_news',$top_news[0]->id) }}" class="post-title">
                                        <h6>{{ $top_news[0]->title }}</h6>
                                    </a>
                                    <div class="post-meta">
                                        <p class="post-author">By <a href="#">Mr. Sanju Awal</a></p>
                                        <a href="{{ route('news.full_news',$top_news[0]->id) }}" class="post-title">
                                            <h4></h4>
                                        </a>
                                        <!-- Post Like & Post Comment -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif
                       
                        <div class="col-12 col-lg-5">
                            <!-- Single Other NewsPost -->
                            @if($featured_news)
                            @foreach ($featured_news as $key=>$fs)
                            @if($key==0)
                                @continue;                            
                            @endif
                            <div class="single-blog-post featured-post-2">
                                <div class="post-thumb">
                                    <a href="{{ route('news.full_news',$fs->id) }}"><img src="{{ asset('Images/News/'.$fs->news_images) }}" style="width:290px;height:190px;"alt=""></a>
                                </div>
                                <div class="post-data">
                                    <a href="{{ route('news.category',$fs->category->slug) }}" class="post-catagory">{{ $fs->titles }}</a>
                                    <div class="post-meta">
                                        <a href="{{ route('news.full_news',$fs->id) }}" class="post-title">
                                            <h6> {{ $fs->title  }}</h6>
                                        </a>
                                        <!-- Post Like & Post Comment -->

                                    </div>
                                </div>
                            </div>
                            @if($key == 2)
                            @break;
                            @endif
                            @endforeach
                            @endif
                            <!-- Single Featured Post -->
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-6 col-lg-4">
                    <!-- Single Featured Post -->

                    <!-- Single Featured Post -->
                    @if($all_categories)
                        @foreach($all_categories as $key=>$cats)
                            <div class="single-blog-post small-featured-post d-flex">
                                <div class="post-thumb">{{--asset('newspaper/img/bg-img/19.jpg')--}}
                                    <a href="#"><img src="{{ asset('Images'.DIRECTORY_SEPARATOR.'Category'.DIRECTORY_SEPARATOR.$cats->category_images) }}" alt=""></a>
                                </div>
                                <div class="post-data">
                                    <a href="{{ route('news.category',$cats->slug) }}" class="post-catagory">{{ $cats->title }}</a>
                                    <div class="post-meta">
                                        <a href="#" class="post-title">
                                            <h6>{{ $cats->description }}.</h6>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>

    <div class="popular-news-area section-padding-80-50">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-8">
                    <div class="section-heading">
                        <h6>Popular News</h6>
                    </div>

                    <div class="row">
                        <!-- Single Post -->
                        @if(isset($popular_news))
                        @foreach($popular_news as $key=>$ns)
                        <div class="col-12 col-md-6">
                            <div class="single-blog-post style-3">
                                <div class="post-thumb">
                                    <a href="{{ route('news.full_news',$ns->id) }}"><img src="{{ asset('Images/News/'.$ns->news_images) }}" alt=""></a>
                                </div>
                                <div class="post-data">
                                    <a href="{{ route('news.category',$ns->slug) }}" class="post-catagory">{{ $ns->category->title }}</a>
                                    <a href="#" class="post-title">
                                        <h6>{{ $ns->title }}...</h6>
                                    </a>
                                    <div class="post-meta d-flex align-items-center">
                                        <a href="{{ route('news.full_news',$ns->id) }}" class="post-like"><img src="img/core-img/like.png" alt=""> <span>@php
                                            $cs = \DB::table('comments')->where('news_id',$ns->id)->get()
                                        @endphp {{  $cs->count()  }}  </span></a>
                                        <a href="{{ route('news.full_news',$ns->id) }}" class="post-comment"><img src="img/core-img/chat.png" alt=""> <span>{{ $ns->likes }}</span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        @endif
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="section-heading">
                        <h6>Info</h6>
                    </div>
                    <!-- Popular News Widget -->
                    <div class="popular-news-widget mb-25">
                        <h3>4 Most Popular News</h3>
                        @if(isset($popular_news))
                        @foreach($popular_news as $key=>$ns)
                        @if($key == 4)
                        @break;
                        @endif
                        <!-- Single Popular Blog -->
                        <div class="single-popular-post">
                            <a href="{{ route('news.full_news',$ns->id) }}">
                                <h6><span>{{ $ns->title }}</span>.</h6>
                            </a>
                            @php
                               $ur = strtotime($ns->updated_at);
                               $cr = strtotime(date('Y-m-d H:i:s'));
                               $now = floor(($cr - $ur)/60/60/24); 
                            @endphp
                            <p>@if($now == 0) Today
                               @else 
                                    {{ $now.'     Day\'s ago' }}
                               @endif</p>
                        </div>
                        @endforeach
                        @endif
                    </div>                  
                    

                    <!-- Newsletter Widget -->
                    <div class="newsletter-widget">
                        <h4>Newsletter</h4>
                        <p>Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</p>
                        <form action="{{ route('news.subscriptions') }}" method="post">
                            {{ csrf_field()  }}
                            <input type="email" name="email" placeholder="Email">
                            <button type="submit" class="btn w-100">Subscribe</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection
