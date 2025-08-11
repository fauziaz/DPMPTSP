<?php 

namespace App\Livewire\Beranda;

use Livewire\Component;
use App\Models\PengumumanModel;

class Pengumuman extends Component
{
    public $pengumumans;

    public function mount()
    {
        // Panggil orderBy di model Pengumuman
        $this->pengumumans = PengumumanModel::orderBy('order')->get();
    }

    public function render()
    {
        return view('livewire.beranda.pengumuman');
    }
}
