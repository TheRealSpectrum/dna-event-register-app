<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Event;
use Illuminate\Notifications\Notifiable;

class Registration extends Model
{
    use HasFactory, Notifiable;

    protected $fillable = ["event_id", "name", "email", "note"];

    public function event()
    {
        return $this->belongsTo(Event::class);
    }
}
