<?php

namespace App\Providers;

use App\Models\IncomingTransaction;
use App\Models\RemitTransaction;
use App\Observers\IncomingTransactionObserver;
use App\Observers\RemitTransactionObserver;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        IncomingTransaction::observe(IncomingTransactionObserver::class);
        RemitTransaction::observe(RemitTransactionObserver::class);
    }
}
