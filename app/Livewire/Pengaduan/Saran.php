<?php

namespace App\Livewire\Pengaduan;

use Livewire\Component;
use Illuminate\Support\Facades\Http; 
use Illuminate\Support\Facades\Log;
use App\Models\Saran as SaranModel;

class Saran extends Component
{
    public $nama, $email, $no_hp, $komentar, $captcha;

    public function submit()
    {
        $this->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email',
            'no_hp' => 'required|string|max:20',
            'komentar' => 'required',
            'captcha' => 'required', // wajib
        ]);

        Log::info('Submit terpanggil', [
            'nama' => $this->nama,
            'email' => $this->email,
            'no_hp' => $this->no_hp,
            'komentar' => $this->komentar,
        ]);

         $response = Http::asForm()->post('https://www.google.com/recaptcha/api/siteverify', [
            'secret' => env('RECAPTCHA_SECRET_KEY'),
            'response' => $this->captcha
        ]);

        if (!($response->json()['success'] ?? false)) {
            $this->addError('captcha', 'Verifikasi captcha gagal.');
            return;
        }

        Log::info('Captcha valid, mau simpan ke DB');

        SaranModel::create([
            'nama' => $this->nama,
            'email' => $this->email,
            'no_hp' => $this->no_hp,
            'komentar' => $this->komentar,
        ]);

        Log::info('Data sudah dipanggil untuk disimpan');

        session()->flash('success', 'Terima kasih atas saran dan aduan Anda!');
        // reset form
        $this->reset('nama','email','no_hp','komentar','captcha');
    }
    
    public function render()
    {
        return view('livewire.saran.saran');
    }
}
