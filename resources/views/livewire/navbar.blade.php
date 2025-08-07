<div>
<nav class="navbar navbar-expand-lg navbar-dark shadow-sm fixed-top">
  <div class="container mt-2-fluid">

    <!-- Logo -->
    <a class="navbar-brand d-flex align-items-center" href="{{ url('/') }}">
      <img src="{{ asset('image/logo-dpmptsp-tasikmalaya.png') }}" alt="Logo DPMPTSP" height="40" class="me-2">
    </a>

    <!-- Toggle Button -->
    <button class="bg-transparent border-0 text-white d-lg-none" id="sidebarToggle" type="button">
      <i class="fas fa-bars"></i>
    </button>

    <!-- Navbar Menu -->
    <div class="collapse navbar-collapse " id="navbarMain">
      <ul class="navbar-nav gap-2 ms-auto">

        <li class="nav-item"><a class="nav-link" href="{{ url('/') }}">Beranda</a></li>

        <li class="nav-item dropdown">
        <a class="nav-link d-flex justify-content-between align-items-center" 
          href="#" 
          id="dropdown1" 
          role="button" 
          data-bs-toggle="dropdown" 
          aria-expanded="false">
          Profil
          <i class="fas fa-chevron-down ms-2 rotate-icon"></i>
        </a>
          <ul class="dropdown-menu custom-blur" aria-labelledby="dropdown1">
            <li><a class="dropdown-item" href="{{ url('/tentang-kami') }}">Tentang Kami</a></li>
            <li><a class="dropdown-item" href="{{ url('/profil-kadis') }}">Profil Kepala Dinas</a></li>
            <li><a class="dropdown-item" href="{{ url('/visi-misi') }}">Visi Misi</a></li>
            <li><a class="dropdown-item" href="{{ url('/tupoksi') }}">Tugas Pokok & Fungsi</a></li>
            <li><a class="dropdown-item" href="{{ url('/struktur-organisasi') }}">Struktur Organisasi</a></li>
          </ul>
        </li>

        <!-- <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="dropdown2" role="button" data-bs-toggle="dropdown"
             aria-expanded="false">PELAYANAN PERIZINAN</a>
          <ul class="dropdown-menu" aria-labelledby="dropdown2">
            <li><a class="dropdown-item" href="https://oss.go.id/" target="_blank">OSS</a></li>
            <li><a class="dropdown-item" href="https://new.sipentas.tasikmalayakota.go.id/" target="_blank">Sipentas</a></li>
            <li><a class="dropdown-item" href="https://oss.go.id/regulasi" target="_blank">Regulasi</a></li>
            <li><a class="dropdown-item" href="http://sispek.tasikmalayakota.go.id/front/detailpelayanan/23" target="_blank">Standar Pelayanan</a></li>
            <li><a class="dropdown-item" href="{{ url('/data-izin-terbit') }}">Data Izin Terbit</a></li>
          </ul>
        </li> -->

        <li class="nav-item dropdown">
        <a class="nav-link d-flex justify-content-between align-items-center" 
          href="#" 
          id="dropdown3" 
          role="button" 
          data-bs-toggle="dropdown" 
          aria-expanded="false">
          Penanaman Modal
          <i class="fas fa-chevron-down ms-2 rotate-icon"></i>
        </a>
          <ul class="dropdown-menu" aria-labelledby="dropdown3">
            <li><a class="dropdown-item" href="https://lkpmonline.bkpm.go.id/lkpm_perka17/login.jsp" target="_blank">LKPM</a></li>
            <li><a class="dropdown-item" href="{{ url('/penanaman-modal/investasi') }}">Potensi Investasi</a></li>
            <li><a class="dropdown-item" href="{{ url('/penanaman-modal/investasi') }}">Realisasi Investasi</a></li>
            <li><a class="dropdown-item" href="{{ url('/penanaman-modal/investasi') }}">Promosi Investasi</a></li>
            <li><a class="dropdown-item" href="{{ url('/penanaman-modal/regulasi') }}">Regulasi</a></li>
          </ul>
        </li>

        <li class="nav-item dropdown">
        <a class="nav-link d-flex justify-content-between align-items-center" 
          href="#" 
          id="dropdown4" 
          role="button" 
          data-bs-toggle="dropdown" 
          aria-expanded="false">
          Dokumen & Informasi
          <i class="fas fa-chevron-down ms-2 rotate-icon"></i>
        </a>
          <ul class="dropdown-menu" aria-labelledby="dropdown4">
            <li><a class="dropdown-item" href="{{ url('/dokumen-informasi/galeri') }}">Galeri</a></li>
            <li><a class="dropdown-item" href="{{ url('/berita/index') }}">Berita dan Artikel</a></li>
            <li><a class="dropdown-item" href="{{ url('/dokumen-informasi/agenda') }}">Agenda</a></li>
            <li><a class="dropdown-item" href="{{ url('/dokumen-informasi/produk-hukum') }}">Produk Hukum</a></li>
            <li><a class="dropdown-item" href="{{ url('/dokumen-informasi/dokumen-evaluasi') }}">Dokumen Evalusasi</a></li>
            <li><a class="dropdown-item" href="{{ url('/dokumen-informasi/dokumen-perencanaan') }}">Dokumen Perencanaan</a></li>
            <li><a class="dropdown-item" href="{{ url('/lkip') }}">LKIP</a></li>
            <li><a class="dropdown-item" href="{{ url('/sakip') }}">SAKIP</a></li>
          </ul>
        </li>

        <li class="nav-item"><a class="nav-link" href="{{ url('/pengaduan') }}">Saran dan Aduan</a></li>

        <li class="nav-item dropdown">
        <a class="nav-link d-flex justify-content-between align-items-center" 
          href="#" 
          id="dropdown8" 
          role="button" 
          data-bs-toggle="dropdown" 
          aria-expanded="false">
          Layanan Publik
          <i class="fas fa-chevron-down ms-2 rotate-icon"></i>
        </a>
          <ul class="dropdown-menu" aria-labelledby="dropdown8">
            <li><a class="dropdown-item" href="https://ppid.tasikmalayakota.go.id/" target="_blank">Layanan Publik</a></li>
            <li><a class="dropdown-item" href="https://sispek.tasikmalayakota.go.id/front/detailpelayanan/23">Sispek</a></li>
            <li><a class="dropdown-item" href="{{ url('/layanan-publik/ikm') }}">IKM</a></li>
            <li><a class="dropdown-item" href="https://ppid.tasikmalayakota.go.id/mekanisme-perolehan-informasi/">PPID</a></li>
            <li><a class="dropdown-item" href="https://www.lapor.go.id/">SP4N Lapor</a></li>
            <li><a class="dropdown-item" href="{{ url('/layanan-publik/sektoral') }}">Data Statistik Sektoral</a></li>
            <li><a class="dropdown-item" href="{{ url('/layanan-publik/informasi') }}">Informasi Layanan</a></li>
          </ul>
        </li>

      </ul>
    </div>
  </div>
</nav>

<!-- Sidebar -->
<div id="sidebarMenu" class="sidebar-menu d-md-none">
  <ul class="nav flex-column px-3">
    <li class="nav-item"><a class="nav-link" href="{{ url('/') }}">Beranda</a></li>

    <!-- Profil Dropdown -->
    <li class="nav-item">
    <a class="d-flex justify-content-between align-items-center"
      data-bs-toggle="collapse"
      href="#profilMenu"
      role="button"
      aria-expanded="false"
      aria-controls="profilMenu">
      Profil
      <i class="fas fa-chevron-down ms-2 toggle-icon"></i>
    </a>
        <ul class="collapse list-unstyled ps-3 border-start border-2 border-light" id="profilMenu">
          <li><a class="nav-link" href="{{ url('/tentang-kami') }}">Tentang Kami</a></li>
          <li><a class="nav-link" href="{{ url('/profil-kadis') }}">Profil Kepala Dinas</a></li>
          <li><a class="nav-link" href="{{ url('/visi-misi') }}">Visi Misi</a></li>
          <li><a class="nav-link" href="{{ url('/tupoksi') }}">Tugas Pokok & Fungsi</a></li>
          <li><a class="nav-link" href="{{ url('/struktur-organisasi') }}">Struktur Organisasi</a></li>
      </ul>
    </li>

    <!-- Penanaman Modal -->
    <li class="nav-item">
        <a class="d-flex justify-content-between align-items-center" 
          data-bs-toggle="collapse"
          href="#modalMenu" 
          role="button" 
          aria-expanded="false"
          ariala-controls="modalMenu">
          Penanaman Modal
          <i class="fas fa-chevron-down ms-2 toggle-icon"></i>
        </a>
        <ul class="collapse list-unstyled ps-3 border-start border-2 border-light" id="modalMenu">
        <li><a class="nav-link" href="https://lkpmonline.bkpm.go.id/lkpm_perka17/login.jsp" target="_blank">LKPM</a></li>
        <li><a class="nav-link" href="{{ url('/potensi-investasi') }}">Potensi Investasi</a></li>
        <li><a class="nav-link" href="{{ url('/realisasi-investasi') }}">Realisasi Investasi</a></li>
        <li><a class="nav-link" href="{{ url('/promosi-investasi') }}">Promosi Investasi</a></li>
        <li><a class="nav-link" href="{{ url('/regulasi') }}">Regulasi</a></li>
      </ul>
    </li>

    <!-- Dokumen & Informasi -->
    <li class="nav-item">
        <a class="d-flex justify-content-between align-items-center" 
          data-bs-toggle="collapse"
          href="#dokumenMenu" 
          role="button" 
          aria-expanded="false"
          aria-controls="dokumenMenu">
          Dokumen & Informasi
          <i class="fas fa-chevron-down ms-2 toggle-icon"></i>
        </a>
        <ul class="collapse list-unstyled ps-3 border-start border-2 border-light" id="dokumenMenu">
        <li><a class="nav-link" href="{{ url('/galeri') }}">Galeri</a></li>
        <li><a class="nav-link" href="{{ url('/berita/index') }}">Berita & Artikel</a></li>
        <li><a class="nav-link" href="{{ url('/agenda') }}">Agenda</a></li>
        <li><a class="nav-link" href="{{ url('/produk-hukum') }}">Produk Hukum</a></li>
        <li><a class="nav-link" href="{{ url('/dokumen-evaluasi') }}">Dokumen Evaluasi</a></li>
        <li><a class="nav-link" href="{{ url('/dokumen-perencanaan') }}">Dokumen Perencanaan</a></li>
        <li><a class="nav-link" href="{{ url('/lkip') }}">LKIP</a></li>
        <li><a class="nav-link" href="{{ url('/sakip') }}">SAKIP</a></li>
      </ul>
    </li>

    <li class="nav-item"><a class="nav-link" href="{{ url('/pengaduan') }}">Saran dan Aduan</a></li>

    <!-- Layanan Publik -->
    <li class="nav-item">
        <a class="d-flex justify-content-between align-items-center" 
          data-bs-toggle="collapse"
          href="#layananMenu" 
          role="button" 
          aria-expanded="false"
          aria-controls="layananMenu">
          Layanan Publik
          <i class="fas fa-chevron-down ms-2 toggle-icon"></i>
        </a>
        <ul class="collapse list-unstyled ps-3 border-start border-2 border-light" id="layananMenu">
        <li><a class="nav-link" href="https://ppid.tasikmalayakota.go.id/" target="_blank">Layanan Publik</a></li>
        <li><a class="nav-link" href="https://sispek.tasikmalayakota.go.id/front/detailpelayanan/23">Sispek</a></li>
        <li><a class="nav-link" href="{{ url('/layanan-publik/ikm') }}">IKM</a></li>
        <li><a class="nav-link" href="https://ppid.tasikmalayakota.go.id/mekanisme-perolehan-informasi/">PPID</a></li>
        <li><a class="nav-link" href="https://www.lapor.go.id/">SP4N Lapor</a></li>
        <li><a class="nav-link" href="{{ url('/layanan-publik/sektoral') }}">Data Statistik Sektoral</a></li>
        <li><a class="nav-link" href="{{ url('/layanan-publik/informasi') }}">Informasi Layanan</a></li>
      </ul>
    </li>
  </ul>
</div>
</div>

<script>
  document.addEventListener('DOMContentLoaded', function () {
    const toggleBtn = document.getElementById('sidebarToggle');
    const closeBtn = document.getElementById('closeSidebar');
    const sidebar = document.getElementById('sidebarMenu');
    const toggleIcon = toggleBtn.querySelector('i');

    // Toggle sidebar on mobile
    toggleBtn.addEventListener('click', () => {
      sidebar.classList.toggle('active');

      const isActive = sidebar.classList.contains('active');
      toggleIcon.classList.remove(isActive ? 'fa-bars' : 'fa-times');
      toggleIcon.classList.add(isActive ? 'fa-times' : 'fa-bars');
    });

    // Close sidebar button
    closeBtn.addEventListener('click', () => {
      sidebar.classList.remove('active');
      toggleIcon.classList.remove('fa-times');
      toggleIcon.classList.add('fa-bars');
    });

    // Chevron rotation on collapse
    const collapses = document.querySelectorAll('.collapse');

    collapses.forEach(collapse => {
      const icon = collapse.previousElementSibling?.querySelector('.toggle-icon');

      // Set initial state
      if (collapse.classList.contains('show') && icon) {
        icon.classList.add('rotate');
      }

      collapse.addEventListener('show.bs.collapse', () => {
        if (icon) icon.classList.add('rotate');
      });

      collapse.addEventListener('hide.bs.collapse', () => {
        if (icon) icon.classList.remove('rotate');
      });
    });
  });
</script>

