@extends('news.common.layouts')
@section('content')
    <div class="featured-post-area">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-6 col-lg-8">
                    <div class="row">
                        <!-- Single Featured Post -->
                        @if($all_details->count() > 0)
                            <div class="col-12 col-lg-12">
                                <div class="single-blog-post featured-post">
                                    <div class="post-thumb">
                                        @if(file_exists(public_path().DIRECTORY_SEPARATOR.'Images'.DIRECTORY_SEPARATOR.'News'.DIRECTORY_SEPARATOR.$all_details[0]->news_images))
                                            <a href="#"><img src="{{ asset('Images'.DIRECTORY_SEPARATOR.'News'.DIRECTORY_SEPARATOR.$all_details[0]->news_images) }}" alt=""></a>
                                        @endif
                                    </div>
                                    <div class="post-data">
                                        <a href="#" class="post-catagory">{{ $all_details[0]->titles }}</a>
                                        <a href="#" class="post-title">
                                            <h6>{{ $all_details[0]->title }}</h6>
                                        </a>
                                        <div class="post-meta">
                                            <p class="post-author">By <a href="#">Christinne Williams</a></p>
                                            <p class="post-excerp">{{ $all_details[0]->description }} </p>
                                            <!-- Post Like & Post Comment -->
                                        </div>
                                    </div>
                                </div>

                                <div class="comment_area clearfix">
                                    <h5 class="title">Comments</h5>

                                    <ol>
                                        <!-- Single Comment Area -->
                                        @if($comments->count() > 0)
                                            @foreach($comments as $key=>$cs)
                                                <li class="single_comment_area">
                                                    <!-- Comment Content -->
                                                    <div class="comment-content d-flex">
                                                        <!-- Comment Author -->
                                                        <div class="comment-author">
                                                            <img src="{{ asset('news/img/bg-img/30.jpg') }}" alt="author">
                                                        </div>
                                                        <!-- Comment Meta -->
                                                        <div class="comment-meta">
                                                            <a href="#" class="post-author">{{ $c_name !=='' ?$c_name->usernames :'' }}</a>
                                                            <a href="#" class="post-date">{{ $cs->created_at }}</a>
                                                            <p>{{ $cs->comments }}</p>
                                                        </div>
                                                    </div>
                                                </li>
                                            @endforeach
                                        @else
                                            <li> <p class="help-block error" style="color:red"> Sorry No Comment For This Post </p> </li>
                                    @endif
                                    <!-- Single Comment Area -->
                                        <div class="post-a-comment-area section-padding-80-0">
                                            <h4>Leave a comment</h4>

                                            <!-- Reply Form -->
                                            <div class="contact-form-area">
                                                {{ Form::open(['route'=>'comments.store']) }}
                                                <div class="row">
                                                    <div class="col-12 col-lg-6">
                                                        {{ Form::text('name',null,['class'=>'form-control','placeholder'=>'name','required']) }}
                                                    </div>
                                                    <div class="col-12">
                                                        {{ Form::text('subject',null,['class'=>'form-control','placeholder'=>'title','required']) }}

                                                    </div>
                                                    <div class="col-12">
                                                        {{ Form::textarea('comments',null,['class'=>'form-control','placeholder'=>'fullcomments','required']) }}
                                                    </div>
                                                    {{ Form::hidden('news_id',$featured_news[0]->id) }}
                                                    <div class="col-12 text-center">
                                                        <button class="btn newspaper-btn mt-30 w-100" type="submit">Submit Comment</button>
                                                    </div>
                                                </div>
                                                {{ Form::close() }}
                                            </div>
                                        </div>
                                    </ol>
                                </div>

                            </div>
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