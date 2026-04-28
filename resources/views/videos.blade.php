<x-app :title="'Videos'">
	<!--::::: INNER TABLE AREA START :::::::-->
	<div class="inner_table">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="bridcrumb">
                        <a href="/">Home</a> / Videos
                    </div>
				</div>
			</div>
		</div>
	</div>
	<!--::::: INNER TABLE AREA END :::::::-->
	<!--::::: ARCHIVE AREA START :::::::-->
	<div class="archives padding-top-30">
		<div class="container">
			<div class="row">
				<div class="col-md-12 col-lg-12">
					<div class="businerss_news">
						<div class="row">
							<div class="col-md-8">
                                <form action="/videos/search" method="get">
                                    @csrf
                                    <input type="param" name="param" placeholder="" value="">
                                    <input type="submit" class="cbtn1" value="Search">
                                </form>

								@if (isset($param))
									<p>Displaying results {{ $videos->currentPage()*$videos->perPage() - $videos->perPage() + 1 }}-{{ $videos->currentPage()*$videos->perPage() - $videos->perPage() + $videos->count() }} out of {{ $videos->total() }} for <strong>{{ $param }}</strong></p>
								@endif
							
								<div class="border_black mt-1 mb-1"></div>

								<!-- pagination -->
								<div class="mt-6">
									<x-no-items-found :count="$videos->count()" :title="'videos'"></x-no-items-found>

									{{ $videos->links() }}
								</div>

    
								<!-- Featured video -->
                                @php $video = $videos->shift() @endphp
								@if ($video)
                                <div class="single_post post_type3 post_type11 mb30">
                                    <div class="post_img">
                                        <div class="img_wrap">
                                            <iframe width="100%" height="411" src="{{ $video->url ?? '' }}?controls=0" title="{{ $video->title }}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                        </div>
                                    </div>

                                    <div class="single_post_text padding30 fourth_bg">
                                        <div class="meta3">
                                            <a href="{{ $video->local_url }}">{{ makeDate($video->created_at) }}</a>
                                        </div>
                                        <h4><a href="{{ $video->local_url }}">{{ $video->title }}</a></h4>

                                        <div class="space-10"></div>
                                        <p class="post-p">{!! $video->blog !!}</p>
                                    </div>
                                </div>
								@endif

                                <!-- other videos -->
                                <div class="row justify-content-center">
                                    @foreach ($videos as $video)
                                    <div class="col-md-6">
                                        <div class="single_post post_type3 mb30">
                                            <div class="post_img">
                                                <div class="img_wrap">
                                                    <iframe width="100%" height="250" src="{{ $video->url }}?controls=0" title="{{ $video->title }}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                                </div>
                                            </div>
                                            <div class="single_post_text">
                                                <div class="meta3">
                                                    <a href="{{ $video->local_url }}">{{ makeDate($video->created_at) }}</a>
                                                </div>
                                                <h4><a href="{{ $video->local_url }}">{{ $video->title }}</a></h4>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
												
								<!-- pagination -->
								<div class="mt-5">
									{{ $videos->links() }}
								</div>
                            </div>

							<div class="col-md-4 col-lg-4">
								
								<!--:::::: POST TYPE 3 START :::::::-->
								<x-side-trending></x-side-trending>
								<!--:::::: POST TYPE 3 END :::::::-->

								<!--:::::: POST TYPE 4 END :::::::-->
								<x-side-newsletter></x-side-newsletter>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!--::::: ARCHIVE AREA END :::::::-->
</x-app>