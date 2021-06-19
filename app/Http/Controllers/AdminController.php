<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function dashboard()
    {
        return view("admin.dashboard", [
            "events" => Event::with("registrations")
                ->oldest("date")
                ->get(),
        ]);
    }

    public function login()
    {
        if (Auth::check()) {
            return redirect()->route("admin.dashboard");
        }
        return view("admin/login");
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            "email" => ["required", "email"],
            "password" => ["required"],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended("admin");
        }

        return back()->withErrors([
            "email" => __("auth.failed"),
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route("events.index");
    }
}
