<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;

use App\Http\Requests\RegistrationRequest;
use App\Models\Registration;

class RegistrationController extends Controller
{
    public function store(
        RegistrationRequest $request,
        int $id
    ): RedirectResponse {
        Registration::create($request->transformed($id));

        return redirect()->route("events.show", ["event" => $id]);
    }

    public function destroy(int $id): RedirectResponse
    {
        $registration = Registration::where("id", $id)->firstOrFail();
        $eventId = $registration->event_id;
        $registration->delete();

        return redirect()->route("events.show", ["event" => $eventId]);
    }
}
