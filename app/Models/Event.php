<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Registration;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        "title",
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

    public function timeUntilEvent(): string
    {
        $difference = (new \DateTime("NOW"))->diff($this->date);
        if ($difference->d > 14) {
            $weeks = floor($difference->d / 7);
            return "in $weeks weken";
        }

        if ($difference->d === 1) {
            return "morgen om {$this->time()}";
        }

        if ($difference->d > 0) {
            return "in {$difference->d} dagen";
        }

        return "vandaag om {$this->time()}";
    }

    public function time(): string
    {
        return $this->date->format("h:m");
    }
}
