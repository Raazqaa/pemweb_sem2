<?php

namespace App\Filament\Widgets;

use App\Models\InboundTransaction;
use App\Models\OutboundTransaction;
use Filament\Tables;
use Filament\Widgets\TableWidget as BaseWidget;
// use Illuminate\Support\Collection;

class RecentActivities extends BaseWidget
{
    protected static ?int $sort = 5;

    public function table(Tables\Table $table): Tables\Table
    {
        $activities = collect();

        // Barang Masuk
        InboundTransaction::latest()
            ->take(5)
            ->get()
            ->each(function ($item) use ($activities) {
                $activities->push([
                    'Tanggal' => $item->tanggal_masuk,
                    'aktivitas' => "Barang Masuk: {$item->product->nama_barang} (+{$item->jumlah_masuk})",
                ]);
            });

        // Barang Keluar
        OutboundTransaction::latest()
            ->take(5)
            ->get()
            ->each(function ($item) use ($activities) {
                $activities->push([
                    'Tanggal' => $item->tanggal_keluar,
                    'aktivitas' => "Barang Keluar: {$item->product->nama_barang} (-{$item->jumlah_keluar})",
                ]);
            });

        $data = $activities
            ->sortByDesc('Tanggal')
            ->take(6);

        return $table
            ->records(fn() => $data)
            ->columns([
                Tables\Columns\TextColumn::make('Tanggal')
                    ->date('d M Y'),

                Tables\Columns\TextColumn::make('aktivitas')
                    ->searchable(),
            ]);
    }
}
