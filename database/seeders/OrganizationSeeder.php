<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Organization;

class OrganizationSeeder extends Seeder
{
    public function run(): void
    {
        Organization::create([
            'name' => 'HIMA Informatika',
            'description' => 'Himpunan Mahasiswa Informatika',
            'status' => 'approved'
        ]);

        Organization::create([
            'name' => 'HIMA Sistem Informasi',
            'description' => 'Himpunan Mahasiswa Sistem Informasi',
            'status' => 'approved'
        ]);

        Organization::create([
            'name' => 'BEM',
            'description' => 'Badan Eksekutif Mahasiswa',
            'status' => 'approved'
        ]);

        Organization::create([
            'name' => 'UKM Musik',
            'description' => 'Unit Kegiatan Mahasiswa Musik',
            'status' => 'pending'
        ]);
    }
}