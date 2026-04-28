<x-app :title="$official->full_name ?? 'Government official'">
	<!--::::: INNER TABLE AREA START :::::::-->
	<div class="inner_table">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="bridcrumb">	
                        <a href="/">Home</a> / 
                        @if ($official->xtype == 1) <a href="/state-governors/{{ Str::slug(config('dawodu.states')[$official->state_id].' '.$official->state_id) }}"> {{ config('dawodu.states')[$official->state_id] }}</a> / @endif
                        {{ config('dawodu.type_of_government_official')[$official->xtype] }}
                        
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
                
                <div class="col-md-8 col-sm-12">
                    <div class="row mb-5">
                        <div class="col-md-5 col-sm-6">
                            <img src="{{ $official->image_url }}" alt="">
                        </div>

                        <div class="col-md-7 col-sm-6">
                            <h4>{{ $official->full_name }}</h4>

                            <div>
                            @if ($official->position)
                                {{ $official->position }}
                            @endif

                            @if ($official->tenure_start && $official->tenure_end)
                                ({{ makeDate($official->tenure_start) }} - {{ makeDate($official->tenure_end) }})
                            @endif
                            </div>
                            
                            <div><strong>{{ $official->political_party }}</strong></div>
                            
                            <div class="space-10"></div>

                            <div class="author_social mt-2 inline">
                                <ul>
                                    @foreach(config('dawodu.social_media_platforms') as $social)
                                        @if ($official->{$social} )
                                        <li><a href="{{ $official->{$social} }}" target="social"><i class="fab fa-{{ $social }} mt-1"></i></a></li>
                                        @endif
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>

                    {!! $official->bio !!}

                    @if ($official->url)
                        <a href="{{ $site->url }}" target="readmore" class="readmore">Visit official website</a>
                    @endif


                    <x-return-to-previous-page title="Profile list"></x-return-to-previous-page>
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