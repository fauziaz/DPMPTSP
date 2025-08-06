<?php

use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;
use App\Livewire\Beranda\Beranda;
use App\Livewire\Beranda\Layanan;
use App\Livewire\Beranda\Content;
use App\Livewire\Beranda\Pendaftaran;
// use App\Livewire\Beranda\Berita;
use App\Livewire\Beranda\BeritaBeranda;
use App\Livewire\Profil\Agenda;
use App\Livewire\Profil\ProfilKadis;
use App\Livewire\Profil\StrukturOrganisasi;
use App\Livewire\Profil\TentangKami;
use App\Livewire\Profil\Tupoksi;
use App\Livewire\Profil\VisiMisi;
use App\Livewire\Berita\Index;
use App\Livewire\Berita\Create;
use App\Livewire\Berita\Show;

// Define the routes for the application
Route::get('/', Beranda::class)->name('beranda');
Route::get('/layanan', Layanan::class)->name('layanan');
Route::get('/content', Content::class)->name('content');
Route::get('/pendaftaran', Content::class)->name('pendaftaran');
// Route::get('/berita', Berita::class)->name('berita');
Route::get('/berita-beranda', BeritaBeranda::class)->name('berita-beranda');

Route::get('/agenda', Agenda::class)->name('agenda');
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
