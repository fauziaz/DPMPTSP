<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\AgendaModel;
use Carbon\Carbon;

class AgendaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $today = Carbon::today();
        $currentMonth = $today->copy()->startOfMonth();

        AgendaModel::create([
            'judul' => 'Agenda Minggu 1',
            'tanggal' => $currentMonth->copy()->day(2)->toDateString(),
            'waktu_mulai' => '08:00:00',
            'waktu_selesai' => '10:00:00',
            'tipe_acara' => 'Pimpinan',
            'kategori' => 'Rapat',
            'tag' => 'Koordinasi',
            'tipe_event' => 'offline',
            'sifat_acara' => 'terbuka',
            'status' => 'Belum Dimulai',
            'lokasi' => 'Kantor A',
            'deskripsi' => 'Agenda minggu pertama',
            'link_acara' => null,
            'website' => 'https://contoh1.go.id',
            'google_map' => 'https://maps.google.com/?q=Kantor+A',
            'url_gambar' => 'https://via.placeholder.com/600x400?text=Agenda+1',
        ]);

        AgendaModel::create([
            'judul' => 'Agenda Minggu 2',
            'tanggal' => $currentMonth->copy()->day(9)->toDateString(),
            'waktu_mulai' => '09:00:00',
            'waktu_selesai' => '11:00:00',
            'tipe_acara' => 'Perangkat Daerah',
            'kategori' => 'Sosialisasi',
            'tag' => 'Edukasi',
            'tipe_event' => 'online',
            'sifat_acara' => 'terbuka',
            'status' => 'Belum Dimulai',
            'lokasi' => 'Zoom Meeting',
            'deskripsi' => 'Agenda minggu kedua',
            'link_acara' => 'https://zoom.us/j/123456789',
            'website' => 'https://dinascontoh.go.id',
            'google_map' => null,
            'url_gambar' => 'https://via.placeholder.com/600x400?text=Agenda+2',
        ]);

        AgendaModel::create([
            'judul' => 'Agenda Minggu 3',
            'tanggal' => $currentMonth->copy()->day(16)->toDateString(),
            'waktu_mulai' => '10:00:00',
            'waktu_selesai' => '12:00:00',
            'tipe_acara' => 'Umum',
            'kategori' => 'Pelatihan',
            'tag' => 'Kesehatan',
            'tipe_event' => 'offline',
            'sifat_acara' => 'terbuka',
            'status' => 'Belum Dimulai',
            'lokasi' => 'Gedung Pelatihan',
            'deskripsi' => 'Agenda minggu ketiga',
            'link_acara' => null,
            'website' => 'https://pelatihan-kesehatan.go.id',
            'google_map' => 'https://maps.google.com/?q=Gedung+Pelatihan',
            'url_gambar' => 'https://via.placeholder.com/600x400?text=Agenda+3',
        ]);

        AgendaModel::create([
            'judul' => 'Agenda Minggu 4',
            'tanggal' => $currentMonth->copy()->day(23)->toDateString(),
            'waktu_mulai' => '13:00:00',
            'waktu_selesai' => '15:00:00',
            'tipe_acara' => 'Pimpinan',
            'kategori' => 'Rapat',
            'tag' => 'Evaluasi',
            'tipe_event' => 'offline',
            'sifat_acara' => 'tertutup',
            'status' => 'Belum Dimulai',
            'lokasi' => 'Ruang B',
            'deskripsi' => 'Agenda minggu keempat',
            'link_acara' => null,
            'website' => null,
            'google_map' => 'https://maps.google.com/?q=Ruang+B',
            'url_gambar' => 'https://via.placeholder.com/600x400?text=Agenda+4',
        ]);

        AgendaModel::create([
            'judul' => 'Agenda Minggu 5',
            'tanggal' => $currentMonth->copy()->day(30)->toDateString(),
            'waktu_mulai' => '14:00:00',
            'waktu_selesai' => '16:00:00',
            'tipe_acara' => 'Umum',
            'kategori' => 'Pendidikan',
            'tag' => 'Workshop',
            'tipe_event' => 'offline',
            'sifat_acara' => 'terbuka',
            'status' => 'Belum Dimulai',
            'lokasi' => 'Aula Besar',
            'deskripsi' => 'Agenda minggu kelima',
            'link_acara' => null,
            'website' => 'https://workshoppendidikan.id',
            'google_map' => 'https://maps.google.com/?q=Aula+Besar',
            'url_gambar' => 'https://via.placeholder.com/600x400?text=Agenda+5',
        ]);
    }
}
