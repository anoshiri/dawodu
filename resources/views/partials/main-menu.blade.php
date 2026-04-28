<div class="main-menu" id="header">
    <a href="#top" class="up_btn up_btn1"><i class="far fa-chevron-double-up"></i></a>
    <div class="main-nav clearfix is-ts-sticky">
        <div class="container">
            <div class="row justify-content-between">

                <div class="col-6 col-lg-8">
                    <div class="newsprk_nav stellarnav">
                        <ul id="newsprk_menu">
                            <li><a href="/">Home</a></li>

                            <li><a href="#">Articles <i class="fal fa-angle-down"></i></a>
                                <ul>
                                    <li><a href="#">Categories <i class="fal fa-angle-right"></i></a>
                                        <ul>
                                            @foreach($categories as $category)
                                            <li><a href="{{ $category->url }}">{{ $category->title }}</a></li>
                                            @endforeach
                                        </ul>
                                    </li>
                                    <li><a href="/contributors">Contributing Writers</a></li>
                                </ul>
                            </li>

                            <li><a href="#">News <i class="fal fa-angle-down"></i></a>
                                <ul>
                                    <li><a href="/news">Latest News</a></li>
                                    <li><a href="/news-sources">News Sources</a></li>
                                </ul>
                            </li>
                            
                            
                            <li><a href="#">About Nigeria <i class="fal fa-angle-down"></i></a>
                                <ul>
                                    <li><a href="#">Politics <i class="fal fa-angle-right"></i></a>
                                        <ul>
                                            <li><a href="/political-parties">Political Parties</a></li>
                                            <li><a href="/politicians-sites">Politicians Sites</a></li>
                                            <li><a href="/general-links">Groups & Organizations</a></li>
                                        </ul>
                                    </li>
                                    
                                    <li><a href="#">Government <i class="fal fa-angle-right"></i></a>
                                        <ul>
                                            <li><a href="/nigerias-constitution">Nigeria's Constitution</a></li>
                                            <li><a href="/government-sites">Government Sites</a></li>
                                            <li><a href="/nigerian-embassies">Nigerian Embassies</a></li>
                                            <li><a href="/heads-of-government">Heads of Government</a></li>
                                            <li><a href="/state-governors">State Governors</a></li>
                                            <li><a href="/federal-senators">Federal Senators</a></li>
                                            <li><a href="/federal-representatives">Federal Representatives</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>

                            <li><a href="#">Media <i class="fal fa-angle-down"></i></a>
                                <ul>
                                    <li><a href="/document-library">Document Library</a></li>
                                    <li><a href="/videos">Videos</a></li>
                                    <li><a href="/photo-albums">Pictures</a></li>
                                </ul>
                            </li>
                            
                            <li><a href="/contact">Contact</a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-6 col-lg-4 align-self-center">
                    <div class="menu_right">
                        <div class="users_area">
                            <ul class="inline">
                                <li class="search_btn">Search articles here <i class="far fa-search" title="Search articles here"></i></li>
                                <!-- <li><i class="fal fa-user-circle"></i></li> -->
                            </ul>
                        </div>
                        <!-- <div class="lang d-none d-xl-block">
                            <ul>
                                <li><a href="#">English <i class="far fa-angle-down"></i></a>
                                    <ul>
                                        <li><a href="#">Spanish</a>
                                        </li>
                                        <li><a href="#">China</a>
                                        </li>
                                        <li><a href="#">Hindi</a>
                                        </li>
                                        <li><a href="#">Corian</a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </div> -->
                        
                        <!-- <div class="temp d-none d-lg-block">
                            <div class="temp_wap">
                                <div class="temp_icon">
                                    <img src="/assets/img/icon/temp.png" alt="">
                                </div>

                                <h3 class="temp_count">35</h3>
                                
                                <p>Nigeria</p>
                            </div>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>