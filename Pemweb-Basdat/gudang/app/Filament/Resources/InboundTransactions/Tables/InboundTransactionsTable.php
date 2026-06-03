<?php

namespace App\Filament\Resources\InboundTransactions\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Support\Facades\Auth;

class InboundTransactionsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make(
                    'product.nama_barang'
                )
                    ->label('Barang'),

                TextColumn::make(
                    'supplier.nama_pemasok'
                )
                    ->label('Supplier'),

                TextColumn::make(
                    'jumlah_masuk'
                ),

                TextColumn::make(
                    'tanggal_masuk'
                )
                    ->date(),

                TextColumn::make(
                    'user.name'
                )
                    ->label('Petugas'),
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
