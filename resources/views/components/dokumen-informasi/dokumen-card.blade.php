@props(['judul', 'deskripsi', 'label', 'downloads', 'tanggal', 'id', 'file_path', 'iconClass'])

<div class="card shadow-sm p-3 dokumen-card">
    <div class="dokumen-flex-wrapper">
        <div class="dokumen-icon-wrapper">
            <i class="{{ $iconClass ?? 'bi bi-file-earmark' }}" style="font-size: 3rem;"></i>
        </div>
        <!-- Kanan: Konten -->
        <div class="dokumen-content">
            <div class="card-body">
                <!-- Label kecil -->
                <h6 class="dokumen-label">{{ $label }}</h6>
                <!-- Judul dan deskripsi -->
                <h5 class="dokumen-title mb-2">{{ $judul }}</h5>
                <p class="dokumen-desc mb-3 d-none d-sm-block">{{ $deskripsi }}</p>

                <!-- Info unduhan & tanggal -->
                <div class="d-flex flex-column flex-sm-row align-items-center mb-2 dokumen-meta">
                    <div class="me-4 d-flex align-items-center">
                        <i class="bi bi-download me-2"></i>
                        <span>{{ $downloads }} Unduhan</span>
                    </div>
                    <div class="d-flex align-items-center">
                        <span class="text-muted dokumen-label-tanggal">
                            Tanggal Publikasi: {{ $tanggal }}
                        </span>
                    </div>
                </div>

                <!-- Tombol -->
                @php
                    $isExternal = Str::startsWith($file_path, ['http://', 'https://']);
                    $fileUrl = $isExternal ? $file_path : asset('storage/'.$file_path);
                @endphp

                <div class="mt-3">
                    <button type="button" wire:click="lihatDetail({{ $id }})" class="btn btn-detail me-2">
                        <i class="bi bi-eye me-2"></i> Detail
                    </button>
                    <button type="button" wire:click="unduh({{ $id }})" class="btn btn-unduh">
                        <i class="bi bi-download me-2"></i> Unduh
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>