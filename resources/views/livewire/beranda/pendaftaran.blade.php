<div class="container py-5">
    <div class="row justify-content-center text-center mb-5">
      <div class="col-12">
        <h2 class="section-title">Cara Memperoleh Nomor Induk Berusaha (NIB) dan Daftar Perizinan Online</h2>
        <div class="row mt-4">
        <div class="tab-wrapper" id="tab-pendaftaran">
        <div class="tab-header">
            <button class="tab-button active" data-target="tab-1">Nomor Induk Berusaha (NIB)</button>
            <button class="tab-button" data-target="tab-2">Perizinan Online</button>
            <!-- .tab-indicator will be injected -->
        </div>
        <div class="tab-content">
          <div id="tab-1" class="tab-panel active position-relative lightbox-wrapper">
            <img src="{{ asset('image/oss_nib.png') }}" class="img-fluid lightbox-img" alt="OSS NIB">
            <span class="zoom-icon"><i class="bi bi-search"></i></span>
          </div>

          <div id="tab-2" class="tab-panel position-relative lightbox-wrapper">
            <img src="{{ asset('image/tatacara.jpg') }}" class="img-fluid lightbox-img" alt="Tatacara Daftar Perizinan">
            <span class="zoom-icon"><i class="bi bi-search"></i></span>
          </div>
        </div>

        <!-- Lightbox Modal -->
        <div id="imageLightbox" class="lightbox-overlay d-none" onclick="closeLightbox()">
          <img id="lightboxImage" src="" alt="Preview" />
          <button class="close-btn" onclick="closeLightbox()">✕</button>
        </div>
        </div>
        </div>
      </div>
</div>

<script>
document.addEventListener("DOMContentLoaded", function () {
  document.querySelectorAll(".tab-wrapper").forEach(wrapper => {
    const buttons = wrapper.querySelectorAll(".tab-button");
    const panels = wrapper.querySelectorAll(".tab-panel");
    
    // Bikin indikator dan append
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

    // Init posisi indicator di tab aktif pertama
    const activeBtn = wrapper.querySelector(".tab-button.active");
    if (activeBtn) {
      moveIndicator(activeBtn);
    }
  });
});
</script>
