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
        Schema::create('produk', function (Blueprint $table) {
            $table->id();
            $table->string('nama_produk');
            $table->string('slug')->unique();
            $table->text('deskripsi');
            $table->text('manfaat_budaya')->nullable();
            $table->text('proses_produksi')->nullable();
            $table->string('lokasi_pembuatan')->nullable();
            $table->string('nama_pembuat')->nullable();
            $table->integer('harga')->nullable();
            $table->string('kategori'); // Makanan, Kerajinan, dll
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produk');
    }
};
