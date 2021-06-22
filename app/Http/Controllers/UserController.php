<?php

namespace App\Http\Controllers;

use App\Http\Requests\{StoreUserRequest, UpdateUserRequest};
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("users.index", [
            "users" => User::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("users.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserRequest $request)
    {
        $user = User::create($request->transformValidated());

        return redirect()
            ->route("users.index")
            ->with("success", "Gebruiker is succesvol aangemaakt");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view("users.show", [
            "user" => User::findOrFail($id),
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
        return view("users.edit", [
            "user" => User::findOrFail($id),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        if (!Hash::check($request->current_password, $user->password)) {
            return redirect()
                ->route("users.edit", $user->id)
                ->withErrors([
                    "current_password" => "Wachwoord is niet correct.",
                ]);
        }

        // dd($request->transformValidated());

        $user->update($request->transformValidated());

        return redirect()
            ->route("users.index")
            ->with("success", "Gebruiker is succesvol geupdate");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()
            ->route("users.index")
            ->with("success", "Gebruiker is succesvol verwijderd");
    }
}
