<?php

namespace App\Exceptions;

use Illuminate\Support\Facades\Route;

use Exception;

class EventNotFoundException extends Exception
{
    public function __construct(int $id)
    {
        $this->eventId = $id;
    }

    public function render()
    {
        if (!in_array("GET", Route::getCurrentRoute()->methods())) {
            return redirect()->route("events.show", [
                "event" => $this->eventId,
            ]);
        }

        return response()->view("events.notfound", [], 404);
    }

    private int $eventId;
}
