<?php
namespace App\Livewire\Beranda;

use Livewire\Component;
use App\Models\Layanan as LayananModel;

class Layanan extends Component
{
    public $layanan;

    public function mount(): void
    {
        $this->layanan = LayananModel::all()->toArray();
    }

    public function render()
{
    return view('livewire.beranda.layanan', [
        'layanan' => $this->layanan
    ]);
}
}
