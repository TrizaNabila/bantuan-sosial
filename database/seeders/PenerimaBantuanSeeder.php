<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\PenerimaBantuan;

class PenerimaBantuanSeeder extends Seeder
{
    public function run(): void
    {
        PenerimaBantuan::create([
            'program_id' => 1,
            'warga_id' => 1,
            'keterangan' => 'Penerima bantuan tahap 1',
        ]);

        PenerimaBantuan::create([
            'program_id' => 2,
            'warga_id' => 2,
            'keterangan' => 'Penerima bantuan tahap 2',
        ]);
    }
}
