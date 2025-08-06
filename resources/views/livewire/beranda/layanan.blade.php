<div>
  <div class="container py-5">
    <!-- Sambutan -->
    <div class="row justify-content-center text-center mb-4">
      <div class="col-12">
        <h2>Layanan DPMPTSP Tasikmalaya</h2>
        <h6>Program dan Layanan DPMPTSP Kota Tasikmalaya hadir untuk mendukung kemudahan pelayanan Investasi dan Perizinan di Kota Tasikmalaya</h6>
        <br>
      </div>
    </div>

    <!-- Kartu Layanan -->
    <div class="row row-cols-1 row-cols-md-2 g-4">
      @foreach ($layanan as $item)
        <div class="col">
        <a href="{{ $item['url'] }}" class="card-link-wrapper text-decoration-none">
            <div class="card custom-card h-100">
            <!-- Ikon -->
            <div class="card-icon text-center mt-3">
                <i class="bi {{ $item['icon'] }} fs-1"></i>
            </div>

            <!-- Konten Kartu -->
            <div class="card-body d-flex flex-column">
                <h4 class="card-title fw-bold">{{ $item['title'] }}</h4>
                <p class="card-text flex-grow-1">{{ $item['description'] }}</p>

                <!-- Teks link kecil di pojok bawah -->
                <div class="mt-auto text-center">
                <span class="selengkapnya">Selengkapnya <i class="bi bi-arrow-right"></i></span>
                </div>
            </div>
            </div>
        </a>
        </div>
      @endforeach
    </div>
  </div>
</div>