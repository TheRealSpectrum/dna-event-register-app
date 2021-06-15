<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Event;

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
            "events" => Event::withCount("registrations")->get(),
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
    public function store(Request $request)
    {
        $createdEvent = Event::create([
            "organizer" => $request->input("organizer"),
            "date" => new Carbon(
                $request->input("date") . " " . $request->input("time")
            ),
            "location" => $request->input("location"),
            "description" => $request->input("description"),
            "max_registration_num" => $request->input("max-registration-num"),
        ]);

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
    public function show($id)
    {
        return view("events.show", [
            "event" => Event::where("id", $id)
                ->with("registrations")
                ->firstOrFail(),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view("events.edit", [
            "event" => Event::where("id", $id)
                ->with("registrations")
                ->firstOrFail(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $event = Event::where("id", $id)->firstOrFail();

        if (
            $request->has("organizer") &&
            !empty($request->input("organizer"))
        ) {
            $event->organizer = $request->input("organizer");
        }

        if ($request->has("date") && !empty($request->input("date"))) {
            $event->date = $request->input("date");
        }

        if ($request->has("location") && !empty($request->input("location"))) {
            $event->location = $request->input("location");
        }

        if (
            $request->has("description") &&
            !empty($request->input("description"))
        ) {
            $event->description = $request->input("description");
        }

        if (
            $request->has("max-registration-num") &&
            !empty($request->input("max-registration-num"))
        ) {
            $event->max_registration_num = $request->input(
                "max-registration-num"
            );
        }

        $event->save();

        return redirect()->route("events.show", ["event" => $id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $event = Event::where("id", $id)->firstOrFail();
        $event->registrations()->delete();
        $event->delete();

        return redirect()->route("events.index");
    }
}
