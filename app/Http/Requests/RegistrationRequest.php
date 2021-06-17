<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegistrationRequest extends FormRequest
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
            "email" => ["email", "required"],
            "note" => "required",
        ];
    }

    public function transformed(int $eventId): array
    {
        $result = $this->validated();
        $result["event_id"] = $eventId;
        return $result;
    }
}
