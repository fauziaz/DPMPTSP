<div class="profil-pimpinan-page">
    <!-- Hero Section -->
    <x-template.hero-section
        background="{{ asset('https://blogger.googleusercontent.com/img/a/AVvXsEh2mwYKI8kIz6k7klv3_jgGlDLT7sOVSsJUmNl8pMKUFXm7Bj7EGCSkJ5dddNtwG1EuTzBQaiczmCkxz2AmVYeKHaT7B6hENTqTNmG0dqifoi4UQUIUR4pLXL-eu6UkBsZiPvaQ0IOa69yQzbSY9ywcFM5WLEam5IC7I9cqjcaKh6iG6_97KR3aIHEV=w640-h352') }}"
        :breadcrumbs="['Beranda' => '/']"
        title="Pengaduan"
        subtitle="Berikut mekanisme pengaduan publik DPMPTSTP Kota Tasikmalaya"
    />

    <div class="section-wrapper py-5" style="padding-bottom: 100px;">
        <div class="container">
            <div class="content-card" style="min-height: 400px; background: white; border-radius: 10px; padding: 40px;">
                <div class="row gx-5 align-items-start">
                    <div class="col-lg-6 col-md-12 mb-4 mb-lg-0">
                        <img 
                            src="https://dev-ppid.tasikmalayakota.go.id/image/span.svg"
                            alt="Gambar Mekanisme Pengaduan Publik"
                            class="img-fluid d-block mx-auto" 
                            style="margin-top: 0;">
                    </div>
                    <div class="col-lg-6 col-md-12 mb-4">
                        <div class="card shadow-sm border-0 h-100 mb-4" style="background-color: #FFCDD2">
                            <div class="card-body p-4 ps-4 ms-2">
                                <h3 class="mb-4">
                                    <i class="text-primary me-2"></i>Persyaratan
                                </h3>
                                <ol class="ps-3 fs-5 fw-semibold">
                                    <li>Memiliki akun <strong>LAPOR!</strong>.</li>
                                    <li>Wajib menggunakan data milik sendiri, yaitu:
                                        <ul style="list-style-position: inside;">
                                            <li>Nama pengguna asli sesuai KTP.</li>
                                            <li>No Identitas (KTP/SIM).</li>
                                            <li>No Telepon aktif.</li>
                                        </ul>
                                    </li>
                                </ol>
                            </div>
                        </div>
        
                        <div class="card shadow-sm border-0 h-100" style="background-color: #FFCDD2;">
                            <div class="card-body p-4 ps-4 ms-2">
                                <h3 class="mb-4">
                                    <i class="text-primary me-2"></i>Mekanisme dan Prosedur
                                </h3>
                                <!-- Section: Timeline -->
                                <section class="pd-3 ps-4 ms-2">
                                    <ul class="timeline-with-icons">
                                        <li class="timeline-item mb-2">
                                            <span class="timeline-icon">
                                                <i class="fas fa-file-alt"></i>
                                            </span>
                                            <h5 class="fw-bold">1. Penyampaian Laporan</h5>
                                            <p class="text-muted">
                                                Pemohon menyampaikan Laporan Pengaduan, Laporan Aspirasi dan Permohonan Informasi melalui website <a href="https://www.lapor.go.id" target="_blank">www.lapor.go.id</a>, aplikasi LAPOR!, atau SMS ke 1708.
                                            </p>
                                        </li>
                                        <li class="timeline-item mb-2">
                                            <span class="timeline-icon">
                                                <i class="fas fa-bell"></i>
                                            </span>
                                            <h5 class="fw-bold">2. Perekaman dan Notifikasi</h5>
                                            <p class="text-muted">
                                                Sistem secara otomatis merekam data pelapor dan mengirim notifikasi kepada Admin Koordinator berdasarkan kategori.
                                            </p>
                                        </li>

                                        <li class="timeline-item mb-2">
                                            <span class="timeline-icon">
                                                <i class="fas fa-user-check"></i>
                                            </span>
                                            <h5 class="fw-bold">3. Telaah dan Verifikasi</h5>
                                            <p class="text-muted">
                                                Admin Koordinator menelaah, memverifikasi, dan mendisposisikan laporan kepada Admin Penghubung.
                                            </p>
                                        </li>

                                        <li class="timeline-item mb-2">
                                            <span class="timeline-icon">
                                                <i class="fas fa-eye"></i>
                                            </span>
                                            <h5 class="fw-bold">4. Pemantauan</h5>
                                            <p class="text-muted">
                                                Admin Koordinator memantau laporan yang telah didisposisikan.
                                            </p>
                                        </li>

                                        <li class="timeline-item mb-2">
                                            <span class="timeline-icon">
                                                <i class="fas fa-inbox"></i>
                                            </span>
                                            <h5 class="fw-bold">5. Penerimaan Laporan</h5>
                                            <p class="text-muted">
                                                Admin Penghubung menerima laporan dari Admin Koordinator.
                                            </p>
                                        </li>

                                        <li class="timeline-item mb-2">
                                            <span class="timeline-icon">
                                                <i class="fas fa-comments"></i>
                                            </span>
                                            <h5 class="fw-bold">6. Tanggapan OPD</h5>
                                            <p class="text-muted">
                                                OPD (Organisasi Perangkat Daerah) memberikan tanggapan atau jawaban terhadap laporan.
                                            </p>
                                        </li>

                                        <li class="timeline-item mb-2">
                                            <span class="timeline-icon">
                                                <i class="fas fa-paper-plane"></i>
                                            </span>
                                            <h5 class="fw-bold">7. Penerusan Jawaban</h5>
                                            <p class="text-muted">
                                                Admin Penghubung meneruskan jawaban kepada pelapor.
                                            </p>
                                        </li>

                                        <li class="timeline-item mb-2">
                                            <span class="timeline-icon">
                                                <i class="fas fa-reply"></i>
                                            </span>
                                            <h5 class="fw-bold">8. Penerimaan Balasan</h5>
                                            <p class="text-muted">
                                                Masyarakat menerima jawaban atau balasan laporan dari  OPD sistem.
                                            </p>
                                        </li>
                                    </ul>
                                </section>
                                <!-- End Section: Timeline -->
                            </div>
                        </div>

                    </div>                        
                </div>
            </div>
        </div>
    </div>
</div>
