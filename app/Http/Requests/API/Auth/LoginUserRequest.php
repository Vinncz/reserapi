<?php

namespace App\Http\Requests\API\Auth;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class LoginUserRequest extends FormRequest
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
            "email"     =>  [
                                "required",
                                "string",
                                "email",
                            ],
            "password"  =>  [
                                "required",
                                "string",
                                Password::defaults()
                            ]
        ];
    }

    public function messages() {
        return [
            "email.required" => "Field cannot be empty",
            "email.email"    => "Must be a valid email address",

            "password.required" => "Password cannot be empty",
            "password.defaults" => "Password must have a minimum of 8 characters and 1 capital letter"
        ];
    }
}
