<?php

namespace App\Observers;

use App\Models\OutboundTransaction;

class OutboundTransactionObserver
{
    /**
     * Handle the OutboundTransaction "created" event.
     */
    public function created(
        OutboundTransaction $trx
    ): void {

        $trx->product->decrement(
            'stok',
            $trx->jumlah_keluar
        );
    }

    /**
     * Handle the OutboundTransaction "updated" event.
     */
    public function updated(OutboundTransaction $outboundTransaction): void
    {
        //
    }

    /**
     * Handle the OutboundTransaction "deleted" event.
     */
    public function deleted(OutboundTransaction $outboundTransaction): void
    {
        //
    }

    /**
     * Handle the OutboundTransaction "restored" event.
     */
    public function restored(OutboundTransaction $outboundTransaction): void
    {
        //
    }

    /**
     * Handle the OutboundTransaction "force deleted" event.
     */
    public function forceDeleted(OutboundTransaction $outboundTransaction): void
    {
        //
    }
}
