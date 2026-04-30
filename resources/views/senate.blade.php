<x-app :title="$title ?? 'Federal Senators'">
	<!--::::: INNER TABLE AREA START :::::::-->
	<div class="inner_table">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="bridcrumb">	
						<a href="/">Home</a> / 
						@if (isset($title))
							<a href="/federal-senators">Federal Senators</a> / 
							{{ $title }}
						@else
							Federal Senators
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
			<div class="row mb-5">
				<div class="col-md-12 col-sm-12">
					[ Select a state and senatorial zone to see all federal senators..... ]

					<form action="/state-senators" method="get">
						<div class="row">
							<div class="col-md-4 col-sm-12">
								<label for="states">Choose a state:</label>
								<select class="form-control" id="states" name="states" placeholder="Select state">
									<option value="">-- select state--</option>
									@foreach (App\Enums\NigerianState::cases() as $case)
										<option value="{{ $case->value }}">{{ $case->label() }}</option>
									@endforeach
								</select>
							</div>

							<div class="col-md-4 col-sm-12">
								<label for="states">Choose a senatorial zone:</label>
								<select class="form-control" id="constituency" name="constituency" placeholder="Select--">
								</select>
							</div>
						</div>
					</form>
				</div>
			</div>

			<div class="border_black mb-1 mt-1"></div>

			<div class="row">
				<div class="col-md-12 col-sm-12">
					<div class="mb-5 mt-5">
						<h4>{{ $title }}</h4>
					</div>
					

					@if (isset($officials))
						<div>
						{{ $officials->links() }}
						</div>


						<table class="table">
							<thead>
								<tr>
									<th>Name</th>
									<th>Took Office</th>
									<th>Left Office</th>
									<th>Party</th>
								</tr>
							</thead>
							<tbody>
							@foreach($officials as $official)
								<tr>
									<td><a href="{{ $official->local_url }}">{{ $official->full_name }}</a></td>
									<td>{{ makeDate($official->tenure_start) }}</td>
									<td>{{ makeDate($official->tenure_end) }}</td>
									<td>{{ $official->political_party }}</td>
								</tr>
							@endforeach
							</tbody>
						</table>

						<div>
						{{ $officials->links() }}
						</div>

						<x-return-to-previous-page url="/federal-senators" title="Political Profile/Affiliation"></x-return-to-previous-page>
					
					@elseif (isset($stats) && count($stats) > 0)
						<div class="row justify-content-end">
							<div class="col-md-4 col-sm-12 text-right">
								<label for="sort">Sort by:</label>
								<input type="radio" name="sort" value="/federal-senators/sort/political_party" @if ($sortBy <> 'number_of_officials_by_political_party') checked @endif> Party
								<input type="radio" name="sort" value="/federal-senators/sort/number_of_officials_by_political_party" @if ($sortBy == 'number_of_officials_by_political_party') checked @endif> Number
							</div>
						</div>

						<div class="card">
							<ul class="list-group list-group-flush">
							@foreach ($stats['byParty'] as $party)
								<li class="list-group-item">{{ $party->political_party ?? "Not Specified" }} <span class="float-right"><a href="/federal-senators/political-party/{{ $party->political_party }}">{{ $party->number_of_officials_by_political_party }}</a></span></li>
							@endforeach
							</ul>
						</div>


					@endif
				</div>
			</div>
			</div>
		</div>
	</div>
	<!--::::: ARCHIVE AREA END :::::::-->

	@push('scripts')
		<script>
			var statesObject = @json($constituencies);

			// populate
			$( "#states" ).change(function() {
				var selectedState = $(this).val();

				//empty constituency
				$("#constituency").length = 1;

				//display correct values
				$('#constituency').append('<option value="">--select zone--</option>');
				$(statesObject[selectedState]).each(function(index){
					console.log(this);
					$('#constituency').append('<option value="' + this.url + '">' + this.title + '</option>');
				});
			});

			$("#constituency").change(function() {
				window.location.replace($(this).val());
			});

			$('input[name="sort"]').change(function() {
				window.location.replace($(this).val());
			});
		</script>
	@endpush
</x-app>