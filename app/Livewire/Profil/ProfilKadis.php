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
        $profil = ProfilKadisModel::with(['pendidikans', 'pekerjaans'])->first();
        return view('livewire.profil.profil-kadis', compact('profil'));
    }
}