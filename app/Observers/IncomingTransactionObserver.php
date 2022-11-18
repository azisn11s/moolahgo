<?php

namespace App\Observers;

use App\Jobs\TransactionLogJob;
use App\Models\IncomingTransaction;
use App\Models\RemitTransaction;

class IncomingTransactionObserver
{
    /**
     * Handle the incoming transaction "created" event.
     *
     * @param  \App\Models\IncomingTransaction  $incomingTransaction
     * @return void
     */
    public function created(IncomingTransaction $incomingTransaction)
    {
        $existingRemitTransaction = RemitTransaction::query()->orderBy('created_at', 'desc')
            ->where('transaction_expected_amount', $incomingTransaction->bank_in_amount)
            ->where('transaction_destination_currency', $incomingTransaction->bank_in_currency)
            ->where('transaction_financial_status', 'unpaid')
            ->where('transaction_processing_status', 'active_origin')
            ->where('created_at', '<=', $incomingTransaction->bank_in_transaction_date)
            ->first();

        try {
            if ($existingRemitTransaction) {
                
                /** @var RemitTransaction $existingRemitTransaction*/
                $existingRemitTransaction->update([
                    'transaction_financial_status'=> 'paid',
                    'transaction_processing_status'=> 'completed'
                ]);

                $incomingTransaction->update(['bank_in_status'=> 'matched']);
            }

            TransactionLogJob::dispatch('add_incoming_transaction', $incomingTransaction->refresh()->toArray());

        } catch (\Throwable $th) {
            throw $th;
        }
            
    }
}
