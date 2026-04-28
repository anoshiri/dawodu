<div class="post_gallary_area fifth_bg mb40">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-xl-8">
                        <div class="slider_demo2">
                            @foreach($articles as $article)
                            <div class="single_post post_type6 xs-mb30">
                                <div class="post_img gradient1">
                                    <img src="{{ $article->image_url }}" width="730" height="500" alt="">	
                                </div>

                                <div class="single_post_text">
                                    <div class="meta">
                                        @if (!empty($article->publication_date))
                                            {{ makeDate($article->publication_date) }}
                                        @endif
                                        <a href="{{ $article->category->url ?? '' }}">{{ $article->category->title ?? '' }}</a>
                                    </div>

                                    <h4><a href="{{ $article->url }}">{{ $article->subject }}</a></h4>
                                    <em class="text-warning">{{ $article->by_source }}</em>
                                    
                                    <div class="space-10"></div>
                                    <p class="post-p">{{ $article->abstract }}</p>
                                </div>
                            </div>
                            @endforeach
                        </div>

                        <div class="slider_demo1">
                            @foreach($articles as $article)
                            <div class="single_gallary_item">
                                <img class="mr-1" src="{{ $article->image_url }}" width="90" height="66" alt="">
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="col-xl-4">
                        <x-side-tabbed :article="$articles->first()"></x-side-tabbed>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</div>