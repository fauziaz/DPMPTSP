<div>
    <div class="container py-5">
        <div class="col-12 mb-4 text-center">
            <h2>Pengumuman DPMPTSP Kota Tasikmalaya</h2>
            <h6>Informasi terbaru seputar layanan dan kebijakan</h6>
        </div>
        <div id="lightgallery-pengumuman" class="row g-3 justify-content-center">
            @foreach($pengumumans as $pengumuman)
            <div class="col-lg-4 pengumuman-col"
                data-aos="fade-up"
                data-aos-duration="600"
                data-aos-delay="{{ $loop->index * 150 }}">
                <a 
                href="{{ $pengumuman['image'] }}" 
                class="gallery-item"
                data-lg-size="1600-1067"
                data-sub-html="<h4>{{ $pengumuman['title'] }}</h4><p>{{ $pengumuman['description'] }}</p>">
                    <div class="gallery-item-wrapper shadow-sm position-relative">
                        <img 
                        src="{{ $pengumuman['image'] }}"
                        alt="{{ $pengumuman['title'] }}"
                        class="img-fluid w-100 pengumuman-img" />
                        <span class="magnify-btn">
                            <i class="bi bi-search"></i>
                        </span>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
    </div>

    {{-- @if($galeris->count() >= $take)
        <div class="text-end mt-4">
            <a href="galeri/show-galeri">
                <button class="btn btn-custom-lainnya">
                    Tampilkan Lebih Banyak
                    <i class="bi bi-arrow-up-right ms-2"></i>
                </button>
            </a>
        </div>
    @endif --}}
</div>

@push('scripts')
<script>
    function initLightGallery() {
        const el = document.getElementById("lightgallery-pengumuman");
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
