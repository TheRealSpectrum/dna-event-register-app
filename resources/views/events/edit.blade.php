@extends("layouts.app")

@section("content")
<h1>Edit event: (title here)</h1>
<form action="{{route("events.update", ["event" => $event->id])}}" method="post"
    class="flex flex-col items-start">
    @csrf
    @method("PATCH")

    <label for="organizer">Organisator</label>
    <input type="text" name="organizer" id="organizer" placeholder="{{$event->organizer}}"
        class="border-2 border-green-400 rounded-md">

    <label for="date">Datum</label>
    <input type="datetime-local" name="date" id="date" value="{{$event->date->format("Y-m-d\TH:i:s")}}"
        class="border-2 border-green-400 rounded-md">

    <label for="location">Locatie</label>
    <input type="text" name="location" id="location" placeholder="{{$event->location}}"
        class="border-2 border-green-400 rounded-md">

    <label for="description">Omschrijving</label>
    <textarea name="description" id="description" placeholder="{{$event->description}}"
        class="border-2 border-green-400 rounded-md"></textarea>

    <label for="max-registration-num">Maximaal aantal registraties</label>
    <input type="number" name="max-registration-num" id="max-registration-num" placeholder="{{$event->max_registration_num}}"
        class="border-2 border-green-400 rounded-md">

    <button type="submit"
        class="border-2 border-green-400 rounded-md bg-green-700 text-yellow-50 p-2">
        Verander event informatie
    </button>

</form>

<form action="{{route("events.destroy", ["event" => $event->id])}}" method="post">
    @csrf
    @method("DELETE")
    <button type="submit"
        class="border-2 border-red-400 rounded-md bg-red-700 text-blue-50 p-2">
        Delete event
    </button>
</form>

<h2>Registraties:</h2>

@foreach ($event->registrations as $registration)
    <div class="border-red-500 border-2">
        <h3>Naam: {{$registration->name}}</h3>
        <p>Email: {{$registration->email}}</p>
        <p>Notitie: {{$registration->note}}</p>
    </div>
@endforeach
@endsection
