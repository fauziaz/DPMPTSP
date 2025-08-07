@props([
    'background',
    'breadcrumbs' => [],
    'title',
    'subtitle' => '',
])

<div class="hero-section text-white text-center d-flex" 
     style="background-image: url('{{ $background }}');">
    <div class="container">
        <x-template.breadcrumb :items="$breadcrumbs" :current="$title" />
        <h2 class="display-5 fw-bold">{{ $title }}</h2>
        @if($subtitle)
            <p class="lead">{{ $subtitle }}</p>
        @endif
    </div>
</div>
