<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Supplier;

class SupplierSeeder extends Seeder
{
    public function run(): void
    {
        Supplier::insert([
            [
                'nama_pemasok' => 'PT Teknologi Nusantara',
                'no_telp' => '081234567890',
                'alamat' => 'Jakarta',
            ],
            [
                'nama_pemasok' => 'CV Maju Bersama',
                'no_telp' => '082233445566',
                'alamat' => 'Bandung',
            ],
            [
                'nama_pemasok' => 'PT Komputer Sejahtera',
                'no_telp' => '083344556677',
                'alamat' => 'Surabaya',
            ],
            [
                'nama_pemasok' => 'CV Sumber Jaya',
                'no_telp' => '084455667788',
                'alamat' => 'Medan',
            ],
            [
                'nama_pemasok' => 'PT Digital Indonesia',
                'no_telp' => '085566778899',
                'alamat' => 'Yogyakarta',
            ],
        ]);
    }
}
