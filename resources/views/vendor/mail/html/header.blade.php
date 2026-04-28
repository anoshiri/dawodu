<tr>
    <td class="header">
        <a href="{{ $url }}" style="display: inline-block;">
            @if (trim($slot) !== 'Laravel')
                <img src="https://dawodu.com/assets/img/logo/logo.png" class="logo" alt="Dawodu">
            @else
                {{ $slot }}
            @endif
        </a>
    </td>
</tr>
