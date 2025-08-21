<div class="profil-pimpinan-page">

  <!-- Hero Section -->
  <div class="hero-section text-white text-center d-flex" style="background-image: url('{{ asset('image/gedung.jpg') }}');">
    <div class="container">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-transparent justify-content-center">
          <li class="breadcrumb-item"><a href="/" class="text-white">Beranda</a></li>
          <li class="breadcrumb-item active text-white" aria-current="page">Visi Misi</li>
        </ol>
      </nav>
      <h2 class="display-5 fw-bold">Visi Misi DPMPTSP Kota Tasikmalaya</h2>
      <p class="lead">DPMPTSP Tasikmalaya diarahkan oleh visi dan misi yang menjadi landasan dalam perumusan kebijakan dan pelaksanaan pelayanan publik.</p>
    </div>
  </div>

  <div class="section-wrapper">
    <div class="container">
      <div class="content-card">

        <!-- Konten Visi & Misi -->
        <div class="row gy-4">

          <!-- Visi -->
          <div class="col-12">
              <div class="bg-light rounded shadow-sm p-4 h-100">
                  <h5 class="fw-bold text-profil-judul mb-3">
                      <i class="bi bi-binoculars text-profil-judul fs-4"></i> Visi
                  </h5>
                  {!! $visiMisi->visi ?? '' !!}
              </div>
          </div>

          <!-- Misi -->
          <div class="col-12">
              <div class="bg-white rounded shadow-sm p-4 h-100 border">
                  <h5 class="fw-bold text-profil-judul mb-3">
                      <i class="bi bi-flag text-profil-judul fs-4"></i> Misi
                  </h5>
                  {!! $visiMisi->misi ?? '' !!}
              </div>
          </div>

        </div>

      </div>
    </div>
  </div>
  
</div>
