<?php 

namespace App\Livewire\Beranda;

use Livewire\Component;
use App\Models\CarouselImage; // pastikan modelnya benar

class Beranda extends Component
{
    public $carouselImages;

    public function mount()
    {
        // ambil data carousel dari database
        $this->carouselImages = CarouselImage::orderBy('order')->get();
    }

    public function render()
    {
        return view('livewire.beranda.beranda');
    }
}
