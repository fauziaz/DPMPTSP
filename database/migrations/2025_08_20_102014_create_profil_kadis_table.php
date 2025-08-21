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
        Schema::create('profil_kadis', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('jabatan');
            $table->string('foto')->nullable(); // untuk upload manual
            $table->string('foto_url')->nullable(); // untuk link eksternal
            $table->text('biodata')->nullable(); // biodata ringkas
            $table->json('pendidikan')->nullable(); // array json untuk riwayat pendidikan
            $table->json('pekerjaan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profil_kadis');
    }
};
