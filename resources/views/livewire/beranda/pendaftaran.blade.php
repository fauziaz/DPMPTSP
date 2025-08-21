<div>
    <div class="container py-5 text-center">
        <!-- Judul -->
        <div class="col-12 mb-4 text-center">
            <h2>Nomor Induk Berusaha & Perizinan Online</h2>
            <h6>Ketahui tata cara mendapatkan dan membuat Nomor Induk Berusaha (NIB) dan Perizinan Online</h6>
        </div>

        <!-- Tab -->
        <div class="row mt-4">
            <div class="tab-wrapper" id="tab-pendaftaran">
                <!-- Tab Header -->
                <div class="tab-header">
                    <button class="tab-button active" data-target="tab-1">
                        Nomor Induk Berusaha (NIB)
                    </button>
                    <button class="tab-button" data-target="tab-2">
                        Perizinan Online
                    </button>
                </div>

                <!-- Tab Content -->
                <div class="tab-content">
                    <!-- Tab 1 -->
                    <div id="tab-1" class="tab-panel active">
                        <div class="lightbox-wrapper">
                            <img src="{{ asset('image/oss_nib.png') }}"
                                 class="img-fluid zoom-img"
                                 alt="OSS NIB"
                                 style="width: 800px; height: auto;">
                            <div class="lightbox-hover-overlay">
                                <span class="magnifier-icon">
                                    <i class="bi bi-zoom-in"></i>
                                </span>
                            </div>
                        </div>
                    </div>

                    <!-- Tab 2 -->
                    <div id="tab-2" class="tab-panel">
                        <div class="lightbox-wrapper">
                            <img src="{{ asset('image/tatacara.jpg') }}"
                                 class="img-fluid zoom-img"
                                 alt="Tatacara Daftar Perizinan"
                                 style="width: 800px; height: auto;">
                            <div class="lightbox-hover-overlay">
                                <span class="magnifier-icon">
                                    <i class="bi bi-zoom-in"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Tab Content -->
            </div>
        </div>
    </div>

    <!-- Lightbox Modal -->
    <div class="custom-lightbox" id="customLightbox">
        <span class="close-lightbox" id="closeLightbox">&times;</span>
        <img class="lightbox-image" id="lightboxImage" src="" alt="Fullscreen Image">
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            // =========================
            // TAB LOGIC
            // =========================
            document.querySelectorAll(".tab-wrapper").forEach(wrapper => {
                const buttons = wrapper.querySelectorAll(".tab-button");
                const panels = wrapper.querySelectorAll(".tab-panel");

                // Buat indikator tab aktif
                let indicator = wrapper.querySelector(".tab-indicator");
                if (!indicator) {
                    indicator = document.createElement("div");
                    indicator.className = "tab-indicator";
                    wrapper.querySelector(".tab-header").appendChild(indicator);
                }

                function moveIndicator(activeBtn) {
                    const btnRect = activeBtn.getBoundingClientRect();
                    const wrapperRect = wrapper.querySelector(".tab-header").getBoundingClientRect();
                    const leftOffset = btnRect.left - wrapperRect.left;
                    indicator.style.width = `${btnRect.width}px`;
                    indicator.style.left = `${leftOffset}px`;
                }

                buttons.forEach(btn => {
                    btn.addEventListener("click", () => {
                        buttons.forEach(b => b.classList.remove("active"));
                        panels.forEach(p => p.classList.remove("active"));

                        btn.classList.add("active");
                        const target = wrapper.querySelector(`#${btn.dataset.target}`);
                        if (target) target.classList.add("active");

                        moveIndicator(btn);
                    });
                });

                const activeBtn = wrapper.querySelector(".tab-button.active");
                if (activeBtn) moveIndicator(activeBtn);
            });

            // =========================
            // LIGHTBOX LOGIC + ZOOM STEP
            // =========================
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
                    zoomLevel = minZoom;
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

            lightboxImg.addEventListener('click', (e) => {
                e.stopPropagation(); // Supaya tidak menutup lightbox saat klik gambar
                if (zoomLevel < maxZoom) {
                    zoomLevel += zoomStep;
                } else {
                    zoomLevel = minZoom;
                }
                applyZoom();
            });
        });
    </script>
</div>