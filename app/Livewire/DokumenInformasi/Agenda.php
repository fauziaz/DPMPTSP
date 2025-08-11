<?php

namespace App\Livewire\DokumenInformasi;

use App\Models\AgendaModel;
use Livewire\Component;
use Carbon\Carbon;
use Carbon\CarbonInterface;
use Illuminate\Support\Facades\DB;

class Agenda extends Component
{
    public $showDropdownViewMode = false;
    public $viewMode = 'bulan'; 

    public $month;
    public $year;
    public $selectedDate;
    public $currentWeekDates = [];
    public $weekOffset = 0;

    public $currentWeekStartDate;

    public $events = [];

    public $kategori = null;
    public $selectedKategori = [];
    public $tags = [];
    public $tagInput = '';
    public $tipeAcara = null;
    public $selectedTipeAcara = [];
    public $kategoriOptions = [];
    public $selectedtTags = [];

    public $showDetail = false;
    public $detailData = null;

    public $searchJudul = '';


    public function mount()
    {
        $today = now();
        $this->month = $today->month;
        $this->year = $today->year;
        $this->selectedDate = $today->toDateString();
        
        $this->currentWeekStartDate = $today->copy()->startOfWeek(CarbonInterface::MONDAY);
        $this->updateCurrentWeekDates();
        $this->loadEvents(); 

        Carbon::setLocale('id');

    }  

    public function tampilDetail($eventId)
{
    $detailData = AgendaModel::findOrFail($eventId);
    // $status = $this->hitungStatus($event->waktu_mulai, $event->waktu_selesai);
    $status = $this->hitungStatus($detailData->waktu_mulai, $detailData->waktu_selesai);


    // $this->detailData = $detailData;
    $this->detailData = $detailData;    

    $this->detailData->status_dinamis = $status;
    $this->showDetail = true; // << WAJIB supaya modal terbuka
}


    // public function tampilDetail($eventId)
    // {
    //     $event = collect($this->events[$this->selectedDate])->firstWhere('id', $eventId);

    //     if ($event) {
    //         $this->detailData = (object) $event; // Jika data array, konversi ke object
    //         $this->showDetail = true;
    //     }
    // }

    public function tutupDetail()
    {
        $this->showDetail = false;
        $this->detailData = null;
    }

    public function updatedSelectedTipeAcara($value)
    {
        $this->selectedKategori = [];

        $kategoriSet = [];

        foreach ($this->selectedTipeAcara as $tipe) {

            $kategoriMap = [
                'Umum' => ['Hiburan', 'Pendidikan', 'Sosial Budaya', 'Olahraga', 'Lingkungan'],
                // tipe lain tinggal tambah di sini
            ];

            if (isset($kategoriMap[$tipe])) {
                $kategoriSet = array_merge($kategoriSet, $kategoriMap[$tipe]);
            }

        }

        $this->kategoriOptions = array_unique($kategoriSet);
        $this->loadEvents();
    }

    public function updatedSelectedKategori()
    {
        $this->loadEvents();
    }

    public function addTag()
    {
        $tag = trim($this->tagInput);

        if ($tag !== '' && !in_array($tag, $this->tags)) {
            $this->tags[] = $tag;
            $this->tagInput = '';
            $this->loadEvents();
        }
    }

    public function removeTag($index)
    {
        unset($this->tags[$index]);
        $this->tags = array_values($this->tags); // reset index
        $this->loadEvents();
    }

    public function updatedTag()
    {
        $this->loadEvents();
    }

    public function getDaysInMonthProperty()
    {
        return Carbon::create($this->year, $this->month)->daysInMonth;
    }

    public function getStartDayProperty()
    {
        $firstDay = Carbon::create($this->year, $this->month, 1)->dayOfWeekIso;
        return $firstDay; // ISO: Senin=1, Minggu=7
    }

    public function selectDate($date)
    {
        $this->selectedDate = Carbon::parse($date)->toDateString();
    }

    public function previousMonth()
    {
        $date = Carbon::create($this->year, $this->month, 1)->subMonth();
        $this->month = $date->month;
        $this->year = $date->year;
        $this->loadEvents();
    }

    public function nextMonth()
    {
        $date = Carbon::create($this->year, $this->month, 1)->addMonth();
        $this->month = $date->month;
        $this->year = $date->year;
        $this->loadEvents();
    }

    public function previousWeek()
    {
        $this->currentWeekStartDate = $this->currentWeekStartDate->copy()->subWeek();
        $this->selectedDate = $this->currentWeekStartDate->copy()->toDateString();
        $this->updateCurrentWeekDates();
        $this->loadEvents();
    }   

    public function nextWeek()
    {
        $this->currentWeekStartDate = $this->currentWeekStartDate->copy()->addWeek();
        $this->selectedDate = $this->currentWeekStartDate->copy()->toDateString();
        $this->updateCurrentWeekDates();
        $this->loadEvents();
    }

    public function updateCurrentWeekDates()
    {
        $startOfWeek = Carbon::parse($this->selectedDate)->startOfWeek(CarbonInterface::MONDAY);
        $this->currentWeekDates = collect(range(0, 6))->map(function ($day) use ($startOfWeek) {
            return $startOfWeek->copy()->addDays($day);
        })->toArray();
    }

    public function updateSelectedDateByOffset()
    {
        $base = Carbon::today();
        $this->selectedDate = $base->copy()->addWeeks($this->weekOffset)->toDateString();
        $this->updateCurrentWeekDates();
        $this->loadEvents();
    }

    public function updatedSearchJudul()
    {
        $this->loadEvents();
    }

    public function searchByJudul()
{
    $this->loadEvents();
}

    public function getWeekDatesProperty()
    {
        $start = $this->currentWeekStartDate->copy();

        return collect(range(0, 6))->map(function ($i) use ($start) {
            return $start->copy()->addDays($i);
        });
    }
    
    public function updatedViewMode()
    {
        $this->loadEvents();
    }
    
    public function setViewMode($mode)
    {
        $this->viewMode = $mode;
        $this->showDropdownViewMode = false;

        if (!$this->selectedDate) {
            $this->selectedDate = Carbon::today()->toDateString();
        }

        if ($mode === 'minggu') {
            $this->selectedDate = Carbon::today()->toDateString();
            $this->updateCurrentWeekDates();
        }

        $this->loadEvents();
    }

    public function loadEvents()
{
    $query = AgendaModel::query()
        ->when(!empty($this->selectedTipeAcara), fn($q) => $q->whereIn('tipe_acara', $this->selectedTipeAcara))
        ->when(!empty($this->selectedKategori), fn($q) => $q->whereIn('kategori', $this->selectedKategori))
        ->when(!empty($this->searchJudul), fn($q) => $q->where('judul', 'like', '%' . $this->searchJudul . '%'));

    $events = $query->get()->map(function ($event) {
        $status = $this->hitungStatus($event->waktu_mulai, $event->waktu_selesai);

        return [
            'id' => $event->id,
            'judul' => $event->judul,
            // pastikan tanggal selalu string Y-m-d
            'tanggal' => $event->tanggal instanceof \DateTimeInterface ? $event->tanggal->format('Y-m-d') : $event->tanggal,
            'kategori' => $event->kategori,
            'waktu_mulai' => $event->waktu_mulai,
            'waktu_selesai' => $event->waktu_selesai,
            'tipe_event' => $event->tipe_event,
            'tipe_acara' => $event->tipe_acara,
            'status_dinamis' => $status,
        ];
    });

    // $groupedByDate = $events
    //     ->filter(fn($e) => !empty($e['tanggal']))
    //     ->groupBy(fn($e) => $e['tanggal']) // sudah pasti string, jadi bisa langsung groupBy
    //     ->map(fn($group) => $group->values()->all());

    $groupedByDate = collect($events)
        ->filter(fn ($e) => !empty($e['tanggal']))
        ->groupBy(fn ($e) => Carbon::parse((string) $e['tanggal'])->toDateString())
        ->map(fn ($group) => array_values($group->all()));


    $this->events = $groupedByDate->toArray();
}


//     public function loadEvents()
// {
//     $query = AgendaModel::query()
//         ->when(!empty($this->selectedTipeAcara), fn($q) => $q->whereIn('tipe_acara', $this->selectedTipeAcara))
//         ->when(!empty($this->selectedKategori), fn($q) => $q->whereIn('kategori', $this->selectedKategori))
//         ->when(!empty($this->searchJudul), fn($q) => $q->where('judul', 'like', '%' . $this->searchJudul . '%'));

//     $events = $query->get()->map(function ($event) {
//         $status = $this->hitungStatus($event->waktu_mulai, $event->waktu_selesai);

//         return [
//             'id' => $event->id,
//             'judul' => $event->judul,
//             'tanggal' => $event->tanggal,
//             'kategori' => $event->kategori,
//             'waktu_mulai' => $event->waktu_mulai,
//             'waktu_selesai' => $event->waktu_selesai,
//             'tipe_event' => $event->tipe_event,
//             'tipe_acara' => $event->tipe_acara,
//             'status_dinamis' => $status,
//         ];
//     });

//     $groupedByDate = $events
//         ->filter(fn($e) => !empty($e['tanggal']))
//         ->groupBy(fn($e) => Carbon::parse($e['tanggal'])->toDateString())
//         ->map(fn($group) => $group->values()->all());

//     $this->events = $groupedByDate->toArray();
// }


//     public function loadEvents()
// {
//     $query = AgendaModel::query()
//         ->when(!empty($this->selectedTipeAcara), function ($q) {
//             $q->whereIn('tipe_acara', $this->selectedTipeAcara);
//         })
//         ->when(!empty($this->selectedKategori), function ($q) {
//             $q->whereIn('kategori', $this->selectedKategori);
//         })
//         ->when(!empty($this->searchJudul), function ($q) {
//             $q->where('judul', 'like', '%' . $this->searchJudul . '%');
//         });

//     $events = $query->get()->map(function ($event) {
//         return [
//             'id' => $event->id,
//             'judul' => $event->judul,
//             'tanggal' => $event->tanggal,
//             'kategori' => $event->kategori,
//             'waktu_mulai' => $event->waktu_mulai,
//             'waktu_selesai' => $event->waktu_selesai,
//             'tipe_event' => $event->tipe_event,
//             'tipe_acara' => $event->tipe_acara,
//         'status_dinamis' => $this->hitungStatus($event->waktu_mulai, $event->waktu_selesai),
//         ];
//     });

//     $groupedByDate = collect($events)
//         ->filter(fn ($e) => !empty($e['tanggal']))
//         ->groupBy(fn ($e) => Carbon::parse((string) $e['tanggal'])->toDateString())
//         ->map(fn ($group) => array_values($group->all()));
    
//     $this->events = $groupedByDate->toArray();
// }

private function hitungStatus($waktu_mulai, $waktu_selesai)
{
    $now = now();

    $mulai = Carbon::parse($waktu_mulai);
    $selesai = Carbon::parse($waktu_selesai);

    if ($now->lt($waktu_mulai)) {
        return 'Belum Dimulai';
    } elseif ($now->between($waktu_mulai, $waktu_selesai)) {
        return 'Berlangsung';
    } else {
        return 'Selesai';
    }
}


    public function render()
    {
        $daysInMonth = Carbon::create($this->year, $this->month)->daysInMonth;
        $startDay = Carbon::create($this->year, $this->month, 1)->dayOfWeekIso; // 1 = Senin

        Carbon::setLocale('id');


        return view('livewire.dokumen-informasi/agenda', [
            'daysInMonth' => $daysInMonth,
            'startDay' => $startDay,
            // 'currentWeekDates' => $this->currentWeekDates,
        ]);
    }

}
