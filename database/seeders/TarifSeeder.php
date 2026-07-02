<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Tarif;

class TarifSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Tarif::truncate();

        // Tarif diinput melalui halaman Admin.
        // Seeder dikosongkan agar tidak terjadi error
        // saat struktur tabel berubah.
    }
}