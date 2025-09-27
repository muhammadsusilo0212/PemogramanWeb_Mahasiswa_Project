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
        Schema::create('dosens', function (Blueprint $table) {
            $table->id(); // Membuat kolom 'id' sebagai primary key.
            $table->string('nama'); // Hanya satu definisi untuk kolom 'nama'.
            $table->string('nidn')->unique();
            $table->string('jabatan');
            $table->string('email')->unique();
            $table->string('telepon');
            $table->timestamps(); // Membuat kolom 'created_at' dan 'updated_at' dengan benar.
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dosens');
    }
};
