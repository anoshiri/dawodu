<x-app :title="'Government websites'">

	<!--::::: INNER TABLE AREA START :::::::-->
	<div class="inner_table">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="bridcrumb">
                        <a href="/">Home</a> / Government Sites
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
							<div class="col-md-8 col-sm-6">
                                <form action="/government-sites/search" method="get">
                                    @csrf
                                    <input type="param" name="param" placeholder="" value="">
                                    <input type="submit" class="cbtn1" value="Search">
                                </form>

								@if (isset($param))
									<p>Displaying results {{ $sites->currentPage()*$sites->perPage() - $sites->perPage() + 1 }}-{{ $sites->currentPage()*$sites->perPage() - $sites->perPage() + $sites->count() }} out of {{ $sites->total() }} for <strong>{{ $param }}</strong></p>
								@endif
							
								<div class="border_black mt-1 mb-1"></div>

								<!-- pagination -->
								<div class="mt-6">
									{{ $sites->links() }}
								</div>

								<div class="accordion" id="accordionSites">
								@foreach($sites as $site)
									<div class="card">
										<div class="card-header" id="heading_{{ $site->id }}">
										<h2 class="mb-0">
											<button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapse_{{ $site->id }}" aria-expanded="true" aria-controls="collapse_{{ $site->id }}">
												{{ $site->title }} @if ($site->short) ({{ $site->short }})  @endif
											</button>
										</h2>
										</div>

										<div id="collapse_{{ $site->id }}" class="collapse" aria-labelledby="heading_{{ $site->id }}" data-parent="#accordionSites">
											<div class="card-body">
												<div class="d-flex flex-row mb30">

													@if ($site->image_url)
													<div class="post_img mr-2" style="width: 40%">
														<div class="img_wrap">
															<a href="{{ $site->url }}">
																<img max-height="100%" src="{{ $site->image_url }}" alt="{{ $site->title }}" title="{{ $site->title }}">
															</a>
														</div>
													</div>
													@endif

													<div class="">
														<h4><a href="{{ $site->url }}">{{ $site->title }} @if ($site->short) ({{ $site->short }})  @endif</a></h4>
														<div class="space-10"></div>

														<div class="row">
															<div class="col-md-12">
																<div class="author_social mt-2 inline">
																	<ul>
																		@foreach(config('dawodu.social_media_platforms') as $social)
																			@if ($site->{$social} )
																			<li><a href="{{ $site->{$social} }}" target="social"><i class="fab fa-{{ $social }} mt-1"></i></a></li>
																			@endif
																		@endforeach
																	</ul>
																</div>
															</div>
														</div>
														
														<div class="space-10"></div>

														<p class="post-p">{!! $site->blog !!}</p>
														<div class="space-10"></div>
														
														<a href="{{ $site->url }}" target="readmore" class="readmore">Visit site</a>
													</div>
												</div>
											</div>
										</div>
									</div>
                                @endforeach
								</div>

								<!-- pagination -->
								<div class="mt-5">
									{{ $sites->links() }}
								</div>
								


								<!-- item not found -->
								@if ($sites->count() < 1)
									<x-item-not-found></x-item-not-found>
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