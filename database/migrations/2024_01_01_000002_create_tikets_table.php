<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tikets', function (Blueprint $table) {
            $table->string('id')->primary(); // format PPTK-YYYYMMDD-XXXX
            $table->string('akun'); // username tamu yang mengajukan
            $table->string('nama');
            $table->string('hp');
            $table->string('instansi');
            $table->string('jenjang')->nullable();
            $table->string('jenis'); // Konsultasi / Pengumpulan Berkas
            $table->text('berkas')->nullable();
            $table->longText('lampiran')->nullable(); // JSON array file base64
            $table->text('keperluan');
            $table->string('tanggal');
            $table->string('status');
            $table->text('catatan')->nullable();
            $table->timestamp('created_at')->nullable();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tikets');
    }
};
