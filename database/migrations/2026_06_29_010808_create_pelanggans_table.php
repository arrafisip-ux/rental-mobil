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

        $table->string('nik')->unique();

        $table->string('nama_lengkap');

        $table->string('no_hp');

        $table->string('no_darurat');

        $table->string('email')->nullable();

        $table->text('alamat');

        $table->string('foto_ktp');

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
