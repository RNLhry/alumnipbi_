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
        Schema::create('alumni', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('nim')->unique();
            $table->string('email')->unique();
            $table->enum ('jenis_kelamin', ['laki-laki', 'perempuan']);
            $table->year('angkatan');
            $table->string('agama');
            $table->string('program_studi');
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->string('alamat');
            $table->string('no_telp');
            $table->year('tahun_masuk');
            $table->year('tahun_lulus');
            $table->string('ipk');
            $table->string('pekerjaan');
            $table->string('awal_bekerja');
            $table->string('domisili_tempat_kerja');
            $table->string('foto');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('alumni');
    }
};
