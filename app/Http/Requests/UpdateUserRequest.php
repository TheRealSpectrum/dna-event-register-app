<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            "name" => "required",
            "email" => ["required", "unique:users,email," . $this->user->id],
            "password" =>
                "nullable|required_with:password_confirmation|string|confirmed",
            "current_password" => "required",
        ];
    }

    public function transformValidated()
    {
        $result = $this->validated();
        $result["password"] = bcrypt($result["password"]);
        $result["password_confirmation"] = $result["password"];
        return $result;
    }

    public function messages()
    {
        return [
            "current_password.required" => "Wachwoord is niet correct.",
        ];
    }
}
