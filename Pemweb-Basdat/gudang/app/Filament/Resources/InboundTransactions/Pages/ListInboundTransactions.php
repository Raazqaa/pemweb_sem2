<?php

namespace App\Filament\Resources\InboundTransactions\Pages;

use App\Filament\Resources\InboundTransactions\InboundTransactionResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListInboundTransactions extends ListRecords
{
    protected static string $resource = InboundTransactionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
