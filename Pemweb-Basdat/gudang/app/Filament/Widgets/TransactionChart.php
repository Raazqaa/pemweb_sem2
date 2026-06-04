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
                    'label' => '📥 Barang Masuk',
                    'data' => $barangMasuk,
                    'backgroundColor' => 'rgba(14, 165, 233, 0.6)',
                    'borderColor' => '#0ea5e9',
                    'borderWidth' => 2,
                    'borderRadius' => 8,
                    'maxBarThickness' => 40,
                ],
                [
                    'label' => '📤 Barang Keluar',
                    'data' => $barangKeluar,
                    'backgroundColor' => 'rgba(99, 102, 241, 0.6)',
                    'borderColor' => '#6366f1',
                    'borderWidth' => 2,
                    'borderRadius' => 8,
                    'maxBarThickness' => 40,
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
        return 'bar';
    }
    protected function getOptions(): array
    {
        return [
            'plugins' => [
                'legend' => [
                    'position' => 'top',
                ],
            ],
            'scales' => [
                'y' => [
                    'beginAtZero' => true,
                    'grid' => [
                        'color' => 'rgba(255,255,255,0.05)',
                    ],
                ],
                'x' => [
                    'grid' => [
                        'display' => false,
                    ],
                ],
            ],
        ];
    }
}
