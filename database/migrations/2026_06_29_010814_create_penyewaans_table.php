<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('penyewaans', function (Blueprint $table) {

            $table->id();

            $table->string('kode_sewa')->unique();

            $table->foreignId('pelanggan_id')->constrained()->cascadeOnDelete();

            $table->foreignId('mobil_id')->constrained()->cascadeOnDelete();

            $table->dateTime('tanggal_pinjam');

            $table->dateTime('tanggal_kembali_rencana');

            $table->dateTime('tanggal_kembali')->nullable();

            // Paket
            $table->enum('paket', [
                '6 Jam',
                '12 Jam',
                '24 Jam'
            ]);

            // Tujuan
            $table->enum('jenis_perjalanan', [
                'Dalam Kota',
                'Luar Kota'
            ]);

            // Estimasi KM
            $table->integer('estimasi_km')->default(0);

            // Tarif
            $table->decimal('harga_sewa',12,2)->default(0);

            $table->decimal('biaya_luar_kota',12,2)->default(0);

            $table->decimal('overtime',12,2)->default(0);

            $table->decimal('denda',12,2)->default(0);

            $table->decimal('total_bayar',12,2)->default(0);

            // Checklist Dokumen
            $table->boolean('cek_ktp')->default(false);

            $table->boolean('cek_sim')->default(false);

            $table->boolean('cek_id_karyawan')->default(false);

            $table->boolean('cek_slip_gaji')->default(false);

            $table->boolean('cek_tempat_usaha')->default(false);

            // Status
            $table->enum('status',[
                'Booking',
                'Berjalan',
                'Selesai',
                'Batal'
            ])->default('Booking');

            $table->text('catatan')->nullable();

            $table->timestamps();

        });
    }

    public function down(): void
    {
        Schema::dropIfExists('penyewaans');
    }
};