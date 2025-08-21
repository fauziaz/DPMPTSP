<div class="profil-pimpinan-page">

  <!-- Hero Section -->
  <div class="hero-section text-white text-center d-flex" style="background-image: url('{{ asset('image/gedung.jpg') }}');">
    <div class="container">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-transparent justify-content-center">
          <li class="breadcrumb-item"><a href="/" class="text-white">Beranda</a></li>
          <li class="breadcrumb-item active text-white" aria-current="page">Tugas Pokok & Fungsi</li>
        </ol>
      </nav>
      <h2 class="display-5 fw-bold">Tugas Pokok & Fungsi DPMPTSP Kota Tasikmalaya</h2>
      <p class="lead">DPMPTSP Tasikmalaya diberikan kewenangan menjalankan tugas pokok dan fungsi dalam bidang penanaman modal serta pelayanan perizinan secara terintegrasi.</p>
    </div>
  </div>

  <div class="section-wrapper">
    <div class="container">
      <div class="content-card">

        <!-- Konten Tugas Pokok & Fungsi -->
        <div class="row gy-4 mb-5">

          <!-- Tugas Pokok -->
          <div class="col-12">
            <div class="bg-light rounded shadow-sm p-4 h-100">
              <h5 class="fw-bold text-profil-judul mb-3"><i class="bi bi-journal-check text-profil-judul fs-4"></i> Tugas Pokok</h5>
                {!! $tupoksi->tugas_pokok ?? '' !!}
            </div>
          </div>

          <!-- Fungsi -->
          <div class="col-12">
            <div class="bg-white rounded shadow-sm p-4 h-100 border">
              <h5 class="fw-bold text-profil-judul mb-3"><i class="bi bi-gear fs-4 text-profil-judul"></i> Fungsi</h5>
                {!! $tupoksi->fungsi ?? '' !!}
            </div>
          </div>

        </div>

      </div>
    </div>
  </div>
  
</div>
