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
        Schema::create('penyewaans', function (Blueprint $table) {

            $table->id();

            $table->foreignId('pelanggan_id')
                  ->constrained()
                  ->cascadeOnDelete();

            $table->foreignId('mobil_id')
                  ->constrained()
                  ->cascadeOnDelete();

            $table->date('tanggal_sewa');

            $table->date('tanggal_kembali');

            $table->integer('lama_sewa');

            $table->decimal('harga_per_hari', 12, 2);

            $table->decimal('total_bayar', 12, 2);

            $table->enum('status', [
                'Booking',
                'Berjalan',
                'Selesai',
                'Batal'
            ])->default('Booking');

            $table->text('catatan')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penyewaans');
    }
};