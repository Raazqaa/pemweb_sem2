<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\InboundTransaction;
use App\Observers\InboundTransactionObserver;
use App\Models\OutboundTransaction;
use App\Observers\OutboundTransactionObserver;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        InboundTransaction::observe(
            InboundTransactionObserver::class
        );
        OutboundTransaction::observe(
            OutboundTransactionObserver::class
        );
    }
}
