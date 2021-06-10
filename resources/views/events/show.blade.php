@extends("layouts.app")

@section("content")
<h1>Event: (Title here)</h1>

<p>Organisator: {{$event->organizer}}</p>

<p>Datum: {{$event->date}}</p>

<p>Locatie: {{$event->location}}</p>
<p>Omschrijving: {{$event->description}}</p>
<p>Aantal registraties: {{$event->registrations->count()}}/{{$event->max_registration_num}}</p>

<h2>Registraties:</h2>

@foreach ($event->registrations as $registration)
    <div class="border-red-500 border-2">
        <h3>Naam: {{$registration->name}}</h3>
        <p>Email: {{$registration->email}}</p>
        <p>Notitie: {{$registration->note}}</p>
    </div>
@endforeach

@endsection
