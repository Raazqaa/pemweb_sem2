<?php

namespace App\Filament\Resources\OutboundTransactions\Pages;

use App\Filament\Resources\OutboundTransactions\OutboundTransactionResource;
use Filament\Resources\Pages\CreateRecord;

class CreateOutboundTransaction extends CreateRecord
{
    protected static string $resource = OutboundTransactionResource::class;
    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['user_id'] = auth()->id();

        return $data;
    }
}
