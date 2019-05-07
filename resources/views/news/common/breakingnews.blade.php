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
                            @if(isset($top_news))
                            @foreach($top_news as $key=>$bs)
                            <li><a href="{{ route('news.full_news',$bs->id) }}">{{ $bs->title }}.</a></li>
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
                            @if(isset($top_news_internations))
                            @foreach($top_news_internations as $key=>$tns)
                            <li><a href="#">{{ $tns->title }}.</a></li>
                            @endforeach 
                            @endif
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Hero Add -->
            <div class="col-12 col-lg-4">
                <div class="hero-add">
                    <a href="#"><img src="{{ asset('newspaper/img/bg-img/hero-add.gif') }}" alt=""></a>
                </div>
            </div>
        </div>
    </div>
</div>
