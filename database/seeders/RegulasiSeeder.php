<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\RegulasiModel;
use Carbon\Carbon; // Tambahkan di atas

class RegulasiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        for ($i = 1; $i <= 50; $i++) {
            RegulasiModel::create([
                'judul' => 'Dummy Judul Regulasi ' . $i,
                'deskripsi' => 'Ini deskripsi dummy ke-' . $i,
                'tahun' => 2020,
                'tanggal' => Carbon::now()->subDays(rand(0, 1000))->format('Y-m-d'), // tanggal acak
                'downloads' => rand(0, 100), // jika field downloads juga wajib
                'file_path' => 'dummy_file_' . $i . '.pdf',
            ]);
        }
    }
}
