<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TransactionLog extends Model
{
    public $incrementing = false;
    protected $fillable = [
        'id',
        'event_name',
        'data',
        'exceptions'
    ];
}
