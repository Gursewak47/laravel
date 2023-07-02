<?php

namespace App\Http\Requests\Employee;

use Illuminate\Foundation\Http\FormRequest;

class UpdateEmployeeRequest extends FormRequest
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
        $rules = [
            'first_name' => [
                'nullable',
                'string',
                'max:255',
            ],
            'last_name' => [
                'nullable',
                'string',
                'max:255',
            ],
            'email'=>[
                'nullable',
                'email',
            ],
            'salary'=>[
                'nullable',
                'numeric',
            ],
            'phone'=>[
                'nullable',
                'string',
            ],
            'address'=>[
                'nullable',
                'string',
            ],
        ];
        $employeeBankAccountPrefix = 'employee_bank_accounts.*.';

        $employeeBankAccountRules  = [
            $employeeBankAccountPrefix . 'account_name' => [
                'nullable',
                'string'
            ],
            $employeeBankAccountPrefix . 'code' => [
                'nullable',
                'string'
            ],
            $employeeBankAccountPrefix . 'account_number' => [
                'nullable',
                'string'
            ],
        ];


        return (collect($rules)->merge(collect($employeeBankAccountRules)))->toArray();
    }
}
