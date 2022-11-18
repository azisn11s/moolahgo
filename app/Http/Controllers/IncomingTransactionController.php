<?php

namespace App\Http\Controllers;

use App\Http\Requests\IncomingTransactionRequest;
use App\Models\IncomingTransaction;
use Illuminate\Http\Request;

class IncomingTransactionController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\IncomingTransactionRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(IncomingTransactionRequest $request)
    {
        $incoming = IncomingTransaction::create($request->validated());

        return response()->json([
            'success'=> true,
            'message'=> 'Incoming Transaction has been created',
            'data'=> $incoming
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\IncomingTransaction  $incomingTransaction
     * @return \Illuminate\Http\Response
     */
    public function show(IncomingTransaction $incomingTransaction)
    {
        //
    }

}
