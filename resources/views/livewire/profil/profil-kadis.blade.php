<div class="profil-pimpinan-page">

    <!-- Hero Section -->
    <div class="hero-section text-white text-center d-flex" style="background-image: url('{{ asset('image/gedung.jpg') }}');">
        <div class="container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-transparent justify-content-center">
                    <li class="breadcrumb-item"><a href="/" class="text-white">Beranda</a></li>
                    <li class="breadcrumb-item active text-white" aria-current="page">Profil Pimpinan</li>
                </ol>
            </nav>
            <h2 class="display-5 fw-bold">Profil Pimpinan</h2>
            <p class="lead">{{ $profil->jabatan ?? 'Belum tersedia' }}</p>
        </div>
    </div>

    <!-- Konten Profil Pimpinan -->
    <div class="section-wrapper">
        <div class="container">
            <div class="content-card">

                <!-- Galeri Foto Sebelum Profil -->
                <div class="row mb-4 justify-content-center text-center">
                    @forelse($profil->galeris ?? [] as $galeri)
                        <div class="col-md-4 mb-3">
                            <img src="{{ asset('storage/'.$galeri->foto) }}" alt="Foto Kegiatan" class="galkadis-img">
                        </div>
                    @empty
                        <p><em>Galeri foto belum tersedia</em></p>
                    @endforelse
                </div>

                <!-- Foto & Biodata -->
                <div class="row gy-4 align-items-center mb-4">
                    <div class="text-center">
                        <h2 class="align-item-center">{{ $profil->jabatan ?? 'Belum tersedia' }}</h2>
                    </div>

                    <div class="d-flex justify-content-center align-items-center gap-5 flex-wrap">
                        <!-- Foto -->
                        <div class="text-center">
                            @if($profil && $profil->foto)
                                <img src="{{ asset('storage/'.$profil->foto) }}" alt="Foto Kadis" class="kepala-img mb-3">
                            @elseif($profil && $profil->foto_url)
                                <img src="{{ $profil->foto_url }}" alt="Foto Kadis" class="kepala-img mb-3">
                            @else
                                <p><em>Foto belum tersedia</em></p>
                            @endif

                            <h5 class="mt-2 fw-bold">{{ $profil->nama ?? 'Belum tersedia' }}</h5>
                        </div>

                        <!-- Biodata -->
                        <div class="kepala-bio" style="max-width: 500px;">
                            {!! $profil->biodata ?? '<p><em>Biodata belum tersedia</em></p>' !!}
                        </div>
                    </div>
                </div>

                <!-- Pendidikan & Pekerjaan -->
                <div class="row gy-4 justify-content-center mb-4">
                    <!-- Pendidikan -->
                    <div class="col-md-5">
                        <h6 class="fw-bold text-start text-profil-judul">Riwayat Pendidikan:</h6>
                        <div class="timeline-wrapper">
                            @forelse($profil->pendidikans ?? [] as $pendidikan)
                                <div class="timeline-block">
                                    <div class="timeline-title">{{ $pendidikan->jurusan ?? 'Belum tersedia' }}</div>
                                    <p class="timeline-desc">{{ $pendidikan->institusi ?? '' }}</p>
                                </div>
                            @empty
                                <p><em>Data pendidikan belum tersedia</em></p>
                            @endforelse
                        </div>
                    </div>

                    <!-- Pekerjaan -->
                    <div class="col-md-5">
                        <h6 class="fw-bold text-start text-profil-judul">Riwayat Pekerjaan:</h6>
                        <div class="timeline-wrapper">
                            @forelse($profil->pekerjaans ?? [] as $pekerjaan)
                                <div class="timeline-block">
                                    <div class="timeline-title">{{ $pekerjaan->jabatan ?? 'Belum tersedia' }}</div>
                                    <p class="timeline-desc">{{ $pekerjaan->instansi ?? '' }}</p>
                                </div>
                            @empty
                                <p><em>Data pekerjaan belum tersedia</em></p>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>