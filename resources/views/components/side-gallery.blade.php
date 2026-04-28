
@if(isset($gallery->images)) 
<div class="carousel_post_type3_wrap mb30">
    <h2 class="widget-title">Latest Pictures</h2>

    <div class="carousel_post_type3 nav_style1 owl-carousel">
        @foreach ($gallery->images as $image)
        <div class="single_post post_type3">
            <div class="post_img">
                <img src="{{ $image->image_url }}" width="100%" alt="">
            </div>

            <div class="single_post_text">
                <h4>{{ $image->subject }}</h4>
            </div>
        </div>
        @endforeach
    </div>
 
    <div class="text-center"><a href="/photo-albums" class="see_all mb20">More Pictures</a></div>
    <div class="border_black"></div>
</div>
@endif
