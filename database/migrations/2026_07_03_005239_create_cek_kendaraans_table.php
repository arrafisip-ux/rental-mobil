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
        Schema::create('cek_kendaraans', function (Blueprint $table) {

            $table->id();

            $table->foreignId('mobil_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->date('tanggal');

            $table->enum('jenis_cek', [
                'Sebelum Digunakan',
                'Sesudah Digunakan'
            ]);

            $table->boolean('cek_body')->default(true);

            $table->boolean('cek_ban')->default(true);

            $table->boolean('cek_lampu')->default(true);

            $table->boolean('cek_rem')->default(true);

            $table->boolean('cek_oli')->default(true);

            $table->boolean('cek_air_radiator')->default(true);

            $table->boolean('cek_bensin')->default(true);

            $table->boolean('cek_interior')->default(true);

            $table->text('catatan')->nullable();

            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cek_kendaraans');
    }
};