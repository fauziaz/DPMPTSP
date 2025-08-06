<?php

namespace App\Livewire;

use App\Models\Berita;
use Livewire\Component;

class Breadcrumb extends Component
{
    public $breadcrumbs = [];

    public function mount()
    {
        $segments = request()->segments();
        $breadcrumbs = [];

        foreach ($segments as $i => $segment) {
            $label = ucfirst(str_replace('-', ' ', $segment));
            $url = implode('/', array_slice($segments, 0, $i + 1));

            // Ganti 'index' jadi 'Berita'
            if ($segment === 'index' && $segments[$i - 1] === 'berita') {
                $label = 'Berita';
                $url = 'berita/index';
            }

            // Kalau segment ID (angka), ambil judul dari database
            if (is_numeric($segment) && ($segments[$i - 2] ?? null) === 'berita') {
                $berita = Berita::find($segment);
                $label = $berita ? $berita->judul : 'Detail';
            }

            $breadcrumbs[] = [
                'label' => $label,
                'url' => $i < count($segments) - 1 ? url($url) : null,
            ];
        }

        $this->breadcrumbs = $breadcrumbs;
    }

    public function render()
    {
        return view('livewire.breadcrumb');
    }
}