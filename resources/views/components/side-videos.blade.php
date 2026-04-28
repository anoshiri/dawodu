<div class="trending_widget mb30">
    <div class="row">
        <div class="col-sm-8">
            <h2 class="widget-title">Videos</h2>
        </div>
        <div class="col-sm-4">
            <a href="/videos" class="see_all mb20">More</a>
        </div>
    </div>
	

    @foreach ($videos as $video)
        <div class="single_post post_type3">
            <div class="post_img">
                <div class="img_wrap">
                    <iframe width="100%" src="{{ $video->url }}?controls=0" title="{{ $video->title }}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
            </div>
            <h4><a href="{{ $video->local_url }}" style="font-size: 15px">{{ $video->title }}</a></h4>
        </div>

        <div class="space-15"></div>
        <div class="border_black"></div>
        <div class="space-30"></div>
    @endforeach
</div>