<?php

namespace App\Livewire;

use Livewire\Component;

class Footer extends Component
{
    public $profiles = [
        ['name' => 'Tentang Kami', 'url' => 'profile.tentang-kami'],
        ['name' => 'Profile Kepala Dinas', 'url' => 'profile.profil-kadis'],
        ['name' => 'Visi Misi', 'url' => 'profile.visi-misi'],
        ['name' => 'Tupoksi', 'url' => 'profile.tupoksi'],
        ['name' => 'Struktur Organisasi', 'url' => 'profile.struktur-organisasi'],
        ['name' => 'Maklumat Pelayanan', 'url' => 'profile.maklumat'],
    ];

    public $modals = [
        ['name' => 'LKPM', 'url' => 'https://lkpmonline.bkpm.go.id/lkpm_perka17/login.jsp'],
        ['name' => 'Potensi Investasi', 'url' => 'penanaman-modal.potensi-investasi'],
        ['name' => 'Realisasi Investasi', 'url' => 'penanaman-modal.realisasi-investasi'],
        ['name' => 'Promosi Investasi', 'url' => 'penanaman-modal.promosi-investasi'],
        ['name' => 'Regulasi', 'url' => 'penanaman-modal.regulasi'],
    ];

    public $dokumens = [
        ['name' => 'Galeri', 'url' => 'dokumen-informasi.galeri'],
        ['name' => 'Berita dan Artikel', 'url' => 'dokumen-informasi.berita/index'],
        ['name' => 'Agenda', 'url' => 'dokumen-informasi.agenda'],
        ['name' => 'Produk Hukum', 'url' => 'dokumen-informasi.produk-hukum'],
        ['name' => 'Dokumen Evaluasi', 'url' => 'dokumen-informasi.dokumen-evaluasi'],
        ['name' => 'Dokumen Perencanaan', 'url' => 'dokumen-informasi.dokumen-perencanaan'],
        ['name' => 'LKIP', 'url' => 'dokumen-informasi.lkip'],
        ['name' => 'SAKIP', 'url' => 'dokumen-informasi.sakip'],
    ];

    public $layanans = [
        ['name' => 'Standar Pelayanan SISPEK', 'url' => 'https://sispek.tasikmalayakota.go.id/front/detailpelayanan/23'],
        ['name' => 'IKM', 'url' => 'layanan-publik.ikm'],
        ['name' => 'PPID', 'url' => 'https://ppid.tasikmalayakota.go.id/'],
        ['name' => 'SP4N Lapor', 'url' => 'https://www.lapor.go.id/'],
        ['name' => 'Data Statistik Sektoral', 'url' => 'layanan-publik.sektoral'],
        ['name' => 'Informasi Layanan', 'url' => 'https://dpmptsp.tasikmalayakota.go.id/#'],
    ];

    public function render()
    {
        return view('livewire.footer');
    }

}
