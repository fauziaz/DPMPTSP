<?php

namespace App\Livewire\Profil;

use Livewire\Component;
use App\Models\TentangKami as TentangKamiModel;

class TentangKami extends Component
{
    public $tentangKami;

    public function mount()
    {
        $this->tentangKami = TentangKamiModel::first();
    }

    public function render()
    {
        return view('livewire.profil.tentang-kami');
    }
}
