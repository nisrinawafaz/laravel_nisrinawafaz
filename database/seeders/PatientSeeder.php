<?php

namespace Database\Seeders;

use App\Models\Patient;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PatientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Patient::create([
            'nama' => 'Budi Santoso',
            'alamat' => 'Jl. Merdeka No.1, Jakarta',
            'telepon' => '08123456789',
            'hospital_id' => 1,
        ]);

        Patient::create([
            'nama' => 'Siti Aminah',
            'alamat' => 'Jl. Asia Afrika No.10, Bandung',
            'telepon' => '08987654321',
            'hospital_id' => 2,
        ]);
    }
}
