<?php

namespace App\Livewire\Berita;

use Livewire\Component;
use Illuminate\Support\Str;
use App\Models\Berita;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination; 

    public $kategoriTerpilih = 'semua';
    public $kategoriList = [];

    public $beritaKategori = [];
    public $beritaTerbaru = [];
    public $beritaPopuler = [];
    public $semuaBerita = [];

    protected $queryString = ['search', 'perPage'];
    public $search = '';
    public $showPerPageDropdown = false;
    public $perPage = 5;
    public $isSearchClicked = false;
    public $showPageDropdown = false;
    public $searchPage = '';


    public function mount()
    {
        $this->kategoriList = Berita::select('kategori')->distinct()->pluck('kategori')->toArray();
        $this->filterByKategori('semua');
    }

    public function filterByKategori($kategori)
    {
        $this->kategoriTerpilih = $kategori;

        $query = Berita::query();
        if ($kategori !== 'semua') {
            $query->where('kategori', $kategori);
        }

        $this->beritaTerbaru = $query->clone()->latest()->take(5)->get();
        $this->beritaPopuler = $query->clone()->orderByDesc('views')->take(5)->get();
        $this->semuaBerita = $query->latest()->get();

        $this->resetPage(); // 👈 ini wajib biar total dan paginate update
    }

    
    public function performSearch()
    {
        $this->isSearchClicked = true;
        $this->resetPage();
    }

        public function getBeritasProperty()
    {
        $query = Berita::query();

        if ($this->kategoriTerpilih !== 'semua') {
            $query->where('kategori', $this->kategoriTerpilih);
        }

        if (!empty($this->search)) {
            $query->where(function($q) {
                $q->where('judul', 'like', '%' . $this->search . '%')
                ->orWhere('isi', 'like', '%' . $this->search . '%');
            });
        }

        return $query->latest()->paginate($this->perPage);
    }

    public function updatedSearchPage()
    {
        $page = intval($this->searchPage);
        if ($page >= 1 && $page <= $this->getBeritasProperty()->lastPage()) {
            $this->gotoPage($page);
            $this->showPageDropdown = false;
        }
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updatedPerPage()
    {
        $this->resetPage();
    }

    public function pilihHalaman($page)
    {
        $this->gotoPage($page);
        $this->showPageDropdown = false;
    }

        public function togglePerPageDropdown()
    {
        $this->showPerPageDropdown = !$this->showPerPageDropdown;
    }

        public function setPerPage($value)
    {
        $this->perPage = $value;
        $this->showPerPageDropdown = false;
        $this->resetPage();
    }

    public function render()
    {
        $beritas = $this->getBeritasProperty(); // Gunakan ini, bukan $this->beritas langsung

        return view('livewire.berita.index', [
            'beritas' => $beritas,
            'total' => $beritas->total(),
            'lastPage' => $beritas->lastPage(),
            'currentPage' => $beritas->currentPage(),
            'perPage' => $this->perPage,
            'paginator' => $beritas, // <--- penting untuk komponen blade
        ]);
    }
}