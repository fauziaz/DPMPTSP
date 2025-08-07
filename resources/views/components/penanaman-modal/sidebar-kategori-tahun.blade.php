@props([
    'tahuns' => [],
    'tahunDipilih' => null,
    'kategoris' => [],
    'kategoriDipilih' => null,
])

{{-- Judul Filter Kategori --}}
<h5 class="fw-bold mb-3">Kategori</h5>

{{-- Scrollable Kategori --}}
@if(!empty($kategoris))
    <div class="year-scroll-container mb-3">
        <ul class="list-group custom-year-list">
            @foreach($kategoris as $kategori)
            <li 
                class="list-group-item custom-year-item {{ $kategoriDipilih == $kategori ? 'active-year' : '' }}"
                wire:click="filterByKategori('{{ $kategori }}')"
            >
            {{ 'Investasi ' . ucwords(str_replace('_', ' ', $kategori)) }}
            </li>
            @endforeach
        </ul>
    </div>
@endif

{{-- Judul Filter Tahun --}}
<h5 class="fw-bold mb-3">Tahun</h5>

{{-- Scrollable Tahun --}}
<div class="year-scroll-container">
    <ul class="list-group custom-year-list">
        @foreach($tahuns as $tahun)
        <li 
            class="list-group-item custom-year-item {{ $tahunDipilih == $tahun ? 'active-year' : '' }}"
            wire:click="filterByYear('{{ $tahun }}')"
        >
            {{ $tahun }}
        </li>
        @endforeach
    </ul>
</div>
