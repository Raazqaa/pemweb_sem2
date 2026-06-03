<?php

namespace App\Filament\Resources\OutboundTransactions\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Support\Facades\Auth;

class OutboundTransactionsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([

                TextColumn::make(
                    'product.nama_barang'
                ),

                TextColumn::make(
                    'jumlah_keluar'
                ),

                TextColumn::make(
                    'tanggal_keluar'
                )->date(),

                TextColumn::make(
                    'keterangan_tujuan'
                ),

                TextColumn::make(
                    'user.name'
                ),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make(),
                DeleteAction::make()
                    ->visible(
                        fn() => Auth::check()
                            && Auth::user()->role === 'admin'
                    ),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make()
                        ->visible(
                            fn() => Auth::check()
                                && Auth::user()->role === 'admin'
                        ),
                ]),
            ]);
    }
}
