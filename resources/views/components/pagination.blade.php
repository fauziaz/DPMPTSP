@props(['paginator', 'perPage', 'currentPage', 'total', 'lastPage'])

@php
    $from = ($paginator->currentPage() - 1) * $perPage + 1;
    $to = min($paginator->currentPage() * $perPage, $total);
@endphp

<div class="mt-3 small">

    {{-- Desktop & Tablet View --}}
    <div class="row align-items-center d-none d-md-flex">
        {{-- Kiri --}}
        <div class="col-md-6 d-flex align-items-center gap-2">
            <span class="text-muted">Tampilkan</span>

            <div class="position-relative" style="min-width: 90px;">
                <button 
                    wire:click="togglePerPageDropdown"
                    class="btn btn-sm btn-outline-secondary d-flex justify-content-between align-items-center"
                    style="min-width: 90px; width: 100%; border: 1px solid #0d47a1; background-color: #f8f9fa; color: #0d47a1; font-weight: 500;"
                >
                    {{ $perPage }}
                    <i class="bi bi-chevron-down ms-1"></i>
                </button>

                @if($showPerPageDropdown)
                    <div 
                        class="dropdown-menu show p-2 shadow-sm"
                        style="position: absolute; z-index: 999; width: 100%; bottom: 100%; margin-bottom: 4px;"
                    >
                        @foreach([5, 10, 15, 20] as $jumlah)
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

            <span class="text-muted">dari total <strong>{{ $paginator->total() }}</strong></span>
        </div>

        {{-- Kanan --}}
        <div class="col-md-6 d-flex align-items-center justify-content-end gap-2">
            <span class="text-muted">Halaman</span>

            <div class="position-relative" style="min-width: 90px;">
                <button 
                    wire:click="$toggle('showPageDropdown')"
                    class="btn btn-sm btn-outline-secondary d-flex justify-content-between align-items-center"
                    style="width: 100%; border: 1px solid #0d47a1; background-color: #f8f9fa; color: #0d47a1; font-weight: 500;"
                >
                    {{ $paginator->currentPage() }}
                    <i class="bi bi-chevron-down"></i>
                </button>

                @if($showPageDropdown)
                    <div class="dropdown-menu show p-2 shadow-sm small" style="position: absolute; z-index: 999; width: 100%; bottom: 100%; margin-bottom: 4px;">
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
                                    class="dropdown-item d-flex justify-content-between align-items-center py-1 px-2 {{ $paginator->currentPage() == $i ? 'bg-secondary text-white' : '' }}"
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
                            <div class="text-muted text-center py-1 px-2">
                                Tidak ditemukan hasil untuk "<strong>{{ $searchPage }}</strong>"
                            </div>
                        @endif
                    </div>
                @endif
            </div>

            <span class="text-muted">dari <strong>{{ $paginator->lastPage() }}</strong></span>

            <button 
                class="btn btn-sm btn-outline-secondary border-0"
                wire:click="gotoPage({{ $paginator->currentPage() - 1 }})"
                @disabled($paginator->onFirstPage())
            >
                <i class="bi bi-chevron-left"></i>
            </button>

            <button 
                class="btn btn-sm btn-outline-secondary border-0"
                wire:click="gotoPage({{ $paginator->currentPage() + 1 }})"
                @disabled(!$paginator->hasMorePages())
            >
                <i class="bi bi-chevron-right"></i>
            </button>
        </div>
    </div>

    {{-- Mobile View --}}
    <div class="d-flex d-md-none justify-content-between align-items-center gap-2 mt-2">
        <button 
            class="btn btn-sm btn-outline-secondary border-0"
            wire:click="gotoPage({{ $paginator->currentPage() - 1 }})"
            @disabled($paginator->onFirstPage())
        >
            <i class="bi bi-chevron-left"></i>
        </button>

        <div class="d-flex align-items-center gap-1">
            <span class="text-muted">Halaman</span>

            <div class="position-relative" style="min-width: 90px;">
                <button 
                    wire:click="$toggle('showPageDropdown')"
                    class="btn btn-sm btn-outline-secondary d-flex justify-content-between align-items-center"
                    style="width: 100%; border: 1px solid #0d47a1; background-color: #f8f9fa; color: #0d47a1; font-weight: 500;"
                >
                    {{ $paginator->currentPage() }}
                    <i class="bi bi-chevron-down ms-1"></i>
                </button>

                @if($showPageDropdown)
                    <div 
                        class="dropdown-menu show p-2 shadow-sm small" 
                        style="position: absolute; z-index: 999; width: 100%; bottom: 100%; margin-bottom: 4px;"
                    >
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
                                    class="dropdown-item d-flex justify-content-between align-items-center py-1 px-2 {{ $paginator->currentPage() == $i ? 'bg-secondary text-white' : '' }}"
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
                            <div class="text-muted text-center py-1 px-2">
                                Tidak ditemukan hasil untuk "<strong>{{ $searchPage }}</strong>"
                            </div>
                        @endif
                    </div>
                @endif
            </div>

            <span class="text-muted">dari <strong>{{ $paginator->lastPage() }}</strong></span>
        </div>

        <button 
            class="btn btn-sm btn-outline-secondary border-0"
            wire:click="gotoPage({{ $paginator->currentPage() + 1 }})"
            @disabled(!$paginator->hasMorePages())
        >
            <i class="bi bi-chevron-right"></i>
        </button>
    </div>
</div>