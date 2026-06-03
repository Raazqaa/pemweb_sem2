<?php

namespace App\Observers;

use App\Models\InboundTransaction;

class InboundTransactionObserver
{
    /**
     * Handle the InboundTransaction "created" event.
     */
    public function created(
        InboundTransaction $trx
    ): void {

        $trx->product->increment(
            'stok',
            $trx->jumlah_masuk
        );
    }

    /**
     * Handle the InboundTransaction "updated" event.
     */
    public function updated(InboundTransaction $inboundTransaction): void
    {
        //
    }

    /**
     * Handle the InboundTransaction "deleted" event.
     */
    public function deleted(InboundTransaction $inboundTransaction): void
    {
        //
    }

    /**
     * Handle the InboundTransaction "restored" event.
     */
    public function restored(InboundTransaction $inboundTransaction): void
    {
        //
    }

    /**
     * Handle the InboundTransaction "force deleted" event.
     */
    public function forceDeleted(InboundTransaction $inboundTransaction): void
    {
        //
    }
}
