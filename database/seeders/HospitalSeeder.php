<?php

namespace Database\Seeders;

use App\Models\Hospital;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HospitalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Hospital::create([
            'nama' => 'RS Cipto Mangunkusumo',
            'alamat' => 'Jl. Diponegoro No.71, Jakarta',
            'email' => 'info@rscm.id',
            'telepon' => '0211234567',
        ]);

        Hospital::create([
            'nama' => 'RS Hasan Sadikin',
            'alamat' => 'Jl. Pasteur No.38, Bandung',
            'email' => 'info@rshs.id',
            'telepon' => '0227654321',
        ]);
    }
}
