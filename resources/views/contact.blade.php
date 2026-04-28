<x-app :title="'Contact Us'">
	<!--::::: INNER AREA START :::::::-->
	<div class="inner inner_bg inner_overlay" style="background: url({{ asset('assets/img/dawodu_contactus.jpg') }});">
		<div class="container">
			<div class="inner_wrap">
				<div class="row">
					<div class="col-lg-6">
						<div class="title_inner">
							<h1>Contact us</h1>
						</div>
					</div>
				</div>
				<div class="inner_scroll">
					<a href="#inner">
						<img src="/assets/img/icon/scroll.png" alt="">
					</a>
				</div>
			</div>
		</div>
	</div>
	<!--::::: INNER AREA END :::::::-->
	
	<!--::::: CONTACS AREA START :::::::-->
	<div class="contacts section-padding">
		<div class="container">
			<div class="row">
				<div class="col-lg-4">
					<div class="box single_contact_box">
						
						<div class="contact_details">
							<div class="contact_details_icon">
								<i class="fas fa-map-marker-alt"></i>
							</div>
							<p>ADDRESS:</p>

							{{ $settings->street ?? '' }},<br /> {{ $settings->locality ?? '' }},<br /> {{ $settings->city ?? '' }},  {{ $settings->state ?? '' }}, {{ $settings->code ?? '' }}, {{ $settings->country ?? '' }}.
						</div>
					</div>
				</div>

				<div class="col-lg-4">
					<div class="box single_contact_box">
						
						<div class="contact_details">
							<div class="contact_details_icon">
								<img src="assets/img/icon/black_phone.png" alt="">
							</div>
							<p>PHONE:</p>
							{{ $settings->phone ?? '' }}
						</div>
					</div>
				</div>

				<div class="col-lg-4">
					<div class="box single_contact_box">
						
						<div class="contact_details">
							<div class="contact_details_icon">	
								<i class="fas fa-envelope"></i>
							</div>
							<p>EMAIL:</p>
							{{ $settings->email ?? '' }}
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!--::::: CONTACT AREA END :::::::-->


	<!--::::: CONTACT FORM AREA START :::::::-->
	<div class="contact_form padding-bottom">
		<div class="container">
			<div class="row">
				<div class="col-md-8">
					<div class="cotact_form">
						<div class="row">
							<div class="col-12">
								<form action="/contact" method="post" id="myForm">
									@csrf
        
									@if (!empty($message))
									<div class="alert alert-success">{{ $message }}</div>
									@endif

									<div class="row">
										<div class="col-12">
											<h3>We'd love to hear from you</h3>
										</div>

										<div class="col-lg-6">
											<input type="text" name="fullName"  placeholder="Your name" required>
											@error('fullName') <span class="text-danger">{{ $message }}</span> @enderror
										</div>

										<div class="col-lg-6">
											<input type="email" name="email" placeholder="Your email address" required>
											@error('email') <span class="text-danger">{{ $message }}</span> @enderror
										</div>
									</div>

									<div class="row">
										<div class="col-lg-12">
											<input type="text" name="subject" placeholder="Subject" required>
											@error('subject') <span class="text-danger">{{ $message }}</span> @enderror
										</div>
										
										<div class="col-12">
											<textarea name="message"  required name="message" id="message" cols="30" rows="5" placeholder="What questions or comments do you have for us?"></textarea>
											@error('message') <span class="text-danger">{{ $message }}</span> @enderror
										</div>

										<div class="col-12">
											<div class="space-20"></div>
											<input type="submit" class="cbtn1" type="button" value="Send">
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-4">
                    <!--:::::: POST TYPE 3 START :::::::-->
					<x-side-trending></x-side-trending>
					<!--:::::: POST TYPE 3 END :::::::-->
				</div>
			</div>
		</div>
	</div>
	<!--::::: CONTACT FORM AREA END :::::::-->

	@push('scripts')
		{!! htmlScriptTagJsApi([
			'callback_then' => 'callbackThen',
			'callback_catch' => 'callbackCatch',
		]) !!}
	@endpush
</x-app>