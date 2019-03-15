@extends('news.common.layouts')
@section('content')
    <div class="featured-post-area">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-6 col-lg-8">
                    <div class="row">
                        @if(isset($featured_news) && $featured_news->count() >0)
                        <!-- Single Featured Post -->
                        <div class="col-12 col-lg-7">
                            <div class="single-blog-post featured-post">
                                <div class="post-thumb">
                                    @if(file_exists(public_path().DIRECTORY_SEPARATOR.'Images'.DIRECTORY_SEPARATOR.'News'.DIRECTORY_SEPARATOR.$featured_news[0]->news_images))
                                    <a href="#"><img src="{{ asset('Images'.DIRECTORY_SEPARATOR.'News'.DIRECTORY_SEPARATOR.$featured_news[0]->news_images) }}" alt=""></a>
                                        @endif
                                </div>
                                <div class="post-data">
                                    <a href="#" class="post-catagory">{{ $featured_news[0]->titles }}</a>
                                    <a href="#" class="post-title">
                                        <h6>{{ $featured_news[0]->title }}</h6>
                                    </a>
                                    <div class="post-meta">
                                        <p class="post-author">By <a href="#">Christinne Williams</a></p>
                                        <a href="#" class="post-title">
                                            <h4>{{ $featured_news[0]->description }}</h4>
                                        </a>
                                        <!-- Post Like & Post Comment -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif

                        <div class="col-12 col-lg-5">
                            <!-- Single Other NewsPost -->
                            <div class="single-blog-post featured-post-2">
                                <div class="post-thumb">
                                    <a href="#"><img src="{{ asset('newspaper/img/bg-img/17.jpg') }}" alt=""></a>
                                </div>
                                <div class="post-data">
                                    <a href="#" class="post-catagory">Finance</a>
                                    <div class="post-meta">
                                        <a href="#" class="post-title">
                                            <h6>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam eu metus sit amet odio sodales placerat. Sed varius leo ac...</h6>
                                        </a>
                                        <!-- Post Like & Post Comment -->

                                    </div>
                                </div>
                            </div>

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
    @endsection