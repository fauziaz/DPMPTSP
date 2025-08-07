@props([
    'tahuns' => [],
    'tahunDipilih' => null,
    'judul' => 'Regulasi'
])

<h5 class="fw-bold mb-3">
Tahun
</h5>

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