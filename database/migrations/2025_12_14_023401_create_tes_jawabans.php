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
        Schema::create('tes_jawabans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('calon_siswa_id')
                  ->constrained('calon_siswas')
                  ->cascadeOnDelete();
                
            $table->foreignId('tes_soal_id')
                  ->constrained('tes_soals')
                  ->cascadeOnDelete();
                
            $table->enum('jawaban', ['a','b','c','d']);
            $table->boolean('benar');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tes_jawabans');
    }
};
