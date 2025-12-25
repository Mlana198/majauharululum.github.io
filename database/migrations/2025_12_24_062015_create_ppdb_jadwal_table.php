<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('ppdb_jadwal', function (Blueprint $table) {
            $table->id();
            $table->string('pendaftaran'); // bebas: "1 Mei – 30 Juni 2025"
            $table->string('tes_masuk');
            $table->string('pengumuman');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('ppdb_jadwal');
    }
};
