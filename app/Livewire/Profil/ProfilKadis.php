<?php

namespace App\Livewire\Profil;

use Livewire\Component;
use App\Models\ProfilKadis as ProfilKadisModel;

class ProfilKadis extends Component
{
    public $profilKadis;
    
    public function mount()
    {
        $this->profilKadis = ProfilKadisModel::first();
    }

    public function render()
    {
        return view('livewire.profil.profil-kadis');
    }
}
