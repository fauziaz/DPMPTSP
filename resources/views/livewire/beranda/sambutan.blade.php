<div>
    <section style="background-color: #133C6B; color: white; position: relative;">
        <div class="container pt-5">
            <div class="row align-items-center justify-content-center mb-5">
                <div class="col-12 mb-4 text-center">
                    <h2>Sambutan</h2>
                    <h6 class="text-white">
                        {{ $sambutan?->jabatan ?? 'Jabatan Belum Diisi' }}
                    </h6>
                </div>

                <div class="row align-items-center justify-content-center">
                    <!-- Foto + Nama -->
                    <div class="col-md-4 text-center mb-4 mb-md-0">
                        <div class="sambutan-image-wrapper mb-3">
                            @if ($sambutan?->foto_path)
                                <img src="{{ asset('storage/' . $sambutan->foto_path) }}"
                                     alt="{{ $sambutan->nama }}"
                                     class="img-fluid rounded shadow sambutan-photo"
                                     style="max-height: 280px;">
                            @elseif ($sambutan?->foto_url)
                                <img src="{{ $sambutan->foto_url }}"
                                     alt="{{ $sambutan->nama }}"
                                     class="img-fluid rounded shadow sambutan-photo"
                                     style="max-height: 280px;">
                            @else
                                <img src="{{ asset('image/default.png') }}"
                                     alt="Default"
                                     class="img-fluid rounded shadow sambutan-photo"
                                     style="max-height: 280px;">
                            @endif
                        </div>
                        <h5 class="fw-bold">{{ $sambutan?->nama ?? 'Nama Belum Diisi' }}</h5>
                        <p class="small">{{ $sambutan?->jabatan ?? 'Jabatan Belum Diisi' }}</p>
                    </div>

                    <!-- Teks Sambutan -->
                    <div class="col-md-6">
                        <p class="text-justify" style="text-align: justify;">
                            {!! $sambutan?->isi ?? '<i>Belum ada sambutan...</i>' !!}
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Gelombang Bawah -->
        <div style="overflow: hidden; line-height: 0;">
            <svg viewBox="0 0 500 100" preserveAspectRatio="none" style="height: 80px; width: 100%;">
                <path d="M0,50 C150,0 350,100 500,50 L500,100 L0,100 Z" style="stroke: none; fill: #ffffffff;"></path>
            </svg>
        </div>
    </section>
</div>