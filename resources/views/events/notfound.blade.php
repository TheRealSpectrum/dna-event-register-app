@extends('layouts.app')

@section('title', "Event niet gevonden")

@section('content')
   <section class="min-h-screen bg-gray-100 dark:bg-gray-900 text-gray-500 dark:text-gray-300">
        <h1 class="text-7xl text-center mt-8">Oops!</h1>
        <p class="text-3xl text-center my-8">Wij kunnen dit event niet vinden.</p>
        <p class="text-3xl text-center">Misschien is de URL verkeerd, of het event bestaat niet meer.</p>
        <div class="w-52 mx-auto mt-8">
            <a href="{{ route("events.index") }}"" class="mx-auto block">
            <button type="button"
                class="py-2 px-4 bg-blue-600 hover:bg-blue-700 focus:ring-blue-500 focus:ring-offset-blue-200
                text-white transition ease-in duration-200 text-center text-base font-semibold shadow-md
                focus:outline-none focus:ring-2 focus:ring-offset-2 rounded-lg w-52 mx-auto">

                Terug naar events
            </button>
            </a>
        </div>
   </section>
@endsection
