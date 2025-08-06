<?php

use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;
use App\Livewire\Beranda\Beranda;
use App\Livewire\Beranda\GaleriBeranda;
use App\Livewire\Beranda\Pengumuman;
use App\Livewire\DokumenInformasi\CreateGaleri;
use App\Livewire\DokumenInformasi\CreateVideo;
use App\Livewire\DokumenInformasi\ShowGaleri;
use App\Livewire\DokumenInformasi\ShowVideo;
use App\Livewire\DokumenInformasi\GaleriDokumen;
use App\Livewire\DokumenInformasi\DokumenEvaluasi;
use App\Livewire\DokumenInformasi\DokumenEvaluasiCreate;
use App\Livewire\DokumenInformasi\DokumenPerencanaan;
use App\Livewire\DokumenInformasi\DokumenPerencanaanCreate;
use App\Livewire\DokumenInformasi\ProdukHukum;
use App\Livewire\DokumenInformasi\ProdukHukumCreate;
use App\Livewire\LayananPublik\IKMCreate;
use App\Livewire\LayananPublik\IKM;
use App\Livewire\LayananPublik\Sektoral;
use App\Livewire\LayananPublik\SektoralCreate;
use App\Livewire\LayananPublik\InformasiLayanan;
use App\Livewire\LayananPublik\PPID;
use App\Livewire\PenanamanModal\Regulasi;
use App\Livewire\PenanamanModal\RegulasiCreate;
use App\Livewire\Pengaduan\Pengaduan;
use App\Livewire\Agenda;
use App\Livewire\Beranda\Layanan;
use App\Livewire\Beranda\Content;
use App\Livewire\Beranda\Pendaftaran;
// use App\Livewire\Beranda\Berita;
use App\Livewire\Beranda\BeritaBeranda;
use App\Livewire\Profil\ProfilKadis;
use App\Livewire\Profil\StrukturOrganisasi;
use App\Livewire\Profil\TentangKami;
use App\Livewire\Profil\Tupoksi;
use App\Livewire\Profil\VisiMisi;
use App\Livewire\Berita\Index;
use App\Livewire\Berita\Create;
use App\Livewire\Berita\Show;


Route::get('/', Beranda::class)->name('beranda');

Route::get('/dokumen-informasi/create-galeri', CreateGaleri::class)->name('dokumen-informasi.create-galeri');
Route::get('/dokumen-informasi/create-video', CreateVideo::class)->name('dokumen-informasi.create-video');
Route::get('/dokumen-informasi/galeri', GaleriDokumen::class)->name('dokumen-informasi.galeri');
Route::get('/dokumen-informasi/show-galeri', ShowGaleri::class)->name('dokumen-informasi.show-galeri');
Route::get('/dokumen-informasi/show-video', ShowVideo::class)->name('dokumen-informasi.show-video');

Route::get('/dokumen-informasi/dokumen-evaluasi-create', DokumenEvaluasiCreate::class)->name('dokumen-informasi.dokumen-evaluasi-create');
Route::get('/dokumen-informasi/dokumen-evaluasi', DokumenEvaluasi::class)->name('dokumen-informasi.dokumen-evaluasi');
Route::get('/dokumen-informasi/dokumen-perencanaan-create', DokumenPerencanaanCreate::class)->name('dokumen-informasi.dokumen-perencanaan-create');
Route::get('/dokumen-informasi/dokumen-perencanaan', DokumenPerencanaan::class)->name('dokumen-informasi.dokumen-perencanaan');
Route::get('/dokumen-informasi/produk-hukum-create', ProdukHukumCreate::class)->name('dokumen-informasi.produk-hukum-create');
Route::get('/dokumen-informasi/produk-hukum', ProdukHukum::class)->name('dokumen-informasi.produk-hukum');

Route::get('/layanan-publik/ikm', IKM::class)->name('layanan-publik.ikm');
Route::get('/layanan-publik/ikm-create', IKMCreate::class)->name('layanan-publik.ikm-create');
Route::get('/layanan-publik/sektoral', Sektoral::class)->name('layanan-publik.sektoral');
Route::get('/layanan-publik/sektoral-create', SektoralCreate::class)->name('layanan-publik.sektoral-create');
Route::get('/layanan-publik/informasi-layanan', InformasiLayanan::class)->name('layanan-publik.informasi-layanan');
Route::get('/layanan-publik/ppid', PPID::class)->name('layanan-publik.ppid');

Route::get('/penanaman-modal/regulasi-create', action: RegulasiCreate::class)->name('penanaman-modal.regulasi-create');
Route::get('/penanaman-modal/regulasi', action: Regulasi::class)->name('penanaman-modal.regulasi');

Route::get('agenda', Agenda::class)->name('agenda');

Route::get('/pengaduan', Pengaduan::class)->name('pengaduan.pengaduan');

Route::view('/coba', 'livewire.coba')->name('coba');

// Define the routes for the application
Route::get('/layanan', Layanan::class)->name('layanan');
Route::get('/content', Content::class)->name('content');
Route::get('/pendaftaran', Content::class)->name('pendaftaran');
// Route::get('/berita', Berita::class)->name('berita');
Route::get('/berita-beranda', BeritaBeranda::class)->name('berita-beranda');

Route::get('/profil-kadis', ProfilKadis::class)->name('profil-kadis');
Route::get('/struktur-organisasi', StrukturOrganisasi::class)->name('struktur-organisasi');
Route::get('/tentang-kami', TentangKami::class)->name('tentang-kami');
Route::get('/tupoksi', Tupoksi::class)->name('tupoksi');
Route::get('/visi-misi', VisiMisi::class)->name('visi-misi');

Route::get('/berita/index', Index::class)->name('berita.index');
Route::get('/berita/create', Index::class)->name('berita.create');
Route::get('/berita/{id}', Show::class)->name('berita.detail');
Route::post('/berita/{id}/share', function ($id) {
    $berita = \App\Models\Berita::findOrFail($id);
    $berita->increment('shared');
    return response()->json(['success' => true]);
})->name('berita.share');
Route::get('/berita/create', Create::class)->name('berita.create');

// Route::get('/', function () {
//     return view('welcome');
// })->name('home');

// Route::view('dashboard', 'dashboard')
//     ->middleware(['auth', 'verified'])
//     ->name('dashboard');

// Route::middleware(['auth'])->group(function () {
//     Route::redirect('settings', 'settings/profile');

//     Volt::route('settings/profile', 'settings.profile')->name('settings.profile');
//     Volt::route('settings/password', 'settings.password')->name('settings.password');
//     Volt::route('settings/appearance', 'settings.appearance')->name('settings.appearance');
// });

// require __DIR__.'/auth.php';
