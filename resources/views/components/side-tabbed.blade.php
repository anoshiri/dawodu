<div class="widget_tab md-mt-30">
    <ul class="nav nav-tabs">
        <li><a class="active" data-toggle="tab" href="#related">RELATED</a>
        </li>

        <li><a data-toggle="tab" href="#shared" class="">MOST SHARED</a>
        </li>

        <li><a data-toggle="tab" href="#popular" class="">MOST VIEWED</a>
        </li>
    </ul>


    <div class="tab-content">
        <div id="related" class="tab-pane fade in active show">
            <x-tabbed-related :article="$article"></x-tabbed-related>
        </div>

        <div id="shared" class="tab-pane fade">
            <x-tabbed-most-shared></x-tabbed-most-shared>
        </div>

        <div id="popular" class="tab-pane fade">
            <x-tabbed-popular></x-tabbed-popular>
        </div>
    </div>
</div>