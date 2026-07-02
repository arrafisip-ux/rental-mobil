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

            // Nomor transaksi
            $table->string('no_transaksi')->unique();

            // Relasi
            $table->foreignId('pelanggan_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->foreignId('mobil_id')
                ->constrained()
                ->cascadeOnDelete();

            // Tanggal
            $table->dateTime('tanggal_pinjam');

            $table->dateTime('tanggal_kembali_rencana');

            $table->dateTime('tanggal_kembali')->nullable();

            // Paket
            $table->enum('paket', [
                '6 Jam',
                '12 Jam',
                '24 Jam',
                'Harian'
            ]);

            // Tujuan
            $table->string('tujuan');

            $table->enum('jenis_perjalanan', [
                'Dalam Kota',
                'Luar Kota'
            ]);

            // Estimasi
            $table->integer('estimasi_km')->default(0);

            // Kilometer
            $table->integer('km_awal')->default(0);

            $table->integer('km_akhir')->nullable();

            $table->integer('total_km')->default(0);

            // Lama sewa
            $table->integer('lama_sewa')->default(1);

            // Biaya
            $table->decimal('harga_sewa',12,2)->default(0);

            $table->decimal('biaya_luar_kota',12,2)->default(0);

            $table->integer('jam_overtime')->default(0);

            $table->decimal('overtime',12,2)->default(0);

            $table->decimal('denda',12,2)->default(0);

            $table->decimal('total_bayar',12,2)->default(0);

            // Status pembayaran
            $table->enum('status_pembayaran',[
                'Belum Lunas',
                'Lunas'
            ])->default('Belum Lunas');

            // Checklist Dokumen
            $table->boolean('cek_ktp')->default(false);

            $table->boolean('cek_sim')->default(false);

            $table->boolean('cek_id_karyawan')->default(false);

            $table->boolean('cek_slip_gaji')->default(false);

            $table->boolean('cek_tempat_usaha')->default(false);

            // Kondisi saat kembali
            $table->text('kondisi_kembali')->nullable();

            // Status transaksi
            $table->enum('status',[
                'Booking',
                'Berjalan',
                'Selesai',
                'Batal'
            ])->default('Booking');

            // Catatan
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