<x-app :title="'Latest news'">
	<!--::::: INNER TABLE AREA START :::::::-->
	<div class="inner_table">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="bridcrumb">	
                        <a href="/">Home</a> / Latest News
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
				<div class="col-md-6 col-lg-8">
					<div class="businerss_news">
						<div class="row">
							<div class="col-12">
								<div>
									{{ $news->links() }}
								</div>
								
								@foreach ($news as $item)
								<div class="single_post post_type3 post_type12 flex mb30">
									<div class="single_post_text">
										<div class="meta3">
											<a target="news" href="{{ $item->url }}">{{ $item->author }}</a>
											<a target="news" href="{{ $item->url }}">{{ makeDateTime($item->publication_date) }}</a>
										</div>

										<h4><a target="news" href="{{ $item->url }}">{{ $item->title }}</a></h4>
										
										<div class="space-10"></div>
										<p class="post-p">{{ $item->blog }}</p>
										<div class="space-20"></div>
										
										<a target="news" href="{{ $item->url }}" class="readmore">Read more</a>
									</div>
								</div>
								@endforeach

								<div>
									{{ $news->links() }}
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="col-md-6 col-lg-4">

					
					<!--:::::: POST TYPE 3 START :::::::-->
					<x-side-trending></x-side-trending>
					<!--:::::: POST TYPE 3 END :::::::-->

					<!--:::::: POST TYPE 4 END :::::::-->
					<x-side-newsletter></x-side-newsletter>
				</div>
			</div>
		</div>
	</div>
	<!--::::: ARCHIVE AREA END :::::::-->
</x-app>