<div class="profil-pimpinan-page">
    <!-- Hero Section -->
    <x-template.hero-section
        background="{{ asset('https://blogger.googleusercontent.com/img/a/AVvXsEh2mwYKI8kIz6k7klv3_jgGlDLT7sOVSsJUmNl8pMKUFXm7Bj7EGCSkJ5dddNtwG1EuTzBQaiczmCkxz2AmVYeKHaT7B6hENTqTNmG0dqifoi4UQUIUR4pLXL-eu6UkBsZiPvaQ0IOa69yQzbSY9ywcFM5WLEam5IC7I9cqjcaKh6iG6_97KR3aIHEV=w640-h352') }}"
        :breadcrumbs="['Beranda' => '/']"
        title="Agenda"
        subtitle="Berikut Agenda DPMPTSTP Kota Tasikmalaya"
    />

    <div class="section-wrapper py-5" style="padding-bottom: 100px;">
        <div class="container">
            <div class="content-card-agenda" style="max-height: 800px; background: white; border-radius: 10px; padding: 40px;">
                <div class="row">
                    <!-- Kiri: Filter -->
                    <div class="col-12 col-lg-2">
                        <h5>Filter</h5>
                        <div class="mb-3">
                            <div class="form-label d-flex justify-content-between align-items-center">
                                <label>Tipe Acara</label>
                                <i class="bi bi-chevron-down chevron-icon"
                                id="tipeAcaraChevron"
                                role="button"
                                onclick="toggleTipeAcaraCollapse()"
                                {{--data-bs-toggle="collapse"
                                data-bs-target="#tipeAcaraCollapse"
                                aria-expanded="false"
                                aria-controls="tipeAcaraCollapse" --}}
                                style="cursor: pointer;"></i>
                            </div>
                            <div class="collapse" id="tipeAcaraCollapse" wire:ignore.self>
                                <div class="form-check">
                                    <input type="checkbox"
                                        class="form-check-input custom-checkbox"
                                        wire:model="selectedTipeAcara"
                                        wire:change="$refresh"
                                        value="Pimpinan"
                                        id="tipe_pimpinan">
                                    <label class="form-check-label" for="tipe_pimpinan">Pimpinan</label>
                                </div>
                                <div class="form-check">
                                    <input type="checkbox"
                                        class="form-check-input custom-checkbox"
                                        wire:model="selectedTipeAcara"
                                        wire:change="$refresh"
                                        value="Perangkat Daerah"
                                        id="tipe_perangkat_daerah">
                                    <label class="form-check-label" for="tipe_perangkat_daerah">Perangkat Daerah</label>
                                </div>
                                <div class="form-check">
                                    <input type="checkbox"
                                        class="form-check-input custom-checkbox"
                                        wire:model="selectedTipeAcara"
                                        wire:change="$refresh"
                                        value="Umum"
                                        id="tipe_umum">
                                    <label class="form-check-label" for="tipe_umum">Umum</label>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="form-label d-flex justify-content-between align-items-center">
                                <label>Tipe Kategori</label>
                                <i class="bi bi-chevron-down chevron-icon"
                                id="kategoriChevron"
                                role="button"
                                onclick="toggleKategoriCollapse()"
                                style="cursor: pointer;"></i>
                            </div>
                            <div class="collapse" id="kategoriCollapse" wire:ignore.self>
                                @if (!empty($kategoriOptions))
                                    @foreach ($kategoriOptions as $index => $kategori)
                                        <div class="form-check" wire:key="kategori-{{ $kategori }}">
                                            <input type="checkbox" class="form-check-input custom-checkbox"
                                                wire:model="selectedKategori"
                                                value="{{ $kategori }}"
                                                id="kategori_{{ $loop->index }}">
                                            <label class="form-check-label" for="kategori_{{ $loop->index }}">{{ $kategori }}</label>
                                        </div>
                                    @endforeach
                                @else
                                    <div class="text-muted">Pilih Tipe Acara terlebih dahulu.</div>
                                @endif
                            </div>
                        </div>
                        {{-- <div class="mb-3">
                            <label class="mb-3">Tag</label>
                            <input type="text"
                                class="form-control tag-input"
                                wire:model="tagInput"
                                wire:keydown.enter.prevent.stop="addTag"
                                @keydown.enter.stop.prevent
                                placeholder="Masukkan tag">
                        </div> --}}
                        @if(!empty($tags))
                            <div class="mb-3 tag-box d-flex flex-wrap gap-2">
                                @foreach($tags as $index => $tag)
                                    <span class="badge" style="background-color: #133c6b">
                                        {{ $tag }}
                                        <button type="button" wire:click="removeTag({{ $index }})" class="btn-close btn-close-white btn-sm ms-1" aria-label="Close"></button>
                                    </span>
                                @endforeach
                            </div>
                        @endif
                        {{-- <button class="btn btn-outline-primary w-100" wire:click="loadEvents">Cari Agenda</button> --}}
                    </div>
                    <!-- Tengah: Kalender -->
                    <div class="col-12 col-lg-10">
                        <div class="row">
                            {{-- Baris 1: Navigasi bulan --}}
                            <div class="col-12 col-lg-8 d-flex align-items-center flex-wrap gap-2">
                                <div class="d-flex gap-2">
                                    {{-- @if($viewMode === 'bulan') --}}
                                        <button wire:click="previousMonth" class="btn btn-outline-secondary btn-sm custom-pagination-btn">
                                            <i class="bi bi-chevron-left"></i>
                                        </button>
                                        <button wire:click="nextMonth" class="btn btn-outline-secondary btn-sm custom-pagination-btn">
                                            <i class="bi bi-chevron-right"></i>
                                        </button>
                                    {{-- @elseif($viewMode === 'minggu')
                                        <button wire:click="previousWeek" class="btn btn-outline-secondary btn-sm custom-pagination-btn">
                                            <i class="bi bi-chevron-left"></i>
                                        </button>
                                        <button wire:click="nextWeek" class="btn btn-outline-secondary btn-sm custom-pagination-btn">
                                            <i class="bi bi-chevron-right"></i>
                                        </button>
                                    @endif --}}
                                </div>
                                @php
                                    $currentWeekDates = $this->currentWeekDates;
                                    if ($viewMode === 'bulan') {
                                        $date = \Carbon\Carbon::create($year, month: $month);
                                        $waktu = '<span style="color: #001a39;">' . $date->translatedFormat('F') . '</span> ' .
                                                '<span style="color: #6c757d;">' . $date->translatedFormat('Y') . '</span>';
                                    } elseif ($viewMode === 'minggu' && !empty($currentWeekDates) && isset($currentWeekDates[0], $currentWeekDates[count($currentWeekDates)-1])) {
                                        $startOfWeek = \Carbon\Carbon::parse($currentWeekDates[0]);
                                        $endOfWeek = \Carbon\Carbon::parse($currentWeekDates[count($currentWeekDates)-1]);
                                        $waktu = '<span style="color: #001a39;">' .
                                                    $startOfWeek->translatedFormat('d') . ' - ' . $endOfWeek->translatedFormat('d F') .
                                                '</span> <span style="color: #6c757d;">' . $startOfWeek->translatedFormat('Y') . '</span>';
                                    } else {
                                        $waktu = '<span class="text-muted">Tidak ada data minggu</span>';
                                    }
                                @endphp
                                <h4 class="m-0 text-start fw-bold fs-2">{!! $waktu !!}</h4>
                            </div>
                            {{-- Baris 2: Search dan Dropdown --}}
                            <div class="col-12 col-lg-8 mt-3 mb-2 d-flex flex-wrap gap-3 align-items-center justify-content-between">
                                {{-- Search box with icon --}}
                                <div class="flex-grow-1 col-12">
                                    <div class="input-group">
                                        <span class="input-group-text bg-white border-end-0">
                                            <i class="bi bi-search"></i>
                                        </span>
                                        <input
                                            type="text"
                                            wire:model="searchJudul"
                                            wire:keydown.enter.prevent="searchByJudul"
                                            class="form-control border-start-0"
                                            placeholder="Cari agenda">
                                    </div>
                                </div>
                                {{-- <div class="text-nowrap small">
                                    Tampilkan dalam
                                </div>
                                {{-- Dropdown Bulan dan minggu --}}
                                {{-- <div class="position-relative" style="width: 160px;">
                                    <div class="form-control form-control-sm d-flex justify-content-between align-items-center"
                                        style="cursor: pointer;"
                                        wire:click="$toggle('showDropdownViewMode')">
                                        {{ ucfirst($viewMode) }}
                                        <i class="bi bi-chevron-down ms-2"></i>
                                    </div>
                                    @if($showDropdownViewMode)
                                        <div class="dropdown-menu show p-2 shadow-sm mt-1"
                                            style="position: absolute; z-index: 999; width: 100%; border-radius: 8px;">
                                            @foreach(['bulan' => 'Bulan', 'minggu' => 'Minggu'] as $val => $label)
                                                <div 
                                                    wire:click="setViewMode('{{ $val }}')"
                                                    class="dropdown-item small d-flex justify-content-between align-items-center py-1 px-2 {{ $viewMode == $val ? 'bg-secondary text-white' : '' }}"
                                                    style="cursor: pointer; border-radius: 5px;"
                                                    onmouseover="this.classList.add('bg-light')" 
                                                    onmouseout="this.classList.remove('bg-light')"
                                                >
                                                    <span>{{ $label }}</span>
                                                    @if($viewMode == $val)
                                                        <i class="bi bi-check2"></i>
                                                    @endif
                                                </div>
                                            @endforeach
                                        </div>
                                    @endif
                                </div> --}}
                            </div>
                            {{-- Baris 3: Kalender dan Agenda --}}
                            {{-- TAMPILAN BULAN --}}
                            @if($viewMode === 'bulan')
                                <div class="col-12 col-lg-8">
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-fixed text-center align-middle">
                                            <thead>
                                                <tr>
                                                    @foreach(['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu'] as $day)
                                                        <th>{{ $day }}</th>
                                                    @endforeach
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php
                                                    $firstOfMonth = \Carbon\Carbon::create($year, $month, 1);
                                                    $startDayIndex = $firstOfMonth->dayOfWeekIso; // Senin = 1
                                                    $daysInThisMonth = $firstOfMonth->daysInMonth;
                                                    $startDate = $firstOfMonth->copy()->subDays($startDayIndex - 1);
                                                @endphp
                                                {{-- @php $day = 1; @endphp --}}
                                                @for ($row = 0; $row < 6; $row++)
                                                    <tr>
                                                        @for ($col = 0; $col < 7; $col++)
                                                            @php
                                                                $currentDate = $startDate->copy()->addDays($row * 7 + $col);
                                                                $isCurrentMonth = $currentDate->month == $month;
                                                                $isToday = $currentDate->isToday();
                                                                $selected = $currentDate->toDateString() === \Carbon\Carbon::parse($selectedDate)->toDateString();
                                                                $day = $currentDate->day;
                                                                $hasEvents = isset($events[$currentDate->toDateString()]);
                                                            @endphp
                                                            <td class="p-1 text-center {{ !$isCurrentMonth ? 'outside-month' : '' }}">
                                                                <div wire:click="selectDate('{{ $currentDate->toDateString() }}')"
                                                                    class="calendar-day
                                                                        {{ $selected ? 'active' : '' }}
                                                                        {{ $hasEvents ? 'has-event' : '' }}
                                                                        {{ $isToday ? 'today' : '' }}">
                                                                    <div class="d-flex justify-content-between w-100">
                                                                        <strong>{{ $day }}</strong>
                                                                        @if ($isToday)
                                                                            <span class="badge ms-auto calendar-today">Hari ini</span>
                                                                        @endif
                                                                    </div>

                                                                    @if ($hasEvents)
                                                                        <span class="calendar-badge {{ $currentDate->lt(\Carbon\Carbon::today()) ? 'badge-past' : 'badge-upcoming' }}">
                                                                            {{ count($events[$currentDate->toDateString()]) }} kegiatan
                                                                        </span>
                                                                    @endif
                                                                </div>
                                                            </td>
                                                        @endfor
                                                    </tr>
                                                @endfor
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                {{-- Agenda di Bulan --}}
                                {{-- BAWAH INI SCROLLABLE --}}
                                <div class="card-agenda col-12 col-lg-4 d-flex flex-column" style="max-height: 500px; overflow: hidden;">
                                    @php
                                        $tanggal = \Carbon\Carbon::parse(time: $selectedDate)->translatedFormat('d F Y');
                                        $day = \Carbon\Carbon::parse($selectedDate)->day;
                                    @endphp

                                    {{-- Card Header: Judul dan Tanggal --}}
                                    <div class="card bg-light text-center mb-3">
                                        <div class="card-body py-2">
                                            <p class="card-text mb-0">Agenda, <strong>{{ $tanggal }}</strong></p>
                                        </div>
                                    </div>
                                    
                                        {{-- Bawah ini card yang scrollable --}}
                                        <div class="overflow-auto" style="flex: 1 1 auto; min-height: 0;">
                                            @if(isset($events[$selectedDate]) && count($events[$selectedDate]) > 0)
                                        @php
                                            $eventList = $events[$selectedDate] ?? [];
                                        @endphp
                                        @foreach ($eventList as $event)
                                            {{-- Card Detail Agenda --}}
                                            <div class="card mb-3 {{ \Carbon\Carbon::parse($event['tanggal'])->lt(\Carbon\Carbon::today()) ? 'agenda-past' : 'agenda-upcoming' }}"
                                                    wire:click="tampilDetail({{ $event['id'] }})">
                                                <div class="card-body">
                                                    <div class="d-flex justify-content-between align-items-center mb-2">
                                                        <span class="badge" style="background-color: aliceblue; color: #133c6b;">{{ $event['kategori'] }}</span>
                                                        <button type="button" 
                                                            class="btn btn-link p-0 text-decoration-none text-dark">
                                                            <i class="bi bi-chevron-right"></i>
                                                        </button>
                                                    </div>
                                                    <p class="mb-1"><strong>{{ $event['judul'] }}</strong></p>
                                                    <p class="mb-1">
                                                        {{ \Carbon\Carbon::parse($event['waktu_mulai'])->format('H:i') }} - 
                                                        {{ \Carbon\Carbon::parse($event['waktu_selesai'])->format('H:i') }} WIB
                                                    </p>
                                                    <p class="mb-1">Agenda {{ $event['tipe_event'] }} | {{ $event['tipe_acara'] }}</p>
                                                    <span class="badge bg-secondary">{{ $event['status'] }}</span>
                                                </div>
                                            </div>
                                        @endforeach
                                    @else
                                        <div class="card bg-light text-center">
                                            <div class="card-body py-3">
                                                <p class="mb-0"><em>Tidak ada agenda pada hari ini.</em></p>
                                            </div>
                                        </div>
                                    @endif
                                        </div>
                                </div>
                            {{-- TAMPILAN MINGGU --}}
                            @elseif($viewMode === 'minggu')
                                <div class="d-flex justify-content-between overflow-auto gap-2 py-2 bg-light mb-3">
                                    @foreach ($this->currentWeekDates as $date)
                                        @php
                                            $today = Carbon\Carbon::today()->toDateString();
                                            // $now = Carbon\Carbon::now();

                                            $dateKey = $date->toDateString();
                                            $isSelected = $selectedDate === $dateKey;
                                            $isToday = $today === $dateKey;
                                            $hasEvent = !empty($events[$dateKey]);
                                            $day = $date->translatedFormat('l'); 
                                            $dayNum = $date->translatedFormat('d');
                                            $isSunday = $date->dayOfWeek === Carbon\Carbon::SUNDAY;

                                            $shouldShowIndicator = $isToday || $hasEvent;
                                            $indicatorColor = $shouldShowIndicator ? '#0d6efd' : null; // Biru
                                            if ($isSelected && $shouldShowIndicator) {
                                                $indicatorColor = 'yellow'; // Menimpa jadi kuning jika dipilih
                                            }
                                        @endphp

                                        <div class="text-center px-2 py-1 d-flex flex-column align-items-center justify-content-between"
                                            style="
                                                width: 80px;
                                                background-color: {{ $isSelected ? '#133c6b' : '#f8f9fa' }};
                                                border-radius: 4px;
                                            ">
                                            
                                            {{-- Titik indikator atas --}}
                                           <div class="d-flex flex-column align-items-center" style="height: 12px;">
                                                @if ($shouldShowIndicator)
                                                    <div class="rounded-circle agenda-indicator"
                                                        style="width: 6px; height: 6px; background-color: {{ $indicatorColor }};"></div>
                                                @endif
                                            </div>

                                            {{-- Nomor tanggal --}}
                                            <div class="my-1">
                                                <button 
                                                    wire:click="$set('selectedDate', '{{ $date->toDateString() }}')"
                                                    class="btn btn-sm px-0 py-0 border-0 bg-transparent {{ $isSelected ? 'text-white fw-bold' : ($isSunday ? 'text-danger' : 'text-dark') }}"
                                                    style="font-size: 1.2rem; font-weight: 700px;"
                                                >
                                                    {{ $dayNum }}
                                                </button>
                                            </div>

                                            {{-- Hari --}}
                                            <div class="small mt-1 {{ $isSelected ? 'text-white' : ($isSunday ? 'text-danger' : 'text-muted') }}">
                                                {{ $day }}
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                @php
                                    $tanggal = \Carbon\Carbon::parse($selectedDate)->translatedFormat('d F Y');
                                @endphp
                                {{-- Judul dan tanggal --}}
                                <div class="card bg-light text-center mb-3">
                                    <div class="card-body py-2">
                                        <p class="card-text mb-0">Agenda, <strong>{{ $tanggal }}</strong></p>
                                    </div>
                                </div>
                                {{-- Detail Agenda --}}
                                @if(isset($events[$selectedDate]) && count($events[$selectedDate]) > 0)
                                    @foreach($events[$selectedDate] as $event)
                                        <div class="d-flex align-items-start gap-2 mb-3">
                                            {{-- Jam --}}
                                            <div class="text-end" style="width: 70px;">
                                                <span class="fw-bold">{{ \Carbon\Carbon::parse($event['waktu_mulai'])->format('H:i') }}</span>
                                            </div>

                                            <div class="d-flex flex-column align-items-center" style="width: 10px;">
                                                <div class="rounded-circle bg-primary" style="width: 10px; height: 10px;"></div>
                                                <div class="flex-grow-1" style="width: 2px; background-color: #ccc;"></div>
                                            </div>


                                            {{-- Card konten --}}
                                            <div class="card flex-grow-1" wire:click="tampilDetail({{ $event['id'] }})" style="cursor:pointer;">
                                                <div class="card-body p-2">
                                                    <div class="d-flex justify-content-between align-items-center mb-1">
                                                        <span class="badge bg-light text-dark">{{ $event['kategori'] }}</span>
                                                        <i class="bi bi-chevron-right text-muted"></i>
                                                    </div>
                                                    <p class="mb-1"><strong>{{ $event['judul'] }}</strong></p>
                                                    <p class="mb-1 small text-muted">
                                                        {{ \Carbon\Carbon::parse($event['waktu_mulai'])->format('H:i') }} - 
                                                        {{ \Carbon\Carbon::parse($event['waktu_selesai'])->format('H:i') }} WIB
                                                    </p>
                                                    <p class="mb-1 small text-muted">Agenda {{ $event['tipe_event'] }} | {{ $event['tipe_acara'] }}</p>
                                                    <span class="badge bg-secondary">{{ $event['status'] }}</span>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @else
                                    <div class="card bg-light text-center">
                                        <div class="card-body py-3">
                                            <p class="mb-0"><em>Tidak ada agenda pada hari ini.</em></p>
                                        </div>
                                    </div>
                                @endif
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        @include('components.agenda.modal-detail', [
        'showDetail' => $showDetail,
        'detailData' => $detailData,
        ])
    </div>

<script> 
    document.addEventListener('DOMContentLoaded', () => {
        syncChevronStates();
    });

    document.addEventListener('livewire:update', () => {
        syncChevronStates();
    });

    function syncChevronStates() {
        const tipeCollapse = document.getElementById('tipeAcaraCollapse');
        const tipeChevron = document.getElementById('tipeAcaraChevron');
        if (tipeCollapse?.classList.contains('show')) {
            tipeChevron?.classList.add('rotate');
        } else {
            tipeChevron?.classList.remove('rotate');
        }

        const kategoriCollapse = document.getElementById('kategoriCollapse');
        const kategoriChevron = document.getElementById('kategoriChevron');
        if (kategoriCollapse?.classList.contains('show')) {
            kategoriChevron?.classList.add('rotate');
        } else {
            kategoriChevron?.classList.remove('rotate');
        }
    }

    function toggleTipeAcaraCollapse() {
        const collapseEl = document.getElementById('tipeAcaraCollapse');
        const chevronEl = document.getElementById('tipeAcaraChevron');
        const instance = bootstrap.Collapse.getOrCreateInstance(collapseEl);
        collapseEl.classList.contains('show') ? instance.hide() : instance.show();
    }

    function toggleKategoriCollapse() {
        const collapseEl = document.getElementById('kategoriCollapse');
        const chevronEl = document.getElementById('kategoriChevron');
        const instance = bootstrap.Collapse.getOrCreateInstance(collapseEl);
        collapseEl.classList.contains('show') ? instance.hide() : instance.show();
    }
</script>