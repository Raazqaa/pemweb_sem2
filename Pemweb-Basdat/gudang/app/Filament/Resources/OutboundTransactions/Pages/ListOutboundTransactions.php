<?php

namespace App\Filament\Resources\OutboundTransactions\Pages;

use App\Filament\Resources\OutboundTransactions\OutboundTransactionResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListOutboundTransactions extends ListRecords
{
    protected static string $resource = OutboundTransactionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
