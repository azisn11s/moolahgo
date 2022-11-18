<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RemitRequest extends FormRequest
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

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'transaction_source_amount'=> ['required'],
            'transaction_source_currency'=> ['required'],
            'transaction_fee_amount'=> ['nullable'],
            'transaction_fee_currency'=> ['nullable'],
            'transaction_expected_amount'=> ['required'],
            'transaction_expected_currency'=> ['required'],
            'transaction_destination_amount'=> ['required'],
            'transaction_destination_currency'=> ['required'],
            'transaction_financial_status'=> ['nullable'],
            'transaction_processing_status'=> ['nullable'],
            'transaction_sender_id'=> ['required'],
            'transaction_beneficiary_id'=> ['required'],
            'transaction_reference_number'=> ['nullable']
        ];
    }
}
