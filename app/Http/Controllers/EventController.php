<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\URL;

use Carbon\Carbon;

use App\Http\Requests\EventRequest;
use App\Models\Event;

class EventController extends Controller
{
    public function index(): View
    {
        return view("events.index", [
            "events" => Event::withCount("registrations")
                ->whereDate("date", ">=", Carbon::today())
                ->oldest("date")
                ->get(),
        ]);
    }

    public function create(): View
    {
        return view("events.create");
    }

    public function store(EventRequest $request): RedirectResponse
    {
        $createdEvent = Event::create($request->transformed());

        return redirect()->route("events.show", [
            "event" => $createdEvent->id,
        ]);
    }

    public function show(Event $event): View
    {
        return view("events.show", [
            "event" => $event,
        ]);
    }

    public function edit(Event $event): View
    {
        return view("events.edit", [
            "event" => $event,
        ]);
    }

    public function update(
        EventRequest $request,
        Event $event
    ): RedirectResponse {
        $event->fill($request->transformed());

        $event->save();

        return redirect()->route("events.show", ["event" => $event->id]);
    }

    public function destroy(Event $event): RedirectResponse
    {
        $event->registrations()->delete();
        $event->delete();

        if (
            URL::previous() === URL::route("events.show", $event->id) ||
            URL::previous() === URL::route("events.edit", $event->id)
        ) {
            return redirect()->route("events.index");
        } else {
            return redirect()->back();
        }
    }
}
