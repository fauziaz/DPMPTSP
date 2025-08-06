<?php

namespace App\Livewire\Beranda;

use Livewire\Component;
use App\Models\Berita;

class BeritaBeranda extends Component
{
    public $beritas;
    public $artikels;
    public $beritaCarousel;

    public function mount()
    {
        $this->beritas = Berita::where('kategori', 'berita')
            ->latest()
            ->take(4)
            ->get();

        $this->artikels = Berita::where('kategori', 'artikel')
            ->latest()
            ->take(4)
            ->get();

        $this->beritaCarousel = Berita::latest()->take(5)->get();
    }

    public function render()
    {
        return view('livewire.beranda.berita-beranda', [
            'beritas' => $this->beritas,
            'artikels' => $this->artikels,
            'beritaCarousel' => $this->beritaCarousel,
        ]);
    }
}