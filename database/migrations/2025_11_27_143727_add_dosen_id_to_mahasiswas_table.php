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
        Schema::table('mahasiswas', function (Blueprint $table) {
        // Tambahkan kolom foreign key
        $table->string('dosen_wali')->nullable()->after('prodi');

        // Definisikan constraint
        $table->foreign('dosen_wali')
              ->references('nidn')
              ->on('dosens')
              ->onDelete('set null'); // Jika dosen dihapus, data mahasiswa tetap ada (dosen_id jadi null)
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('mahasiswas', function (Blueprint $table) {
            //
        });
    }
};
