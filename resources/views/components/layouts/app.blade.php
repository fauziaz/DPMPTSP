<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta content="" name="description">
    <meta content="" name="keywords">
    
    <title>{{ config('app.name', 'DPMPTSP Kota Tasikmalaya') }}</title>
    <link rel="icon" href="https://upload.wikimedia.org/wikipedia/commons/thumb/1/1e/Logo_Kota_Tasikmalaya.png/1201px-Logo_Kota_Tasikmalaya.png" type="image/png">

    <!-- External CSS Libraries -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/lightgallery@2.7.1/css/lightgallery-bundle.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide/dist/css/splide.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://unpkg.com/aos@2.3.4/dist/aos.css">
    <link href="https://cdn.jsdelivr.net/npm/tom-select/dist/css/tom-select.css" rel="stylesheet">

    <!-- Local CSS -->
    <link rel="stylesheet" href="{{ asset('css/carousel.css') }}">
    <link rel="stylesheet" href="{{ asset('css/navbar.css') }}">
    <link rel="stylesheet" href="{{ asset('css/card.css') }}">
    <link rel="stylesheet" href="{{ asset('css/content.css') }}">
    <link rel="stylesheet" href="{{ asset('css/sambutan.css') }}">
    <link rel="stylesheet" href="{{ asset('css/tentang-kami.css') }}">
    <link rel="stylesheet" href="{{ asset('css/profil-kadis.css') }}">
    <link rel="stylesheet" href="{{ asset('css/tab.css') }}">
    <link rel="stylesheet" href="{{ asset('css/agenda.css') }}">
    <link rel="stylesheet" href="{{ asset('css/berita.css') }}">
    <link rel="stylesheet" href="{{ asset('css/formberita.css') }}">
    <link rel="stylesheet" href="{{ asset('css/calendar.css') }}">
    <link rel="stylesheet" href="{{ asset('css/dokumen.css') }}">
    <link rel="stylesheet" href="{{ asset('css/footer.css') }}">
    <link rel="stylesheet" href="{{ asset('css/foto.css') }}">
    <link rel="stylesheet" href="{{ asset('css/galeri.css') }}">
    <link rel="stylesheet" href="{{ asset('css/modal.css') }}">
    <link rel="stylesheet" href="{{ asset('css/pengumuman.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/template.css') }}">
    <link rel="stylesheet" href="{{ asset('css/pengaduan.css') }}">

    @stack('styles')
    @livewireStyles
</head>
<body>  
    <livewire:navbar />
    
    <main>
        {{ $slot }}
    </main>

    <a href="#" class="back-to-top">
        <i class="bi bi-arrow-up"></i> Kembali ke Atas
    </a>

    <livewire:footer />

    <!-- External JS Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/lightgallery@2.7.1/lightgallery.umd.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/lightgallery@2.7.1/plugins/zoom/lg-zoom.umd.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/lightgallery@2.7.1/plugins/thumbnail/lg-thumbnail.umd.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.4/js/lightbox.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@splidejs/splide/dist/js/splide.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/tom-select/dist/js/tom-select.complete.min.js"></script>
    <script src="https://unpkg.com/alpinejs" defer></script>

    @livewireScripts
    @stack('scripts')

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // LightGallery init
            const galleryEl = document.getElementById('lightgallery-foto');
            if (galleryEl) {
                lightGallery(galleryEl, {
                    selector: '.gallery-item',
                    speed: 300,
                    download: false,
                    closable: true,
                    escKey: true,
                    hideBarsDelay: 0,
                    licenseKey: '0000-0000-000-0000',
                });
            }

            // AOS init
            AOS.init({ once: false });

            // TomSelect init
            new TomSelect('#pageDropdown', {
                create: false,
                sortField: { field: "text", direction: "asc" }
            });
        });
    </script>
</body>
</html>
