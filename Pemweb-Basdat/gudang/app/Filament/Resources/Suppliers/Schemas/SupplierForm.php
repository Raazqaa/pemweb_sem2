<?php

namespace App\Filament\Resources\Suppliers\Schemas;

use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class SupplierForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('nama_pemasok')
                    ->required(),

                TextInput::make('no_telp')
                    ->tel()
                    ->required(),

                Textarea::make('alamat')
                    ->required(),
            ]);
    }
}
