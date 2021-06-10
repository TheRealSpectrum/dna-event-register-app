@extends("layouts.app")

@section("content")

<h1>dashboard</h1>
@guest
<a href="{{route("admin.login")}}"><button>login</button></a>
@else
<form method="post" action="{{route("admin.logout")}}">
    @csrf
    <button type="submit">loguit</button>
</form>
@endguest

@endsection
