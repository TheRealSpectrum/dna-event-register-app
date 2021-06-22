<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Http\Requests\EventRequest;
use Carbon\Carbon;
use Illuminate\Support\Facades\URL;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("events.index", [
            "events" => Event::withCount("registrations")
                ->whereDate("date", ">=", Carbon::today())
                ->oldest("date")
                ->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("events.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EventRequest $request)
    {
        $createdEvent = Event::create($request->transformed());

        return redirect()->route("events.show", [
            "event" => $createdEvent->id,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Event $event)
    {
        return view("events.show", [
            "event" => $event,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Event $event)
    {
        return view("events.edit", [
            "event" => $event,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EventRequest $request, Event $event)
    {
        $event->fill($request->transformed());

        $event->save();

        return redirect()->route("events.show", ["event" => $event->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Event $event)
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
