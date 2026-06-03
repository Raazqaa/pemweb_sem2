<?php

namespace Database\Seeders;

use App\Models\OutboundTransaction;
use Illuminate\Database\Seeder;

class OutboundTransactionSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            [
                'product_id' => 1,
                'user_id' => 1,
                'jumlah_keluar' => 5,
                'tanggal_keluar' => '2026-01-20',
                'keterangan_tujuan' => 'Lab Komputer',
            ],
            [
                'product_id' => 2,
                'user_id' => 2,
                'jumlah_keluar' => 3,
                'tanggal_keluar' => '2026-02-15',
                'keterangan_tujuan' => 'Ruang Server',
            ],
            [
                'product_id' => 3,
                'user_id' => 1,
                'jumlah_keluar' => 8,
                'tanggal_keluar' => '2026-03-11',
                'keterangan_tujuan' => 'Gedung A',
            ],
            [
                'product_id' => 4,
                'user_id' => 3,
                'jumlah_keluar' => 4,
                'tanggal_keluar' => '2026-04-18',
                'keterangan_tujuan' => 'Gedung B',
            ],
            [
                'product_id' => 5,
                'user_id' => 2,
                'jumlah_keluar' => 10,
                'tanggal_keluar' => '2026-05-25',
                'keterangan_tujuan' => 'Kantor Cabang',
            ],
            [
                'product_id' => 1,
                'user_id' => 1,
                'jumlah_keluar' => 6,
                'tanggal_keluar' => '2026-06-13',
                'keterangan_tujuan' => 'Ruang IT',
            ],
            [
                'product_id' => 2,
                'user_id' => 3,
                'jumlah_keluar' => 7,
                'tanggal_keluar' => '2026-07-08',
                'keterangan_tujuan' => 'Gedung C',
            ],
            [
                'product_id' => 3,
                'user_id' => 2,
                'jumlah_keluar' => 5,
                'tanggal_keluar' => '2026-08-17',
                'keterangan_tujuan' => 'Kampus',
            ],
            [
                'product_id' => 4,
                'user_id' => 1,
                'jumlah_keluar' => 9,
                'tanggal_keluar' => '2026-09-28',
                'keterangan_tujuan' => 'Divisi Jaringan',
            ],
            [
                'product_id' => 5,
                'user_id' => 3,
                'jumlah_keluar' => 12,
                'tanggal_keluar' => '2026-10-30',
                'keterangan_tujuan' => 'Kantor Pusat',
            ],
        ];

        foreach ($data as $item) {
            OutboundTransaction::create($item);
        }
    }
}
