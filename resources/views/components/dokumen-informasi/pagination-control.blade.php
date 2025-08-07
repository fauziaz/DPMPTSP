@props(['paginator', 'perPage', 'currentPage', 'total', 'lastPage'])

@php
    $from = ($paginator->currentPage()- 1) * $perPage + 1;
    $to = min($paginator->currentPage()* $perPage, $total);
@endphp

<div class="row">
    <div class="col-12 col-lg-9 ms-lg-auto">
        <div class="mt-3 text-muted row align-items-center pagination-wrapper" style="position: relative; z-index: 10;">
            {{-- Kiri: Pilih jumlah item --}}
            <div class="col-md-4 d-flex align-items-center per-page-wrapper">
                <span class="me-2">Tampilkan</span>
                <div class="position-relative" style="min-width: 70px;">
                    <button 
                        wire:click="togglePerPageDropdown"
                        class="btn btn-sm btn-outline-secondary d-flex justify-content-between align-items-center"
                        style="min-width: 90px; width: 100%; border: 1px solid #0d47a1; background-color: #f8f9fa; color: #0d47a1; font-weight: 500;"
                    >
                        {{ $perPage }}
                        <i class="bi bi-chevron-down ms-1"></i>
                    </button>

                    @if($showPerPageDropdown)
                    <div class="dropdown-menu-dokumen show p-2 shadow-sm" style="position: absolute; z-index: 999; width: 100%;">
                        @foreach([10, 25, 50] as $jumlah)
                            <div 
                                wire:click="setPerPage({{ $jumlah }})"
                                class="dropdown-item small d-flex justify-content-between align-items-center py-1 px-2 {{ $perPage == $jumlah ? 'bg-secondary text-white' : '' }}"
                                style="cursor: pointer; border-radius: 5px;"
                            >
                                <span>{{ $jumlah }}</span>
                                @if($perPage == $jumlah)
                                    <i class="bi bi-check2"></i>
                                @endif
                            </div>
                        @endforeach
                    </div>
                    @endif
                </div>
                <span class="ms-2">dari total <strong>{{ $total }}</strong></span>
            </div>

            {{-- Tengah: Versi mobile (halaman & tombol) --}}
            <div class="col-12 d-flex justify-content-center align-items-center gap-2 d-md-none page-control-mobile">
                <button 
                    class="btn btn-sm btn-outline-secondary custom-pagination-btn"
                    wire:click="previousPage"
                    @disabled($paginator->onFirstPage())
                >
                    <i class="bi bi-chevron-left"></i>
                </button>

                {{-- Label + dropdown --}}
                <div class="d-flex align-items-center gap-2">
                    <span class="ms-2">Halaman</span>
                    <div class="position-relative" style="min-width: 90px;">
                        <button 
                            wire:click="$toggle('showPageDropdown')"
                            class="btn btn-sm btn-outline-secondary d-flex justify-content-between align-items-center"
                            style="min-width: 90px; width: 100%; border: 1px solid #0d47a1; background-color: #f8f9fa; color: #0d47a1; font-weight: 500;"
                        >
                            {{ $paginator->currentPage() }}
                            <i class="bi bi-chevron-down"></i>
                        </button>

                        @if($showPageDropdown)
                        <div class="dropdown-menu-dokumen show p-2 shadow-sm" style="position: absolute; z-index: 999; width: 100%;">
                            <input 
                                type="text"
                                wire:model.lazy="searchPage"
                                class="form-control form-control-sm mb-2 text-center"
                                placeholder="Cari halaman..."
                            >
                            @for($i = 1; $i <= $paginator->lastPage(); $i++)
                                @if($searchPage == '' || str_contains((string)$i, $searchPage))
                                    <div 
                                        wire:click="pilihHalaman({{ $i }})"
                                        class="dropdown-item small d-flex justify-content-between align-items-center py-1 px-2 {{ $paginator->currentPage() == $i ? 'bg-secondary text-white' : '' }}"
                                        style="cursor: pointer; border-radius: 5px;"
                                    >
                                        <span>{{ $i }}</span>
                                        @if($paginator->currentPage() == $i)
                                            <i class="bi bi-check2"></i>
                                        @endif
                                    </div>
                                @endif
                            @endfor

                            @if($searchPage !== '' && !collect(range(1, $paginator->lastPage()))->contains(fn($p) => str_contains((string)$p, $searchPage)))
                                <div class="text-muted text-center small py-1 px-2">
                                    Tidak ditemukan hasil untuk "<strong>{{ $searchPage }}</strong>"
                                </div>
                            @endif
                        </div>
                        @endif
                    </div>
                    <span class="ms-2">dari <strong>{{ $paginator->lastPage() }}</strong></span>
                </div>
                
                <span class="text-muted small">dari {{ $paginator->lastPage() }}</span>

                <button 
                    class="btn btn-sm btn-outline-secondary custom-pagination-btn"
                    wire:click="nextPage"
                    @disabled(!$paginator->hasMorePages())
                >
                    <i class="bi bi-chevron-right"></i>
                </button>
            </div>

            {{-- Kanan: Desktop - Halaman + Dropdown + dari + Tombol --}}
            <div class="col-md-4 d-none d-md-flex justify-content-md-end justify-content-center align-items-center gap-2 page-nav-desktop">
                {{-- Halaman + Dropdown + dari --}}
                <div class="d-flex align-items-center gap-2">
                    <span class="ms-2">Halaman</span>
                    {{-- Dropdown --}}
                    <div class="position-relative" style="min-width: 70px;">
                        <button 
                            wire:click="$toggle('showPageDropdown')"
                            class="btn btn-sm btn-outline-secondary d-flex justify-content-between align-items-center"
                            style="min-width: 90px; width: 100%; border: 1px solid #0d47a1; background-color: #f8f9fa; color: #0d47a1; font-weight: 500;"
                        >
                            {{ $paginator->currentPage() }}
                            <i class="bi bi-chevron-down"></i>
                        </button>
                        @if($showPageDropdown)
                        <div class="dropdown-menu-dokumen show p-2 shadow-sm" style="position: absolute; z-index: 999; width: 100%;">
                            <input 
                                type="text"
                                wire:model.lazy="searchPage"
                                class="form-control form-control-sm mb-2 text-center"
                                placeholder="Cari halaman..."
                            >
                            @for($i = 1; $i <= $paginator->lastPage(); $i++)
                                @if($searchPage == '' || str_contains((string)$i, $searchPage))
                                    <div 
                                        wire:click="pilihHalaman({{ $i }})"
                                        class="dropdown-item small d-flex justify-content-between align-items-center py-1 px-2 {{ $paginator->currentPage() == $i ? 'bg-secondary text-white' : '' }}"
                                        style="cursor: pointer; border-radius: 5px;"
                                    >
                                        <span>{{ $i }}</span>
                                        @if($paginator->currentPage() == $i)
                                            <i class="bi bi-check2"></i>
                                        @endif
                                    </div>
                                @endif
                            @endfor

                            @if($searchPage !== '' && !collect(range(1, $paginator->lastPage()))->contains(fn($p) => str_contains((string)$p, $searchPage)))
                                <div class="text-muted text-center small py-1 px-2">
                                    Tidak ditemukan hasil untuk "<strong>{{ $searchPage }}</strong>"
                                </div>
                            @endif
                        </div>
                        @endif
                    </div>
                    <span class="ms-2">dari <strong>{{ $paginator->lastPage() }}</strong></span>
                </div>

                {{-- Tombol navigasi --}}
                <button 
                    class="btn btn-sm btn-outline-secondary custom-pagination-btn {{ $paginator->onFirstPage() ? 'disabled-button' : '' }}"
                    wire:click="previousPage"
                    @disabled($paginator->onFirstPage())
                >
                    <i class="bi bi-chevron-left"></i>
                </button>
                <button 
                    class="btn btn-sm btn-outline-secondary custom-pagination-btn {{ !$paginator->hasMorePages() ? 'disabled-button' : '' }}"
                    wire:click="nextPage"
                    @disabled(!$paginator->hasMorePages())
                >
                    <i class="bi bi-chevron-right"></i>
                </button>
            </div>
        </div>
    </div>
</div>
