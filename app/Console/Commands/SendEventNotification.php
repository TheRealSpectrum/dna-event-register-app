<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use Carbon\Carbon;

use App\Models\Event;
use App\Models\Registration;
use App\Notifications\EventNotification;

class SendEventNotification extends Command
{
    /**
     * @var string
     */
    protected $signature = "send:notifications";

    /**
     * @var string
     */
    protected $description = "Send email notification to event attendees";

    public function __construct()
    {
        parent::__construct();
    }

    public function handle(): int
    {
        $events = Event::where("date", "<=", Carbon::now()->addDays(2))->get();

        foreach ($events as $event) {
            $registrations = Registration::where(
                "event_id",
                "=",
                $event->id
            )->get();

            foreach ($registrations as $registration) {
                $notificationData = [
                    "name" => $registration->name,
                    "title" => $event->title,
                    "url" => route("events.show", $event->id),
                    "time_till_event" =>
                        $event->title .
                        " start over " .
                        $event->date->diffInHours(Carbon::now()) .
                        " uur!",
                    "event_id" => $event->id,
                ];

                if ($registration->notifications->isEmpty()) {
                    $registration->notify(
                        new EventNotification($notificationData)
                    );
                }
            }
        }

        return 0;
    }
}
