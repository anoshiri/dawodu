<x-app :title="$cms->title ?? ''">
	<!--::::: ARCHIVE AREA START :::::::-->
	<div class="archives post post1 padding-top-30">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="bridcrumb">	
						<a href="/">Home</a> / {{ $cms->title ?? '' }}
					</div>
				</div>
			</div>

			<div class="space-30"></div>

			<div class="row">
				<div class="col-md-6 col-lg-8">
					@if ($cms->image_url)
						<div class="space-40"></div>
						<img src="{{ $cms->image_url }}" alt="image">
					@endif

					<div class="space-20"></div>
					
					<div class="mb-5">
						{!! $cms->content !!}
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