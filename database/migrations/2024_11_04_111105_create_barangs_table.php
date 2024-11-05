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
        Schema::create('barangs', function (Blueprint $table) {
            $table->string('id', 50)->primary();
            $table->string('jenis_barang_id', 50);
            $table->string('pengajuan_id', 50)->nullable();
            $table->string('supplier_id', 50)->nullable();
            $table->string('user_id', 50);
            $table->string('nama_barang', 100);
            $table->string('label_barang',50)->nullable();
            $table->string('lokasi_barang',50);
            $table->integer('stok');
            $table->integer('min_stok');
            $table->text('foto_barang')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('barangs');
    }
};
