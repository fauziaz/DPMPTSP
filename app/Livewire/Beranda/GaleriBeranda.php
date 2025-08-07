<?php

namespace App\Livewire\Beranda;

use Livewire\Component;
use App\Models\GaleriModel;

class GaleriBeranda extends Component
{
    public $take = 4;

    public function loadMore()
    {
        $this->take += 4;
    }

    public function render()
    {
        $galeris = GaleriModel::latest()->take($this->take)->get();
        return view('livewire.beranda.galeri-beranda', [
            'galeris' => $galeris,
            'take' => $this->take,
        ]);
    }
}
