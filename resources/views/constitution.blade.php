<x-app :title="'Constitution of the Federal Republic of Nigeria'">
	
	<div class="inner_table">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="bridcrumb">	
						<a href="/">Home</a> / Nigerian Constitution
					</div>
				</div>
			</div>

			<div class="space-50"></div>

			<div class="row">
				<div class="col-lg-6">
					<h4>Arrangement of sections</h4>

					<div class="accordion" id="NigeriaConstitution">
						@foreach ($sections as $section)
							<div class="card">
								<div class="card-header" id="heading{{ $section->id }}">
									<h2 class="mb-0">
										<button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapse{{ $section->id }}" aria-expanded="true" aria-controls="collapse{{ $section->id }}">
											{{ $section->subject }}	
										</button>
									</h2>
								</div>

								<div id="collapse{{ $section->id }}" class="collapse" aria-labelledby="heading{{ $section->id }}" data-parent="#NigeriaConstitution">
									<div class="card-body">
										<ul>
											@if ($section->subsections)
												@foreach ($section->subsections as $subsection)
												<li><a href="{{ $subsection->url }}">{{ $subsection->subject }}</a>

													@if ($subsection->subsections)
													<ul>
														@foreach ($subsection->subsections as $subsection)
														<li><a href="{{ $subsection->url }}">{{ $subsection->subject }}</a></li>
														@endforeach
													</ul>
													@endif

												</li>
												@endforeach
											
											@else
												<li><a href="{{ $section->url }}">{{ $section->subject }}</a></li>
											@endif
										</ul>
									</div>
								</div>
							</div>
						@endforeach

					</div>
				</div>

				<div class="col-lg-6 border-left">
					@if (isset($item->section->subject))
					<div class="page_category">
						<h2>{{ $item->section->subject }}</h2>
					</div>
					@endif

					<h4 class="mt-5">{{ $item->subject }}</h4>

					<div>{!! $item->content !!}</div>
				</div>
			</div>
		</div>
	</div>

</x-app>