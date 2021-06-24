<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Notifications\Notifiable;

use App\Models\Event;

class Registration extends Model
{
    use HasFactory, Notifiable;

    protected array $fillable = ["event_id", "name", "email", "note"];

    /**
     * @see \App\Models\Event
     */
    public function event(): BelongsTo
    {
        return $this->belongsTo(Event::class);
    }
}
