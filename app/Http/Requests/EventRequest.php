<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

use Carbon\Carbon;

class EventRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            "title" => "required",
            "organizer" => "required",
            "date" => ["date_format:Y-m-d", "required"],
            "time" => ["date_format:H:i", "required"],
            "location" => "required",
            "description" => "required",
            "max-registration-num" => ["numeric", "gt:0", "nullable"],
        ];
    }

    public function transformed(): array
    {
        $result = $this->validated();
        $result["max_registration_num"] = $result["max-registration-num"];
        unset($result["max-registration-num"]);

        $result["date"] = new Carbon($result["date"] . " " . $result["time"]);
        unset($result["time"]);

        return $result;
    }
}
