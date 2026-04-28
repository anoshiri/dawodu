<div class="feature_carousel_area mb40">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="heading">
                    <h2 class="widget-title">Featured Articles</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="feature_carousel owl-carousel nav_style1">
                    <!--CAROUSEL START-->

                    @foreach ($articles as $article) 
                    <div class="single_post post_type6 post_type7">
                        @if ($article->image_url)
                        <div class="post_img gradient1">
                            <a href="{{ $article->url }}">
                                <img src="{{ $article->image_url }}" width="510" alt="">
                            </a>
                        </div>
                        @endif
                        <div class="single_post_text">
                            <div class="meta5">	
                                <a href="{{ $article->category->url ?? ' }}">{{ $article->category->title ?? '' }}</a>
                                <a href="{{ $article->url }}">{{ date('M d, Y', strtotime($article->publication_date)) }}</a>
                            </div>
                            <h4>
                                <a href="{{ $article->url }}">{{ $article->subject }}</a>
                            </h4>
                            <em>{{ $article->by_source }}</em>
                        </div>
                    </div>
                    @endforeach
                </div>
                <!--CAROUSEL END-->
            </div>
        </div>
    </div>
</div>