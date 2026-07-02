<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tarifs', function (Blueprint $table) {

            $table->id();

            $table->foreignId('mobil_id')
                ->constrained()
                ->cascadeOnDelete()
                ->unique();

            $table->integer('harga_6_jam');

            $table->integer('harga_12_jam');

            $table->integer('harga_24_jam');

            $table->integer('overtime_per_jam')->default(0);

            $table->integer('tambahan_100km')->default(50000);

            $table->integer('tambahan_200km')->default(100000);

            $table->integer('tambahan_350km')->default(150000);

            $table->integer('denda_per_hari')->default(300000);

            $table->integer('interval_ganti_oli')->default(10000);

            $table->integer('notifikasi_ganti_oli')->default(500);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tarifs');
    }
};