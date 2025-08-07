
<!-- Kiri: Filter -->
<div class="col-12 col-lg-3">
    <h5>Filter</h5>
    <div class="mb-3">
        <div class="form-label d-flex justify-content-between align-items-center">
            <label>Tipe Acara</label>
            <i class="bi bi-chevron-down chevron-icon"
            id="tipeAcaraChevron"
            role="button"
            onclick="toggleTipeAcaraCollapse()"
            {{--data-bs-toggle="collapse"
            data-bs-target="#tipeAcaraCollapse"
            aria-expanded="false"
            aria-controls="tipeAcaraCollapse" --}}
            style="cursor: pointer;"></i>
        </div>
        {{-- <div class="collapse @if(!empty($selectedTipeAcara)) show @endif" id="tipeAcaraCollapse"> --}}
        <div class="collapse" id="tipeAcaraCollapse" wire:ignore.self>
            <div class="form-check">
                <input type="checkbox"
                    class="form-check-input custom-checkbox"
                    wire:model="selectedTipeAcara"
                    wire:change="$refresh"
                    value="Pimpinan"
                    id="tipe_pimpinan">
                <label class="form-check-label" for="tipe_pimpinan">Pimpinan</label>
            </div>
            <div class="form-check">
                <input type="checkbox"
                    class="form-check-input custom-checkbox"
                    wire:model="selectedTipeAcara"
                    wire:change="$refresh"
                    value="Perangkat Daerah"
                    id="tipe_perangkat_daerah">
                <label class="form-check-label" for="tipe_perangkat_daerah">Perangkat Daerah</label>
            </div>
            <div class="form-check">
                <input type="checkbox"
                    class="form-check-input custom-checkbox"
                    wire:model="selectedTipeAcara"
                    wire:change="$refresh"
                    value="Umum"
                    id="tipe_umum">
                <label class="form-check-label" for="tipe_umum">Umum</label>
            </div>
        </div>
    </div>
    <div class="mb-3">
        <div class="form-label d-flex justify-content-between align-items-center">
            <label>Tipe Kategori</label>
            <i class="bi bi-chevron-down chevron-icon"
            id="kategoriChevron"
            role="button"
            onclick="toggleKategoriCollapse()"
            style="cursor: pointer;"></i>
        </div>
        {{-- <div class="collapse @if(!empty($selectedKategori) || !empty($kategoriOptions)) show @endif" id="kategoriCollapse"> --}}
        <div class="collapse" id="kategoriCollapse" wire:ignore.self>
            @if (!empty($kategoriOptions))
                @foreach ($kategoriOptions as $index => $kategori)
                    <div class="form-check" wire:key="kategori-{{ $kategori }}">
                        <input type="checkbox" class="form-check-input custom-checkbox"
                            wire:model="selectedKategori"
                            value="{{ $kategori }}"
                            id="kategori_{{ $loop->index }}">
                        <label class="form-check-label" for="kategori_{{ $loop->index }}">{{ $kategori }}</label>
                    </div>
                @endforeach
            @else
                <div class="text-muted">Pilih Tipe Acara terlebih dahulu.</div>
            @endif
        </div>
    </div>
    <div class="mb-3">
        <label>Tag</label>
        <input type="text"
            class="form-control tag-input"
            wire:model="tagInput"
            wire:keydown.enter.prevent.stop="addTag"
            @keydown.enter.stop.prevent
            placeholder="Masukkan tag">
    </div>
    @if(!empty($tags))
        <div class="mb-3 tag-box d-flex flex-wrap gap-2">
            @foreach($tags as $index => $tag)
                <span class="badge" style="background-color: #133c6b">
                    {{ $tag }}
                    <button type="button" wire:click="removeTag({{ $index }})" class="btn-close btn-close-white btn-sm ms-1" aria-label="Close"></button>
                </span>
            @endforeach
        </div>
    @endif
    {{-- <button class="btn btn-outline-primary w-100" wire:click="loadEvents">Cari Agenda</button> --}}
</div>

@once
    @push('scripts')
        <script> 
            document.addEventListener('DOMContentLoaded', () => {
                syncChevronStates();
            });

            document.addEventListener('livewire:update', () => {
                syncChevronStates();
            });

            function syncChevronStates() {
                const tipeCollapse = document.getElementById('tipeAcaraCollapse');
                const tipeChevron = document.getElementById('tipeAcaraChevron');
                if (tipeCollapse?.classList.contains('show')) {
                    tipeChevron?.classList.add('rotate');
                } else {
                    tipeChevron?.classList.remove('rotate');
                }

                const kategoriCollapse = document.getElementById('kategoriCollapse');
                const kategoriChevron = document.getElementById('kategoriChevron');
                if (kategoriCollapse?.classList.contains('show')) {
                    kategoriChevron?.classList.add('rotate');
                } else {
                    kategoriChevron?.classList.remove('rotate');
                }
            }

            function toggleTipeAcaraCollapse() {
                const collapseEl = document.getElementById('tipeAcaraCollapse');
                const chevronEl = document.getElementById('tipeAcaraChevron');
                const instance = bootstrap.Collapse.getOrCreateInstance(collapseEl);
                collapseEl.classList.contains('show') ? instance.hide() : instance.show();
            }

            function toggleKategoriCollapse() {
                const collapseEl = document.getElementById('kategoriCollapse');
                const chevronEl = document.getElementById('kategoriChevron');
                const instance = bootstrap.Collapse.getOrCreateInstance(collapseEl);
                collapseEl.classList.contains('show') ? instance.hide() : instance.show();
            }
        </script>
    @endpush
@endonce