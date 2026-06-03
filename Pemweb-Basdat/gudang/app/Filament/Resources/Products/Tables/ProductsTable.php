<?php

namespace App\Filament\Resources\Products\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Support\Facades\Auth;

class ProductsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('kode_barang'),

                TextColumn::make('nama_barang')
                    ->searchable(),

                TextColumn::make(
                    'category.nama_kategori'
                )
                    ->label('Kategori')
                    ->searchable(),
                TextColumn::make('stok')
                    ->badge()
                    ->color(
                        fn($state)
                        => $state < 10
                            ? 'danger'
                            : 'success'
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
