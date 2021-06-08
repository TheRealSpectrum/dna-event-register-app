<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Registration;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        "organizer",
        "date",
        "location",
        "description",
        "max_registration_num",
    ];

    protected $casts = [
        "date" => "datetime",
    ];

    public function registrations()
    {
        return $this->hasMany(Registration::class);
    }
}
