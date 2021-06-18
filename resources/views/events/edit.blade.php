@extends("layouts.app")

@section("content")
<section class="min-h-screen bg-gray-100 dark:bg-gray-900 text-gray-600 dark:text-gray-300">

    <div
        class="bg-white dark:bg-gray-800 my-5 mx-auto p-6 max-w-3xl rounded-lg border-t-2 border-metallic-seaweed dark:border-sun-ray">
        <form action="{{route("events.update", ["event" => $event->id])}}" method="post">

            @method("PATCH")
            @csrf
            <div class="text-center text-2xl">
                <label for="title">Aanpassen evenement: </label>
                <input type="text" name="title" id="title" value="{{$event->title}}"
                        class="border-2 border-metallic-seaweed dark:border-sun-ray dark:bg-gray-800">
            </div>
            <div class="grid grid-cols-2 grid-rows-2 py-4">
                <div class="text-center">
                    <label for="date">Datum:</label><br>
                    <input type="date" name="date" id="date" value="{{$event->date->format("Y-m-d")}}"
                        class="border-2 border-metallic-seaweed dark:border-sun-ray dark:bg-gray-800">
                </div>

                <div class="text-center">
                    <label for="time">Tijd:</label><br>
                    <input type="time" name="time" id="time" value="{{$event->date->format("H:i")}}"
                        class="border-2 border-metallic-seaweed dark:border-sun-ray dark:bg-gray-800">
                </div>

                <div class="text-center">
                    <label for="location">Locatie:</label><br>
                    <input type="text" name="location" id="location" value="{{$event->location}}"
                        class="border-2 border-metallic-seaweed dark:border-sun-ray dark:bg-gray-800">
                </div>

                <div class="text-center">
                    <label for="organizer">Organisator:</label><br>
                    <input type="text" name="organizer" id="organizer" value="{{$event->organizer}}"
                        class="border-2 border-metallic-seaweed dark:border-sun-ray dark:bg-gray-800">
                </div>
            </div>

            <div class="flex flex-col">
                <label for="description">Omschrijving:</label>
                <textarea cols="30" rows="10" name="description"
                    class="dark:bg-gray-800 border-2 border-metallic-seaweed dark:border-sun-ray">{{$event->description}}</textarea>
            </div>

            <div class="grid grid-cols-7 mt-4">
                <label for="max-registration-num" class="col-span-2">Maximaal registraties</label>
                <input type="number" name="max-registration-num" id="max-registration-num" value="{{$event->max_registration_num}}"
                    class="col-span-1 dark:bg-gray-800 border-2 border-metallic-seaweed dark:border-sun-ray">
            </div>

            <button type="submit"
                class="py-2 px-4 bg-blue-600 hover:bg-blue-700 focus:ring-blue-500 focus:ring-offset-blue-200
                text-white w-full transition ease-in duration-200 text-center text-base font-semibold shadow-md
                focus:outline-none focus:ring-2 focus:ring-offset-2  rounded-lg mt-4">

                Evenement veranderen
            </button>
        </form>
    </div>
</section>
@endsection
