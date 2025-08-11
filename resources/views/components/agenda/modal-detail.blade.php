@if($showDetail && $detailData)
<div class="modal fade show d-block" tabindex="-1" style="background:rgba(0,0,0,0.5);">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            {{-- <div class="modal-content"> --}}
            <div class="modal-header agenda-modal-header flex-column align-items-start">
                {{-- <p class="text-uppercase modal-label mb-1">
                    Detail Agenda
                </p> --}}
                <h4 class="modal-title mb-0">
                    {{ $detailData->judul }}
                </h4>
                <button type="button" class="btn-close position-absolute end-0 top-0 m-3"
                    wire:click="tutupDetail"></button>
            </div>
            <div class="modal-body">
                {{-- Gambar jika ada --}}
                @if(!empty($detailData->url_gambar) || !empty($detailData->path_gambar))
                <div class="mb-4 text-center w-100">
                    <img 
                        src="{{ 
                            !empty($detailData->url_gambar) 
                            ? $detailData->url_gambar 
                            : asset('storage/' . $detailData->path_gambar) 
                        }}" 
                        class="img-fluid rounded" 
                        alt="Gambar Agenda" 
                    >
                </div>
                @endif

                <div class="mb-4 row modal-info-grid text-start">
                    {{-- Baris 1: 2 kolom --}}
                    <div class="row g-3">
                        <div class="col-4 col-md-5 modal-info-item">
                            <i class="bi bi-folder modal-info-icon"></i>
                            <div>
                                <span class="modal-info-label">Kategori Event</span>
                                <span class="badge badge-kategori" style="background-color: #e3f2fd !important; color: #133c6b !important;">
                                    {{ $detailData->kategori }}
                                </span>                            
                            </div>
                        </div>
                        <div class="col-4 col-md-4 modal-info-item">
                            {{-- <i class="bi bi-folder modal-info-icon"></i> --}}
                            <div>
                                <span class="modal-info-label">Tipe Event</span>
                                <span class="badge bg-info">
                                    {{ $detailData->tipe_event ? ucfirst($detailData->tipe_event->value) : '-' }}
                                </span>
                            </div>
                        </div>
                    </div>

                    {{-- Baris 2: 2 kolom --}}
                    <div class="row g-3 ">
                        <div class="col-4 col-md-5 modal-info-item">
                            <i class="bi bi-info-circle modal-info-icon"></i>
                            <div>
                                <span class="modal-info-label">Sifat Acara</span>
                                <span class="badge bg-info">
                                    {{ $detailData->sifat_acara ? ucfirst($detailData->sifat_acara->value) : '-' }}
                                </span>
                            </div>
                        </div>
                        <div class="col-4 col-md-4 modal-info-item">
                            {{-- <i class="bi bi-folder modal-info-icon"></i> --}}
                            <div>
                                <span class="modal-info-label">Tipe Acara</span>
                                <span class="badge badge-kategori" style="background-color: #e3f2fd !important; color: #133c6b !important;">
                                    {{ $detailData->tipe_acara }}
                                </span>
                            </div>
                        </div>
                    </div>

                    {{-- Baris 3: 3 kolom --}}
                    <div class="row g-3 ">
                        <div class="col-4 col-md-5 modal-info-item">
                            <i class="bi bi-calendar modal-info-icon"></i>
                            <div>
                                <span class="modal-info-label">Tanggal</span>
                                <span class="modal-info-value">{{ \Carbon\Carbon::parse($detailData->tanggal)->translatedFormat('l, d F Y') }}</span>
                            </div>
                        </div>
                        <div class="col-4 col-md-4 modal-info-item">
                            {{-- <i class="bi bi-folder modal-info-icon"></i> --}}
                            <div>
                                <span class="modal-info-label">Waktu</span>
                                <span class="modal-info-value">
                                    {{ \Carbon\Carbon::parse($detailData->waktu_mulai)->format('H:i') }} - 
                                    {{ \Carbon\Carbon::parse($detailData->waktu_selesai)->format('H:i') }} WIB
                                </span>
                            </div>
                        </div>
                        <div class="col-4 col-md-3 modal-info-item">
                            <div>
                                <span class="badge {{ match($detailData->status_dinamis) {
                                    'Belum Dimulai' => 'bg-danger',
                                    'Berlangsung' => 'bg-success',
                                    'Selesai' => 'bg-primary',
                                    default => 'bg-dark',
                                } }}">
                                    {{ $detailData->status_dinamis }}
                                </span>
                            </div>
                        </div>
                    </div>

                    <div class="row g-3">
                        <div class="col-12 col-md-12 modal-info-item">
                            <i class="bi bi-file-text modal-info-icon"></i>
                            <div>
                                <span class="modal-info-label">Deskripsi</span>
                                <span class="modal-info-value">
                                    {{ $detailData->deskripsi ?? '-' }}
                                </span>
                            </div>
                        </div>
                    </div>

                    <div class="row g-3 ">
                        <div class="col-12 modal-info-item">
                            <i class="bi bi-link modal-info-icon"></i>
                            <div>
                                <span class="modal-info-label">Link Acara</span>
                                <span class="modal-info-value">
                                    {{ $detailData->link_acara ?? '-' }}
                                </span>
                            </div>
                        </div>
                    </div>

                    <div class="row g-3 ">
                        <div class="col-12 modal-info-item">
                            <i class="bi bi-globe modal-info-icon"></i>
                            <div>
                                <span class="modal-info-label">Website</span>
                                <span class="modal-info-value">
                                    {{ $detailData->website ?? '-' }}
                                </span>
                            </div>
                        </div>
                    </div>

                    <div class="row g-3 ">
                        <div class="col-12 modal-info-item">
                            <i class="bi bi bi-pin-map-fill	modal-info-icon"></i>
                            <div>
                                <span class="modal-info-label">Tempat Pelaksanaan</span>
                                <span class="modal-info-value">
                                    {{ $detailData->lokasi ?? '-' }}
                                </span>
                            </div>
                        </div>
                    </div>

                    <div class="row g-3  mb-4">
                        <div class="col-12 modal-info-item">
                            <i class="bi bi bi-pin-map-fill	modal-info-icon"></i>
                            <div>
                                <span class="modal-info-label">Google Map</span>
                                <span class="modal-info-value">
                                    {{ $detailData->google_map ?? '-' }}
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer agenda-modal-footer d-flex justify-content-end flex-wrap">
                <button type="button" wire:click="tutupDetail" class="btn btn-secondary">
                    Tutup
                </button>
            </div>
        </div>
    </div>
</div>
@endif
