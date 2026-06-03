<?php

namespace App\Filament\Resources\InboundTransactions\Pages;

use App\Filament\Resources\InboundTransactions\InboundTransactionResource;
use Filament\Resources\Pages\CreateRecord;

class CreateInboundTransaction extends CreateRecord
{
    protected static string $resource = InboundTransactionResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['user_id'] = auth()->id();

        return $data;
    }
}