<?php
namespace App\Livewire\Beranda;

use Livewire\Component;

class Layanan extends Component
{
    public $layanan = [];

    public function mount(): void
    {
        $this->layanan = [
            [
                'icon' => 'bi-bar-chart-fill',
                'title' => 'INFORMASI PROGRES',
                'description' => 'Anda dapat mencari informasi tentang progress permohonan izin yang telah anda daftarkan berdasarkan nomor pendaftaran.',
                'url' => 'https://new.sipentas.tasikmalayakota.go.id/',
            ],
            [
                'icon' => 'bi-pie-chart-fill',
                'title' => 'STATISTIK',
                'description' => 'Terdapat beberapa statistik perizinan untuk dapat melihat kinerja dari pelayanan perizinan dalam melayani masyarakat.',
                'url' => 'https://new.sipentas.tasikmalayakota.go.id/',
            ],
            [
                'icon' => 'bi-journal-check',
                'title' => 'DAFTAR PERIZINAN',
                'description' => 'Anda dapat melihat detil perizinan dengan menekan link jenis izin.',
                'url' => 'https://new.sipentas.tasikmalayakota.go.id/',
            ],
            [
                'icon' => 'bi-telephone-fill',
                'title' => 'KONTAK',
                'description' => 'Untuk Melihat detail Kontak anda bisa klik link ini.',
                'url' => 'https://new.sipentas.tasikmalayakota.go.id/',
            ],
        ];
    }

    public function render()
{
    return view('livewire.beranda.layanan', [
        'layanan' => $this->layanan
    ]);
}
}
