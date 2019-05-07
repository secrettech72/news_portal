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
                                        <div class="d-flex align-items-center">
                                                <a href="javascript:void(0);" attr_title = "{{ $data->c_slug }}" attr_id="{{ $data->id }}" class="post-like likes"><img src="{{ asset('newspaper/img/core-img/like.png') }}" alt="">
                                                    <?php
                                                       $cs = DB::table('comments')->where('news_id',$data->id)
                                                    ?>
                                                    <span class="span_likes">{{ $data->likes }}</span></a>
                                                <a href="#" class="post-comment"><img src="{{ asset('newspaper/img/core-img/chat.png') }}" alt=""> <span>{{ $cs->count() }}</span></a>
                                            </div>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                        
                            @endforeach
                            @else
                            <h3 class="help-block error">Sorry No <span style="color: red">New </span>News Available For Now</h3>
                            @endif