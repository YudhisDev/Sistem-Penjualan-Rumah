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
        Schema::create('pembelians', function (Blueprint $table) {
            $table->unsignedBigInteger('kode_invoice')->primary();
            $table->foreignId('id_pesanan')->references('id_pesanan')->on('pesanans')->restrictOnDelete();
            $table->foreignId('kode_kredit')->references('kode_kredit')->on('kredits')->restrictOnDelete();
            $table->integer('cicilan');
            $table->integer('harga_sisa');
            $table->integer('harga_total');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pembelians');
    }
};
