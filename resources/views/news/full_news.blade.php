@extends('news.common.layouts')
@section('content')
@include('news.common.breakingnews')
    <?php
        DB::table('news')->where('id',$full_news[0]->id)->update(['is_clicked'=>$full_news[0]->is_clicked+1]);
        ?>
        <div class="featured-post-area">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-6 col-lg-8">
                    <div class="row">
                        <!-- Single Featured Post -->
                        @if($full_news->count() > 0)
                            <div class="col-12 col-lg-12">
                                <div class="single-blog-post featured-post">
                                    <div class="post-thumb">
                                        @if(file_exists(public_path().DIRECTORY_SEPARATOR.'Images'.DIRECTORY_SEPARATOR.'News'.DIRECTORY_SEPARATOR.$full_news[0]->news_images))
                                            <a href="{{ asset('Images'.DIRECTORY_SEPARATOR.'News'.DIRECTORY_SEPARATOR.$full_news[0]->news_images) }}"><img src="{{ asset('Images'.DIRECTORY_SEPARATOR.'News'.DIRECTORY_SEPARATOR.$full_news[0]->news_images) }}" alt="{{ $full_news[0]->title }}"
                                                title="{{ $full_news[0]->title }}"></a>
                                        @endif
                                    </div>
                                    <div class="post-data">
                                        <a href="#" class="post-catagory">{{ $full_news[0]->titles }}</a>
                                        <a href="{{ route('news.full_news',$full_news[0]->id) }}" class="post-title">
                                            <h6>{{ $full_news[0]->title }}</h6>
                                        </a>
                                        <div class="post-meta">
                                            <p class="post-author">By <a href="#">Christinne Williams</a></p>
                                            <p class="post-excerp">{{ $full_news[0]->description }} </p>
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
                                                            <img src="{{ asset('newspaper/img/bg-img/29.jpg') }}" alt="author">
                                                        </div>
                                                        <!-- Comment Meta -->
                                                        <div class="comment-meta">
                                                            <a href="#" class="post-author">
                                                            <?php
                                                            $users_name = DB::table('users')->where('id',$cs->users_id)->first();  
                                                                ?>
                                                                {{ $users_name->usernames }}
                                                            </a>
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
                                                    {{ Form::hidden('news_id',$full_news[0]->id) }}
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
                                    <a href="{{ route('news.category',$cats->slug) }}"><img src="{{ asset('Images'.DIRECTORY_SEPARATOR.'Category'.DIRECTORY_SEPARATOR.$cats->category_images) }}" alt=""></a>
                                </div>
                                <div class="post-data">
                                    <a href="{{ route('news.category',$cats->slug) }}" class="post-catagory">{{ $cats->title }}</a>
                                    <div class="post-meta">
                                        <a href="{{ route('news.category',$cats->slug) }}" class="post-title">
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
@section('js')
    <script>
        $(document).ready(function () {
            $('#single_comment_area').on('click','.rs',function(){
                var id = $('#rs').attr('c_id');
                console.log(id);
            });
        });

    </script>
    @endsection
