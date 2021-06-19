<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\{Event, Registration};
use Carbon\Carbon;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $registrationCallback = function (Event $event) {
            Registration::factory()
                ->count(rand(0, $event->max_registration_num))
                ->create(["event_id" => $event->id]);
        };

        $firstEvent = Event::factory()->create([
            "title" => "Super feest!",
            "description" =>
                "Geweldig feest! Meld je snel aan, er zijn maar 10 plekken!",
            "date" => Carbon::today()->hour(23),
            "max_registration_num" => 10,
        ]);

        Registration::factory()
            ->count(9)
            ->create(["event_id" => $firstEvent->id]);

        collect([
            Event::factory()->create([
                "date" => Carbon::tomorrow()->hour(13),
            ]),
            Event::factory()->create([
                "date" => Carbon::today()
                    ->hour(13)
                    ->addDays(13),
            ]),
            Event::factory()->create([
                "date" => Carbon::today()
                    ->hour(13)
                    ->addDays(15),
            ]),
        ])->each($registrationCallback);

        Event::factory()
            ->count(15)
            ->create()
            ->each($registrationCallback);
    }
}
