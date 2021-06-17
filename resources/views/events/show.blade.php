@extends("layouts.app")

@section("content")
<section class="min-h-screen bg-gray-100 dark:bg-gray-900 text-gray-600 dark:text-gray-300">

    <div class="bg-white dark:bg-gray-800 my-5 mx-auto p-6 max-w-3xl rounded-lg border-t-2 border-indigo-400">
        <h1 class="text-center text-2xl">Event name here</h1>
        <div class="grid grid-cols-2 py-4">
            <div class="text-center">Datum: {{$event->date}}</div>
            <div class="text-center">Locatie: {{$event->location}}</div>
        </div>
        <div>
            {{$event->description}}
        </div>
        <div class="mt-8">
            Registraties: {{$event->registrations->count()}}/{{$event->max_registration_num}}
        </div>
        @if($event->registrations->count() < $event->max_registration_num)
        <form class="mt-7 flex flex-col pl-4 border-indigo-400 border-l-4">
            <h2>Registreer voor dit event</h2>

            <label for="name">Naam:</label>
            <input type="text" name="name" id="name"
                class="border-2 border-indigo-400 dark:bg-gray-800">

            <label for="email">Email</label>
            <input type="email" name="email" id="email"
                class="border-2 border-indigo-400 dark:bg-gray-800">

            <label for="note">Notitie:</label>
            <textarea name="note" id="note" cols="30" rows="3"
                class="border-2 border-indigo-400 dark:bg-gray-800"></textarea>

            <button type="submit">Registreer</button>
        </form>
        @else
        <div class="mt-7">
            het is niet meer mogelijk om te registreren voor dit event
        </div>
        @endif
    </div>

    <div class="flex flex-col bg-white dark:bg-gray-800 max-w-3xl mx-auto p-6 gap-4 mb-4 rounded-lg border-t-2 border-indigo-400">
        <h1 class="text-center text-2xl">Registraties</h1>
        @foreach ($event->registrations as $registration)
            <div class="border-indigo-400 border-l-4 m-t-4 pl-2">
                <div>Naam: {{$registration->name}}</div>
                <div>Email: {{$registration->email}}</div>
                <div>Notitie:<br><span class="ml-4">{{$registration->note}}</span></div>
            </div>
        @endforeach
    </div>

</section>
@endsection
