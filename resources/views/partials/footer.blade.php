<div class="footer footer_area1 primay_bg">
    <div class="container">
        <div class="cta">
            <div class="row">
                <div class="col-md-6 align-self-center">
                    <div class="footer_logo logo">
                        <a href="index.html">
                            <img src="/assets/img/logo/logo-reverse.png" alt="Dawodu Logo">
                        </a>
                    </div>
                    <div class="social2">
                        <ul class="inline">
                            @foreach(config('dawodu.social_media_platforms') as $social)
                                @if ($settings->{$social} )
                                <li><a href="{{ $settings->{$social} }}"><i class="fab fa-{{ $social }}"></i></a></li>
                                @endif
                            @endforeach
                        </ul>
                    </div>
                </div>
                
                <div class="col-md-6 col-lg-4 offset-lg-2 align-self-center">
                    <div class="signup_form">
                        <h3 class="widget-title2">Subscribe to our Newsletter</h3>
                        <livewire:newsletter-form />
                    </div>
                </div>
            </div>
        </div>

        <div class="border_white"></div>
        <div class="space-40"></div>
        
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="row">
                    <div class="col-sm-8 col-lg">
                        <div class="single_footer_nav border_white_right">
                            <h3 class="widget-title2">Quick Links</h3>
                            <div class="row">
                                <div class="col-lg-6">
                                    <ul>
                                        @foreach ($categories as $category)
                                            <li><a href="{{ $category->url }}">{{ $category->title }}</a></li>
                                        @endforeach

                                        <li><a href="/politicians-sites">Politicians Sites</a></li>
                                        <li><a href="/state-governors">State Governors</a></li>
                                    </ul>
                                </div>

                                <div class="col-lg-6">
                                    <ul>
                                        <li><a href="/general-links">Groups &amp; Organizations</a></li>
                                        <li><a href="/nigerias-constitution">Nigeria Constitution</a></li>
                                        <li><a href="/events">Events</a></li>
                                        <li><a href="/photos-albums">Pictures</a></li>
                                        <li><a href="/partners">Partners</a></li>
                                        <li><a href="/advertise">Advertise on Dawodu</a></li>
                                    </ul>
                                </div>
                            </div>

                            <div class="space-30"></div>

                            
                        </div>
                    </div>
                    <div class="col-sm-4 col-lg">
                        <div class="row">
                            <div class="col-12">
                                <h3 class="widget-title2">Visit Our Other Sites</h3>
                            </div>
                            <div class="col-md-6 col-sm-12 align-self-center">
                                <a href="https://edo-nation.net">
                                    <img width="145" src="/assets/img/logo/edonation.png" alt="Edo-nation.com">
                                </a>
                            </div>
                            <div class="col-md-6 col-sm-12 align-self-center">
                                <a href="https://dawodu.net">
                                    <img width="145" src="/assets/img/logo/dawodunet.png" alt="Dawodu.net">
                                </a>
                            </div>
                        </div>


                        <!-- <div class="twitter_feeds">
                            <h3 class="widget-title2">Twitter feed</h3>
                            
                            <div class="single_twitter_feed border_white_bottom">
                                <div class="twitter_feed_icon">	<i class="fab fa-twitter"></i>
                                </div>
                                <h6>Cyber Monday Sale, Save 33% on Jannah theme during our year-end Sale, Purchase a new license for your next project… <span>@newspark #TECHNOLOGY https://dribbble.com/subash_chandra</span></h6>
                                <p>March 26, 2020</p>
                            </div>

                            <div class="single_twitter_feed">
                                <div class="twitter_feed_icon">	<i class="fab fa-twitter"></i>
                                </div>
                                <h6>Cyber Monday Sale, Save 33% on Jannah theme during our year-end Sale, Purchase a new license for your next project… <span>@newspark #TECHNOLOGY https://dribbble.com/subash_chandra</span></h6>
                                <p>March 26, 2020</p>
                            </div>

                            <div class="single_twitter_feed">
                                <div class="twitter_feed_icon">	<i class="fab fa-twitter"></i>
                                </div>
                                <h6>Cyber Monday Sale, Save 33% on Jannah theme during our year-end Sale, Purchase a new license for your next project… <span>@newspark #TECHNOLOGY https://dribbble.com/subash_chandra</span></h6>
                                <p>March 26, 2020</p>
                            </div>
                        </div> -->
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="extra_newss border_white_left pl-4">
                    <h3 class="widget-title2">More articles</h3>
                    
                    @php $count = 0 @endphp

                    @foreach($articles as $article)
                    <div class="single_extra_news border_white_bottom">
                        <p>
                            {{ $article->category->title }} <span> / 
                            {{ makeDate($article->publication_date) }}</span>
                        </p>

                        <a href="{{ $article->url }} ">{{ $article->subject }} </a><br />
                        <em>{{ $article->by_source }}</em>

                        <span class="news_counter">{{ ++$count }}</span>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <div class="copyright">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 align-self-center">
                    <p>&copy; {{ date('Y') }} Segun Toyin Dawodu | All rights reserved</p>
                </div>
                <div class="col-lg-6 align-self-center">
                    <div class="copyright_menus text-right">
                        <div class="language"></div>
                        <div class="copyright_menu inline">
                            <ul>
                                <li><a href="/about-dawodu">About</a></li>
                                <li><a href="/advertise">Advertise</a></li>
                                <li><a href="/privacy-policy">Privacy Policy</a></li>
                                <li><a href="/sitemap">Sitemap</a></li>
                                <li><a href="/contact">Contact Us</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>