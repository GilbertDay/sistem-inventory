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
        Schema::create('pengajuans', function (Blueprint $table) {
            $table->string('id', 50)->primary();
            $table->string('supplier_id', 50)->nullable();
            $table->string('jenis_barang_id', 50);
            $table->unsignedBigInteger('user_id')->nullable();
            $table->string('nama_barang', 100);
            $table->date('tgl_pengajuan');
            $table->integer('jumlah_barang');
            $table->integer('keterangan')->default('0');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengajuans');
    }
};
