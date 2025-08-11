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
    <div class="container py-4">
        <div class="col-12 mb-4 text-center">
            <h3 class="text-decoration-underline">Galeri</h3>
        </div>

        <div id="lightgallery-foto" class="row g-3">
            @foreach ($galeris as $item)
            <div class="col-lg-3 galeri-col" data-aos="fade-up" data-aos-delay="{{ $loop->index * 150 }}">
                <a
                    href="{{ $item->gambar ? asset('storage/' . $item->gambar) : $item->gambarUrl }}"
                    class="gallery-item"
                    data-lg-size="1600-1067"
                    data-sub-html="<h4>{{ $item->judul }}</h4><p>{{ $item->deskripsi }}</p>">
                    <div class="gallery-item-wrapper shadow-sm position-relative">
                        <img
                            src="{{ $item->gambar ? asset('storage/' . $item->gambar) : $item->gambarUrl }}"
                            class="galeri-img w-100"
                            alt="{{ $item->judul }}">
                        <span class="magnify-btn">
                            <i class="bi bi-search"></i>
                        </span>
                    </div>
                </a>
            </div>
            @endforeach
        </div>

        @if($galeris->count() >= $take)
        <div class="text-end mt-4">
            <a href="{{ url('dokumen-informasi/show-galeri') }}">
                <button class="btn btn-custom-lainnya">
                    Tampilkan Semua Foto
                    <i class="bi bi-arrow-up-right ms-2"></i>
                </button>
            </a>
        </div>
        @endif

        <div class="col-12 mb-4 text-center">
            <h3 class="text-decoration-underline">Video</h3>
        </div>

        <div id="lightgallery-video" class="row g-3">
            @foreach ($videos as $video)
            <div class="col-lg-3 galeri-col" data-aos="fade-up" data-aos-delay="{{ $loop->index * 150 }}">
                @if ($video->video)
                <a 
                    href="{{ asset('storage/' . $video->video) }}" 
                    class="gallery-video-item"
                    data-aos="fade-up"
                    data-lg-size="1280-720"
                    data-sub-html="<h4>{{ $video->judul }}</h4><p>{{ $video->deskripsi }}</p>"
                    data-lg-id="video-{{ $video->id }}"
                    data-video='{"source": [{"src":"{{ asset('storage/' . $video->video) }}", "type":"video/mp4"}], "attributes": {"preload": false, "controls": true}}'>
                    <div class="gallery-item-wrapper shadow-sm position-relative">
                        <img 
                            src="{{ $this->getThumbnail($video) }}" 
                            class="galeri-img w-100" 
                            alt="{{ $video->judul }}">
                        <span class="magnify-btn">
                            <i class="bi bi-play-circle"></i>
                        </span>
                    </div>
                </a>
                @elseif ($video->videoUrl)
                <a 
                    href="{{ $video->videoUrl }}" 
                    class="gallery-video-item"
                    data-aos="fade-up"
                    data-lg-size="1280-720"
                    data-sub-html="<h4>{{ $video->judul }}</h4><p>{{ $video->deskripsi }}</p>"
                    data-video='{"source": [{"src":"{{ $video->videoUrl }}", "type":"youtube"}], "attributes": {"preload": false, "controls": true}}'>
                    <div class="gallery-item-wrapper shadow-sm position-relative">
                        <img 
                            src="{{ $this->getThumbnail($video) }}" 
                            class="galeri-img w-100" 
                            alt="{{ $video->judul }}">
                        <span class="magnify-btn">
                            <i class="bi bi-play-circle"></i>
                        </span>
                    </div>
                </a>
                @endif
            </div>
            @endforeach
        </div>

        @if($videos->count() >= $take)
        <div class="text-end mt-4">
            <a href="{{ url('dokumen-informasi/show-video') }}">
                <button class="btn btn-custom-lainnya">
                    Tampilkan Semua Video
                    <i class="bi bi-arrow-up-right ms-2"></i>
                </button>
            </a>
        </div>
        @endif
    </div>
  </div>
</div>