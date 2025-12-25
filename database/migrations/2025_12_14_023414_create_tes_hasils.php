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
        Schema::create('tes_hasils', function (Blueprint $table) {
            $table->id();

            $table->foreignId('calon_siswa_id')
                ->constrained('calon_siswas')
                ->cascadeOnDelete()
                ->unique();

            $table->integer('total_soal');
            $table->integer('jawaban_benar');
            $table->integer('nilai'); // 0–100

            $table->timestamp('mulai_tes')->nullable();
            $table->timestamp('selesai_tes')->nullable();

            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tes_hasils');
    }
};
