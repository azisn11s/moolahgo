<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Carbon;

class IncomingTransactionRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    public function prepareForValidation()
    {
        $this->merge([
            'bank_in_transaction_date'=> Carbon::now()->format('Y-m-d H:i:s')
        ]);
    }


    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {       
        return [
            'bank_in_transaction_date'=> 'date|after_or_equal:now',
            'bank_in_amount'=> 'required|numeric|min:0',
            'bank_in_currency'=> 'required|min:1|max:3',
            'bank_in_beneficiary_name'=> 'required|min:3|max:128',
            'bank_in_beneficiary_account'=> 'required|min:3|max:25',
            'bank_in_sender_name'=> 'required|min:3|max:128',
            'bank_in_sender_account'=> 'required|min:3|max:25',
            'bank_in_transaction_reference'=> 'required|min:3|max:25',
            'bank_in_status'=> 'nullable|in:pending,unmatched,matched'
        ];        
    }
}
