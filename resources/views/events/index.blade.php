@extends("layouts.app")

@section("title", "Evenementen")

@section("content")

<section class="min-h-screen bg-gray-100 dark:bg-gray-900">

    <div class="grid grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 2xl:grid-cols-5 auto-rows-auto gap-4 py-4">

    @foreach ($events as $event)

        <div class="overflow-hidden shadow-lg rounded-lg h-44 w-60 md:w-72 cursor-pointer m-auto">
            <a href="{{route("events.show", ["event" => $event->id])}}" class="w-full block h-full">
                <div class="bg-white dark:bg-gray-800 w-full h-full p-4 grid grid-cols-1 grid-rows-6">
                    <p class="text-metallic-seaweed dark:text-sun-ray text-md font-medium row-span-1">
                        {{$event->timeUntilEvent()}}
                    </p>
                    <p class="text-gray-800 dark:text-white text-md lg:text-xl font-medium mb-2 row-span-1">
                        {{$event->title}}
                    </p>
                    <p
                        style="-webkit-line-clamp: 4; display: -webkit-box; -webkit-box-orient: vertical"
                        class="text-gray-400 dark:text-gray-300 font-light text-sm lg:text-md overflow-ellipsis
                        overflow-hidden row-span-4"
                        >
                        {{Str::words($event->description, 40, "")}}
                    </p>
                </div>
            </a>
        </div>
    @endforeach

    </div>

</section>

@endsection
