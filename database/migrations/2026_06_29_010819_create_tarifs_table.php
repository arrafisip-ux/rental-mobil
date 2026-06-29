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
    Schema::create('tarifs', function (Blueprint $table) {

        $table->id();

        $table->decimal('harga_per_hari', 12, 2);

        $table->decimal('tarif_km_dalam_kota', 12, 2);

        $table->decimal('tarif_km_luar_kota', 12, 2);

        $table->decimal('denda_per_hari', 12, 2);

        $table->integer('interval_ganti_oli')->default(5000);

        $table->integer('notifikasi_ganti_oli')->default(500);

        $table->timestamps();

    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tarifs');
    }
};
