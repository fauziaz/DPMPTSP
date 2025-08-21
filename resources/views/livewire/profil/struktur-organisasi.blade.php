<div class="profil-pimpinan-page">

    <!-- Hero Section -->
    <div class="hero-section text-white text-center d-flex" style="background-image: url('{{ asset('image/gedung.jpg') }}');">
    <div class="container">
        <nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-transparent justify-content-center">
            <li class="breadcrumb-item"><a href="/" class="text-white">Beranda</a></li>
            <li class="breadcrumb-item active text-white" aria-current="page">Struktur Organisasi</li>
        </ol>
        </nav>
        <h2 class="display-5 fw-bold">Struktur Organisasi DPMPTSP Kota Tasikmalaya</h2>
        <p class="lead">DPMPTSP Tasikmalaya memiliki struktur organisasi yang disusun untuk mendukung pelaksanaan tugas dan fungsi secara terkoordinasi dan efektif.</p>
    </div>
    </div>

    <!-- Gambar Struktur -->
    <div class="section-wrapper">
        <div class="container">
            <div class="content-card text-center">
                <div class="row justify-content-center">
                    @if($strukturOrganisasi?->gambar)
                        <img src="{{ asset('storage/' . $strukturOrganisasi->gambar) }}" 
                            alt="Struktur Organisasi" 
                            class="img-fluid mb-4">
                    @elseif($strukturOrganisasi === null)
                        <p class="text-muted my-4">Struktur Organisasi belum tersedia.</p>
                    @else
                        <img src="{{ asset('image/struktur-dpmptsp.jpg') }}" 
                            alt="Struktur Organisasi" 
                            class="img-fluid mb-4">
                    @endif
                </div>

                {{-- Button --}}
                @if($strukturOrganisasi?->button_text && $strukturOrganisasi?->button_link)
                    <a href="{{ $strukturOrganisasi->button_link }}" 
                    class="btn btn-primary px-4 py-2" 
                    target="_blank">
                        {{ $strukturOrganisasi->button_text }}
                    </a>
                @endif
            </div>
        </div>
    </div>
</div>