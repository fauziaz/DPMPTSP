<?php

namespace App\Livewire\Profil;

use Livewire\Component;
use App\Models\Tupoksi as TupoksiModel;

class Tupoksi extends Component
{
    public $tupoksi;

    public function mount()
    {
        $this->tupoksi = TupoksiModel::first();
    }
    
    public function render()
    {
        return view('livewire.profil.tupoksi');
    }
}
