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
        Schema::create('pesanans', function (Blueprint $table) {
            $table->unsignedBigInteger('id_pesanan')->primary();
            $table->foreignId('nik')->references('nik')->on('pembelis')->restrictOnDelete();
            $table->foreignId('kode_rumah')->references('kode_rumah')->on('rumahs')->restrictOnDelete();
            $table->integer('jumlah');
            $table->string('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pesanans');
    }
};
