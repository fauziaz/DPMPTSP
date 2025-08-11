<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('agendas', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->string('kategori'); // contoh: Sosial Budaya
            $table->string('tipe_acara'); // contoh: Umum
            $table->date('tanggal');
            $table->time('waktu_mulai')->nullable(); // contoh: 06:00
            $table->time('waktu_selesai')->nullable(); // contoh: 15:00

            // enum langsung dibatasi pilihannya
            $table->enum('tipe_event', ['offline', 'online'])->nullable();
            $table->enum('sifat_acara', ['terbuka', 'tertutup'])->nullable();


            $table->string('lokasi')->nullable();
            $table->text('deskripsi')->nullable();
            $table->string('tag')->nullable(); // contoh: Pasar, Tani

            // tambahan kolom link, website, map, dan gambar
            $table->string('link_acara')->nullable();
            $table->string('website')->nullable();
            $table->string('google_map')->nullable();
            $table->string('url_gambar')->nullable();
            $table->string('path_gambar')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('agendas');
    }
};
