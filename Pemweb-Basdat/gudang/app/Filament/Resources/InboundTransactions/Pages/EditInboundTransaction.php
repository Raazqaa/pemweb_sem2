<?php

namespace App\Filament\Resources\InboundTransactions\Pages;

use App\Filament\Resources\InboundTransactions\InboundTransactionResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditInboundTransaction extends EditRecord
{
    protected static string $resource = InboundTransactionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
