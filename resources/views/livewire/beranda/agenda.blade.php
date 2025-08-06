<div class="agenda-container">
  <!-- header -->
  <div class="agenda-header">Agenda DPMPTSP JABAR</div>

  <!-- month/week info -->
  <div class="agenda-date-info">
    <p class="agenda-month">Juli 2025</p>
    <p class="agenda-week">Minggu ke 4</p>
  </div>

  <!-- Swiper -->
  <div class="agenda-swiper-container">
    <div class="swiper agenda-swiper">
      <div class="swiper-wrapper">
        <!-- each slide -->
        <div class="swiper-slide">
          <button class="agenda-date-button">
            <span class="agenda-day">SEN</span>
            <span>21</span>
          </button>
        </div>
        <div class="swiper-slide">
          <button class="agenda-date-button">
            <span class="agenda-day">SEL</span>
            <span>22</span>
          </button>
        </div>
        <div class="swiper-slide">
          <button class="agenda-date-button">
            <span class="agenda-day">RAB</span>
            <span>23</span>
          </button>
        </div>
        <div class="swiper-slide">
          <button class="agenda-date-button active">
            <span class="agenda-day">KAM</span>
            <span>24</span>
          </button>
        </div>
        <div class="swiper-slide">
          <button class="agenda-date-button">
            <span class="agenda-day">JUM</span>
            <span>25</span>
          </button>
        </div>
        <div class="swiper-slide">
          <button class="agenda-date-button">
            <span class="agenda-day">SAB</span>
            <span>26</span>
          </button>
        </div>
        <div class="swiper-slide">
          <button class="agenda-date-button">
            <span class="agenda-day">MIN</span>
            <span>27</span>
          </button>
        </div>
      </div>

      <!-- navigation buttons -->
      <div class="swiper-button-prev agenda-swiper-prev"></div>
      <div class="swiper-button-next agenda-swiper-next"></div>
    </div>
  </div>

  <!-- content -->
  <div class="agenda-content">
    <div class="agenda-empty">
      <img src="/nuxt/empty-agenda.DT7SqNVt.svg" alt="Tidak ada Agenda hari ini" />
      <p class="agenda-empty-title">
        Tidak ada kegiatan/event di hari ini
      </p>
      <p class="agenda-empty-description">
        Silahkan lihat ke tanggal <strong>sebelumnya</strong> atau
        <strong>selanjutnya</strong> untuk melihat agenda lainnya.
      </p>
    </div>
  </div>
</div>
<script>
  document.addEventListener('DOMContentLoaded', () => {
    new Swiper('.agenda-swiper', {
      slidesPerView: 'auto',
      spaceBetween: 16,
      navigation: {
        nextEl: '.agenda-swiper-next',
        prevEl: '.agenda-swiper-prev',
      },
      freeMode: true,           // allows “drag anywhere”
      watchSlidesProgress: true // for consistent active state
    });
  });
</script>
