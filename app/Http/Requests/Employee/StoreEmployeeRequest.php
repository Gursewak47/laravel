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
        $rules = [
            'first_name' => [
                'required',
                'string',
                'max:255',
            ],
            'last_name' => [
                'required',
                'string',
                'max:255',
            ],
            'email' => [
                'required',
                'email',
            ],
            'salary' => [
                'required',
                'numeric',
            ],
            'phone' => [
                'required',
                'string',
                'max:24',
            ],
            'address' => [
                'string',
            ],
        ];
        $employeeBankAccountPrefix = 'employee_bank_accounts.*.';

        $employeeBankAccountRules  = [
            $employeeBankAccountPrefix . 'account_name' => [
                'required',
                'string'
            ],
            $employeeBankAccountPrefix . 'code' => [
                'required',
                'string'
            ],
            $employeeBankAccountPrefix . 'account_number' => [
                'required',
                'string'
            ],
        ];
        $employeeSocialAccountPrefix = 'employee_social_accounts.*.';

        $employeeSocialAccountRules  = [
            $employeeSocialAccountPrefix . 'account' => [
                'required',
                'string'
            ],
            $employeeSocialAccountPrefix . 'type' => [
                'required',
                'string'
            ],
        ];


        return (collect($rules)->merge(collect($employeeBankAccountRules))->merge(collect($employeeSocialAccountRules)))->toArray();
    }
}
