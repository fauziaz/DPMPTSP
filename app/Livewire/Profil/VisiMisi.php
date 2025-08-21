<?php

namespace App\Livewire\Profil;

use Livewire\Component;
use App\Models\VisiMisi as VisiMisiModel;

class VisiMisi extends Component
{    
    public $visiMisi;

    public function mount()
    {
        $this->visiMisi = VisiMisiModel::first();
    }


    public function render()
    {
        return view('livewire.profil.visi-misi', [
            'visiMisi' => $this->visiMisi
        ]);
    }
}
