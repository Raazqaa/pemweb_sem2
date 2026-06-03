<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        Product::insert([

            [
                'category_id' => 1,
                'kode_barang' => 'ELK001',
                'nama_barang' => 'Laptop ASUS Vivobook',
                'stok' => 25,
            ],

            [
                'category_id' => 1,
                'kode_barang' => 'ELK002',
                'nama_barang' => 'Printer Epson L3210',
                'stok' => 10,
            ],

            [
                'category_id' => 2,
                'kode_barang' => 'ATK001',
                'nama_barang' => 'Pulpen Standard',
                'stok' => 100,
            ],

            [
                'category_id' => 2,
                'kode_barang' => 'ATK002',
                'nama_barang' => 'Buku Tulis A4',
                'stok' => 75,
            ],

            [
                'category_id' => 3,
                'kode_barang' => 'FUR001',
                'nama_barang' => 'Meja Kantor',
                'stok' => 15,
            ],

            [
                'category_id' => 3,
                'kode_barang' => 'FUR002',
                'nama_barang' => 'Kursi Kantor',
                'stok' => 20,
            ],

            [
                'category_id' => 4,
                'kode_barang' => 'NET001',
                'nama_barang' => 'Router MikroTik',
                'stok' => 8,
            ],

            [
                'category_id' => 4,
                'kode_barang' => 'NET002',
                'nama_barang' => 'Switch 24 Port TP-Link',
                'stok' => 5,
            ],

            [
                'category_id' => 5,
                'kode_barang' => 'ACC001',
                'nama_barang' => 'Mouse Logitech M170',
                'stok' => 50,
            ],

            [
                'category_id' => 5,
                'kode_barang' => 'ACC002',
                'nama_barang' => 'Keyboard Mechanical',
                'stok' => 12,
            ],
        ]);
    }
}
