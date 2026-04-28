<x-app :title="'Government Officials'">

	<!--::::: INNER TABLE AREA START :::::::-->
	<div class="inner_table">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="bridcrumb">	<a href="/">Home</a> / Government Officials</div>
				</div>
			</div>
		</div>
	</div>
	<!--::::: INNER TABLE AREA END :::::::-->
	<!--::::: ARCHIVE AREA START :::::::-->
	<div class="archives padding-top-30">
		<div class="container">
			<div class="row">
                
                <div class="col-md-8 col-sm-12">
                    <table width="100%">
                        <thead>
                            <tr>
                                <th>State</th>
                                <th>View Governors</th>
                                <th>Senators</th>
                                <th>Federal Representatives</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach (config('dawodu.states') as $key => $state)
                            <tr>
                                <td>{{ $state }}</td>
                                <td><a href="/state-governors/{{ Str::slug($state).'-'.$key }}">10 View</a></td>
                                <td><a href="/federal-senators/{{ Str::slug($state).'-'.$key }}">17 View</a></td>
                                <td><a href="/federal-representatives/{{ Str::slug($state).'-'.$key }}">90 view</a></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="col-md-4 col-sm-12">
                    
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