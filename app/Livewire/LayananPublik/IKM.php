<?php

namespace App\Livewire\LayananPublik;

use Livewire\Component;
use Illuminate\Support\Str;
use App\Models\IKMModel;
use Livewire\WithPagination;

/**
 * @var \Illuminate\Pagination\LengthAwarePaginator $ikm
 * @property \Illuminate\Contracts\Pagination\LengthAwarePaginator $ikm
 */

class IKM extends Component
{
    use WithPagination;

    protected $queryString = ['search', 'tahunDipilih', 'perPage'];
    public $tahuns = [];
    public $tahunDipilih = null;
    public $search = '';
    public $showPerPageDropdown = false;
    public $perPage = 10;
    public $showDetail = false;
    public $detailData = null;
    public $isSearchClicked = false;
    public $showPageDropdown = false;
    public $searchPage = '';

    public function mount()
    {
        $this->tahuns = IKMModel::select('tahun')
            ->distinct()
            ->orderByDesc('tahun')
            ->pluck('tahun')
            ->toArray();

        $this->tahunDipilih = $this->tahuns[0] ?? null;
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updatedPerPage()
    {
        $this->resetPage();
    }

    public function filterByYear($tahun)
    {
        $this->tahunDipilih = $tahun;
        $this->resetPage();
    }

    public function performSearch()
    {
        $this->isSearchClicked = true;
        $this->resetPage();
    }

    public function updatedSearchPage()
    {
        $page = intval($this->searchPage);
        if ($page >= 1 && $page <= $this->getIKMProperty()->lastPage()) {
            $this->gotoPage($page);
            $this->showPageDropdown = false;
        }
    }

    public function pilihHalaman($page)
    {
        $this->gotoPage($page);
        $this->showPageDropdown = false;
    }

    public function lihatDetail($id)
    {
        $this->detailData = IKMModel::findOrFail($id);
        $this->showDetail = true;
    }

    public function tutupDetail()
    {
        $this->showDetail = false;
        $this->detailData = null;
    }

    public function unduh($id)
    {
        $ikms = IKMModel::findOrFail($id);
        $ikms->increment('downloads');

        if (Str::startsWith($ikms->file_path, ['http://', 'https://'])) {
            return redirect()->away($ikms->file_path);
        }

        $path = storage_path('app/public/' . $ikms->file_path);
        if (!file_exists($path)) {
            abort(404, 'File tidak ditemukan di server.');
        }

        return response()->download($path);
    }

    public function getIconClass($path)
    {
        $ext = strtolower(pathinfo(parse_url($path, PHP_URL_PATH), PATHINFO_EXTENSION));
        return match ($ext) {
            'pdf' => 'bi bi-filetype-pdf text-danger',
            'doc', 'docx' => 'bi bi-filetype-docx text-primary',
            'xls', 'xlsx' => 'bi bi-filetype-xls text-success',
            'png', 'jpg', 'jpeg', 'gif' => 'bi bi-file-image text-warning',
            default => 'bi bi-file-earmark text-secondary'
        };
    }

    protected function getIKMProperty()
    {
        $query = IKMModel::query();

        if ($this->tahunDipilih) {
            $query->where('tahun', $this->tahunDipilih);
        }

        if ($this->search) {
            $query->where(function ($q) {
                $q->where('judul', 'like', '%' . $this->search . '%')
                    ->orWhere('deskripsi', 'like', '%' . $this->search . '%')
                    ->orWhere('tag', 'like', '%' . $this->search . '%');
            });
        }
        return $query->latest()->paginate($this->perPage);
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
        $ikms = $this->getIKMProperty();
        return view('livewire.layanan-publik.ikm', [
            'ikms' => $ikms,
            'total' => $ikms->total(),
            'lastPage' => $ikms->lastPage(),
            'currentPage' => $ikms->currentPage(),
            'perPage' => $this->perPage,
        ]);
    }
}
