<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;

use App\Http\Requests\{StoreUserRequest, UpdateUserRequest};
use App\Models\User;

class UserController extends Controller
{
    public function index(): View
    {
        return view("users.index", [
            "users" => User::all(),
        ]);
    }

    public function create(): View
    {
        return view("users.create");
    }

    public function store(StoreUserRequest $request): RedirectResponse
    {
        User::create($request->transformValidated());

        return redirect()
            ->route("users.index")
            ->with("success", "Gebruiker is succesvol aangemaakt");
    }

    public function show($id): View
    {
        return view("users.show", [
            "user" => User::findOrFail($id),
        ]);
    }

    public function edit($id): View
    {
        return view("users.edit", [
            "user" => User::findOrFail($id),
        ]);
    }

    public function update(
        UpdateUserRequest $request,
        User $user
    ): RedirectResponse {
        if (!Hash::check($request->current_password, $user->password)) {
            return redirect()
                ->route("users.edit", $user->id)
                ->withErrors([
                    "current_password" => "Wachwoord is niet correct.",
                ]);
        }

        $user->update($request->transformValidated());

        return redirect()
            ->route("users.index")
            ->with("success", "Gebruiker is succesvol geupdate");
    }

    public function destroy(User $user): RedirectResponse
    {
        $user->delete();
        return redirect()
            ->route("users.index")
            ->with("success", "Gebruiker is succesvol verwijderd");
    }
}
