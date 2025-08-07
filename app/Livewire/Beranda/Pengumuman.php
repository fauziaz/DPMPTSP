<?php 
namespace App\Livewire\Beranda;

use Livewire\Component;

class Pengumuman extends Component
{
    // public $photos = [];
    public $pengumumans = [];   
    public function mount()
    {

        $this->pengumumans = [
            [
                'title' => 'SIMBG',
                'description' => 'Pengajuan PBG',
                'image' => 'https://dpmptsp.tasikmalayakota.go.id/public_html/desktop/assets/img/4950peng1.jpg'
            ],
            [
                'title' => 'SIMBG',
                'description' => 'Pengajuan PBG',
                'image' => 'https://dpmptsp.tasikmalayakota.go.id/public_html/desktop/assets/img/4950peng1.jpg'
            ],
            [
                'title' => 'Layanan BPMPTSP',
                'description' => 'Layanan BPMPTSP.',
                'image' => 'https://dpmptsp.tasikmalayakota.go.id/public_html/desktop/assets/img/2791dpmptsp.jpg'
            ],
        ];
    }

    public function render()
    {
        return view('livewire.beranda.pengumuman', [
            'pengumumans' => $this->pengumumans,
            // 'galeris' => Galeri::latest()->take(6)->get()
        ]);
    }
}