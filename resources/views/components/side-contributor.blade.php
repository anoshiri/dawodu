<div class="widget_tab md-mt-30 mb-5">
    <h2 class="widget-title">Contributing Writers</h2>


    @foreach($contributors as $contributor)
        <div class="row mb-3">
            <div class="col-sm-5">
                <img src="{{ $contributor->image_url }}" alt="{{ $contributor->full_name }}">
            </div>

            <div class="col-sm-7">
                <h5 style="font-size: 15px"><a href="{{ $contributor->url }}">{{ $contributor->full_name }}</a></h5>
                <div class="meta3">	
                    <small>{{ $contributor->articles_count }} articles</small>
                </div>
            </div>
        </div>
    @endforeach
</div>