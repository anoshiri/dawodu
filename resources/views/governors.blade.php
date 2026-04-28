<x-app :title="$title ?? 'State governors'">

	<!--::::: INNER TABLE AREA START :::::::-->
	<div class="inner_table">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="bridcrumb">
						<a href="/">Home</a> / 
						
						@if (isset($title))
							<a href="/state-governors">State Governors</a> / 
							{{ $title }}
						@else
							State Governors
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
					[ Select a state from the dropdown to see all governors. ]

					<form action="/state-governors" method="get">
						<div class="row">
							<div class="col-md-4 col-sm-12">
								<select class="form-control mb-1" id="states" name="state" placeholder="Select state">
									<option value="">-- select state--</option>
									@foreach (config('dawodu.states') as $key => $state)
										<option value="/state-governors/{{ Str::slug($state.' '.$key) }}">{{ $state }}</option>
									@endforeach
								</select>
							</div>
						</div>
					</form>
				</div>
			</div>

			<div class="border_black mb-1 mt-1"></div>

			<div class="row">
				<div class="col-md-12 col-sm-12">
					<h4 class="mb-5 mt-5">{{ $title }}</h4>

					@if (isset($officials))
						<div>
						{{ $officials->links() }}
						</div>


						<table class="table">
							<thead>
								<tr>
									<th>Name</th>
									<th>State</th>
									<th>Took Office</th>
									<th>Left Office</th>
									<th>Party</th>
								</tr>
							</thead>

							<tbody>
							@foreach($officials as $official)
								<tr>
									<td><a href="{{ $official->local_url }}">{{ $official->full_name }}</a></td>
									<td>{{ config('dawodu.states')[$official->state_id] }}</td>
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
					
						<x-return-to-previous-page url="/state-governors" title="State Governors Summary"></x-return-to-previous-page>
					@elseif (isset($stats) && count($stats) > 0)
						<div class="row justify-content-end">
							<div class="col-md-4 col-sm-12 text-right">
								<label for="sort">Sort by:</label>
								<input type="radio" name="sort" value="/state-governors/sort/political_party" @if ($sortBy <> 'number_of_officials_by_political_party') checked @endif> Party
								<input type="radio" name="sort" value="/state-governors/sort/number_of_officials_by_political_party" @if ($sortBy == 'number_of_officials_by_political_party') checked @endif> Number
							</div>
						</div>

						<div class="card">
							<ul class="list-group list-group-flush">
							@foreach ($stats['byParty'] as $party)
								<li class="list-group-item">{{ $party->political_party ?? "Not Specified" }} <span class="float-right"><a href="/state-governors/political-party/{{ $party->political_party }}">{{ $party->number_of_officials_by_political_party }}</a></span></li>
							@endforeach
							</ul>
						</div>
					@endif
				</div>
			</div>
		</div>
	</div>
	<!--::::: ARCHIVE AREA END :::::::-->

	@push('scripts')
		<script>
			$( "#states" ).change(function() {
				window.location.replace($(this).val());
			});

			$('input[name="sort"]').change(function() {
				window.location.replace($(this).val());
			});
		</script>
	@endpush
</x-app>