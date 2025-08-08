<div class="wrapper">

  <!-- Header Berita -->
  <div class="berita-section text-white text-center d-flex"
       style="background-image: url('{{ asset('image/gedung.jpg') }}');">
    <div class="container py-5">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-transparent justify-content-center">
          <li class="breadcrumb-item"><a href="/" class="text-white">Beranda</a></li>
          <li class="breadcrumb-item active text-white" aria-current="page">{{ $berita->kategori }}</li>
        </ol>
      </nav>

      <h2 class="display-5 fw-bold">{{ $berita->judul }}</h2>
      <div class="lead mb-2">
        <i class="bi bi-clock me-1"></i>
        @if ($berita->created_at->diffInHours(now()) < 24)
          {{ $berita->created_at->diffForHumans() }}
        @else
          {{ $berita->created_at->translatedFormat('d F Y') }}
        @endif
        <span class="mx-2">|</span>
        <i class="bi bi-pencil me-1"></i> Penulis: {{ $berita->penulis }}
      </div>

      <div class="d-flex align-items-center justify-content-center flex-wrap gap-3 mt-2">
        <div><i class="bi bi-eye me-1"></i> {{ $berita->views }} kali dilihat</div>
        <div><i class="bi bi-share me-1"></i> {{ $berita->shared }} kali dibagikan</div>
        <button class="btn btn-light" onclick="toggleShareCard()" id="shareBtn">
          <i class="bi bi-share-fill me-1"></i> Bagikan
        </button>
      </div>
    </div>
  </div>

  <!-- Konten Utama -->
  <div class="container py-5">
    <div class="d-flex flex-column flex-lg-row gap-5 align-items-start">

      <!-- Konten Berita -->
      <div class="flex-grow-2">
        <img src="{{ asset($berita->gambar) }}"
             alt="{{ $berita->judul }}"
             class="rounded shadow mb-4 w-100">

        <div style="text-align: justify;">
          <strong>{{ $berita->penulis }} - </strong>
          {!! nl2br(e($berita->deskripsi)) !!}
        </div>

        <a href="{{ route('berita.index') }}" class="btn mt-4" style="background-color: #133C6B; color: #fff;">← Kembali</a>
      </div>

      <!-- Sidebar Berita Lainnya -->
      <div class="tab-wrapper w-100" style="max-width: 400px;">
        <div class="tab-head d-flex justify-content-between mb-2">
          <div class="tab-but fw-bold">Berita Lainnya</div>
        </div>

        <div class="tab-content">
          <div id="tab-terbaru">
            @foreach ($beritas_terkait as $item)
              <div class="tab-card mb-3 p-2 rounded">
                <a href="{{ route('berita.detail', $item->id) }}" class="text-decoration-none text-dark">
                  <div class="d-flex gap-3 align-items-start">
                    <div class="thumbnail-wrapper">
                      <img src="{{ asset($item->gambar) }}"
                           alt="{{ $item->judul }}"
                           class="thumbnail-berita" />
                    </div>
                    <div class="flex-grow-1">
                      <p class="mb-1">{{ \Illuminate\Support\Str::limit($item->judul, 90) }}</p>
                      <small class="text-muted">
                        {{ $item->kategori }}
                        <span class="mx-1">|</span>
                        <i class="bi bi-clock me-1"></i>
                        @if ($item->created_at->diffInHours(now()) < 24)
                          {{ $item->created_at->diffForHumans() }}
                        @else
                          {{ $item->created_at->translatedFormat('d F Y') }}
                        @endif
                      </small>
                    </div>
                  </div>
                </a>
              </div>
            @endforeach
          </div>
        </div>
      </div>

    </div>
  </div>

  <!-- Share Card -->
  <div id="shareCard" class="d-none position-fixed top-50 start-50 translate-middle bg-white shadow-lg p-4 rounded"
       style="z-index: 1055; min-width: 360px; max-width: 720px;">
    <h5 class="fw-bold mb-3">Bagikan Berita</h5>

    <div class="mb-3">
      <small class="text-muted d-block mb-1">Judul Berita</small>
      <p class="mb-0 fw-semibold">{{ $berita->judul }}</p>
    </div>

    <div class="mb-3">
      <button class="btn btn-outline-secondary w-100" onclick="copyToClipboard()">
        <i class="bi bi-clipboard me-1"></i> Salin Link
      </button>
    </div>

    <div class="mb-2">
      <small class="text-muted">Bagikan Melalui</small>
    </div>

    <div class="d-flex justify-content-between flex-wrap gap-2 mb-3">
      <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(route('berita.detail', ['id' => $berita->id])) }}"
         class="text-decoration-none text-center text-primary" target="_blank">
        <i class="bi bi-facebook fs-3 d-block"></i>
        <small>Facebook</small>
      </a>

      <a href="https://twitter.com/intent/tweet?url={{ urlencode(route('berita.detail', ['id' => $berita->id])) }}"
         class="text-decoration-none text-center text-info" target="_blank">
        <i class="bi bi-twitter fs-3 d-block"></i>
        <small>Twitter</small>
      </a>

      <a href="https://wa.me/?text={{ urlencode(route('berita.detail', ['id' => $berita->id])) }}"
         class="text-decoration-none text-center text-success" target="_blank">
        <i class="bi bi-whatsapp fs-3 d-block"></i>
        <small>Whatsapp</small>
      </a>

      <a href="mailto:?subject={{ urlencode($berita->judul) }}&body={{ urlencode(route('berita.detail', ['id' => $berita->id])) }}"
         class="text-decoration-none text-center text-danger" target="_blank">
        <i class="bi bi-envelope fs-3 d-block"></i>
        <small>Email</small>
      </a>

      <a href="https://www.instagram.com/"
         class="text-decoration-none text-center text-danger" target="_blank">
        <i class="bi bi-instagram fs-3 d-block"></i>
        <small>Instagram</small>
      </a>
    </div>

    <div class="d-grid">
      <button onclick="toggleShareCard()" class="btn btn-dark">Tutup</button>
    </div>
  </div>

</div>

<script>
  function toggleShareCard() {
    const card = document.getElementById('shareCard');
    card.classList.toggle('d-none');
  }

  function copyToClipboard() {
    const link = "{{ route('berita.detail', ['id' => $berita->id]) }}";
    const tempInput = document.createElement("input");
    tempInput.value = link;
    document.body.appendChild(tempInput);
    tempInput.select();
    document.execCommand("copy");
    document.body.removeChild(tempInput);
    alert("Link berhasil disalin!");

    fetch("{{ route('berita.share', $berita->id) }}", {
      method: "POST",
      headers: {
        "X-CSRF-TOKEN": "{{ csrf_token() }}",
        "Content-Type": "application/json"
      }
    });
  }

  document.addEventListener('keydown', function(e) {
    if (e.key === "Escape") {
      document.getElementById('shareCard').classList.add('d-none');
    }
  });
</script>