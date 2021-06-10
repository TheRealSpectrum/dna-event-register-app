@extends("layouts.app")

@section("content")

@foreach ($events as $event)
    <div class="border-red-500 border-2">
        <p>Organisator: {{$event->organizer}}</p>
        <p>Datum: {{$event->date}}</p>
        <p>Locatie: {{$event->location}}</p>
        <p>Omschrijving: {{Str::words($event->description, 25)}}</p>
        <p>{{$event->registrations_count}}/{{$event->max_registration_num}}</p>
    </div>
@endforeach

@endsection
