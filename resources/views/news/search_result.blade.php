@extends('news.common.layouts')
@section('content')
	<div class="row">
                <div class="col-12 col-lg-8">
                    <div class="blog-posts-area">

                        <!-- Single Featured Post -->
                        @if(isset($data))
                        @foreach($data as $key=>$news)
                        <div class="single-blog-post featured-post mb-30">
                            <div class="post-data">
                                <a href="#" class="post-catagory">{{ $news->category->title }}</a>
                                <a href="#" class="post-title">
                                    <h6>{{ $news->title }}</h6>
                                </a>
                                <div class="post-meta">
                                    <p class="post-author">By <a href="#">Christinne Williams</a></p>
                                    <p class="post-excerp">{{ $news->description }} </p>
                                    <!-- Post Like & Post Comment -->
                                    <div class="d-flex align-items-center">
                                        <a href="#" class="post-like"><img src="{{ asset('newspaper/img/core-img/like.png') }}" alt=""> <span>{{ $news->likes }}</span></a>
                                        <a href="#" class="post-comment"><img src="{{ asset('newspaper/img/core-img/chat.png') }}" alt=""> <span>{{ $news->comments->count() }}</span></a>
                                    </div>
                                </div>
                            </div>
                        </div>   
                        @endforeach
                        @endif                 
                        </div>
                        <!-- Newsletter Widget -->
                        <div class="newsletter-widget mb-50">
                            <h4>Newsletter</h4>
                            <p>Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</p>
                            <form action="#" method="post">
                                <input type="text" name="text" placeholder="Name">
                                <input type="email" name="email" placeholder="Email">
                                <button type="submit" class="btn w-100">Subscribe</button>
                            </form>
                        </div>

                        <!-- Latest Comments Widget -->
                        <div class="latest-comments-widget">
                            <h3>Latest Comments</h3>

                            <!-- Single Comments -->
                            <div class="single-comments d-flex">
                                <div class="comments-thumbnail mr-15">
                                    <img src="img/bg-img/29.jpg" alt="">
                                </div>
                                <div class="comments-text">
                                    <a href="#">Jamie Smith <span>on</span> Facebook is offering facial recognition...</a>
                                    <p>06:34 am, April 14, 2018</p>
                                </div>
                            </div>

                            <!-- Single Comments -->
                            <div class="single-comments d-flex">
                                <div class="comments-thumbnail mr-15">
                                    <img src="img/bg-img/30.jpg" alt="">
                                </div>
                                <div class="comments-text">
                                    <a href="#">Jamie Smith <span>on</span> Facebook is offering facial recognition...</a>
                                    <p>06:34 am, April 14, 2018</p>
                                </div>
                            </div>

                            <!-- Single Comments -->
                            <div class="single-comments d-flex">
                                <div class="comments-thumbnail mr-15">
                                    <img src="img/bg-img/31.jpg" alt="">
                                </div>
                                <div class="comments-text">
                                    <a href="#">Jamie Smith <span>on</span> Facebook is offering facial recognition...</a>
                                    <p>06:34 am, April 14, 2018</p>
                                </div>
                            </div>

                            <!-- Single Comments -->
                            <div class="single-comments d-flex">
                                <div class="comments-thumbnail mr-15">
                                    <img src="img/bg-img/32.jpg" alt="">
                                </div>
                                <div class="comments-text">
                                    <a href="#">Jamie Smith <span>on</span> Facebook is offering facial recognition...</a>
                                    <p>06:34 am, April 14, 2018</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
@endsection