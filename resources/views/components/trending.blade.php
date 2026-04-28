<div class="container">
    <div class="row">
        <div class="col-md-8">
            <h2 class="widget-title">More Articles</h2>
            <div class="carousel_post2_type3 nav_style1 owl-carousel">
                <!--CAROUSEL START-->
                @php 
                    $remaining = $articles->splice(2);
                @endphp

                @foreach($articles as $article)
                    <div class="single_post post_type3">

                        @if($article->image_url)
                        <div class="post_img">
                            <div class="img_wrap">
                                <img src="{{ $article->image_url }}" alt="">
                            </div>
                        </div>
                        @endif

                        <div class="single_post_text">
                            <div class="meta3">	<a href="{{ $article->category->url }}">{{ $article->category->title }}</a>
                                <a href="#">{{ makeDate($article->publication_date) }}</a>
                            </div>

                            <h4><a href="{{ $article->url }}">{{ $article->subject }}</a></h4>
                            <em>{{ $article->by_source }}</em>

                            <div class="space-10"></div>

                            <p class="post-p">{{ $article->abstract }}</p>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="border_black"></div>
            <div class="space-30"></div>

            <div class="row">
                <div class="col-lg-6">
                    @php 
                        $articles = $remaining;
                        $remaining = $articles->splice($articles->count() / 2 );;
                    @endphp

                    @foreach($articles as $article)
                        <div class="row single_post widgets_small">
                            @if($article->image_url)
                            <div class="col-4 post_img">
                                <div class="img_wrap">
                                    <img src="{{ $article->image_url }}" min-width="100" alt="">
                                </div>
                            </div>
                            @endif

                            <div class="col single_post_text">
                                <div class="meta2">	
                                    <a href="{{ $article->category->url }}">{{ $article->category->title }}</a>
                                    <a href="#">{{ makeDate($article->publication_date) }}</a>
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

                <div class="col-lg-6">
                    @php 
                        $articles = $remaining;
                    @endphp

                    @foreach($articles as $article)
                        <div class="row single_post widgets_small">
                            @if($article->image_url)
                            <div class="col-4 post_img">
                                <div class="img_wrap">
                                    <img src="{{ $article->image_url }}" alt="">
                                </div>
                            </div>
                            @endif

                            <div class="col single_post_text">
                                <div class="meta2">	<a href="{{ $article->category->url }}">{{ $article->category->title }}</a>
                                    <a href="#">{{ makeDate($article->publication_date) }}</a>
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
            </div>
        </div>


        <div class="col-md-4">
            <x-side-contributor></x-side-contributor>

            <x-side-gallery></x-side-gallery>

            <x-side-videos></x-side-videos>
        </div>
    </div>
</div>