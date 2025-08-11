<div class="profil-pimpinan-page">
    <!-- Hero Section -->
    <x-template.hero-section
        background="{{ asset('https://blogger.googleusercontent.com/img/a/AVvXsEh2mwYKI8kIz6k7klv3_jgGlDLT7sOVSsJUmNl8pMKUFXm7Bj7EGCSkJ5dddNtwG1EuTzBQaiczmCkxz2AmVYeKHaT7B6hENTqTNmG0dqifoi4UQUIUR4pLXL-eu6UkBsZiPvaQ0IOa69yQzbSY9ywcFM5WLEam5IC7I9cqjcaKh6iG6_97KR3aIHEV=w640-h352') }}"
        :breadcrumbs="['Beranda' => '/']"
        title="Dokumen Evaluasi"
        subtitle="Laporan evaluasi kinerja dan capaian program DPMPTSP Kota Tasikmalaya"
    />

    <div class="section-wrapper" >
        <div class="container">
            <div class="content-card">
                <div class="row">
                    <!-- === KIRI: Sidebar Tahun === -->
                    <div class="col-md-3 mb-4">
                        <x-dokumen-informasi.sidebar-tahun 
                            judul="Dokumen Evaluasi"
                            :tahuns="$tahuns" 
                            :tahun-dipilih="$tahunDipilih"
                        />
                    </div>

                    {{-- === KANAN: Cari + Konten Regulasi === --}}
                    <div class="col-md-9">
                        {{-- Form Cari --}}
                        <x-dokumen-informasi.search-box 
                            model="search" 
                            perform="performSearch"
                        />

                        {{-- List Regulasi --}}
                        @if($evaluasis->count())
                            @foreach($evaluasis as $evaluasi)
                                <x-dokumen-informasi.dokumen-card 
                                    :judul="$evaluasi->judul"
                                    :deskripsi="$evaluasi->deskripsi"
                                    label="Dokumen Evaluasi"
                                    :downloads="$evaluasi->downloads"
                                    tanggal="{{ \Carbon\Carbon::parse($evaluasi->tanggal)->locale('id')->translatedFormat('l, d F Y') }}"
                                    :id="$evaluasi->id"
                                    :file_path="$evaluasi->file_path"
                                    :iconClass="$this->getIconClass($evaluasi->file_path)"
                                />
                            @endforeach
                        @else
                            {{-- tampilkan tidak ada dokumen yang dicari per tahun --}}
                            @if($isSearchClicked && $search != '')
                                <div class="alert text-center p-4" style="border-radius:10px; margin-bottom:100px">
                                    <div class="mb-2">
                                        <i class="bi bi-search" style="font-size: 3rem;"></i>
                                    </div>
                                    <div class="fw-bold mb-1" style="font-size: 1.1rem;">
                                        Mohon maaf kami tidak dapat menemukan nama dokumen yang cocok dengan
                                    </div>
                                    <div class="fw-bold mb-1" style="font-size: 1.1rem;">
                                        "{{ $search }}"
                                    </div>
                                    <div class="text-muted" style="font-size: 0.9rem;">
                                        Cobalah untuk menggunakan kata kunci yang berbeda.
                                    </div>
                                </div>
                            @else
                                {{-- tampilkan default tidak ada dokumen per tahun --}}
                                <div class="alert text-center p-4" style="border-radius:10px; margin-bottom:100px">
                                    <div class="mb-2">
                                        <i class="bi bi-folder-x" style="font-size: 3rem;"></i>
                                    </div>
                                    <div class="fw-bold mb-1" style="font-size: 1.1rem;">
                                        Belum ada dokumen untuk kategori ini
                                    </div>
                                    <div class="text-muted" style="font-size: 0.9rem;">
                                        Saat ini belum ada dokumen yang ada pada kategori ini, silakan menjelajahi kategori lainnya.
                                    </div>
                                </div>
                            @endif
                        @endif
                    </div>
                </div>
                <x-dokumen-informasi.pagination-control 
                :paginator="$evaluasis" 
                :per-page="$perPage"
                :current-page="$currentPage"
                :total="$total"
                :last-page="$lastPage"
                :show-page-dropdown="$showPageDropdown"
                :search-page="$searchPage"
                :show-per-page-dropdown="$showPerPageDropdown" 
                />
            </div>
        </div>
    </div>
    <x-dokumen-informasi.modal-detail
        :judul="$detailData?->judul" 
        label="Dokumen Evaluasi"
        :deskripsi="$detailData?->deskripsi"
        :file_path="$detailData?->file_path"
        :show-detail="$showDetail"
        :detail-data="$detailData"
    />
</div>