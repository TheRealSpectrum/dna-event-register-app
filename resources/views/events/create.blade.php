@extends("layouts.app")

@section("content")
<h1>Maak nieuw evenement aan</h1>
<form method="post" action="{{route("events.store")}}"
    class="flex flex-col items-start">
    @csrf
    <label for="organizer">Organisator</label>
    <input type="text" name="organizer" id="organizer"
        class="border-2 border-green-400 rounded-md">

    <label for="date">Datum</label>
    <input type="datetime-local" name="date" id="date"
        class="border-2 border-green-400 rounded-md">

    <label for="location">Locatie</label>
    <input type="text" name="location" id="location"
        class="border-2 border-green-400 rounded-md">

    <label for="description">Omschrijving</label>
    <textarea name="description" id="description" cols="50" rows="10"
        class="border-2 border-green-400 rounded-md">
    </textarea>

    <label for="max-registration-num">Maximale registraties</label>
    <input type="number" name="max-registration-num" id="max-registration-num"
        class="border-2 border-green-400 rounded-md">

    <button type="submit"
        class="border-2 border-green-400 rounded-md bg-green-700 text-yellow-50 p-2">
        Maak evenement aan
    </button>
</form>
@endsection
