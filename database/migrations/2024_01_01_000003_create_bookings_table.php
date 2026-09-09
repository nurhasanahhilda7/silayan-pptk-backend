<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->string('akun');
            $table->string('nama');
            $table->string('instansi');
            $table->string('jenjang')->nullable();
            $table->text('keperluan');
            $table->string('tanggal_usulan');
            $table->string('jam_usulan');
            $table->string('status');
            $table->text('catatan_petugas')->nullable();
            $table->timestamp('created_at')->nullable();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
