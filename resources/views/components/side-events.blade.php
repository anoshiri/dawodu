<div class="carousel_post_type3_wrap mb30">
    <h2 class="widget-title">Trending Articles</h2>
    
    <div class="carousel_post_type3 nav_style1 owl-carousel">
        @foreach ($articles as $article)
        <div class="single_post post_type3">
            
            @if ($article->image_url)
            <div class="post_img">
                <img src="{{ $article->image_url }}" width="100%" alt="">
            </div>
            @endif

            <div class="single_post_text">
                <div class="meta3">	
                    <a href="{{ $articles->category->url ?? '' }}">{{ $article->category->title ?? '' }}</a>
                    {{ makeDate($article->publication_date) }}
                </div>
                <h4><a href="{{ $article->url }}">{{ $article->subject }}</a></h4>
                <em>{{ $article->by_source }}</em>

                <div class="space-10"></div>

                <p class="post-p">{{ $article->abstract }}</p>
            </div>
        </div>
        @endforeach
    </div>
</div>