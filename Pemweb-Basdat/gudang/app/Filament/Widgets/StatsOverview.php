<?php

namespace App\Filament\Widgets;

use App\Models\Category;
use App\Models\InboundTransaction;
use App\Models\OutboundTransaction;
use App\Models\Product;
use App\Models\Supplier;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends StatsOverviewWidget
{
    protected function getStats(): array
    {
        return [

            Stat::make(
                'Total Barang',
                Product::count()
            ),

            Stat::make(
                'Total Kategori',
                Category::count()
            ),
            Stat::make(
                'Total Supplier',
                Supplier::count()
            ),

            Stat::make(
                'Barang Masuk Hari Ini',
                InboundTransaction::whereDate(
                    'tanggal_masuk',
                    today()
                )->count()
            ),
            Stat::make(
                'Barang Keluar Hari Ini',
                OutboundTransaction::whereDate(
                    'tanggal_keluar',
                    today()
                )->count()
            ),

            Stat::make(
                'Stok Menipis',
                Product::where('stok', '<', 10)->count()
            )
                ->description(
                    Product::where('stok', '<', 10)
                        ->pluck('nama_barang')
                        ->join(', ')
                )
                ->color('danger'),

        ];
    }
}
