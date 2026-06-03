<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        Category::insert([
            [
                'nama_kategori' => 'Elektronik',
                'deskripsi' => 'Peralatan elektronik',
            ],
            [
                'nama_kategori' => 'ATK',
                'deskripsi' => 'Alat tulis kantor',
            ],
            [
                'nama_kategori' => 'Furniture',
                'deskripsi' => 'Perlengkapan furniture kantor',
            ],
            [
                'nama_kategori' => 'Jaringan',
                'deskripsi' => 'Perangkat jaringan komputer',
            ],
            [
                'nama_kategori' => 'Aksesoris Komputer',
                'deskripsi' => 'Perlengkapan tambahan komputer',
            ],
        ]);
    }
}
