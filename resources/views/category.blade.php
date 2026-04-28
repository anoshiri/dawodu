<x-app :title="$articles->first()->category->title ?? ''">
	<!--::::: INNER TABLE AREA START :::::::-->
	<div class="inner_table">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="bridcrumb">
						<a href="/">Home</a> / <a href="/articles">Articles</a> / <a href="/categories">Categories</a>  / {{ $articles->first()?->category->title }}
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
							<div class="col-12 align-self-center">
								<div class="categories_title">
									<h5>Category: <a href="{{ $articles->first()->category->url ?? '' }}">{{ $articles->first()?->category->title ?? '' }}</a></h5>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-12">
								{{ $articles->links() }}
							</div>


							<div class="col-12">
								@foreach ($articles as $article)
								<div class="single_post post_type3 post_type12 flex mb30">

									@if ($article->image_url)
									<div class="post_img">
										<div class="img_wrap">
											<a href="#">
												<img src="{{ $article->image_url }}" alt="">
											</a>
										</div>
									</div>
									@endif

									<div class="single_post_text">
										<div class="meta3">
											<a href="{{ $article->url }}">{{ $article->category->title }}</a>

											@if ($article->publication_date)
											<a href="{{ $article->url }}">{{ makeDate($article->publication_date) }}</a>
											@endif
										</div>

										<h4><a href="{{ $article->url }}">{{ $article->subject }}</a></h4>

										<em>{{ $article->by_source }}</em>

										<div class="space-10"></div>
										<p class="post-p">{{ $article->abstract }}</p>
										<div class="space-20"></div>
										
										<a href="{{ $article->url }}" class="readmore">Read more</a>
									</div>
								</div>
								@endforeach
							</div>
							
							<div class="col-12">
								{{ $articles->links() }}
							</div>
							
						</div>

						<x-return-to-previous-page url="/categories" title="Category Summary"></x-return-to-previous-page>
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