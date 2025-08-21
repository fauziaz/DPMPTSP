<div>
<div id="carouselExampleIndicators" class="carousel slide position-relative" data-bs-ride="carousel">
    <div class="position-absolute top-0 start-0 w-100 h-100"
     style="background-color: rgba(0, 0, 0, 0.6); z-index: 2; pointer-events: none;"></div>
    <div class="carousel-caption text-white">
        <h1 class="animated-heading">Dinas Penanaman Modal dan Pelayanan Terpadu Satu Pintu</h1>
        <h4 class="animated-heading">Terwujudnya Pelayanan Perizinan yang Profesional untuk Mendorong Iklim Investasi di Kota Tasikmalaya</h4>
    </div>

    <div class="carousel-inner">
    @foreach ($carouselImages as $index => $img)
        <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
            <img src="{{ 
                filled($img->image_path) 
                    ? asset('storage/' . $img->image_path) 
                    : ($img->image_url ?? '') 
            }}" 
            class="d-block w-100" 
            style="border-radius: 0;" 
            alt="Slide {{ $index + 1 }}">
            
            @if($img->caption_title || $img->caption_subtitle)
            <div class="carousel-caption d-none d-md-block">
                <h5>{{ $img->caption_title }}</h5>
                <p>{{ $img->caption_subtitle }}</p>
            </div>
            @endif
        </div>
    @endforeach
    </div>

     <div class="carousel-indicators">
        @foreach ($carouselImages as $index => $img)
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="{{ $index }}" class="{{ $index == 0 ? 'active' : '' }}" aria-label="Slide {{ $index + 1 }}"></button>
        @endforeach
    </div>

    {{-- <!-- Carousel Items -->
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="https://dpmptsp.tasikmalayakota.go.id/public_html/desktop/assets/prof1.jpg"
            class="d-block w-100" style="border-radius: 0;" alt="Slide 1">
        </div>
        <div class="carousel-item">
            <img src="https://images.unsplash.com/photo-1743595271973-20d58856167e?q=80&w=1032&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" 
            class="d-block w-100" style="border-radius: 0;" alt="Slide 2">
        </div>
        <div class="carousel-item">
            <img src="https://images.unsplash.com/photo-1743595271977-05a4f3a79b03?q=80&w=1032&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" 
            class="d-block w-100" style="border-radius: 0;" alt="Slide 3">
        </div>
    </div> --}}

        <!-- Indicators -->
    {{-- <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" aria-label="Slide 1" class="active"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div> --}}

    <!-- Tombol Navigasi -->
    <button class="carousel-control-prev custom-arrow" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
        <i class="fa-solid fa-angle-left"></i>
    </button>
    <button class="carousel-control-next custom-arrow" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
        <i class="fa-solid fa-angle-right"></i>
    </button>

</div>
    {{-- <div class="splide position-relative">
        <div class="splide__track">
            <ul class="splide__list">
                <li class="splide__slide">
                    <img src="https://images.unsplash.com/photo-1743595271988-8e8ca0e9b6ef?q=80&w=1032&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                    class="img-fluid w-100 h-100 object-fit-cover" alt="Slide 1">
                </li>
                <li class="splide__slide">
                    <img src="https://images.unsplash.com/photo-1743597079095-f21680993bcf?q=80&w=870&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" 
                    class="img-fluid w-100 h-100 object-fit-cover" alt="Slide 2">
                </li>
                <li class="splide__slide">
                    <img src="https://assets.promediateknologi.id/crop/0x0:0x0/750x500/webp/photo/2022/10/12/1792535773.jpeg" 
                    class="img-fluid w-100 h-100 object-fit-cover" alt="Slide 3">
                </li>
            </ul>
        </div>

        <div class="slider-controls
        d-flex align-items-center position-absolute bottom-0 start-50 translate-middle-x px-3 py-2 bg-dark bg-opacity-50 rounded-pill">
            <button type="button" class="btn btn-sm btn-light rounded-circle me-3 splide_arrow splide_arrow--prev">
                <i class="bi bi-chevron-left"></i>
            </button>
            <div class="slider-progress-wrap flex-grow-1 d-flex align-items-center gap-3">
                <div class="my-slider-progress bg-secondary flex-grow-1 rounded-pill" style="height:2px;">
                    <div class="my-slider-progress-bar bg-success" style="height:2px;width:0;"></div>
                </div>
                <div class="slider-index text-white fw-semibold small">
                    <span id="current-index">01</span> / <span id="total-index">03</span>
                </div>
            </div>
            <button type="button" class="btn btn-sm btn-light rounded-circle ms-3 splide_arrow splide_arrow--next">
                <i class="bi bi-chevron-right"></i>
            </button>
        </div>
    </div> --}}

    {{-- <script>
    document.addEventListener('DOMContentLoaded', function () {
        var splide = new Splide('.splide', {
            type   : 'loop',    // opsional: bikin loop
            perPage: 1,         // opsional: berapa per slide
            autoplay: true,     // opsional: jalan otomatis
            arrows: false,      // 🔥 matikan arrow bawaan
            pagination: false,  // 🔥 matikan pagination bawaan
        });
        
        var bar = splide.root.querySelector('.my-slider-progress-bar');
        var currentIndex = document.getElementById('current-index');
        var totalIndex   = document.getElementById('total-index');
        
        splide.on('mounted move', function () {
            var end  = splide.Components.Controller.getEnd() + 1;
            var rate = Math.min((splide.index + 1) / end, 1);
            bar.style.width = String(100 * rate) + '%';

            currentIndex.textContent = String(splide.index + 1).padStart(2, '0');
            totalIndex.textContent = String(end).padStart(2, '0');
        });
        
        splide.mount();

        document.querySelector('.splide__arrow--prev').addEventListener('click', function () {
            splide.go('<');
        });
        document.querySelector('.splide__arrow--next').addEventListener('click', function () {
            splide.go('>');
        });
    });
    </script> --}}
    
    <livewire:beranda.sambutan />
    <livewire:beranda.layanan />
    <livewire:beranda.pendaftaran />
    <livewire:beranda.berita-beranda />
    <livewire:beranda.galeri-beranda />
    <livewire:beranda.pengumuman/>
</div>
