@extends('news.common.layouts')
@section('content')
    <div class="featured-post-area">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-6 col-lg-8">
                    <div class="row" id="reviews_wrappers">
                        <!-- Single Featured Post -->
                       @include('news.common.reviews')
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
@section('js')
    <script>
        $(window).ready(function(){
           $(document).on('click','.likes',function(){
            var id = $(this).attr('attr_id');
            var titles = $(this).attr('attr_title');
            $.ajax({
                method:'POST',
                url:'{{ route('news.likes') }}',
                data:{
                    _token:'{{ csrf_token() }}',
                    id:id,
                    titles:titles,
                },
                success:function(response){
                    var data = $.parseJSON(response);
                    if(data.error){
                        alert('something is wrong');
                    }else{
                        $('#reviews_wrappers').html(data.html);
                    }
                }
            });
           });
        });
    </script>
@endsection
