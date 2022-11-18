<?php

namespace App\Observers;

use App\Jobs\TransactionLogJob;
use App\Models\RemitTransaction;

class RemitTransactionObserver
{
    /**
     * Handle the remit transaction "created" event.
     *
     * @param  \App\Models\RemitTransaction  $remitTransaction
     * @return void
     */
    public function created(RemitTransaction $remitTransaction)
    {
        TransactionLogJob::dispatch('add_remit_transaction', $remitTransaction->toArray());
    }
}
