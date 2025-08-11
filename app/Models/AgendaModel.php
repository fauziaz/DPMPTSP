<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use App\Enums\SifatAcara;
use App\Enums\TipeEvent;
use Illuminate\Support\Facades\Log;  // <<== Tambahkan ini

class AgendaModel extends Model
{
    use HasFactory;

    protected $table = 'agendas';

    protected $fillable = [
        'judul', 'tipe_acara', 'kategori', 'tag', 'tanggal',
        'waktu_mulai', 'waktu_selesai', 'tipe_event', 'sifat_acara',
        'lokasi', 'deskripsi', 'link_acara', 'website', 'google_map', 'url_gambar', 'path_gambar'
    ];

    protected $casts = [
        'tanggal' => 'date',
        'tipe_event' => TipeEvent::class,
        'sifat_acara' => SifatAcara::class,
    ];

    protected $appends = ['status_dinamis'];

public function getStatusDinamisAttribute()
{
    if (empty($this->waktu_mulai) || empty($this->waktu_selesai) || empty($this->tanggal)) {
        return 'Waktu Tidak Lengkap';
    }

    try {
        // Pastikan tanggal dalam format Carbon
        $tanggalCarbon = $this->tanggal instanceof Carbon ? $this->tanggal : Carbon::parse($this->tanggal);

        // Gabungkan tanggal dengan waktu mulai dan selesai
        $start = Carbon::parse($tanggalCarbon->toDateString() . ' ' . $this->waktu_mulai);
        $end = Carbon::parse($tanggalCarbon->toDateString() . ' ' . $this->waktu_selesai);

        // Jika waktu selesai lebih kecil dari waktu mulai (acara lewat tengah malam), tambahkan 1 hari pada waktu selesai
        if ($end->lt($start)) {
            $end->addDay();
        }

        $now = Carbon::now();

        Log::info("Agenda Status Check - Mulai: {$start->toDateTimeString()}, Selesai: {$end->toDateTimeString()}, Sekarang: {$now->toDateTimeString()}");

        if ($now->lt($start)) {
            return 'Belum Dimulai';
        } elseif ($now->between($start, $end)) {
            return 'Berlangsung';
        } else {
            return 'Selesai';
        }
    } catch (\Exception $e) {
        Log::error('Error getStatusDinamisAttribute: ' . $e->getMessage());
        return 'Error Status';
    }
}



    public static function tipeEventOptions(): array
    {
        return TipeEvent::getOptions();
    }

    public static function sifatAcaraOptions(): array
    {
        return SifatAcara::getOptions();
    }

    // public function setTipeEventAttribute($value)
    // {
    //     $allowed = ['online', 'offline'];

    //     $val = strtolower($value);

    //     if (in_array($val, $allowed)) {
    //         $this->attributes['tipe_event'] = ucfirst($val); // Simpan sebagai "Online" atau "Offline"
    //     } else {
    //         throw new \InvalidArgumentException("Tipe event harus 'Online' atau 'Offline'");
    //     }
    // }
}
