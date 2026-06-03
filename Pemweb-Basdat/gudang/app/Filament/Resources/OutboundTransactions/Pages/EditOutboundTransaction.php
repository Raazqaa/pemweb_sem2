<?php

namespace App\Filament\Resources\OutboundTransactions\Pages;

use App\Filament\Resources\OutboundTransactions\OutboundTransactionResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditOutboundTransaction extends EditRecord
{
    protected static string $resource = OutboundTransactionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
