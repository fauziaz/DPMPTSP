@props([
    'judul' => '', 
    'label',
    'deskripsi' => '', 
    'file_path' => '', 
    'showDetail' => false, 
    'detailData' => null])

@if($showDetail && $detailData)
<div class="modal fade show d-block" tabindex="-1" style="background:rgba(0,0,0,0.5); z-index: 2000 !important;">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header flex-column align-items-start">
                <p class="text-uppercase modal-label mb-1">{{ $label }}</p>
                <h3 class="modal-title mb-0"> {{ $judul }} </h3>
                <button type="button" class="btn-close position-absolute end-0 top-0 m-3" wire:click="tutupDetail"></button>
            </div>
            <div class="modal-body">                    
                <!-- Deskripsi -->
                <div class="mb-4 row modal-info-grid text-start">
                    <div class="col-12 h-100 modal-info-item">
                    <i class="bi bi-info-circle modal-info-icon"></i>
                    <div>
                        <span class="modal-info-label">Deskripsi Dokumen</span>
                        <span class="modal-info-value mt-2">{{ $detailData->deskripsi }}</span>
                    </div>
                </div>
                <!-- Grid Informasi -->
                <div class="mb-4 row row-cols-1 row-cols-md-2 g-3 modal-info-grid text-start">
                    <div class="col modal-info-item">
                        <i class="bi bi-calendar-date modal-info-icon"></i>
                        <div>
                            <span class="modal-info-label">Tanggal Publikasi</span>
                            <span class="modal-info-value">
                            {{ \Carbon\Carbon::parse($detailData->tanggal)->locale('id')->translatedFormat('l, d F Y') }}
                            </span>
                        </div>
                    </div>
                    <div class="col modal-info-item">
                        <i class="bi bi-calendar3 modal-info-icon"></i>
                        <div>
                            <span class="modal-info-label">Tahun Dokumen</span>
                            <span class="modal-info-value">{{ $detailData->tahun }}</span>
                        </div>
                    </div>
                    <div class="col modal-info-item">
                        <i class="bi bi-file-earmark-text modal-info-icon"></i>
                        <div>
                            <span class="modal-info-label">Format Dokumen</span>
                            <span class="modal-info-value format">Portable Document Format ({{ strtoupper($detailData->format) }})</span>
                        </div>
                    </div>
                    <div class="col modal-info-item">
                        <i class="bi bi-tags modal-info-icon"></i>
                        <div>
                            <span class="modal-info-label">Tag</span>
                            <span class="modal-info-value">
                                @if(!empty($detailData->tag))
                                    {{ $detailData->tag }}
                                @else
                                    -
                                @endif
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer d-flex justify-content-end gap-2 flex-wrap flex-md-nowrap">
                <button type="button" wire:click="tutupDetail" class="btn btn-detail">
                    Tutup
                </button>
                <button wire:click="unduh({{ $detailData->id }})" class="btn btn-unduh">
                    <i class="bi bi-download me-2"></i> Lihat Dokumen
                </button>
            </div>
        </div>
    </div>
</div>
@endif
