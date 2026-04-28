@php
	$pageTitle = 'Nigerian embassies by country';

	if (isset($embassies[0]->country)) {
		$pageTitle = 'Nigerian embassies - '. config('dawodu.countries')[$embassies[0]->country];
	}
@endphp

<x-app :title="$pageTitle">
	<!--::::: INNER TABLE AREA START :::::::-->
	<div class="inner_table">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="bridcrumb">	
						<a href="/">Home</a> / 

						@if (count($embassies))
							<a href="/nigerian-embassies">Nigerian Embassies</a> / {{ config('dawodu.countries')[$embassies->first()->country] }}
						@else
							Nigerian Embassies
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
				<div class="col-md-6 col-lg-12">
					<div class="businerss_news">

						<div class="row">
                            <div class="col-md-8 col-lg-8">
								
								<!-- for one country -->
								@if (count($embassies))
									<h4 class="mb-5">{{ config('dawodu.countries')[$embassies->first()->country] }}</h4>
									@foreach($embassies as $embassy)
										<div class="mb-5">
											<strong>{{ $embassy->city }}</strong><br />
											{{ $embassy->title }}<br />
											{{ (trim($embassy->address)) .
											((trim($embassy->locality) != '') ? ', '. trim($embassy->locality) : '') .
											((trim($embassy->city) != '') ? ', ' . trim($embassy->city) : '') .
											((trim($embassy->state) != '') ? ', ' . trim($embassy->state) : '') }}
											{{ trim($embassy->code) }}
												
											<br />
											
											@if ($embassy->phone)
												<i class="far fa-phone"></i> {{ $embassy->phone }}<br />
											@endif

											@if ($embassy->email)
												<i class="far fa-envelope"></i> {{ $embassy->email }}<br />
											@endif

											@if ($embassy->url) 
												<a href="{{ $embassy->url }}" class="readmore" target="_target">Visit website</a>
											@endif
										</div>
									@endforeach

									<x-return-to-previous-page url="/nigerian-embassies" title="List of countries"></x-return-to-previous-page>
								@endif


								<!-- countries -->
								@if ($countries)
									<h4 class="mb-5">Nigerian Embassies By Country</h4>

									<div class="col-12 mb-1">
										{{ $countries->links() }}
									</div>

									@foreach ($countries as $country)
										<img src="{{ $country->icon }}" alt=""> <a href="/nigerian-embassies/{{ $country->country }}">{{ config('dawodu.countries')[$country->country] }}</a><br />
									@endforeach
									
									<div class="col-12 mt-5">
										{{ $countries->links() }}
									</div>
								@endif
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