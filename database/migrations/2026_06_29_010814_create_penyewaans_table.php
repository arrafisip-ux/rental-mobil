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

        $table->string('no_transaksi')->unique();

        $table->foreignId('pelanggan_id')
            ->constrained('pelanggans')
            ->cascadeOnDelete();

        $table->foreignId('mobil_id')
            ->constrained('mobils')
            ->cascadeOnDelete();

        $table->date('tanggal_pinjam');

        $table->date('tanggal_kembali');

        $table->date('tanggal_kembali_aktual')->nullable();

        $table->enum('tujuan', [
            'Dalam Kota',
            'Luar Kota'
        ]);

        $table->integer('estimasi_km');

        $table->integer('km_awal');

        $table->integer('km_akhir')->nullable();

        $table->integer('total_km')->default(0);

        $table->decimal('biaya_sewa', 12, 2)->default(0);

        $table->decimal('biaya_jarak', 12, 2)->default(0);

        $table->decimal('denda', 12, 2)->default(0);

        $table->decimal('total_bayar', 12, 2)->default(0);

        $table->enum('status', [
            'Aktif',
            'Selesai',
            'Terlambat'
        ])->default('Aktif');

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
