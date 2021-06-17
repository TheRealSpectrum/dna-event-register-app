@extends("layouts.app")

@section("content")

<section class="bg-gray-100 dark:bg-gray-900">

    <div class="grid grid-cols-4 auto-rows-auto gap-4 py-4">

    @foreach ($events as $event)

        <div class="overflow-hidden shadow-lg rounded-lg h-44 w-60 md:w-80 cursor-pointer m-auto">
            <a href="{{route("events.show", ["event" => $event->id])}}" class="w-full block h-full">
                <div class="bg-white dark:bg-gray-800 w-full h-full p-4 grid grid-cols-1 grid-rows-6">
                    <p class="text-indigo-500 text-md font-medium row-span-1">
                        {{$event->timeUntilEvent()}}
                    </p>
                    <p class="text-gray-800 dark:text-white text-xl font-medium mb-2 row-span-1">
                        Title
                    </p>
                    <p
                        style="-webkit-line-clamp: 4; display: -webkit-box; -webkit-box-orient: vertical"
                        class="text-gray-400 dark:text-gray-300 font-light text-md overflow-ellipsis
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
