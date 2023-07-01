<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
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
            'name'=>[
                'required',
                'string',
                'min:6',
                'max:255',
            ],
            'email'=>[
                'required',
                'email',
            ],
            'password'=>[
                'required',
            ],
        ];
        $postRulesPrefix = 'posts.*.';

        $postRules  = [
            $postRulesPrefix . 'id' => [
                'nullable',
                'numeric'
            ],
            $postRulesPrefix . 'tittle' => [
                'required',
                'string'
            ],
        ];


        return (collect($rules)->merge(collect($postRules)))->toArray();
    }
}
