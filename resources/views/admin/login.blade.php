@extends("layouts.app")


@section("content")
<section class="h-screen">
<h1>login</h1>

<form method="post" action="{{route("admin.authenticate")}}" class="flex flex-col p-5">
@csrf
<label for="email">email</label>
<input type="email" name="email" class="border-blue-500 border max-w-sm">
@error('email')
    <p class="text-red-500">{{ session()->get("errors")->first("email") }}</p>
@enderror
<label for="email">wachtwoord</label>
<input type="password" name="password" class="border-blue-500 border max-w-sm">
<button type="submit">login</button>
</form>
</section>
@endsection

