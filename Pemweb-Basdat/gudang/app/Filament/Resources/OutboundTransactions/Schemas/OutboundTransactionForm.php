<?php

namespace App\Filament\Resources\OutboundTransactions\Schemas;

use App\Models\Product;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class OutboundTransactionForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('product_id')
                    ->relationship(
                        'product',
                        'nama_barang'
                    )
                    ->searchable()
                    ->preload()
                    ->required(),

                TextInput::make('jumlah_keluar')
                    ->numeric()
                    ->required()
                    ->rules([
                        function () {

                            return function (
                                $attribute,
                                $value,
                                $fail
                            ) {

                                $product =
                                    Product::find(
                                        request()->product_id
                                    );

                                if (
                                    $product &&
                                    $value > $product->stok
                                ) {

                                    $fail(
                                        'Stok tidak mencukupi.'
                                    );
                                }
                            };
                        },
                    ]),

                DatePicker::make('tanggal_keluar')
                    ->default(now())
                    ->required(),

                TextInput::make(
                    'keterangan_tujuan'
                )
                    ->required(),

                // Hidden::make('user_id')
                //     ->default(auth()->id()),
            ]);
    }
}
