<div class="carousel_post_type3_wrap mb30">
    @foreach ($adverts as $advert)
        <a href="{{ $advert->url }}" target="advert">
            <img  src="{{ $advert->image_url }}" alt="{{ $advert->title }}" title="{{ $advert->title }}">
        </a>
    @endforeach
</div>