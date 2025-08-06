<div class="berita-wrapper">

  <!-- Hero Section -->
  <div class="berita-section text-white text-center d-flex"
       style="background-image: url('{{ asset('image/gedung.jpg') }}');">
    <div class="container">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-transparent justify-content-center">
          <li class="breadcrumb-item">
            <a href="/" class="text-white">Beranda</a>
          </li>
          <li class="breadcrumb-item active text-white" aria-current="page">Berita</li>
        </ol>
      </nav>
      <h2 class="display-5 fw-bold">Berita DPMPTSP Kota Tasikmalaya</h2>
      <p class="lead">Dapatkan rangkuman berita terbaru dalam satu tempat.</p>
    </div>
  </div>

  <!-- Tombol Kategori -->
  <div class="container">
    <div class="kategori-scroll-wrapper">
      <div class="d-flex flex-nowrap justify-content-start kategori-scroll">
        <button wire:click="filterByKategori('semua')"
                class="btn kategori-btn {{ $kategoriTerpilih === 'semua' ? 'active' : '' }}">
          Semua
        </button>

        @foreach ($kategoriList as $kategori)
          <button wire:click="filterByKategori('{{ $kategori }}')"
                  class="btn kategori-btn {{ $kategoriTerpilih === $kategori ? 'active' : '' }}">
            {{ $kategori }}
          </button>
        @endforeach
      </div>
    </div>
  </div>

  <hr class="hr-custom">

  <!-- Konten -->
  <div class="container py-5">
    <div class="row gx-5">
      <div class="col-lg-12">

        <!-- Daftar Berita Kategori -->
        <div>
          @foreach ($beritas as $berita)
            <div class="tab-card mb-2 p-2 rounded">
              <a href="{{ route('berita.detail', $berita->id) }}" class="text-decoration-none text-dark">
                <div class="d-flex gap-3 align-items-start">
                  <div class="thumbnail-wrapper-lg">
                    <img src="{{ asset($berita->gambar) }}"
                         alt="{{ $berita->judul }}"
                         class="thumbnail-berita" />
                  </div>
                  <div class="flex-grow-1 my-auto">
                    <p class="teks-daftar mb-1">{{ \Illuminate\Support\Str::limit($berita->judul, 110) }}</p>
                    <small class="text-muted">
                      {{ $berita->kategori }}
                      <span class="mx-1">|</span>
                      <i class="bi bi-clock me-1"></i>
                      @if ($berita->created_at->diffInHours(now()) < 24)
                        {{ $berita->created_at->diffForHumans() }}
                      @else
                        {{ $berita->created_at->translatedFormat('d F Y') }}
                      @endif
                    </small>
                  </div>
                </div>
              </a>
            </div>
          @endforeach

          <!-- Komponen Pagination -->
          <x-pagination 
            :paginator="$beritas" 
            :per-page="$perPage"
            :current-page="$currentPage"
            :total="$total"
            :last-page="$lastPage"
            :show-page-dropdown="$showPageDropdown"
            :search-page="$searchPage"
            :show-per-page-dropdown="$showPerPageDropdown" 
          />
        </div>

      </div>
      <!-- End Kiri -->

    </div>
  </div>

</div>

<!-- Script untuk Inisialisasi Carousel Ulang setelah Livewire Update -->
<script>
  document.addEventListener("livewire:load", () => {
    Livewire.hook('message.processed', (message, component) => {
      const carouselEl = document.querySelector('#beritaCarousel');
      if (carouselEl) {
        const carouselInstance = bootstrap.Carousel.getInstance(carouselEl);
        if (!carouselInstance) {
          new bootstrap.Carousel(carouselEl, {
            interval: 3000,
            ride: 'carousel',
            pause: false
          });
        }
      }
    });
  });
</script>
