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
          <li class="breadcrumb-item active text-white" aria-current="page">Berita dan Artikel</li>
        </ol>
      </nav>
      <h2 class="display-5 fw-bold">Berita dan Artikel DPMPTSP Kota Tasikmalaya</h2>
      <p class="lead">Dapatkan rangkuman berita terbaru dalam satu tempat.</p>
    </div>
  </div>

  <!-- Tombol Kategori -->
  <div class="kategori-wrapper pb-4">
    <div class="kategori-scroll-wrapper">
      <div class="kategori-scroll">
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

  <!-- Konten -->
  <div class="container pb-5">
    <div class="row gx-5">
      <div class="col-lg-12">

        <!-- Daftar Berita -->
        <div>

          <!-- Mobile & Tablet: Horizontal Cards -->
          <div class="d-block d-lg-none">
            @foreach ($beritas as $berita)
              <div class="tab-card mb-2 p-2 rounded">
                <a href="{{ route('berita.detail', $berita->id) }}" class="text-decoration-none text-dark">
                  <div class="d-flex gap-3 align-items-start">
                    <div class="thumbnail-wrapper">
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
          </div>

          <!-- Desktop: Grid Responsive Rapi -->
          <div class="d-none d-lg-block">
            <div class="row row-cols-3 g-4">
              @foreach ($beritas as $berita)
                <div class="col">
                <div class="berita-artikel-card p-3 rounded bg-white">
                  <a href="{{ route('berita.detail', $berita->id) }}" class="text-decoration-none text-dark d-block h-100 d-flex flex-column">
                    <div class="thumbnail-wrapper-lg mb-2 text-center mx-auto">
                      <img src="{{ asset($berita->gambar) }}" alt="{{ $berita->judul }}" class="thumbnail-berita img-fluid" />
                    </div>
                    <div class="mb-2">
                      <small class="text-muted d-block">
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
                    <div class="mt-auto">
                      <p class="teks-daftar mb-0">{{ \Illuminate\Support\Str::limit($berita->judul, 50) }}</p>
                      <small>{{ \Illuminate\Support\Str::limit($berita->deskripsi, 100) }}
                      </small>                    
                    </div>
                  </a>
                </div>
                </div>
              @endforeach
            </div>
          </div>
            <!-- Pagination Desktop -->
            <div class="mt-4">
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

        </div>
        <!-- End Daftar Berita -->

      </div>
    </div>
  </div>
</div>

<!-- Script Carousel untuk Livewire -->
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