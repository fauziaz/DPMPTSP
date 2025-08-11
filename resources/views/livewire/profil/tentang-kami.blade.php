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
          <!-- Foto -->
          <div class="col-md-4 text-center mb-4 mb-md-0">
            <img src="{{ asset('image/prof.jpg') }}" alt="Dinas Penanaman Modal dan Pelayanan Terpadu Satu Pintu" class="profil-photo img-fluid rounded shadow-sm">
          </div>

          <!-- Teks -->
          <div class="col-md-8">
            <div class="p text-center text-md-start">
              <h5 class="mt-2 fw-bold">Dinas Penanaman Modal dan Pelayanan Terpadu Satu Pintu</h5><br>
              <p>
                Dinas Penanaman Modal dan Pelayanan Terpadu Satu Pintu (DPMPTSP) Kota Tasikmalaya merupakan lembaga yang memegang peranan dan fungsi strategis di bidang penyelenggaraan pelayanan perizinan terpadu Kota Tasikmalaya.
                <br>
                Secara umum tugas pokok DPMPTSP adalah menyelenggarakan urusan pemerintahan bidang penanaman modal dan pelayanan terpadu satu pintu. Tugas dan rincian diatur lewat Perwali No. 67 Tahun 2021.
                <br>
                Berdasarkan Perwali No. 50 Tahun 2021, DPMPTSP menyelenggarakan 50 jenis layanan. Selengkapnya dapat diakses di 
                <a href="https://sispek.tasikmalayakota.go.id/front/pelayananutama/23" target="_blank" class="text-decoration-none text-primary">halaman layanan</a>.
                <br>
                Jumlah pegawai sebanyak 38 orang, terdiri dari 29 PNS dan 9 Non PNS. Lihat lebih lanjut di 
                <a href="{{ url('/profile-pelaksana') }}" target="_blank" class="text-decoration-none text-primary">profil penyelenggara</a>.
              </p>
            </div>
          </div>
            <!-- Card Gabungan: Maklumat & Motto tanpa border -->
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
                    <div class="img-zoom-container">
                      <a href="{{ asset('image/maklumat.jpg') }}" class="glightbox" data-gallery="profil">
                        <img src="{{ asset('image/maklumat.jpg') }}" class="img-fluid rounded" alt="Maklumat Pelayanan">
                        <i class="bi bi-search img-zoom-icon"></i>
                      </a>
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
                    <img src="{{ asset('image/motto.jpg') }}" class="img-fluid rounded" alt="Motto Layanan">
                  </div>
                </div>
              </div>
            </div>
        </div>
      </div>

    </div>
  </div>
  
</div>

<script>
  const lightbox = GLightbox({
    selector: '.glightbox'
    touchNavigation: true,
    loop: true,
    closeButton: true,
  });
</script>
