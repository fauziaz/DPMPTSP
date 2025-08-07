<div>
    <div class="berita-section text-white text-center d-flex"\
    style="background-image: url('{{ asset('image/gedung.jpg') }}');">
       <div class="container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-transparent justify-content-center">
                    <li class="breadcrumb-item">
                        <a href="/" class="text-white">Beranda</a>
                    </li>
                    <li class="breadcrumb-item active text-white" aria-current="page">Galeri</li>
                </ol>
            </nav>
            <h2 class="display-5 fw-bold">Galeri DPMPTSP Kota Tasikmalaya</h2>
            <p class="lead">Jelajahi galeri foto dan video kegiatan yang diselenggarakan</p>
        </div>
    </div>
    <div>
        <div class="container py-5">
            {{-- <div class="col-12 mb-4 text-center"> --}}
                {{-- <h2>Galeri DPMPTSP Kota Tasikmalaya</h2>
                <h6>Jelajahi galeri foto kegiatan yang diselenggarakan</h6> --}}
            {{-- </div> --}}
            <div id="lightgallery-galeri" class="row g-3">
                @foreach ($galeris as $item)
                <div class="col-lg-3 galeri-col"
                    data-aos="fade-up"
                    data-aos-duration="600"
                    data-aos-delay="{{ $loop->index * 150 }}">
                    <a 
                    href="{{ $item->gambar ? asset('storage/' . $item->gambar) : $item->gambarUrl }}"
                    class="gallery-item"
                    data-aos="fade-up"
                    data-lg-size="1600-1067"
                    data-sub-html="<h4>{{ $item->judul }}</h4><p>{{ $item->deskripsi }}</p>">
                        <div class="gallery-item-wrapper shadow-sm position-relative">
                            <img 
                                src="{{ $item->gambar ? asset('storage/' . $item->gambar) : $item->gambarUrl }}"
                                class="galeri-img w-100"
                                alt="{{ $item->judul }}">
                        
                            <!-- Lingkaran magnify di atas gambar -->
                            <span class="magnify-btn">
                                <i class="bi bi-search"></i>
                            </span>
                        </div>
                    </a>
                </div>
                @endforeach
            </div>
        </div>
        
        @push('scripts')
        <script>
        function initLightGallery() {
            const el = document.getElementById("lightgallery-galeri");
            if (el && !el.classList.contains('lg-initialized')) {
                lightGallery(el, {
                    selector: '.gallery-item',
                    plugins: [lgZoom, lgThumbnail],
                    speed: 100,
                });
            }
        }

        document.addEventListener("DOMContentLoaded", function () {
            initLightGallery();
        });

        document.addEventListener("livewire:load", function () {
            Livewire.hook('message.processed', () => {
                initLightGallery();
            });
        });
        </script>
        @endpush
    </div>
</div>