<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\{Event, Registration};

class RegistrationController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        Registration::create([
            "event_id" => $id,
            "name" => $request->input("name"),
            "email" => $request->input("email"),
            "note" => $request->input("note"),
        ]);

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
        $registration = Registration::where("id", $id)->firstOrFail();
        $eventId = $registration->event_id;
        $registration->delete();

        return redirect()->route("events.show", ["event" => $eventId]);
    }
}
