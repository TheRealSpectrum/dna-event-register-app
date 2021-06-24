<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            "name" => "required",
            "email" => ["required", "unique:users,email," . $this->user->id],
            "password" =>
                "nullable|required_with:password_confirmation|string|confirmed",
            "current_password" => "required",
        ];
    }

    public function transformValidated(): array
    {
        $result = $this->validated();
        $result["password"] = bcrypt($result["password"]);
        $result["password_confirmation"] = $result["password"];
        return $result;
    }

    public function messages(): array
    {
        return [
            "current_password.required" => "Wachwoord is niet correct.",
        ];
    }
}
