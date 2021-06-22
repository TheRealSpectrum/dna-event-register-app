@extends("layouts.app")

@section("title", $event->title)

@section("content")
<section class="min-h-screen bg-gray-100 dark:bg-gray-900 text-gray-600 dark:text-gray-300">
    <div class="px-4 pb-4 text-gray-500 pt-4 md:w-1/6">
        <a href="{{ route("events.index") }}">
            <button type="button" class="py-2 px-4  bg-blue-600 hover:bg-blue-700 focus:ring-blue-500 focus:ring-offset-blue-200 text-white w-full transition ease-in duration-200 text-center text-base font-semibold shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2  rounded-lg ">
                Terug naar evenementen
            </button>
        </a>
    </div>

    <div class="bg-white dark:bg-gray-800 my-5 mx-auto p-6 max-w-3xl rounded-lg border-t-2 border-metallic-seaweed dark:border-sun-ray">
        <h1 class="text-center text-2xl">{{$event->title}}</h1>
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

        @guest

        @if($event->registrations->count() < $event->max_registration_num)
        <form action="{{route("events.registrations.store", ["event" => $event->id])}}" method="post"
            class="mt-7 flex flex-col pl-4 border-metallic-seaweed dark:border-sun-ray border-l-4">

            @csrf

            <h2>Registreer voor dit event</h2>

            <label for="name">Naam:</label>
            <input type="text" name="name" id="name"
                class="border-2 border-metallic-seaweed dark:border-sun-ray dark:bg-gray-800">

            <label for="email">Email</label>
            <input type="email" name="email" id="email"
                class="border-2 border-metallic-seaweed dark:border-sun-ray dark:bg-gray-800">

            <label for="note">Notitie:</label>
            <textarea name="note" id="note" cols="30" rows="3"
                class="border-2 border-metallic-seaweed dark:border-sun-ray dark:bg-gray-800"></textarea>

            <button 
                class="py-2 px-4 bg-blue-600 hover:bg-blue-700 focus:ring-blue-500 focus:ring-offset-blue-200
                text-white w-full transition ease-in duration-200 text-center text-base font-semibold shadow-md
                focus:outline-none focus:ring-2 focus:ring-offset-2  rounded-lg mt-4" 
                type="submit">

                Registreer
            </button>
        </form>
        @else
        <div class="mt-7">
            het is niet meer mogelijk om te registreren voor dit event
        </div>
        @endif

        @else

        <a href="{{route("events.edit", ["event"=>$event->id])}}">
            <button
                class="py-2 px-4 bg-blue-600 hover:bg-blue-700 focus:ring-blue-500 focus:ring-offset-blue-200
                text-white w-full transition ease-in duration-200 text-center text-base font-semibold shadow-md
                focus:outline-none focus:ring-2 focus:ring-offset-2  rounded-lg mt-4">

                Evenement veranderen
            </button>
        </a>

        <form action="{{route("events.destroy", ["event"=>$event->id])}}" method="post">

            @csrf
            @method("DELETE")

            <button type="submit"
                class="py-2 px-4 bg-red-600 hover:bg-red-700 focus:ring-red-500 focus:ring-offset-red-200
                text-white w-full transition ease-in duration-200 text-center text-base font-semibold shadow-md
                focus:outline-none focus:ring-2 focus:ring-offset-2  rounded-lg mt-4">

                Evenement verwijderen
            </button>
        </form>

        @endguest
    </div>

    <div class="flex flex-col bg-white dark:bg-gray-800 max-w-3xl mx-auto p-6 gap-4 mb-4 rounded-lg border-t-2 border-metallic-seaweed dark:border-sun-ray">
        <h1 class="text-center text-2xl">Registraties</h1>
        @foreach ($event->registrations as $registration)
            @guest
            <div class="border-metallic-seaweed dark:border-sun-ray border-l-4 m-t-4 pl-2">
                {{$registration->name}}
            </div>
            @else
            <div class="border-metallic-seaweed dark:border-sun-ray border-l-4 m-t-4 pl-2">
                <div>Naam: {{$registration->name}}</div>
                <div>Email: {{$registration->email}}</div>
                <div>Notitie:<br><span class="ml-4">{{$registration->note}}</span></div>

                <form action="{{route("registrations.destroy", ["registration" => $registration->id])}}" method="post">

                    @csrf
                    @method("DELETE")

                    <button type="submit"
                        class="py-2 px-4 bg-yellow-600 hover:bg-yellow-700 focus:ring-yellow-500 focus:ring-offset-yellow-200
                        text-white w-full transition ease-in duration-200 text-center text-base font-semibold shadow-md
                        focus:outline-none focus:ring-2 focus:ring-offset-2  rounded-lg mt-4">

                        Registratie verwijderen
                    </button>
                </form>
            </div>
            @endguest
        @endforeach
    </div>

</section>
@endsection
