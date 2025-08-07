<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class AgendaModel extends Model
{
    use HasFactory;

    protected $table = 'agendas';

    protected $fillable = [
        'judul', 'tipe_acara', 'kategori', 'tag', 'tanggal',
    'waktu_mulai', 'waktu_selesai', 'tipe_event', 'sifat_acara',
    'lokasi', 'deskripsi', 'link_acara', 'website', 'google_map', 'url_gambar'
    ];

    public function setTipeEventAttribute($value)
    {
        $allowed = ['online', 'offline'];

        $val = strtolower($value);

        if (in_array($val, $allowed)) {
            $this->attributes['tipe_event'] = ucfirst($val); // Simpan sebagai "Online" atau "Offline"
        } else {
            throw new \InvalidArgumentException("Tipe event harus 'Online' atau 'Offline'");
        }
    }

    protected $appends = ['status_dinamis'];

    public function getStatusDinamisAttribute()
    {
        if (!$this->waktu_mulai || !$this->waktu_selesai) {
            return null;
        }

        try {
            $start = Carbon::parse($this->tanggal . ' ' . $this->waktu_mulai);
            $end = Carbon::parse($this->tanggal . ' ' . $this->waktu_selesai);
            $now = Carbon::now();

            return match (true) {
                $now->lt($start) => 'Belum Dimulai',
                $now->between($start, $end) => 'Berlangsung',
                default => 'Selesai',
            };
        } catch (\Exception $e) {
            return null;
        }
    }

    protected $casts = [
        'tanggal' => 'date',
    ];
}
