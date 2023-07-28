<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            "first_name" => "required|max:200",
            "last_name" => "required|max:200",
            "phone" => "required|max:200",
            "email" => "required|email|unique:users,email|max:200",
            "password" => "required|confirmed|min:6"
        ];
    }
}
