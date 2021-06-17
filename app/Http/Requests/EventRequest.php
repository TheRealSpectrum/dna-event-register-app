<?php

namespace App\Http\Requests;

use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;

class EventRequest extends FormRequest
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
