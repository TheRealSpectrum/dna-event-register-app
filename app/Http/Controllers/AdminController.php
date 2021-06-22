<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Event;

class AdminController extends Controller
{
    public function dashboard(): View
    {
        return view("admin.dashboard", [
            "events" => Event::with("registrations")
                ->oldest("date")
                ->get(),
        ]);
    }

    public function login(): View
    {
        if (Auth::check()) {
            return redirect()->route("admin.dashboard");
        }
        return view("admin/login");
    }

    public function authenticate(Request $request): RedirectResponse
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

    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route("events.index");
    }
}
