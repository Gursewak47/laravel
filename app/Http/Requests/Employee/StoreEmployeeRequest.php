<?php

namespace App\Http\Requests\Employee;

use Illuminate\Foundation\Http\FormRequest;

class StoreEmployeeRequest extends FormRequest
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
            'first_name'=>[
                'required',
                'string',
                'max:255',
            ],
            'last_name'=>[
                'required',
                'string',
                'max:255',
            ],
            'email'=>[
                'required',
                'email',
            ],
            'salary'=>[
                'required',
                'numeric',
            ],
            'phone'=>[
                'required',
                'string',
                'max:24',
            ],
            'address'=>[
                'string',
            ],
        ];
    }
}
