<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WargaSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('warga')->insert([
            [
                'warga_id' => 1,
                'nama_warga' => 'Budi Santoso',
                'nik' => '3271010101010001',
                'alamat' => 'Jl. Merdeka No.1',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'warga_id' => 2,
                'nama_warga' => 'Siti Aminah',
                'nik' => '3271010101010002',
                'alamat' => 'Jl. Sudirman No.2',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
