<?php

namespace App\Livewire\DokumenInformasi;

use Livewire\Component;
use App\Models\GaleriModel;

class ShowGaleri extends Component
{

    public function render()
    {
        $galeris = GaleriModel::latest()->get(); 
        return view('livewire.dokumen-informasi.show-galeri', compact('galeris'));
    }
}
