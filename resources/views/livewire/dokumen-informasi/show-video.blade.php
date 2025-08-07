<div>
    <div class="container py-5 animated-heading">
    <div class="col-12 mb-4 text-center">
        <h2>Video DPMPTSP Kota Tasikmalaya</h2>
        <h6>Jelajahi video kegiatan yang diselenggarakan</h6>
    </div>

    <div id="lightgallery-video" class="row g-3">
        @foreach ($videos as $vid)
        <div class="col-12 galeri-col"
            data-aos="fade-up"
            data-aos-duration="600"
            data-aos-delay="{{ $loop->index * 150 }}">>
            @if ($vid->video)
            <a 
                href="{{ asset('storage/' . $vid->video) }}" 
                class="gallery-video-item"
                data-aos="fade-up"
                data-lg-size="1280-720"
                data-sub-html="<h4>{{ $vid->judul }}</h4><p>{{ $vid->deskripsi }}</p>"
                data-lg-id="video-{{ $vid->id }}"
                data-video='{"source": [{"src":"{{ asset('storage/' . $vid->video) }}", "type":"video/mp4"}], "attributes": {"preload": false, "controls": true}}'>
                <div class="gallery-item-wrapper shadow-sm position-relative">
                    <img 
                        src="{{ $this->getThumbnail($vid) }}" 
                        class="galeri-img w-100" 
                        alt="{{ $vid->judul }}">
                    
                        <span class="magnify-btn">
                        <i class="bi bi-play-circle"></i>
                    </span>
                </div>
            </a>
            @elseif ($vid->videoUrl)
            <a 
                href="{{ $vid->videoUrl }}" 
                class="gallery-video-item"
                data-aos="fade-up"
                data-lg-size="1280-720"
                data-sub-html="<h4>{{ $vid->judul }}</h4><p>{{ $vid->deskripsi }}</p>"
                data-video='{"source": [{"src":"{{ $vid->videoUrl }}", "type":"youtube"}], "attributes": {"preload": false, "controls": true}}'>
                <div class="gallery-item-wrapper shadow-sm position-relative">
                    <img 
                        src="{{ $this->getThumbnail($vid) }}" 
                        class="galeri-img w-100" 
                        alt="{{ $vid->judul }}">
                    <span class="magnify-btn">
                        <i class="bi bi-play-circle"></i>
                    </span>
                </div>
            </a>
            @endif
        </div>
        @endforeach
    </div>
</div>

</div>

@push('scripts')
<script>
function initLightGalleryVideo() {
    const el = document.getElementById("lightgallery-video");
    if (el && !el.classList.contains('lg-initialized')) {
        lightGallery(el, {
            selector: '.gallery-video-item',
            plugins: [lgZoom, lgThumbnail, lgVideo], // tambahkan lgVideo
            speed: 300,
            download: false,
        });
    }
}

document.addEventListener("DOMContentLoaded", function () {
    initLightGalleryVideo();
});

document.addEventListener("livewire:load", function () {
    Livewire.hook('message.processed', () => {
        initLightGalleryVideo();
    });
});
</script>
@endpush

</div>