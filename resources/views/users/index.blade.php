@extends("layouts.app")

@section("title", "Gebruikers")

@section("content")
<div class="bg-gray-100 dark:bg-gray-900">
<div class="px-4 pb-4 text-gray-500 pt-4 md:w-1/6">
    <a href="{{ route("users.create") }}">
        <button type="button" class="py-2 px-4  bg-blue-600 hover:bg-blue-700 focus:ring-blue-500 focus:ring-offset-blue-200 text-white w-full transition ease-in duration-200 text-center text-base font-semibold shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2  rounded-lg ">
            Maak gebruiker aan
        </button>
    </a>
</div>
<div class="container mx-auto px-4 sm:px-8 max-w-4xl">
    <div class="py-8">
        <div class="-mx-4 sm:-mx-8 px-4 sm:px-8 py-4 overflow-x-auto">
            <div class="inline-block min-w-full shadow rounded-lg overflow-hidden">
                <table class="min-w-full leading-normal">
                    <thead>
                        <tr>
                            <th scope="col" class="px-5 py-3  bg-white dark:bg-gray-900  border-b border-gray-200 dark:text-gray-300 text-gray-800  text-left text-xs uppercase font-normal">
                                Gebruiker
                            </th>
                            <th scope="col" class="px-5 py-3  bg-white dark:bg-gray-900  border-b border-gray-200 dark:text-gray-300 text-gray-800  text-left text-xs uppercase font-normal">
                                Rol
                            </th>
                            <th scope="col" class="px-5 py-3  bg-white dark:bg-gray-900  border-b border-gray-200 dark:text-gray-300 text-gray-800  text-left text-xs uppercase font-normal">
                                Aangemaakt
                            </th>
                            <th scope="col" class="px-5 py-3  bg-white dark:bg-gray-900  border-b border-gray-200 dark:text-gray-300 text-gray-800  text-left text-xs uppercase font-normal">
                                Bewerken
                            </th>
                            <th scope="col" class="px-5 py-3  bg-white dark:bg-gray-900  border-b border-gray-200 dark:text-gray-300 text-gray-800  text-left text-xs uppercase font-normal">
                                Verwijderen
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                        <tr>
                            <td class="px-5 py-5 border-b border-gray-200  bg-white dark:bg-gray-900 text-sm">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0">
                                        <a href="#" class="block relative">
                                            <img alt="profile" src="https://via.placeholder.com/150" class="mx-auto object-cover rounded-full h-10 w-10 "/>
                                        </a>
                                    </div>
                                    <div class="ml-3">
                                        <p class="text-gray-900 dark:text-gray-300 whitespace-no-wrap hover:text-blue-300">
                                            <a href="/gebruikers/{{ $user->id }}">
                                            {{ $user->name }}
                                            </a>
                                        </p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-5 py-5 border-b border-gray-200  bg-white dark:bg-gray-900 text-sm">
                                <p class="text-gray-900 whitespace-no-wrap">
                                    Admin
                                </p>
                            </td>
                            <td class="px-5 py-5 border-b border-gray-200  bg-white dark:bg-gray-900 text-sm">
                                <p class="text-gray-900 whitespace-no-wrap">
                                    {{ $user->created_at->format('d/m/Y') }}
                                </p>
                            </td>
                            <td class="px-5 py-5 border-b border-gray-200  bg-white dark:bg-gray-900 text-sm">
                                <a href="/gebruikers/{{ $user->id }}/edit" class="text-indigo-600 hover:text-indigo-900">
                                    Bewerken
                                </a>
                            </td>
                            <td class="px-5 py-5 border-b border-gray-200  bg-white dark:bg-gray-900 text-sm">
                                <form action="{{ route("users.destroy", $user->id) }}" method="POST">
                                @csrf
                                @method("DELETE")
                                    <button type="submit" class="text-red-600 hover:text-red-900">
                                        Verwijderen
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</div>
@endsection