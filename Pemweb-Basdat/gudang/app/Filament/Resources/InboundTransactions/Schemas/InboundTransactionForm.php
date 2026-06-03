<?php

namespace App\Filament\Resources\InboundTransactions\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;
// use Filament\Forms\Components\Hidden;


class InboundTransactionForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('product_id')
                    ->label('Barang')
                    ->relationship(
                        'product',
                        'nama_barang'
                    )
                    ->searchable()
                    ->preload()
                    ->required(),

                Select::make('supplier_id')
                    ->label('Supplier')
                    ->relationship(
                        'supplier',
                        'nama_pemasok'
                    )
                    ->searchable()
                    ->preload()
                    ->required(),

                TextInput::make('jumlah_masuk')
                    ->numeric()
                    ->required(),

                DatePicker::make(
                    'tanggal_masuk'
                )
                    ->default(now())
                    ->required(),

                // Hidden::make('user_id')
                //     ->default(auth()->id()),
            ]);
    }
}
