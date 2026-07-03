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
        Schema::create('pemakaian_pribadis', function (Blueprint $table) {

            $table->id();

            $table->foreignId('mobil_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->dateTime('tanggal_keluar');

            $table->dateTime('tanggal_kembali');

            $table->integer('km_awal');

            $table->integer('km_akhir')->nullable();

            $table->integer('total_km')->default(0);

            $table->enum('pengguna', [
                'Owner',
                'Karyawan'
            ]);

            $table->string('keperluan');

            $table->text('catatan')->nullable();

            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pemakaian_pribadis');
    }
};