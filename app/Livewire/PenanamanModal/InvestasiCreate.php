<?php

namespace App\Livewire\PenanamanModal;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\InvestasiModel;

class InvestasiCreate extends Component
{
    use WithFileUploads;

    public $judul, $deskripsi, $tahun, $tanggal, $file, $fileUrl, $tag, $kategori;

    protected $rules = [
        'judul'     => 'required|string|max:255',
        'deskripsi' => 'required|string',
        'tahun'     => 'required|integer',
        'tanggal'   => 'required|date',
        'kategori'  => 'required|in:potensi,promosi,realisasi',
        'tag'       => 'nullable|string|max:255',
    ];

    public function save()
    {
        $this->validate();

        if ($this->file) {
            $path = $this->file->store('penanaman-modal', 'public');
            $ext = $this->file->getClientOriginalExtension();
            $filePath = $path;
            $format = strtoupper($ext);
        } elseif ($this->fileUrl) {
            $filePath = $this->fileUrl;
            $ext = pathinfo(parse_url($this->fileUrl, PHP_URL_PATH), PATHINFO_EXTENSION);
            $format = strtoupper($ext ?: 'PDF');
        } else {
            $this->addError('file', 'Harap unggah file atau isi URL file.');
            return;
        }

        InvestasiModel::create([
            'judul'     => $this->judul,
            'deskripsi' => $this->deskripsi,
            'tahun'     => $this->tahun,
            'tanggal'   => $this->tanggal,
            'file_path' => $filePath,
            'format'    => $format,
            'tag'       => $this->tag,
            'kategori'  => $this->kategori,
        ]);

        $this->reset(['judul', 'deskripsi', 'tahun', 'tanggal', 'file', 'fileUrl', 'tag', 'kategori']);

        session()->flash('message', 'Data berhasil disimpan!');
    }

    public function render()
    {
        return view('livewire.penanaman-modal.investasi-create');
    }
}
