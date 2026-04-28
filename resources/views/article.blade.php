<x-app :title="$article->subject">
	
	<!--::::: ARCHIVE AREA START :::::::-->
	<div class="archives post post1 padding-top-30">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="bridcrumb">	
						<a href="/">Home</a> / <a href="/articles">Articles</a> / 
						Category: <a href="{{ $article->category->url ?? '' }}">{{ $article->category->title ?? '' }}</a>
					</div>
				</div>
			</div>

			<div class="space-30"></div>

			<div class="row">
				<div class="col-md-6 col-lg-8">
					<div class="row">
						<div class="col-4 align-self-center">
							<div class="page_category">
								<h4>{{ $article->category->title ?? ''}}</h4>
							</div>
						</div>

						<div class="col-8 text-right">
							<!-- <div class="page_comments">
								<ul class="inline">
									<li><i class="fas fa-comment"></i>563</li>
									<li><i class="fas fa-fire"></i>536</li>
								</ul>
							</div> -->
						</div>
					</div>

					<div class="space-30"></div>

					<div class="single_post_heading">
						<h1>{{ $article->subject }}</h1>
					</div>

					@if ($article->image_url)
						<div class="space-40"></div>
						<img src="{{ $article->image_url }}" alt="image">
					@endif

					<div class="space-20"></div>

					<div class="row">
						<div class="col-lg-6 align-self-center">
							<div class="author">
								<em>{{ $article->by_source }}</em>
								<ul>
									@if ($article->publication_date) 
									<li><a href="#">{{ makeDate($article->publication_date) }}</a>
									@endif
								</ul>
							</div>
						</div>
						
						<div class="col-lg-6 align-self-center">
							<x-social-share title="{{ $article->subject }}" url="{{ $article->url }}"></x-social-share>
						</div>
					</div>
					<div class="space-20"></div>
					
					<div class="mb-5">
						{!! $article->content !!}
					</div>

					@if ($article->video_url)
					<div class="single_post post_type3">
						<div class="post_img">
							<div class="img_wrap">
								<iframe width="100%" height="411" src="{{ $article->video_url }}?controls=0" title="{{ $article->subject }}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
							</div>
						</div>
					</div>
					@endif

					<!-- tags -->
					<x-tags :tags="$article->tags"></x-tags>

					<x-return-to-previous-page url="/articles" title="Articles"></x-return-to-previous-page>
				</div>
				
				<div class="col-md-6 col-lg-4">
					<x-side-tabbed :article="$article"></x-side-tabbed>


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