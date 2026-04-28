<ul>
    @foreach ($sections as $section)
        <li><a href="{{ $section->url }}">{{ $section->subject }}</a></li>
    @endforeach
</ul>