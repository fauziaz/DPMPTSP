<div id="ppid" class="position-relative text-center d-flex align-items-center justify-content-center">    
    <!-- Overlay -->
    <div class="position-absolute top-0 start-0 w-100 h-100" style="background-color: rgba(0,0,0,0.65); z-index: 1;"></div>

    <div class="container hero-container position-relative z-2 text-white py-5">
        @foreach ($chunkedIcons as $row)
        <div class="row justify-content-center g-4 ps-5 flex-wrap">
            @foreach ($row as $icon)
                <div class="col-2 animate__animated animate__{{ $icon['animation'] }}">
                    @if (!empty($icon['isModal']))
                        <a type="button" data-bs-toggle="modal" data-bs-target="{{ $icon['href'] }}">
                            <img src="{{ $icon['src'] }}" class="img-fluid" alt="{{ $icon['alt'] }}">
                        </a>
                    @else
                        <a href="{{ $icon['href'] }}" target="_blank">
                            <img src="{{ $icon['src'] }}" class="img-fluid" alt="{{ $icon['alt'] }}">
                        </a>
                    @endif
                </div>
            @endforeach
        </div>
        @endforeach
    </div>
    <!-- Modal Maklumat -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl"> <!-- Biar lebih lebar -->
    <div class="modal-content bg-dark text-white">
      <div class="modal-header border-0">
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body p-0">
        <section id="hero">
          <div class="hero-container">
            <div id="heroCarousel" class="carousel slide carousel-fade" data-bs-ride="carousel">
              <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>
              <div class="carousel-inner">
                <div class="carousel-item active" style="background-image: url('https://dpmptsp.tasikmalayakota.go.id/public_html/desktop/assets/assets/img/slide/img1.jpg');">
                  <div class="carousel-content container">
                    <h2 class="animate__animated animate__fadeInDown text-uppercase">
                      <span>Maklumat Pelayanan DPMPTSP Kota Tasikmalaya</span>
                    </h2>
                    <a href="https://dpmptsp.tasikmalayakota.go.id/maklumat" class="btn btn-light animate__animated animate__fadeInUp">Selengkapnya</a>
                  </div>
                </div>
                <div class="carousel-item" style="background-image: url('https://dpmptsp.tasikmalayakota.go.id/public_html/desktop/assets/maklumat1.jfif');"></div>
                <div class="carousel-item" style="background-image: url('https://dpmptsp.tasikmalayakota.go.id/public_html/desktop/assets/maklumat2.jpg');"></div>
                <div class="carousel-item" style="background-image: url('https://dpmptsp.tasikmalayakota.go.id/public_html/desktop/assets/maklumat3.jpg');"></div>
              </div>
              <a class="carousel-control-prev" href="#heroCarousel" role="button" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              </a>
              <a class="carousel-control-next" href="#heroCarousel" role="button" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
              </a>
            </div>
          </div>
        </section>
      </div>
      <div class="modal-footer border-0">
        <a href="https://dpmptsp.tasikmalayakota.go.id/maklumat" class="btn btn-primary">Selengkapnya</a>
      </div>
    </div>
  </div>
</div>
</div>

{{--   <!-- ======= Hero Section ======= -->
  <section id="hero">
    <div class="hero-container">
      <div id="heroCarousel" class="carousel slide carousel-fade" data-bs-ride="carousel" data-bs-interval="5000">
        <div class="carousel-inner" role="listbox">
          <!-- Slide 1 -->
          <div class="carousel-item active" style="background-image: url('https://dpmptsp.tasikmalayakota.go.id/public_html/desktop/assets/assets/img/slide/bck.png');">
            <div class="carousel-container">
              <div class="row">
                <div class="d-flex col-lg-12 justify-content-center">
                  <div class="col-2 animate__animated animate__fadeInDown">
                    <a href="http://new.sipentas.tasikmalayakota.go.id/" target="_blank">
                      <img src="https://dpmptsp.tasikmalayakota.go.id/public_html/desktop//assets/img/COM1.png" class="w-100" />
                    </a>
                  </div>
                  <div class="col-2 animate__animated animate__fadeInUp">
                    <a href="https://dpmptsp.tasikmalayakota.go.id/home" target="_blank">
                      <img src="https://dpmptsp.tasikmalayakota.go.id/public_html/desktop//assets/img/1r.png" class="w-100" />
                    </a>
                  </div>
                  <div class="col-2 animate__animated animate__fadeInUp">
                    <a href="https://simbg.pu.go.id/" target="_blank">
                      <img src="https://dpmptsp.tasikmalayakota.go.id/public_html/desktop//assets/img/COM2.png" class="w-100" />
                    </a>
                  </div>
                  <div class="col-2 animate__animated animate__fadeInUp">
                    <a href="https://mpp.dpmptsp.tasikmalayakota.go.id" target="_blank">
                      <img src="https://dpmptsp.tasikmalayakota.go.id/public_html/desktop//assets/img/123.png" class="w-100" />
                    </a>
                  </div>
                </div>
                <div class="d-flex col-lg-12 justify-content-center">
                  <div class="col-2 animate__animated animate__fadeInDown">
                    <a href="https://s.id/skmPTSP" target="_blank">
                      <img src="https://dpmptsp.tasikmalayakota.go.id/public_html/desktop//assets/img/ikm.png" class="w-100" />
                    </a>
                  </div>
                  <div class="col-2 animate__animated animate__fadeInUp">
                    <a href="https://wa.me/6281120223344" target="_blank">
                      <img src="https://dpmptsp.tasikmalayakota.go.id/public_html/desktop//assets/img/layanan.png" class="w-100" />
                    </a>
                  </div>
                  <div class="col-2 animate__animated animate__fadeInDown">
                    <a href="https://bit.ly/3WoGw8h" target="_blank">
                      <img src="https://dpmptsp.tasikmalayakota.go.id/public_html/desktop//assets/img/sispek.png" class="w-100" />
                    </a>
                  </div>
                  <div class="col-2 animate__animated animate__fadeInDown">
                    <a href="https://oss.go.id/" target="_blank">
                      <img src="https://dpmptsp.tasikmalayakota.go.id/public_html/desktop//assets/img/2r.png" class="w-100" />
                    </a>
                  </div>
                  <div class="col-2 animate__animated animate__fadeInDown">
                    <a type="button" data-bs-toggle="modal" data-bs-target="#exampleModal">
                      <img src="https://dpmptsp.tasikmalayakota.go.id/public_html/desktop/assets/assets/img/slide/maklumat.png" class="w-100" />
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section><!-- End Hero -->
  
    <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <section id="hero">
            <div class="hero-container">
              <div id="heroCarousel" class="carousel slide carousel-fade" data-bs-ride="carousel" data-bs-interval="5000">
                <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>
                <div class="carousel-inner" role="listbox">
                  <div class="carousel-item active" style="background-image: url('https://dpmptsp.tasikmalayakota.go.id/public_html/desktop/assets/assets/img/slide/img1.jpg');">
                    <div class="carousel-container">
                      <div class="carousel-content container">
                        <h2 class="animate__animated animate__fadeInDown text-uppercase"><span>Maklumat Pelayanan DPMPTSP Kota Tasikmalaya</span></h2>
                        <a href="https://dpmptsp.tasikmalayakota.go.id/maklumat" class="btn-get-started animate__animated animate__fadeInUp scrollto">Selengkapnya</a>
                      </div>
                    </div>
                  </div>
                  <div class="carousel-item" style="background-image: url('https://dpmptsp.tasikmalayakota.go.id/public_html/desktop/assets/maklumat1.jfif');"></div>
                  <div class="carousel-item" style="background-image: url('https://dpmptsp.tasikmalayakota.go.id/public_html/desktop/assets/maklumat2.jpg');"></div>
                  <div class="carousel-item" style="background-image: url('https://dpmptsp.tasikmalayakota.go.id/public_html/desktop/assets/maklumat3.jpg');"></div>
                </div>
                <a class="carousel-control-prev" href="#heroCarousel" role="button" data-bs-slide="prev">
                  <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
                </a>
                <a class="carousel-control-next" href="#heroCarousel" role="button" data-bs-slide="next">
                  <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
                </a>
              </div>
            </div>
          </section>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <a href="https://dpmptsp.tasikmalayakota.go.id/maklumat" class="btn btn-primary">Selengkapnya</a>
        </div>
      </div>
    </div>
  </div> --}}
