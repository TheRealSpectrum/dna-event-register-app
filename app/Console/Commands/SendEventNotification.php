<?php

namespace App\Console\Commands;

use App\Models\Event;
use App\Models\Registration;
use App\Notifications\EventNotification;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Notification;

class SendEventNotification extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = "send:notifications";

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = "Send email notification to event registrations";

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
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
