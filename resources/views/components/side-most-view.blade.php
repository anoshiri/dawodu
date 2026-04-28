<div class="widget tab_widgets mb30">
    <h2 class="widget-title">Most Viewed</h2>
    <div class="post_type2_carousel owl-carousel nav_style1">
        <!--CAROUSEL START-->
        <div class="single_post2_carousel">
            @php $count = 0 @endphp
            @foreach ($articles as $article)
            <div class="row single_post widgets_small type8">

                @if ($article->image_url)
                <div class="col-4 post_img">
                    <div class="img_wrap">
                        <img src="{{ $article->image_url }}" height="70" alt="">
                    </div>
                </div>
                @endif
                
                <div class="col single_post_text">
                    <div class="meta2">	
                        <a href="{{ $article->category->url ?? '' }}">{{ $article->category->title ?? '' }}</a>
                        <a href="#">{{ makeDate($article->publication_date) }}</a>
                    </div>

                    <h4><a href="{{ $article->url }}">{{ $article->subject }}</a></h4>
                    <em>{{ $article->by_source }}</em>
                </div>
                <div class="type8_count">
                    <h2>{{ ++$count }}</h2>
                </div>
            </div>
            <div class="space-15"></div>
            <div class="border_black"></div>
            <div class="space-15"></div>
            @endforeach
        </div>
    </div>
    <!--CAROUSEL END-->
</div>