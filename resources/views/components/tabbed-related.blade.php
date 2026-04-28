<div class="widget tab_widgets mb30">
    @foreach ($articles as $article)

        <div class="row single_post widgets_small">
            
            @if ($article->image_url)
            <div class="col-4 post_img">
                <div class="img_wrap">
                    <a href="{{ $article->url }}">
                        <img src="{{ $article->image_url }}" alt="">
                    </a>
                </div>
            </div>
            @endif
            
            <div class="col single_post_text">
                <div class="meta2 meta_separator1">
                    <a href="{{ $article->category->url }}">{{ $article->category->title }}</a>
                    <a href="{{ $article->url }}">{{ makeDate($article->publication_date) }}</a>
                </div>

                <h4><a href="{{ $article->url }}">{{ $article->subject }}</a></h4>
                <em>{{ $article->by_source }}</em>
            </div>
        </div>

        <div class="space-15"></div>
        <div class="border_black"></div>
        <div class="space-15"></div>
    @endforeach

</div>