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
        Schema::create('pelanggans', function (Blueprint $table) {

            $table->id();

            $table->string('kode_pelanggan')->unique();

            $table->string('nik',20)->unique();

            $table->string('nama');

            $table->string('telepon',20);

            $table->string('telepon_darurat',20);

            $table->text('alamat');

            $table->string('nomor_sim')->unique();

            $table->date('masa_berlaku_sim');

            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pelanggans');
    }
};