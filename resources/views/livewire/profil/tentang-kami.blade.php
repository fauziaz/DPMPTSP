<div class="profil-pimpinan-page">

  <!-- Hero Section -->
  <div class="hero-section text-white text-center d-flex" style="background-image: url('{{ asset('image/gedung.jpg') }}');">
    <div class="container">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-transparent justify-content-center">
          <li class="breadcrumb-item"><a href="/" class="text-white">Beranda</a></li>
          <li class="breadcrumb-item active text-white" aria-current="page">Tentang Kami</li>
        </ol>
      </nav>
      <h2 class="display-5 fw-bold">Profil DPMPTSP Kota Tasikmalaya</h2>
      <p class="lead">DPMPTSP Tasikmalaya DPMPTSP mempunyai tugas membantu kepala daerah melaksanakan urusan pemerintahan di bidang penanaman modal dan pelayanan terpadu satu pintu.</p>
    </div>
  </div>

  <!-- Profil Instansi -->
  <div class="section-wrapper py-5">
    <div class="container">
      <div class="content-card">
        <div class="row align-items-center">
          <!-- Foto Profil -->
          <div class="col-md-4 text-center mb-4 mb-md-0">
            <img 
              src="{{ $tentangKami?->profil_image_url 
                      ?? ($tentangKami?->profil_image 
                          ? Storage::url($tentangKami->profil_image) 
                          : asset('image/prof.jpg')) }}" 
              alt="Profil Instansi" 
              class="profil-photo img-fluid rounded shadow-sm">
          </div>

          <!-- Judul & Deskripsi -->
          <div class="col-md-8">
            <div class="p text-center text-md-start">
              <h5 class="mt-2 fw-bold">{{ $tentangKami?->profil_title ?? 'Judul Profil Belum Ada' }}</h5><br>
              <div style="text-align: justify;">
                {!! $tentangKami?->profil_description ?? '<p>Deskripsi belum tersedia.</p>' !!}
              </div>
            </div>
          </div>

          <!-- Card Gabungan: Maklumat & Motto -->
          <div class="card border-0 mt-5">
            <div class="card-body">
              <div class="row g-4">
                <!-- Maklumat -->
                <div class="col-md-6">
                  <div class="d-flex align-items-center mb-2">
                    <div class="p-2 rounded me-2">
                      <i class="bi bi-file-earmark-text fs-4 text-profil-judul"></i>
                    </div>
                    <h5 class="mb-0">Maklumat Pelayanan</h5>
                  </div>
                  <div class="lightbox-wrapper">
                    <img 
                      src="{{ $tentangKami?->maklumat_image_url 
                              ?? ($tentangKami?->maklumat_image 
                                  ? Storage::url($tentangKami->maklumat_image) 
                                  : asset('image/maklumat.jpg')) }}" 
                      class="img-fluid zoom-img" 
                      alt="Maklumat Pelayanan">
                    <div class="lightbox-hover-overlay">
                      <span class="magnifier-icon"><i class="bi bi-zoom-in"></i></span>
                    </div>
                  </div>
                </div>

                <!-- Motto -->
                <div class="col-md-6">
                  <div class="d-flex align-items-center mb-2">
                    <div class="p-2 rounded me-2">
                      <i class="bi bi-lightbulb fs-4 text-profil-judul"></i>
                    </div>
                    <h5 class="mb-0">Motto Layanan</h5>
                  </div>
                  <div class="lightbox-wrapper">
                    <img 
                      src="{{ $tentangKami?->motto_image_url 
                              ?? ($tentangKami?->motto_image 
                                  ? Storage::url($tentangKami->motto_image) 
                                  : asset('image/motto.jpg')) }}" 
                      class="img-fluid zoom-img" 
                      alt="Motto Layanan">
                    <div class="lightbox-hover-overlay">
                      <span class="magnifier-icon"><i class="bi bi-zoom-in"></i></span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
  <!-- Lightbox Modal -->
<div class="custom-lightbox" id="customLightbox">
  <span class="close-lightbox" id="closeLightbox">&times;</span>
  <img class="lightbox-image" id="lightboxImage" src="" alt="Fullscreen Image">
</div>
</div>
</div>

<script>
  document.addEventListener("DOMContentLoaded", function () {
    // === Lightbox ===
    const zoomImgs = document.querySelectorAll('.zoom-img');
    const lightbox = document.getElementById('customLightbox');
    const lightboxImg = document.getElementById('lightboxImage');
    const closeBtn = document.getElementById('closeLightbox');

    let zoomLevel = 1;
    const minZoom = 1;
    const maxZoom = 2.5;
    const zoomStep = 0.5;

    function applyZoom() {
      lightboxImg.style.transform = `scale(${zoomLevel})`;
      lightboxImg.style.cursor = zoomLevel >= maxZoom ? 'zoom-out' : 'zoom-in';
    }

    zoomImgs.forEach(img => {
      img.addEventListener('click', () => {
        lightboxImg.src = img.src;
        lightbox.classList.add('active');
        zoomLevel = 1;
        applyZoom();
      });
    });

    closeBtn.addEventListener('click', () => {
      lightbox.classList.remove('active');
      lightboxImg.src = '';
    });

    lightbox.addEventListener('click', (e) => {
      if (e.target === lightbox) {
        lightbox.classList.remove('active');
        lightboxImg.src = '';
      }
    });

    // Klik gambar → zoom in/out bertahap
    lightboxImg.addEventListener('click', (e) => {
      e.stopPropagation();

      if (zoomLevel < maxZoom) {
        zoomLevel += zoomStep;
      } else {
        zoomLevel = minZoom;
      }
      applyZoom();
    });
  });
</script>
