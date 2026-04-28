<x-app>
	<!--::::: INNER TABLE AREA START :::::::-->
	<div class="inner_table">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="bridcrumb">
                        <a href="/">Home</a> / Language
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
				<div class="col-md-6 col-lg-12">
					<div class="businerss_news">
						<div class="row">
							<div class="col-md-6 align-self-center">
                                <form action="/language/search" method="post">
                                    @csrf
                                    <input type="word" name="word" placeholder="Enter word">
                                    <input type="submit" class="cbtn1" value="Search">
                                </form>
							</div>

                            <div class="col-md-6 text-right">
                                <div class="tags">
                                    <ul class="inline">
                                        <li class="tag_list"><i class="fas fa-tag"></i> Languages: </li>

                                        @foreach (config('dawodu.languages') as $language)
                                            <li><a href="/language/{{ $language }}">{{ $language }}</a></li>    
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
						</div>

                        <div class="row mt-5">
                            <div class="col-md-6 col-lg-8">
                                @if ($word)
                                    <div>
                                        <h3>{{ $word->word }} <small>[ {{ $word->language }} ]</small></h3>
                                    </div>
                                    <div class="border_black mt-2 mb-2"></div>
                                    {!! $word->meaning !!}

                                    <div class="border_black mt-5 mb-5"></div>
                                    <div class="next_prev">
                                        <div class="row">
                                            <div class="col-lg-6 align-self-center">
                                                @if ($others['previous'])
                                                <div class="next_prv_single border_left3">
                                                    <p>PREVIOUS WORD</p>
                                                    <h3><a href="{{ $others['previous']->url }}">{{ $others['previous']->word }}</a></h3>
                                                </div>
                                                @endif
                                            </div>
                                            <div class="col-lg-6 align-self-center">
                                                @if ($others['next'])
                                                <div class="next_prv_single border_left3">
                                                    <p>NEXT WORD</p>
                                                    <h3><a href="{{ $others['next']->url }}">{{ $others['next']->word }}</a></h3>
                                                </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                @else
                                    <div class="text-center">
                                        Search words or select a word from the list.
                                    </div>
                                @endif
                            </div>

                            <div class="col-md-6 col-lg-4">
                                <h2 class="widget-title">Some Other Words</h2>
                                
                                <div id="tags" class="tab-pane fade in active show">
                                    <div class="tags">
                                        <ul class="inline">
                                            @foreach ($words as $word)
                                                <li><a href="{{ $word->url }}">{{ $word->word }}</a></li>    
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!--::::: ARCHIVE AREA END :::::::-->
</x-app>