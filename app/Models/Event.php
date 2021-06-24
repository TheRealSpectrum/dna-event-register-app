<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

use Carbon\Carbon;

use App\Models\Registration;

class Event extends Model
{
    use HasFactory;

    /**
     * @var array
     */
    protected $fillable = [
        "title",
        "organizer",
        "date",
        "location",
        "description",
        "max_registration_num",
    ];

    /**
     * @var array
     */
    protected $casts = [
        "date" => "datetime",
    ];

    /**
     * @see \App\Models\Registration
     */
    public function registrations(): HasMany
    {
        return $this->hasMany(Registration::class);
    }

    public function timeUntilEvent(): string
    {
        $difference = Carbon::today()->diff($this->date);
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
        return $this->date->format("H:i");
    }
}
