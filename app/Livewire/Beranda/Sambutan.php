<?php

namespace App\Livewire\Beranda;

use Livewire\Component;
use App\Models\Sambutan as SambutanModel;

class Sambutan extends Component
{
    public $sambutan;

    public function mount()
    {
        // Ambil data sambutan pertama
        $this->sambutan = SambutanModel::first();
    }

    public function render()
    {
        return view('livewire.beranda.sambutan', [
            'sambutan' => $this->sambutan
        ]);
    }
}
