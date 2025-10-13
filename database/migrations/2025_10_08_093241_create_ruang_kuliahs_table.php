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
        Schema::create('ruang_kuliahs', function (Blueprint $table) {
            $table->id();
            $table->string('kode_ruangan')->unique();
            $table->string('nama_ruangan');
            $table->string('foto_ruangan')->nullable(); // Menyimpan path foto ruangan
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ruang_kuliahs');
    }
};
