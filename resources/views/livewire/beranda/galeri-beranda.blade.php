<div>
    <div class="container py-5">
        <div class="col-12 mb-4 text-center">
            <h2>Galeri DPMPTSP Kota Tasikmalaya</h2>
            <h6>Jelajahi galeri foto kegiatan yang diselenggarakan</h6>
        </div>
        <div id="lightgallery-foto" class="row g-3">
            @foreach ($galeris as $item)
            <div class="col-lg-3 galeri-col"
                data-aos="fade-up"
                data-aos-duration="600"
                data-aos-delay="{{ $loop->index * 150 }}">
                <div class="gallery-item-wrapper-beranda shadow-sm position-relative overflow-hidden zoom-hover">
                    <img
                        src="{{ $item->gambar ? asset('storage/' . $item->gambar) : $item->gambarUrl }}"
                        class="galeri-img w-100"
                        alt="{{ $item->judul }}">
                </div>
            </div>
            @endforeach
        </div>

        @if($galeris->count() >= $take)
        <div class="text-end mt-4">
            <a href="{{ url('dokumen-informasi/galeri') }}">
                <button class="btn btn-custom-lainnya">
                    Tampilkan Lebih Banyak
                    <i class="bi bi-box-arrow-up-right ms-2"></i>
                </button>
            </a>
        </div>
        @endif
    </div>
</div>
