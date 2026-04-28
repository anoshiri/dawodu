<x-app :title="'Articles by category'">

	<!--::::: INNER TABLE AREA START :::::::-->
	<div class="inner_table">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="bridcrumb">	
						<a href="/">Home</a> / 
						Categories
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
				<div class="col-md-6 col-lg-8">
					<div class="businerss_news">
						<div class="row">
							<div class="col-12 align-self-center">
								<div class="categories_title">
									<h5>Category: <a href="#">Summary</a></h5>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-12">
								<div class="single_post post_type3 post_type12 mb30">
								
									<ul>
										@foreach($categories as $category)
										<li><a href="{{ $category->url }}">
											{{ $category->title }} ({{ $category->articles_count }} articles)</a></li>
										@endforeach
									</ul>
                                    
                                </div>
							</div>
						</div>
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