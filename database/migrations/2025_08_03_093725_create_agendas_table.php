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
            $table->string('kategori');           // contoh: Sosial Budaya
            $table->string('tipe_acara');         // contoh: Umum
            $table->date('tanggal');
            $table->time('waktu_mulai')->nullable();     // contoh: 06:00
            $table->time('waktu_selesai')->nullable();   // contoh: 15:00
            $table->string('tipe_event')->nullable();    // contoh: offline
            $table->string('sifat_acara')->nullable();   // contoh: terbuka
            $table->string('status')->nullable();        // contoh: Belum Dimulai
            $table->string('lokasi')->nullable();
            $table->text('deskripsi')->nullable();
            $table->string('tag')->nullable();           // contoh: Pasar, Tani
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
