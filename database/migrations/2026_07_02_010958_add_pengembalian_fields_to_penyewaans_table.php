<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('penyewaans', function (Blueprint $table) {

            if (!Schema::hasColumn('penyewaans', 'km_akhir')) {
                $table->integer('km_akhir')->nullable()->after('km_awal');
            }

            if (!Schema::hasColumn('penyewaans', 'total_km')) {
                $table->integer('total_km')->default(0)->after('km_akhir');
            }

            if (!Schema::hasColumn('penyewaans', 'jam_overtime')) {
                $table->integer('jam_overtime')->default(0)->after('biaya_luar_kota');
            }

            if (!Schema::hasColumn('penyewaans', 'hari_terlambat')) {
                $table->integer('hari_terlambat')->default(0)->after('jam_overtime');
            }
        });
    }

    public function down(): void
    {
        Schema::table('penyewaans', function (Blueprint $table) {

            if (Schema::hasColumn('penyewaans', 'hari_terlambat')) {
                $table->dropColumn('hari_terlambat');
            }

            if (Schema::hasColumn('penyewaans', 'jam_overtime')) {
                $table->dropColumn('jam_overtime');
            }

            if (Schema::hasColumn('penyewaans', 'total_km')) {
                $table->dropColumn('total_km');
            }

            if (Schema::hasColumn('penyewaans', 'km_akhir')) {
                $table->dropColumn('km_akhir');
            }

        });
    }
};