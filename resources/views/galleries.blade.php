<x-app :title="'Pictures'">
	<!--::::: ARCHIVE AREA START :::::::-->
	<div class="archives post post1 padding-top-30">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="bridcrumb">	
						<a href="/">Home</a> / Pictures
					</div>
				</div>
			</div>

			<div class="space-30"></div>

			<div class="row">
                @foreach ($galleries as $gallery)
				<div class="col-md-3 col-sm-6 text-center">
					<!-- Modal gallery -->
                    <div class="single_post post_type3">
                        <div class="post_img">
                            <div class="img_wrap">
								<a class="album_image" href="{{ $gallery->url }}">
                                	<img src="{{ $gallery->image_url }}" alt="">
								</a>
                            </div>
                        </div>
                        
                        <div class="single_post_text">
                            <h4><a href="{{ $gallery->url }}">{{ $gallery->title }}</a></h4>
                        </div>
                    </div>
				</div>
                @endforeach
			</div>

			<!-- pagination -->
			<div class="mt-5">
				{{ $galleries->links() }}
			</div>
		</div>
	</div>
	<!--::::: ARCHIVE AREA END :::::::-->
</x-app>