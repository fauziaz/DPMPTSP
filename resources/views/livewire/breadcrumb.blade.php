<ol class="breadcrumb bg-transparent justify-content-center">
    <li>
        <a href="/" class="text-white text-decoration-none">Beranda</a>
        @if (count($breadcrumbs) > 0)
            <i class="bi bi-chevron-right mx-2 text-white"></i>
        @endif
    </li>

    @foreach ($breadcrumbs as $item)
        <li class="d-flex align-items-center {{ $loop->last ? 'active text-white' : '' }}" {{ $loop->last ? 'aria-current=page' : '' }}>
            @if ($item['url'])
                <a href="{{ $item['url'] }}" class="text-white text-decoration-none">{{ $item['label'] }}</a>
                @if (!$loop->last)
                    <i class="bi bi-chevron-right mx-2 text-white"></i>
                @endif
            @else
                {{ $item['label'] }}
            @endif
        </li>
    @endforeach
</ol>