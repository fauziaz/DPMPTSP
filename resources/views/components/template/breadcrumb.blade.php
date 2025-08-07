@props([
    'items' => [],
    'current' => '',
])

<nav aria-label="breadcrumb">
    <ol class="breadcrumb bg-transparent justify-content-left">
        @foreach ($items as $label => $url)
            <li class="breadcrumb-item">
                <a href="{{ $url }}" class="text-white">{{ $label }}</a>
            </li>
        @endforeach
        <li class="breadcrumb-item active text-white" aria-current="page">{{ $current }}</li>
    </ol>
</nav>