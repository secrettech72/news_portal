<div class="hero-area">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-12 col-lg-8">
                <!-- Breaking News Widget -->
                <div class="breaking-news-area d-flex align-items-center">
                    <div class="news-title">
                        <p>{{ $all_categories[0]->title }}</p>
                    </div>
                    <div id="breakingNewsTicker" class="ticker">
                        <ul>
                            <li><a href="">Latest News Now: {{ $featured_news[0]->title }}.</a></li>
                        </ul>
                    </div>
                </div>

                <!-- Breaking News Widget -->
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