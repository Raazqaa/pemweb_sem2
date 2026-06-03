<?php

namespace App\Filament\Resources\InboundTransactions;

use App\Filament\Resources\InboundTransactions\Pages\CreateInboundTransaction;
use App\Filament\Resources\InboundTransactions\Pages\EditInboundTransaction;
use App\Filament\Resources\InboundTransactions\Pages\ListInboundTransactions;
use App\Filament\Resources\InboundTransactions\Schemas\InboundTransactionForm;
use App\Filament\Resources\InboundTransactions\Tables\InboundTransactionsTable;
use App\Models\InboundTransaction;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class InboundTransactionResource extends Resource
{
    protected static ?string $model = InboundTransaction::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedArrowDownTray;

    public static function form(Schema $schema): Schema
    {
        return InboundTransactionForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return InboundTransactionsTable::configure($table);
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
            'index' => ListInboundTransactions::route('/'),
            'create' => CreateInboundTransaction::route('/create'),
            'edit' => EditInboundTransaction::route('/{record}/edit'),
        ];
    }
}
