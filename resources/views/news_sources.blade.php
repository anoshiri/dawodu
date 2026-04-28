<x-app :title="'New sources'">
	
	<!--::::: INNER TABLE AREA START :::::::-->
	<div class="inner_table">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="bridcrumb">	
						<a href="/">Home</a> / <a href="/news-sources">News</a> / Sources
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
									<h5>News: <a href="#">Sources</a></h5>
								</div>
							</div>
						</div>

						<ul class="nav nav-tabs">
							@foreach (config('dawodu.source_type') as $key => $source)
							<li class="nav-item active">
								<a class="nav-link @if ($key == 2) active @endif" data-toggle="tab" href="#{{ Str::slug($source) }}">{{ $source }}</a>
							</li>
							@endforeach
						</ul>

						<div class="tab-content">
						@foreach (config('dawodu.source_type') as $key => $title)
							<div id="{{ Str::slug($title) }}" class="tab-pane pt-5 fade @if ($key == 2) show active @endif">
								<div class="row">
								@foreach ($sources[$key] as $source)
									<div class="col-md-6">
										
										@if ($source->image_url)
											<a href="{{ $source->url }}">
												<img style="max-height:45px; max-width: 125px" src="{{ $source->image_url }}" alt="{{ $source->title }}" title="{{ $source->title }}">
											</a>
										@else
											<a href="{{ $source->url }}" target="_target">{{ $source->title }}</a>
										@endif

										<div class="border_black mb-2 mt-2"></div>
									</div>
								@endforeach
								</div>
							</div>
						@endforeach
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