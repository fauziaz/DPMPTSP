<?php

namespace App\Livewire\DokumenInformasi;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\DokumenEvaluasiModel;

class DokumenEvaluasiCreate extends Component
{
    use WithFileUploads;

    public $judul;
    public $deskripsi;
    public $tahun;
    public $tanggal;
    public $file;       
    public $fileUrl;   
    public $tag;

    protected $rules = [
        'judul'     => 'required|string|max:255',
        'deskripsi' => 'required|string',
        'tahun'     => 'required|integer',
        'tanggal'   => 'required|date',
        'tag'       => 'nullable|string|max:255',
        // file atau fileUrl minimal salah satu harus diisi
    ];

    public function save()
    {
        $this->validate();

        if ($this->file) {
            // jika upload file
            $path = $this->file->store('evaluasi', 'public');
            $ext = $this->file->getClientOriginalExtension();
            $filePath = $path;
            $format = strtoupper($ext);
        } elseif ($this->fileUrl) {
            // jika pakai link/file eksternal
            $filePath = $this->fileUrl;
            // ambil extension dari url
            $ext = pathinfo(parse_url($this->fileUrl, PHP_URL_PATH), PATHINFO_EXTENSION);
            $format = strtoupper($ext ?: 'PDF'); // default PDF
        } else {
            // tidak upload dan tidak isi url
            $this->addError('file', 'Harap unggah file atau isi URL file.');
            return;
        }

        DokumenEvaluasiModel::create([
            'judul'     => $this->judul,
            'deskripsi' => $this->deskripsi,
            'tahun'     => $this->tahun,
            'tanggal'   => $this->tanggal,
            'file_path' => $filePath,
            'format'    => $format,
            'tag'       => $this->tag,
        ]);

        // reset field
        $this->reset(['judul', 'deskripsi', 'tahun', 'tanggal', 'file', 'fileUrl', 'tag']);

        session()->flash('message', 'Data dokumen evaluasi berhasil disimpan!');
    }

    public function render()
    {
        return view('livewire.dokumen-informasi.dokumen-evaluasi-create');
    }
}
