<footer class="text-white pt-4 mt-4" style="background-color: #133C6B;">
    <div class="container">
        <!-- ROW PERTAMA: Logo + alamat -->
        <div class="row">
            <div class="col-12 p-3 text-md-start">
                <img class="burn-effect mb-2 col-12 gambar-footer" style="border-radius: 25px;" src="https://dpmptsp.tasikmalayakota.go.id/public_html/desktop/assets/assets/img/logo-dpmptsp-tasikmalaya.png" alt="Logo">
            </div>
        </div>

        <div class="row">
            <div class="col-6 col-md-3 p-3">
                <p class="mt-2 mb-1">
                    Komplek Balekota, Jl. Letnan Harun No.1, Sukarindik, Kec. Bungursari, Kota Tasikmalaya, Jawa Barat 46113
                </p>
            </div>
            <div class="col-6 col-md-3 p-3">
                <p class="mb-1"><strong>Phone:</strong> (0265) 314375</p>
            </div>
            <div class="col-6 col-md-3 p-3">
                <p><strong>Email:</strong> dpmptsp@tasikmalayakota.go.id</p>
            </div>
            <div class="col-6 col-md-3 p-3">
                 <div class="social-links mb-4">
                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                    <a href="#"><i class="fab fa-twitter"></i></a>
                    <a href="#"><i class="fab fa-instagram"></i></a>
                    <a href="#"><i class="fab fa-linkedin-in"></i></a>
                    <a href="#"><i class="fab fa-youtube"></i></a>
                </div>
            </div>
        </div>
        
        <!-- ROW KEDUA: 4 menu sejajar -->
        <div class="row">
            <div class="col-6 col-md-3 p-3">
                <h7>Komponen Profile</h7>
                <ul>
                    @foreach ($profiles as $profile)
                        @php
                            $url = str_starts_with($profile['url'], 'http')
                                ? $profile['url']
                                : (Route::has($profile['url']) ? route($profile['url']) : url($profile['url']));
                        @endphp
                        <li><a href="{{ $url }}" class="custom-link">{{ $profile['name'] }}</a></li>
                    @endforeach
                </ul>
            </div>
            <div class="col-6 col-md-3 p-3">
                <h7>Penanaman Modal</h7>
                <ul>
                    @foreach ($modals as $modal)
                        @php
                            $url = str_starts_with($modal['url'], 'http')
                                ? $modal['url']
                                : (Route::has($modal['url']) ? route($modal['url']) : url($modal['url']));
                        @endphp
                        <li><a href="{{ $url }}" class="custom-link">{{ $modal['name'] }}</a></li>
                    @endforeach
                </ul>
            </div>
            <div class="col-6 col-md-3 p-3">
                <h7>Dokumentasi dan Informasi</h7>
                <ul>
                    @foreach ($dokumens as $dokumen)
                        @php
                            $url = str_starts_with($dokumen['url'], 'http')
                                ? $dokumen['url']
                                : (Route::has($dokumen['url']) ? route($dokumen['url']) : url($dokumen['url']));
                        @endphp
                        <li><a href="{{ $url }}" class="custom-link">{{ $dokumen['name'] }}</a></li>
                    @endforeach
                </ul>
            </div> 
            <div class="col-6 col-md-3 p-3">
                <h7>Layanan Publik</h7>
                <ul>
                    @foreach ($layanans as $layanan)
                        @php
                            $url = str_starts_with($layanan['url'], 'http')
                                ? $layanan['url']
                                : (Route::has($layanan['url']) ? route($layanan['url']) : url($layanan['url']));
                        @endphp
                        <li><a href="{{ $url }}" class="custom-link">{{ $layanan['name'] }}</a></li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
    <hr>
    <div class="text-white text-center p-3" style="background-color: #133C6B;">
        <p class="mb-0">&copy; {{ now()->year }} <strong>DPMPTSP</strong> Kota Tasikmalaya</p>
    </div>
    <br>
</footer>
