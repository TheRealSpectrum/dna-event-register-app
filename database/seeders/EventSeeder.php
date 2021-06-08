<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\{Event, Registration};

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Event::factory()
            ->count(20)
            ->create()
            ->each(function (Event $event) {
                Registration::factory()
                    ->count(rand(0, $event->max_registration_num))
                    ->create(["event_id" => $event->id]);
            });
    }
}
