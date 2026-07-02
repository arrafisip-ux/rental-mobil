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
        Schema::create('perawatans', function (Blueprint $table) {

            $table->id();

            $table->foreignId('mobil_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->date('tanggal_perawatan');

            $table->enum('jenis_perawatan',[
                'Ganti Oli',
                'Tune Up',
                'Kampas Rem',
                'Ban',
                'Aki',
                'AC',
                'Servis Berkala',
                'Lainnya'
            ]);

            $table->string('nama_sparepart')->nullable();

            $table->integer('km_servis')->default(0);

            $table->integer('km_servis_berikutnya')->default(0);

            $table->decimal('biaya',12,2)->default(0);

            $table->string('bengkel')->nullable();

            $table->text('keterangan')->nullable();

            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('perawatans');
    }
};