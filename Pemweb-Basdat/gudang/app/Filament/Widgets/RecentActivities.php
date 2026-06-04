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
    protected static ?string $heading = '📋 Aktivitas Terbaru';

    public function table(Tables\Table $table): Tables\Table
    {
        $activities = collect();
        InboundTransaction::latest()
            ->take(5)
            ->get()
            ->each(function ($item) use ($activities) {
                $activities->push([
                    'Tanggal' => $item->tanggal_masuk,
                    'Keterangan' => 'masuk',
                    'aktivitas' => "{$item->product->nama_barang} (+{$item->jumlah_masuk})",
                ]);
            });

        OutboundTransaction::latest()
            ->take(5)
            ->get()
            ->each(function ($item) use ($activities) {
                $activities->push([
                    'Tanggal' => $item->tanggal_keluar,
                    'Keterangan' => 'keluar',
                    'aktivitas' => "{$item->product->nama_barang} (-{$item->jumlah_keluar})",
                ]);
            });

        $data = $activities
            ->sortByDesc('Tanggal')
            ->take(6);

        return $table
            ->records(fn() => $data)
            ->columns([
                Tables\Columns\TextColumn::make('Tanggal')
                    ->date('d M Y')
                    ->sortable(),

                Tables\Columns\TextColumn::make('Keterangan')
                    ->badge()
                    ->formatStateUsing(fn(string $state) => match ($state) {
                        'masuk' => '📥 MASUK',
                        'keluar' => '📤 KELUAR',
                    })
                    ->color(fn(string $state) => match ($state) {
                        'masuk' => 'info',
                        'keluar' => 'warning',
                    }),

                Tables\Columns\TextColumn::make('aktivitas')
                    ->searchable()
                    ->weight('medium'),
            ]);
    }
}
