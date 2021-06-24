<?php

// This file might not be formatted automatically because prettier does not support union types

namespace App\Exceptions;


use Exception;

use Illuminate\Contracts\View\View;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Route;

final class EventNotFoundException extends Exception
{
    public function __construct(int $eventId)
    {
        $this->eventId = $eventId;
    }

    public function render(): View | Response
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
