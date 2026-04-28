<x-app :title="$contributor->full_name ?? 'Contributing writers'">

	<!--::::: INNER TABLE AREA START :::::::-->
	<div class="inner_table">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="bridcrumb">
						<a href="/">Home</a> / 
						@if (isset($contributor))
							<a href="/contributors">Contributing Writers</a> / 
							{{ $contributor->full_name}}
						@else
							Contributing Writers
						@endif
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
					
					@if (isset($contributor))
						<div class="row mb-5">
							<div class="col-md-6">
								<img src="{{ $contributor->image_url }}" alt="{{ $contributor->full_name }}">

								<div class="author_social mt-2 inline">
									<ul>
										@foreach(config('dawodu.social_media_platforms') as $social)
											@if ($contributor->{$social} )
											<li><a href="{{ $contributor->{$social} }}" target="social"><i class="fab fa-{{ $social }}"></i></a></li>
											@endif
										@endforeach
									</ul>
								</div>

								<h3>{{ $contributor->full_name }}</h3>
								
								<ul>
									<li>{{ $contributor->articles_count }} articles</li>
								</ul>

								<div>
									<p>{!! $contributor->comment !!}</p>
								</div>
							</div>

							<div class="col-md-6">
								<h3>Articles</h3>
								
								<div>
									{{ $articles->links() }}
								</div>
								
								<ul>
									@foreach ($articles as $article)
										<li><a href="{{ $article->url }}">{{ $article->subject }}</a></li>
									@endforeach
								</ul>

								<div>
									{{ $articles->links() }}
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-md-12">
								<x-return-to-previous-page url="/contributors" title="Contributing Writers Summary"></x-return-to-previous-page>
							</div>
						</div>
					@endif

			
					<!-- contributors -->
					@if (isset($contributors))
						@foreach($contributors as $contributor)
							<div class="flex mb30">
								@if ($contributor->image_url)
									<img class="mr-5" src="{{ $contributor->image_url }}" width="30%" alt="">
								@endif

								<div>
									<h4><a href="{{ $contributor->url }}">{{ $contributor->full_name }}</a></h4>
									
									<div class="meta3">	
										{{ $contributor->articles_count }} articles
									</div>
									
									<a href="{{ $contributor->url }}" class="readmore">Read more</a>
								</div>
							</div>
						@endforeach
					@endif

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