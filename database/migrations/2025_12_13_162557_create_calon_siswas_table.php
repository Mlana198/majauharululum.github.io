<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('calon_siswas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')
            ->constrained()
            ->cascadeOnDelete();
            $table->string('nama');
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');

            $table->enum('agama', [
                'islam',
                'kristen_protestan',
                'katholik',
                'hindu',
                'buddha',
                'konghucu'
            ]);

            $table->enum('jenis_kelamin', ['laki-laki', 'perempuan']);
            $table->unsignedTinyInteger('anak_ke');

            $table->text('alamat');
            $table->string('nohp_siswa', 20);
            $table->string('status_keluarga');

            $table->string('asal_sekolah');
            $table->year('tahun_lulus')->nullable();
            $table->string('nomor_stl')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('calon_siswas');
    }
};
