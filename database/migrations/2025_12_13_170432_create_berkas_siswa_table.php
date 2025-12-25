<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('berkas_siswa', function (Blueprint $table) {
            $table->id();

            $table->foreignId('calon_siswa_id')
                  ->constrained('calon_siswas')
                  ->cascadeOnDelete();

            $table->string('foto')->nullable();
            $table->string('fc_ijazah')->nullable();
            $table->string('ktp_ortu')->nullable();
            $table->string('kk')->nullable();
            $table->string('akta_lahir')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('berkas_siswa');
    }
};
