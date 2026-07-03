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
        Schema::table('mobils', function (Blueprint $table) {

            // Data servis terakhir
            $table->integer('km_terakhir_servis')
                ->default(0)
                ->after('kilometer');

            $table->integer('km_servis_berikutnya')
                ->default(10000)
                ->after('km_terakhir_servis');

            $table->date('tanggal_servis_terakhir')
                ->nullable()
                ->after('km_servis_berikutnya');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('mobils', function (Blueprint $table) {

            $table->dropColumn([
                'km_terakhir_servis',
                'km_servis_berikutnya',
                'tanggal_servis_terakhir'
            ]);

        });
    }
};