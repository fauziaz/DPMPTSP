<?php

namespace App\Livewire\DokumenInformasi;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\VideoModel;

class CreateVideo extends Component
{
    use WithFileUploads;

    public $judul, $deskripsi, $video, $videoUrl;
    public function save()
    {
        $this->validate([
        'judul' => 'required|string|max:255',
        'deskripsi' => 'required|string',
        'video' => 'nullable|mimes:mp4,avi,mov,wmv|max:10240',
        'videoUrl' => 'nullable|url',
    ]);

    if ($this->video && $this->videoUrl) {
        $this->addError('video', 'Pilih hanya satu sumber video: upload atau URL.');
        return;
    }

    if (!$this->video && !$this->videoUrl) {
        $this->addError('video', 'Wajib memilih satu sumber video.');
        return;
    }

    if ($this->video) {
        $path = $this->video->store('video', 'public');

        VideoModel::create([
            'judul' => $this->judul,
            'deskripsi' => $this->deskripsi,
            'video' => $path,
            'videoUrl' => null,
        ]);
    } else {
        VideoModel::create([
            'judul' => $this->judul,
            'deskripsi' => $this->deskripsi,
            'video' => null,
            'videoUrl' => $this->videoUrl,
        ]);
    }

    session()->flash('message', 'Video berhasil ditambahkan.');
    $this->reset();
    }
    
    public function render()
    {
        return view('livewire.dokumen-informasi.create-video');
    }
}
