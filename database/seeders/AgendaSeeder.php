<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\AgendaModel;
use Carbon\Carbon;

class AgendaSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'judul' => 'Festival Seni Budaya Tasikmalaya',
                'kategori' => 'Sosial Budaya',
                'tipe_acara' => 'Umum',
                'tanggal' => Carbon::now()->addDays(5)->toDateString(),
                'waktu_mulai' => '10:00:00',
                'waktu_selesai' => '22:00:00',
                'tipe_event' => 'offline',
                'sifat_acara' => 'terbuka',
                'status' => 'Belum Dimulai',
                'lokasi' => 'Alun-Alun Kota Tasikmalaya',
                'deskripsi' => 'Festival tahunan yang menampilkan seni dan budaya lokal.',
                'tag' => 'Festival, Seni, Budaya',
                'link_acara' => 'https://festival-tasikmalaya.com',
                'website' => 'https://tasikmalaya.go.id',
                'google_map' => 'https://goo.gl/maps/example',
                'url_gambar' => 'https://example.com/images/festival.jpg',
            ],
            [
                'judul' => 'Webinar Pendidikan Teknologi',
                'kategori' => 'Pendidikan',
                'tipe_acara' => 'Umum',
                'tanggal' => Carbon::now()->addDays(2)->toDateString(),
                'waktu_mulai' => '14:00:00',
                'waktu_selesai' => '16:00:00',
                'tipe_event' => 'online',
                'sifat_acara' => 'terbuka',
                'status' => 'Belum Dimulai',
                'lokasi' => null,
                'deskripsi' => 'Webinar gratis tentang teknologi terbaru di bidang pendidikan.',
                'tag' => 'Webinar, Pendidikan, Teknologi',
                'link_acara' => 'https://zoom.us/j/123456789',
                'website' => 'https://edutech.com',
                'google_map' => null,
                'url_gambar' => 'https://example.com/images/webinar.jpg',
            ],
            [
                'judul' => 'Pertandingan Sepak Bola Antar Sekolah',
                'kategori' => 'Olahraga',
                'tipe_acara' => 'Umum',
                'tanggal' => Carbon::now()->subDays(1)->toDateString(),
                'waktu_mulai' => '08:00:00',
                'waktu_selesai' => '12:00:00',
                'tipe_event' => 'offline',
                'sifat_acara' => 'tertutup',
                'status' => 'Selesai',
                'lokasi' => 'Stadion Kabupaten',
                'deskripsi' => 'Pertandingan persahabatan antar sekolah menengah.',
                'tag' => 'Sepak Bola, Olahraga',
                'link_acara' => null,
                'website' => null,
                'google_map' => 'https://goo.gl/maps/example2',
                'url_gambar' => null,
            ],
            [
                'judul' => 'Workshop Lingkungan Hidup',
                'kategori' => 'Lingkungan',
                'tipe_acara' => 'Umum',
                'tanggal' => Carbon::now()->addDays(10)->toDateString(),
                'waktu_mulai' => '09:00:00',
                'waktu_selesai' => '15:00:00',
                'tipe_event' => 'offline',
                'sifat_acara' => 'terbuka',
                'status' => 'Belum Dimulai',
                'lokasi' => 'Balai Desa Sukamaju',
                'deskripsi' => 'Workshop tentang pelestarian lingkungan dan pengelolaan sampah.',
                'tag' => 'Workshop, Lingkungan',
                'link_acara' => null,
                'website' => 'https://greenworkshop.id',
                'google_map' => 'https://goo.gl/maps/example3',
                'url_gambar' => 'https://example.com/images/workshop.jpg',
            ],
        ];

        foreach ($data as $item) {
            AgendaModel::create($item);
        }
    }
}
