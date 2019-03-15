@extends('news.common.layouts')
@section('content')
    <div class="featured-post-area">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-6 col-lg-8">
                    <div class="row">
                        <!-- Single Featured Post -->
                        @if($all_details->count() > 0)
                            @foreach($all_details as $key=>$data)
                        <div class="col-12 col-lg-12">
                            <div class="single-blog-post featured-post">
                                <div class="post-thumb">
                                    @if(file_exists(public_path().DIRECTORY_SEPARATOR.'Images'.DIRECTORY_SEPARATOR.'News'.DIRECTORY_SEPARATOR.$data->news_images))
                                    <a href="#"><img src="{{ asset('Images'.DIRECTORY_SEPARATOR.'News'.DIRECTORY_SEPARATOR.$data->news_images) }}" alt=""></a>
                                        @endif
                                </div>
                                <div class="post-data">
                                    <a href="{{ route('news.full_news',$data->id) }}" class="post-catagory">
                                        {{ $data->titles }}
                                        <h6>{{ $data->title }}  <span style="color: red">Click To Read See More Detail</span></h6>
                                    </a>
                                    <div class="post-meta">
                                        <p class="post-author">By <a href="#">Christinne Williams</a></p>
                                        <!-- Post Like & Post Comment -->
                                    </div>
                                </div>
                            </div>
                        </div>
                            @endforeach
                            @else
                            <h3 class="help-block error">Sorry No <span style="color: red">New </span>News Available For Now</h3>
                            @endif
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-4">
                    <!-- Single Featured Post -->
                    @if(isset($all_categories))
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