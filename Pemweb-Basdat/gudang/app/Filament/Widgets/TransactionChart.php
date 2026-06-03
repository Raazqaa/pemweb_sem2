<?php

namespace App\Filament\Widgets;

use App\Models\InboundTransaction;
use App\Models\OutboundTransaction;
use Filament\Widgets\ChartWidget;
use Illuminate\Support\Facades\DB;

class TransactionChart extends ChartWidget
{
    public function getHeading(): ?string
    {
        return 'Grafik Transaksi Gudang';
    }

    protected function getData(): array
    {
        $barangMasuk = InboundTransaction::select(
            DB::raw('MONTH(tanggal_masuk) as bulan'),
            DB::raw('SUM(jumlah_masuk) as total')
        )
            ->groupBy('bulan')
            ->pluck('total');

        $barangKeluar = OutboundTransaction::select(
            DB::raw('MONTH(tanggal_keluar) as bulan'),
            DB::raw('SUM(jumlah_keluar) as total')
        )
            ->groupBy('bulan')
            ->pluck('total');

        return [
            'datasets' => [
                [
                    'label' => 'Barang Masuk',
                    'data' => $barangMasuk,
                ],
                [
                    'label' => 'Barang Keluar',
                    'data' => $barangKeluar,
                ],
            ],

            'labels' => [
                'Jan',
                'Feb',
                'Mar',
                'Apr',
                'Mei',
                'Jun',
                'Jul',
                'Agu',
                'Sep',
                'Okt',
                'Nov',
                'Des',
            ],
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }
}
