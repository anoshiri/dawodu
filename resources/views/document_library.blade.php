<x-app :title="'Document library - ' . $library->title">
	<!--::::: INNER TABLE AREA START :::::::-->
	<div class="inner_table">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="bridcrumb">
                        <a href="/">Home</a> / <a href="/document-library">Document Library</a> / {{ $library->title }}
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
                                <form action="/document-library/search" method="get">
                                    @csrf
                                    <input type="param" name="param" placeholder="" value="">
                                    <input type="submit" class="cbtn1" value="Search">
                                </form>

								@if (isset($param))
									<p>Displaying results {{ $libraries->currentPage()*$libraries->perPage() - $libraries->perPage() + 1 }}-{{ $libraries->currentPage()*$libraries->perPage() - $libraries->perPage() + $libraries->count() }} out of {{ $libraries->total() }} for <strong>{{ $param }}</strong></p>
								@endif
							
								<div class="border_black mt-1 mb-1"></div>


                                <div class="row">
                                    <div class="col-md-12 self-center">
                                        <h4>{{ $library->title }}</h4>
                                        <div class="meta">
											{{ $library->source }} / 

											@if ($library->publication_date)
											    {{ makeDate($library->publication_date) }}
											@endif
										</div>

                                        <div class="mt-1 mb-1">{!! $library->content !!}</div>

                                   
                                        @php $count = 0; @endphp

										<div class="space-10"></div>
										<h6 class="mt-2 text-danger">Click file icon to download:</h6>
										<div class="flex">
                                        @foreach ($library->documents as $document)
                                            <a class="mr-5" href="{{ $library->url }}/{{ 'document-' . $count++ }}" title="{{ str_replace('public/documents/', '', $document) }}" target="download">
												{!! getIcon($document) !!}
											</a>
                                        @endforeach
                                        </div>
                                    </div>
                                </div>

								<x-return-to-previous-page url="/document-library" title="Document Library"></x-return-to-previous-page>
                            </div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!--::::: ARCHIVE AREA END :::::::-->
</x-app>