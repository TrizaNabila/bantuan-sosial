<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\RiwayatPenyaluranBantuan;

class RiwayatPenyaluranBantuanSeeder extends Seeder
{
    public function run(): void
    {
        RiwayatPenyaluranBantuan::create([
            'program_id' => 1,
            'penerima_id' => 1,
            'tahap_ke' => 1,
            'tanggal' => now(),
            'nilai' => 1500000,
            'bukti_penyaluran' => 'penyaluran_bantuan/bukti1.jpg',
        ]);

        RiwayatPenyaluranBantuan::create([
            'program_id' => 1,
            'penerima_id' => 2,
            'tahap_ke' => 2,
            'tanggal' => now(),
            'nilai' => 2000000,
            'bukti_penyaluran' => 'penyaluran_bantuan/bukti2.jpg',
        ]);
    }
}
