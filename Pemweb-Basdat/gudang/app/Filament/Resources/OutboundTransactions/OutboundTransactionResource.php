<?php

namespace App\Filament\Resources\OutboundTransactions;

use App\Filament\Resources\OutboundTransactions\Pages\CreateOutboundTransaction;
use App\Filament\Resources\OutboundTransactions\Pages\EditOutboundTransaction;
use App\Filament\Resources\OutboundTransactions\Pages\ListOutboundTransactions;
use App\Filament\Resources\OutboundTransactions\Schemas\OutboundTransactionForm;
use App\Filament\Resources\OutboundTransactions\Tables\OutboundTransactionsTable;
use App\Models\OutboundTransaction;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class OutboundTransactionResource extends Resource
{
    protected static ?string $model = OutboundTransaction::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedArrowUpTray;

    public static function form(Schema $schema): Schema
    {
        return OutboundTransactionForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return OutboundTransactionsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListOutboundTransactions::route('/'),
            'create' => CreateOutboundTransaction::route('/create'),
            'edit' => EditOutboundTransaction::route('/{record}/edit'),
        ];
    }
}
