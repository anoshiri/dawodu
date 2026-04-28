<x-app :title="'Heads of Government'">

	<!--::::: INNER TABLE AREA START :::::::-->
	<div class="inner_table">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="bridcrumb">
						<a href="/">Home</a> / <a href="/heads-of-government">Heads of Government</a>
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
				<div class="col-md-12 col-sm-12">
					<h4 class="mb-5 mt-5">Heads of Government</h4>

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