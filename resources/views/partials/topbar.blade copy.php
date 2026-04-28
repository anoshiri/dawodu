<div class="topbar white_bg" id="top">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-sm-12 align-self-center">
                <div class="trancarousel_area">
                    <p class="trand">Latest News</p>
                    <div class="trancarousel owl-carousel nav_style1">
                        @for ($i=0; $i< $flash->get_item_quantity(); $i++)
                        <div class="trancarousel_item">
                            <p>
                                <a target="news" href="{{ $flash->get_items()[$i]->get_link() }}">
                                    <strong>{{ $flash->get_items()[$i]->get_title() }}</strong>
                                </a>
                            </p>
                        </div>
                        @endfor
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-12 align-self-center">
                <div class="top_date_social text-right">
                    <div class="paper_date">
                        <p id="pageDate"></p>
                    </div>
                    <div class="social1">
                        <ul class="inline">
                            @foreach(config('dawodu.social_media_platforms') as $social)
                                @if ($settings->{$social} )
                                <li><a href="{{ $settings->{$social} }}"><i class="fab fa-{{ $social }}"></i></a></li>
                                @endif
                            @endforeach

                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>