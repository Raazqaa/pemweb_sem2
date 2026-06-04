<?php

namespace App\Filament\Widgets;

// use App\Models\Category;
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
            Stat::make('Total Barang', Product::count())
                ->icon('heroicon-o-cube')
                ->color('primary'),
            // Stat::make(
            //     'Total Kategori',
            //     Category::count()
            // ),
            Stat::make('Total Supplier', Supplier::count())
                ->icon('heroicon-o-truck')
                ->color('success'),

            Stat::make(
                'Role',
                ucfirst(auth()->user()->role)
            )
                ->description('Role pengguna saat ini')
                ->icon('heroicon-o-user'),

            Stat::make('Barang Masuk Hari Ini', InboundTransaction::whereDate(
                'tanggal_masuk',
                today()
            )->count())
                ->icon('heroicon-o-arrow-down-tray')
                ->color('info'),

            Stat::make('Barang Keluar Hari Ini', OutboundTransaction::whereDate(
                'tanggal_keluar',
                today()
            )->count())
                ->icon('heroicon-o-arrow-up-tray')
                ->color('warning'),

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
