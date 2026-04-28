<span>
    @if (isset($message->image_url))
    <img src="{{ $message->image_url }}" height="300" alt="Not found">
    @endif
    
    <h5>{{ $message->content ?? '' }}</h5>
</span>