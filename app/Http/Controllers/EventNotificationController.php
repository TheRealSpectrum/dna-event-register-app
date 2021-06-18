<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Registration;
use App\Notifications\EventNotification;
use Carbon\Carbon;
use Illuminate\Support\Facades\Notification;

class EventNotificationController extends Controller
{
    public function sendEventNotification()
    {
        $events = Event::where("date", "<=", Carbon::now()->addDays(2))->get();

        foreach ($events as $event) {
            $registrations = Registration::where(
                "event_id",
                "=",
                $event->id
            )->get();

            $eventData = [
                "name" => "name",
                "title" => $event->title,
                "url" => route("events.show", $event->id),
            ];

            Notification::send(
                $registrations,
                new EventNotification($eventData)
            );
        }
    }
}
