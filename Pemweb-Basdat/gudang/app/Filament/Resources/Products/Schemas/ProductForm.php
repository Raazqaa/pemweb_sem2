<?php

namespace App\Filament\Resources\Products\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class ProductForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('category_id')
                    ->relationship(
                        'category',
                        'nama_kategori'
                    )
                    ->searchable()
                    ->required(),

                TextInput::make('kode_barang')
                    ->required(),

                TextInput::make('nama_barang')
                    ->required(),

                TextInput::make('stok')
                    ->disabled()
                    ->dehydrated(false),
            ]);
    }
}
