<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\InvestasiModel;

class InvestasiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Data dummy
        InvestasiModel::create([
            'judul'     => 'Investasi Pembangunan Kawasan Industri',
            'deskripsi' => 'Investasi untuk pembangunan kawasan industri terpadu di wilayah selatan.',
            'tahun'     => 2024,
            'tanggal'   => '2024-06-15',
            'file_path' => 'penanaman-modal/contoh-file.pdf',
            'format'    => 'PDF',
            'tag'       => 'industri, pembangunan',
            'kategori'  => 'potensi',
        ]);

        InvestasiModel::create([
            'judul'     => 'Realisasi Investasi Retail Modern',
            'deskripsi' => 'Pembangunan pusat perbelanjaan di kota.',
            'tahun'     => 2023,
            'tanggal'   => '2023-12-01',
            'file_path' => 'penanaman-modal/laporan-realisasi.pdf',
            'format'    => 'PDF',
            'tag'       => 'retail, realisasi',
            'kategori'  => 'realisasi',
        ]);

        InvestasiModel::create([
            'judul'     => 'Promosi Investasi Energi Terbarukan',
            'deskripsi' => 'Promosi proyek PLTS di wilayah timur.',
            'tahun'     => 2025,
            'tanggal'   => '2025-01-20',
            'file_path' => 'penanaman-modal/promosi-energi.jpg',
            'format'    => 'JPG',
            'tag'       => 'energi, promosi',
            'kategori'  => 'promosi',
        ]);
    }
}
