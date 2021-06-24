<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

use App\Models\User;

class StoreUserRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(User $user): array
    {
        return [
            "name" => "required",
            "email" => ["required", "unique:users,email," . $user->id],
            "password" => "required",
        ];
    }

    public function transformValidated(): array
    {
        $result = $this->validated();
        $result["password"] = bcrypt($result["password"]);
        return $result;
    }
}
