<h1>login</h1>

<form method="post" action="{{route("admin.authenticate")}}" class="flex flex-col">
@csrf
<label for="email">email</label>
<input type="email" name="email">
@error('email')
    {{ session()->get("errors")->first("email") }}
@enderror
<label for="email">password</label>
<input type="password" name="password">
<button type="submit">login</button>
</form>

