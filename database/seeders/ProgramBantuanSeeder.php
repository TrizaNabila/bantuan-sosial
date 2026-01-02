<?php

namespace Database\Seeders;

use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProgramBantuanSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Factory::create('id_ID');

        $programs = [
            'Bantuan Langsung Tunai Desa',
            'Program Keluarga Harapan',
            'Bantuan Pangan Non Tunai',
            'Bantuan Modal UMKM',
            'Beasiswa Pendidikan Warga Tidak Mampu',
            'Bantuan Untuk Orang Kurang Mampu',
            'Bantuan Panti Asuhan',
        ];

        foreach (range(1, 100) as $index) {
            DB::table('program_bantuan')->insert([
                // program_id AUTO INCREMENT (JANGAN DIISI)
                'kode' => 'PB' . str_pad($index, 4, '0', STR_PAD_LEFT),
                'nama_program' => $faker->randomElement($programs),
                'tahun' => $faker->year(),
                'deskripsi' => $faker->sentence(8),
                'anggaran' => $faker->randomFloat(2, 1_000_000, 1_000_000_000),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
