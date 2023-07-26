<?php

namespace App\Http\Requests\SalesOrder;

use Illuminate\Foundation\Http\FormRequest;

class StoreSalesOrderRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'date'=>[
                'required',
                'date',
            ],
            'sales_channel'=>[
                'required',
                'string',
            ],
            'order_id'=>[
                'required',
                'string',
            ],
            'customer_id'=>[
                'required',
                'string',
            ],
            'gstin'=>[
                'required',
                'string',
            ],
            'billing_address'=>[
                'nullable',
            ],
            'shipping_address'=>[
                'nullable',
            ],
        ];
    }
}
