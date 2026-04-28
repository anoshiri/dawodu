<x-app :title="'Document library'">
	
	<!--::::: INNER TABLE AREA START :::::::-->
	<div class="inner_table">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="bridcrumb">
                        <a href="/">Home</a> / Document Repository
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
							<div class="col-md-12">
                                <form action="/document-repository/search" method="get">
                                    @csrf
                                    <input type="param" name="param" placeholder="" value="">
                                    <input type="submit" class="cbtn1" value="Search">
                                </form>

								@if (isset($param))
									<p>Displaying results {{ $libraries->currentPage()*$libraries->perPage() - $libraries->perPage() + 1 }}-{{ $libraries->currentPage()*$libraries->perPage() - $libraries->perPage() + $libraries->count() }} out of {{ $libraries->total() }} for <strong>{{ $param }}</strong></p>
								@endif
							
								<div class="space-15"></div>

								<!-- pagination -->
								<div class="mt-6">
									{{ $libraries->links() }}
								</div>
								
                                <!-- other videos -->
                                @foreach ($libraries as $library)
									<div class="row ">
										<div class="col-md-8 align-self-center">
											<h6><a class="font-bold" href="{{ $library->url }}">{{ $library->title }}</a></h6>
											<small>
												{{ $library->source }} / 

												@if ($library->publication_date)
													{{ makeDate($library->publication_date) }}
												@endif
											</small>
										</div>

										<div class="col-md-4 border-left align-middle">
											<a href="{{ $library->url }}"><i class="fa faw fa-download"></i> {{ count($library->documents) }} document(s) </a>
										</div>
									</div>

									<div class="space-10"></div>
									<div class="border_black"></div>
									<div class="space-10"></div>
                                @endforeach
                                
	
								<!-- pagination -->
								<div class="mt-5">
									{{ $libraries->links() }}
								</div>
                            </div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!--::::: ARCHIVE AREA END :::::::-->
</x-app>