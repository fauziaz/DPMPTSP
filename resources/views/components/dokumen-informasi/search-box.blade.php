@props([
    'model' => 'search',
    'perform' => 'performSearch',
])

<div class="search-box shadow-sm w-100">
    <i class="bi bi-search search-icon"></i>
    <input
        type="text"
        placeholder="Cari di sini"
        wire:model.debounce.500ms="search"
        wire:keydown.enter="performSearch"
        wire:blur="performSearch"
        class="search-input">
    <button type="button" class="search-btn" wire:click="performSearch">Cari</button>
</div>