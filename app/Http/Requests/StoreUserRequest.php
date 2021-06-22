<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
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
    public function rules(User $user)
    {
        return [
            "name" => "required",
            "email" => ["required", "unique:users,email," . $user->id],
            "password" => "required",
        ];
    }

    public function transformValidated()
    {
        $result = $this->validated();
        $result["password"] = bcrypt($result["password"]);
        return $result;
    }
}
