<div class="container py-5">
  <!-- Judul dan Deskripsi -->
  <div class="row justify-content-center text-center mb-4">
    <div class="col-12">
      <h2>Berita DPMPTSP Tasikmalaya</h2>
      <h6>
        Program dan Layanan DPMPTSP Kota Tasikmalaya hadir untuk mendukung kemudahan pelayanan Investasi dan Perizinan di Kota Tasikmalaya
      </h6>
      <br>
    </div>
  </div>

  <!-- Konten Berita: Carousel dan Tab -->
  <div class="d-flex flex-column flex-lg-row gap-4 align-items-stretch">
    <!-- Carousel Berita -->
    <div class="berita-carousel">
      @php $total = $beritaCarousel->take(5)->count(); @endphp
      <div id="beritaCarousel" class="carousel slide carousel-fade" data-bs-ride="carousel" data-bs-interval="3000">
        <div class="carousel-inner">
          @foreach ($beritaCarousel->take(5) as $index => $berita)
            <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
              <div class="berita-card card position-relative overflow-hidden">
                <img src="{{ asset($berita->gambar) }}" class="card-img" alt="{{ $berita->judul }}">
                <div class="card-img-overlay p-0 d-flex align-items-end">
                  <div class="overlay-box">
                    <p class="kategori-label mb-1">{{ $berita->kategori }}</p>
                    <h5 class="judul-berita mb-2">{{ \Illuminate\Support\Str::limit($berita->judul, 80) }}</h5>
                    <div class="meta-berita mb-3">
                      <i class="bi bi-clock me-1"></i>
                      @if ($berita->created_at->diffInHours(now()) < 24)
                        {{ $berita->created_at->diffForHumans() }}
                      @else
                        {{ $berita->created_at->translatedFormat('d F Y') }}
                      @endif
                      <span class="mx-2">|</span>
                      <i class="bi bi-pencil me-1"></i> Penulis: {{ $berita->penulis }}
                    </div>

                    <!-- Tombol dan Indeks Carousel -->
                    <div class="d-flex justify-content-between align-items-center">
                      <a href="{{ route('berita.detail', $berita->id) }}" class="btn btn-outline-light btn-sm">
                        Baca Selengkapnya
                      </a>
                      <div class="d-flex align-items-center gap-2 text-white small">
                        <button class="btn btn-sm p-0 text-white border-0 bg-transparent" type="button" data-bs-target="#beritaCarousel" data-bs-slide="prev">
                          <i class="bi bi-chevron-left fs-6"></i>
                        </button>
                        <div id="carouselIndex" class="fw-bold">
                          {{ $index + 1 }} dari {{ $total }}
                        </div>
                        <button class="btn btn-sm p-0 text-white border-0 bg-transparent" type="button" data-bs-target="#beritaCarousel" data-bs-slide="next">
                          <i class="bi bi-chevron-right fs-6"></i>
                        </button>
                      </div>
                    </div>
                    <!-- End Flexbox -->
                  </div>
                </div>
              </div>
            </div>
          @endforeach
        </div>
      </div>
    </div>

    <!-- Tab Berita dan Artikel -->
    <div class="d-flex flex-column justify-content-between">
      <div class="tab-wrapper-berita" id="tab-berita">
        <!-- Header Tab -->
        <div class="tab-header d-flex justify-content-between gap-2 mb-3">
          <button class="tab-button active" data-target="tab-berita">Berita</button>
          <button class="tab-button" data-target="tab-artikel">Artikel</button>
        </div>

        <div class="tab-content">

          <!-- Tab Berita -->
          <div id="tab-berita" class="tab-panel active">
            @foreach ($beritas as $berita)
              <div class="tab-card mb-2 p-2 rounded">
                <a href="{{ route('berita.detail', $berita->id) }}" class="text-decoration-none text-dark">
                  <div class="d-flex gap-3 align-items-start">
                    <div class="thumbnail-wrapper">
                      <img src="{{ asset($berita->gambar) }}"
                          alt="{{ $berita->judul }}"
                          class="thumbnail-berita" />
                    </div>
                    <div class="my-auto d-flex flex-column justify-content-between w-100">
                      <p class="mb-2">{{ \Illuminate\Support\Str::limit($berita->judul, 60) }}</p>
                      <small class="text-muted d-flex justify-content-between mt-auto">
                        <span>
                          {{ $berita->kategori }}
                          <span class="mx-1">|</span>
                          <i class="bi bi-clock me-1"></i>
                          @if ($berita->created_at->diffInHours(now()) < 24)
                            {{ $berita->created_at->diffForHumans() }}
                          @else
                            {{ $berita->created_at->translatedFormat('d F Y') }}
                          @endif
                        </span>
                        <span><i class="bi bi-box-arrow-up-right"></i></span>
                      </small>
                    </div>
                  </div>
                </a>
              </div>
            @endforeach
          </div>

          <!-- Tab Artikel -->
          <div id="tab-artikel" class="tab-panel">
            @foreach ($artikels as $artikel)
              <div class="tab-card mb-2 p-2 rounded">
                <a href="{{ route('berita.detail', $artikel->id) }}" class="text-decoration-none text-dark">
                  <div class="d-flex gap-3 align-items-start">
                    <div class="thumbnail-wrapper">
                      <img src="{{ asset($artikel->gambar) }}"
                          alt="{{ $artikel->judul }}"
                          class="thumbnail-berita" />
                    </div>
                    <div class="my-auto d-flex flex-column justify-content-between w-100">
                      <p class="mb-1">{{ \Illuminate\Support\Str::limit($artikel->judul, 60) }}</p>
                      <small class="text-muted d-flex justify-content-between mt-auto">
                        <span>
                          {{ $artikel->kategori }}
                          <span class="mx-1">|</span>
                          <i class="bi bi-clock me-1"></i>
                          @if ($artikel->created_at->diffInHours(now()) < 24)
                            {{ $artikel->created_at->diffForHumans() }}
                          @else
                            {{ $artikel->created_at->translatedFormat('d F Y') }}
                          @endif
                        </span>
                        <span><i class="bi bi-box-arrow-up-right"></i></span>
                      </small>
                    </div>
                  </div>
                </a>
              </div>
            @endforeach
          </div>
        </div>
      </div>
        <!-- Tombol Lihat Semua -->
        <div class="text-end">
          <a href="{{ route('berita.index') }}" class="btn lihat-semua-btn">
            Lihat Semua Posting <i class="bi bi-box-arrow-up-right ms-1"></i>
          </a>
        </div>
    </div>
  </div>
</div>

<script>
  document.addEventListener('DOMContentLoaded', function () {
    const carousel = document.querySelector('#beritaCarousel');
    const items = carousel.querySelectorAll('.carousel-item');
    const indexDisplay = carousel.querySelector('#carouselIndexInner');

    const carouselInstance = bootstrap.Carousel.getInstance(carousel);

    carousel.addEventListener('slid.bs.carousel', function (event) {
      const currentIndex = event.to + 1;
      const total = items.length;
      if (indexDisplay) {
        indexDisplay.textContent = `${currentIndex} dari ${total}`;
      }
    });

    // Optional manual control
    document.querySelector('#prevSlide')?.addEventListener('click', () => {
      carouselInstance?.prev();
    });

    document.querySelector('#nextSlide')?.addEventListener('click', () => {
      carouselInstance?.next();
    });
  });
</script>

<script>
  document.addEventListener("DOMContentLoaded", function () {
    document.querySelectorAll(".tab-wrapper-berita").forEach(wrapper => {
      const buttons = wrapper.querySelectorAll(".tab-button");
      const panels = wrapper.querySelectorAll(".tab-panel");

      let indicator = wrapper.querySelector(".tab-indicator");
      if (!indicator) {
        indicator = document.createElement("div");
        indicator.className = "tab-indicator";
        wrapper.querySelector(".tab-header").appendChild(indicator);
      }

      function moveIndicator(activeBtn) {
        const btnRect = activeBtn.getBoundingClientRect();
        const wrapperRect = wrapper.querySelector(".tab-header").getBoundingClientRect();
        indicator.style.width = `${btnRect.width}px`;
        indicator.style.left = `${btnRect.left - wrapperRect.left}px`;
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
  });
</script>