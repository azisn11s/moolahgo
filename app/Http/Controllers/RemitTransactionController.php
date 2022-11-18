<?php

namespace App\Http\Controllers;

use App\Http\Requests\RemitRequest;
use App\Models\RemitTransaction;
use Illuminate\Http\Request;

class RemitTransactionController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\RemitRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RemitRequest $request)
    {
        $newRemitTransaction = RemitTransaction::query()->create($request->validated());

        return response()->json([
            'success'=> true,
            'message'=> 'Remit Transaction has been created',
            'data'=> $newRemitTransaction
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\RemitTransaction  $remitTransaction
     * @return \Illuminate\Http\Response
     */
    public function show(RemitTransaction $remitTransaction)
    {
        return response()->json([
            'success'=> true,
            'message'=> 'Remit Transaction has been loaded',
            'data'=> $remitTransaction
        ]);
    }   
}
