<?php  

namespace App\Livewire\Pengaduan;

use Livewire\Component;
use Illuminate\Support\Facades\Http; 
use Illuminate\Support\Facades\Log;
use App\Models\Saran as SaranModel;

class Pengaduan extends Component
{
    public $steps = [
        ['title' => 'Pilih Kategori', 'desc' => 'Pilih jenis pengaduan sesuai masalah yang ingin dilaporkan.'],
        ['title' => 'Isi Data', 'desc' => 'Lengkapi identitas dan deskripsi pengaduan.'],
        ['title' => 'Upload Bukti', 'desc' => 'Unggah dokumen atau foto pendukung jika ada.'],
        ['title' => 'Kirim & Pantau', 'desc' => 'Laporan akan diproses dan bisa dipantau statusnya.'],
    ];

    public function render()
    {
        return view('livewire.pengaduan.pengaduan');
    }
}
