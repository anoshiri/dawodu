<x-app :title="'Partners'">
	<!--::::: ARCHIVE AREA START :::::::-->
	<div class="archives post post1 padding-top-30">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="bridcrumb">	
						<a href="/">Home</a> / <a href="/partners">Partners</a>
                        @if (isset($partner)) / {{ $partner->title }} @endif
					</div>
				</div>
			</div>

			<div class="space-30"></div>

			<div class="row">
                <div class="col-md-8">
                    @if (isset($partner))
                        <div class="row mb-5">
                            @if ($partner->image_url)
                            <div class="col-md-4">
                                <img max-height="200" src="{{ $partner->image_url }}" title="{{ $partner->title }}" alt="{{ $partner->title }}">
                            </div>
                            @endif

                            <div class="col">
                                <h2 class="mb-1">{{ $partner->title }}</h2>

                                <div class="mb-1 author_social mt-2 inline">
                                    <ul>
                                        @foreach(config('dawodu.social_media_platforms') as $social)
                                            @if ($partner->{$social} )
                                            <li><a href="{{ $partner->{$social} }}" target="social"><i class="fab fa-{{ $social }} mt-1"></i></a></li>
                                            @endif
                                        @endforeach
                                    </ul>
                                </div>

                                <div class="mb-1">{!! $partner->blog !!}</div>

                                @if ($partner->url)
                                <a class="readmore secondary_bg text-white" href="{{ $partner->url }}">Visit website</a>
                                @endif
                            </div>
                        </div>

                        <x-return-to-previous-page url="/partners" title="Partners"></x-return-to-previous-page>
                    @endif



                    @if (isset($partners))
                        <!-- list of partners -->
                        @foreach ($partners as $partner)
                            <div class="row mb-5">
                                @if ($partner->image_url)
                                <div class="col-md-4">
                                    <img max-height="200" src="{{ $partner->image_url }}" alt="">
                                </div>
                                @endif

                                <div class="col">
                                    <h2 class="mb-1">{{ $partner->title }}</h2>
                                    <a class="readmore" href="{{ $partner->local_url }}">Read Profile</a>

                                    @if ($partner->url)
                                    <a class="readmore secondary_bg text-white" href="{{ $partner->url }}">Visit website</a>
                                    @endif
                                </div>
                            </div>
                        @endforeach

                        <div>
                            {{ $partners->links() }}
                        </div>
                    @endif
                </div>

                <div class="col-md-4">
                    
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