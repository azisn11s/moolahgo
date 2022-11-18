<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RemitTransaction extends Model
{
    public $primaryKey = 'transaction_id';
    
    protected $fillable = [
        'transaction_source_amount',
        'transaction_source_currency',
        'transaction_fee_amount',
        'transaction_fee_currency',
        'transaction_expected_amount',
        'transaction_expected_currency',
        'transaction_destination_amount',
        'transaction_destination_currency',
        'transaction_financial_status',
        'transaction_processing_status',
        'transaction_sender_id',
        'transaction_beneficiary_id',
        'transaction_reference_number'
    ];
}
