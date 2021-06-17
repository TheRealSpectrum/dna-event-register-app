<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegistrationRequest;
use App\Models\Registration;

class RegistrationController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(RegistrationRequest $request, int $id)
    {
        Registration::create($request->transformed($id));

        return redirect()->route("events.show", ["event" => $id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
        $registration = Registration::where("id", $id)->firstOrFail();
        $eventId = $registration->event_id;
        $registration->delete();

        return redirect()->route("events.show", ["event" => $eventId]);
    }
}
