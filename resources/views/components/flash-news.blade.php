<div class="fifth_bg">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="carousel_posts1 owl-carousel nav_style2 mb40 mt30">
                    <!--CAROUSEL START-->
                    @foreach($articles as $article)
                    <div class="single_post flex widgets_small flash-news-padding post_type5">
                        @if ($article->image_url)
                        <div class="post_img pr-2">
                            <div class="img_wrap">
                                <a href="#">
                                    <img src="{{ $article->image_url }}" width="190" alt="">
                                </a>
                            </div>
                        </div>
                        @endif
                        <div class="single_post_text">
                            <h4><a href="{{ $article->url }}">{{ $article->subject }}</a></h4>
                            <p><em>{{ $article->by_source }}</em></p>
                        </div>
                    </div>
                    @endforeach
                </div>
                <!--CAROUSEL END-->
            </div>
        </div>
    </div>
</div>
