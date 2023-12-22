<?php

namespace App\Http\Requests\UserModule;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UserModuleStoreRequest extends FormRequest
{
    protected $redirectRoute = "users.create";

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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|confirmed',
            'role' => [
                'required',
                Rule::in(['2', '3'])
            ],
            'status' => [
                'required',
                Rule::in(['enabled', 'disabled'])
            ]
        ];
    }
}
