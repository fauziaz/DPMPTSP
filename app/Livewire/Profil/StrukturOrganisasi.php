<?php

namespace App\Livewire\Profil;

use Livewire\Component;
use App\Models\StrukturOrganisasi as StrukturOrganisasiModel;

class StrukturOrganisasi extends Component
{
    public $strukturOrganisasi;

    public function mount()
    {
        $this->strukturOrganisasi = StrukturOrganisasiModel::first();
    }

    public function render()
    {
        return view('livewire.profil.struktur-organisasi');
    }
}
