<?php

namespace App\Livewire\LayananPublik;

use Livewire\Component;

class PPID extends Component
{
    public $icons = [];

    public function mount()
    {
        $this->icons = [
            [
                'href' => 'http://new.sipentas.tasikmalayakota.go.id/',
                'src' => 'https://dpmptsp.tasikmalayakota.go.id/public_html/desktop/assets/img/COM1.png',
                'alt' => 'SIPENTAS',
                'animation' => 'fadeInDown',
            ],
            [
                'href' => 'https://dpmptsp.tasikmalayakota.go.id/home',
                'src' => 'https://dpmptsp.tasikmalayakota.go.id/public_html/desktop/assets/img/1r.png',
                'alt' => 'Home',
                'animation' => 'fadeInUp',
            ],
            [
                'href' => 'https://simbg.pu.go.id/',
                'src' => 'https://dpmptsp.tasikmalayakota.go.id/public_html/desktop/assets/img/COM2.png',
                'alt' => 'SIMBG',
                'animation' => 'fadeInUp',
            ],
            [
                'href' => 'https://mpp.dpmptsp.tasikmalayakota.go.id',
                'src' => 'https://dpmptsp.tasikmalayakota.go.id/public_html/desktop/assets/img/123.png',
                'alt' => 'MPP',
                'animation' => 'fadeInUp',
            ],
            [
                'href' => 'https://s.id/skmPTSP',
                'src' => 'https://dpmptsp.tasikmalayakota.go.id/public_html/desktop/assets/img/ikm.png',
                'alt' => 'IKM',
                'animation' => 'fadeInDown',
            ],
            [
                'href' => 'https://wa.me/6281120223344',
                'src' => 'https://dpmptsp.tasikmalayakota.go.id/public_html/desktop/assets/img/layanan.png',
                'alt' => 'Layanan WA',
                'animation' => 'fadeInUp',
            ],
            [
                'href' => 'https://bit.ly/3WoGw8h',
                'src' => 'https://dpmptsp.tasikmalayakota.go.id/public_html/desktop/assets/img/sispek.png',
                'alt' => 'SISPEK',
                'animation' => 'fadeInDown',
            ],
            [
                'href' => '#exampleModal',
                'src' => 'https://dpmptsp.tasikmalayakota.go.id/public_html/desktop/assets/assets/img/slide/maklumat.png',
                'alt' => 'Maklumat',
                'animation' => 'fadeInDown',
                'isModal' => true
            ]
        ];
    }

    public function render()
    {
        $chunkedIcons = array_chunk($this->icons, 4);

        return view('livewire.ppid.ppid', [
            'chunkedIcons' => $chunkedIcons,
        ]);
    }
}
