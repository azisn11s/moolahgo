<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class IncomingTransaction extends Model
{
    protected $fillable = [
        'bank_in_transaction_date',
        'bank_in_amount',
        'bank_in_currency',
        'bank_in_beneficiary_name',
        'bank_in_beneficiary_account',
        'bank_in_sender_name',
        'bank_in_sender_account',
        'bank_in_transaction_reference',
        'bank_in_status'
    ];
}
