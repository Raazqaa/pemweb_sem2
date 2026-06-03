<?php

namespace Database\Seeders;

use App\Models\InboundTransaction;
use Illuminate\Database\Seeder;

class InboundTransactionSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            [
                'product_id' => 1,
                'supplier_id' => 1,
                'user_id' => 1,
                'jumlah_masuk' => 20,
                'tanggal_masuk' => '2026-01-15',
            ],
            [
                'product_id' => 2,
                'supplier_id' => 2,
                'user_id' => 1,
                'jumlah_masuk' => 15,
                'tanggal_masuk' => '2026-02-10',
            ],
            [
                'product_id' => 3,
                'supplier_id' => 1,
                'user_id' => 2,
                'jumlah_masuk' => 30,
                'tanggal_masuk' => '2026-03-05',
            ],
            [
                'product_id' => 4,
                'supplier_id' => 3,
                'user_id' => 2,
                'jumlah_masuk' => 12,
                'tanggal_masuk' => '2026-04-12',
            ],
            [
                'product_id' => 5,
                'supplier_id' => 2,
                'user_id' => 3,
                'jumlah_masuk' => 40,
                'tanggal_masuk' => '2026-05-18',
            ],
            [
                'product_id' => 1,
                'supplier_id' => 1,
                'user_id' => 1,
                'jumlah_masuk' => 25,
                'tanggal_masuk' => '2026-06-07',
            ],
            [
                'product_id' => 2,
                'supplier_id' => 3,
                'user_id' => 2,
                'jumlah_masuk' => 18,
                'tanggal_masuk' => '2026-07-21',
            ],
            [
                'product_id' => 3,
                'supplier_id' => 2,
                'user_id' => 3,
                'jumlah_masuk' => 35,
                'tanggal_masuk' => '2026-08-09',
            ],
            [
                'product_id' => 4,
                'supplier_id' => 1,
                'user_id' => 1,
                'jumlah_masuk' => 28,
                'tanggal_masuk' => '2026-09-14',
            ],
            [
                'product_id' => 5,
                'supplier_id' => 3,
                'user_id' => 2,
                'jumlah_masuk' => 50,
                'tanggal_masuk' => '2026-10-22',
            ],
        ];

        foreach ($data as $item) {
            InboundTransaction::create($item);
        }
    }
}
