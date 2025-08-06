<?php

namespace App\Livewire\Berita;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Berita;

class Create extends Component
{
    use WithFileUploads;

    public $kategori, $judul, $deskripsi, $gambar, $penulis;

    public function save()
    {
        $this->validate([
            'kategori' => 'required|string',
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'gambar' => 'required|image|max:2048',
            'penulis' => 'required|string|max:100',
        ]);

        // Ambil nama asli beserta ekstensi
        $namaFile = $this->gambar->getClientOriginalName();

        // Simpan file ke folder 'public/image' sesuai nama asli
        $path = $this->gambar->storeAs('image', $namaFile, 'public');

        // Simpan ke database
        Berita::create([
            'kategori' => $this->kategori,
            'judul' => $this->judul,
            'deskripsi' => $this->deskripsi,
            'gambar' => $path, // image/nama-file-asli.jpg
            'penulis' => $this->penulis,
        ]);

        session()->flash('success', 'Berita berhasil disimpan!');
        return redirect()->route('berita.index');
    }

    public function render()
    {
        return view('livewire.berita.create');
    }
}