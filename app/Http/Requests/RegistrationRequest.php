<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegistrationRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
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
