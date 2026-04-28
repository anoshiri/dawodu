<x-app :title="$gallery->title ?? 'Pictures'">
	<!--::::: ARCHIVE AREA START :::::::-->
	<div class="archives post post1 padding-top-30">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="bridcrumb">	
						<a href="/">Home</a> / <a href="/photo-albums">Pictures</a> / {{ $gallery->title }}
					</div>
				</div>
			</div>

			<div class="space-30"></div>

			<div class="row">
                <div class="col-md-4">
					<!-- Modal gallery -->
                    <h2 class="widget-title"><strong>{{ $gallery->title }}</strong></h2>

                    <div class="single_post post_type3">
                        <div class="post_img">
                            <div class="img_wrap">
								<a href="{{ $gallery->url }}">
                                	<img src="{{ $gallery->image_url }}" alt="">
								</a>
                            </div>
                        </div>
                        
                        <div class="single_post_text">
                            <div class="meta">
                                {{ makeDate($gallery->publication_date) }}
                            </div>
                            <p class="post-p">{!! $gallery->blog !!}</p>
                        </div>
                    </div>
				</div>

                <div class="col-md-8  border-left">
                    <div class="post_gallary_area fifth_bg mb40">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="slider_demo1">
                                        @foreach ($gallery->images as $image)
                                        <div class="single_gallary_item">
                                            <img class="mr-1 rounded-sm" src="{{ $image->image_url }}" width="90" height="66" alt="{{ $image->subject }}">
                                        </div>
                                        @endforeach
                                    </div>

                                    <div class="slider_demo2">
                                        @foreach ($gallery->images as $image)
                                        <div class="single_post post_type6 xs-mb30">
                                            <div class="post_img gradient1">
                                                <img class="rounded-lg" src="{{ $image->image_url }}" width="100%" alt="">	
                                            </div>

                                            <div class="single_post_text">
                                                <p class="post-p">{!! $image->subject !!}</p>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>

                                    
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
			</div>

            <x-return-to-previous-page url="/photo-albums" title="Pictures"></x-return-to-previous-page>
		</div>
	</div>
	<!--::::: ARCHIVE AREA END :::::::-->
</x-app>