<?php

namespace App\Http\Requests\API\Auth;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

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
        return [
            "name"      =>  [
                                "required",
                                "string",
                                "min:5",
                                "max:1022"
                            ],
            "username"  =>  [
                                "required",
                                "string",
                                "min:5",
                                "max:1022",
                                "unique:users"
                            ],
            "email"     =>  [
                                "required",
                                "email:dns",
                                "min:5",
                                "max:1022",
                                "unique:users",
                                "max:254"
                            ],
            "password"  =>  [
                                "required",
                                Password::defaults()
                            ]
        ];
    }
}
