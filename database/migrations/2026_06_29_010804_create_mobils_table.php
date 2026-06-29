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
    Schema::create('mobils', function (Blueprint $table) {

        $table->id();

        $table->string('kode_mobil')->unique();

        $table->string('merk');

        $table->string('tipe');

        $table->year('tahun');

        $table->string('warna');

        $table->string('plat_nomor')->unique();

        $table->integer('kapasitas');

        $table->enum('transmisi', [
            'Manual',
            'Matic'
        ]);

        $table->enum('bahan_bakar', [
            'Pertalite',
            'Pertamax',
            'Solar',
            'Dexlite'
        ]);

        $table->integer('kilometer')->default(0);

        $table->string('nomor_stnk');

        $table->date('masa_berlaku_stnk');

        $table->string('foto')->nullable();

        $table->enum('status', [
            'Ready',
            'Dipakai',
            'Pengecekan'
        ])->default('Ready');

        $table->timestamps();

    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mobils');
    }
};
