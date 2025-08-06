<?php

namespace App\Livewire\Berita;

use Livewire\Component;
use App\Models\Berita;

class Show extends Component
{
    public $berita;
    public $beritas_terkait;

    public function mount($id)
    {
        $this->berita = Berita::findOrFail($id);
    
        $this->berita->increment('views');

        $this->beritas_terkait = Berita::where('kategori', $this->berita->kategori)
            ->where('id', '!=', $this->berita->id)
            ->latest()
            ->take(5)
            ->get();
    }

    public function render()
    {
        return view('livewire.berita.show');
    }

    public function share()
    {
        $this->berita->increment('shared');
    }

}
