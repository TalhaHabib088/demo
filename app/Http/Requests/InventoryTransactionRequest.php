<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InventoryTransactionRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'transaction_type' => 'required',
            'customer_id' => 'required_if:transaction_type,check-out',
            'product_id' => 'required|integer',
            'quantity' => 'required|integer',
            'price' => 'required|integer'
            
        ];
    }

    public function messages() : array
    {
            return [
                'customer_id.required_if' => 'The customer is required when the transaction type is checkout.',
            ];
    }
}
