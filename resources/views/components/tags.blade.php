@if (is_array($tags) && count($tags)>0)
    <div class="tags">
        <ul class="inline">
            <li class="tag_list"><i class="fas fa-tag"></i> tags</li>
            @foreach ($tags as $key => $tag)
                <li><a href="/articles/search?param={{ $tag }}">{{ $tag }}</a></li>    
            @endforeach
        </ul>
    </div>
@endif