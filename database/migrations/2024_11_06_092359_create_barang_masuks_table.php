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
        Schema::create('barang_masuks', function (Blueprint $table) {
            $table->string('id', 50)->primary();
            $table->string('supplier_id', 50);
            $table->string('barang_id', 50);
            $table->date('tanggal');
            $table->integer('jumlah');
            $table->timestamps();
        });

        Schema::create('barang_keluars', function (Blueprint $table) {
            $table->string('id', 50)->primary();
            $table->string('barang_id', 50);
            $table->date('tanggal');
            $table->integer('jumlah');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('barang_masuks');
        Schema::dropIfExists('barang_keluars');
    }
};
