{{-- Copyright (c) 2020 Charlie Rabiller, see ThirdParty/Licences/Tailwind-Kit for full license. --}}
<div>
    <nav class="bg-white dark:bg-gray-800  shadow ">
        <div class="max-w-7xl mx-auto px-8">
            <div class="flex items-center justify-between h-16">
                <div class=" flex items-center">
                    <a class="flex-shrink-0" href="/">
                        <img class="h-8 w-8" src="/icons/rocket.svg" alt="Icon"/>
                    </a>
                    <div class="hidden md:block">
                        <div class="ml-10 flex items-baseline space-x-4">
                            <a class="text-gray-300  hover:text-gray-800 dark:hover:text-white px-3 py-2 rounded-md text-sm font-medium" href="/#">
                                Home
                            </a>
                            <a class="text-gray-300  hover:text-gray-800 dark:hover:text-white px-3 py-2 rounded-md text-sm font-medium" href="/#">
                                Evenementen
                            </a>
                            <a class="text-gray-300  hover:text-gray-800 dark:hover:text-white px-3 py-2 rounded-md text-sm font-medium" href="/#">
                                Contact
                            </a>
                        </div>
                    </div>
                </div>
                <div class="block">
                    <div class="ml-4 flex items-center md:ml-6">
                    </div>
                </div>
                <div class="-mr-2 flex md:hidden">
                    <button class="text-gray-800 dark:text-white hover:text-gray-300 inline-flex items-center justify-center p-2 rounded-md focus:outline-none">
                        <svg width="20" height="20" fill="currentColor" class="h-8 w-8" viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg">
                            <path d="M1664 1344v128q0 26-19 45t-45 19h-1408q-26 0-45-19t-19-45v-128q0-26 19-45t45-19h1408q26 0 45 19t19 45zm0-512v128q0 26-19 45t-45 19h-1408q-26 0-45-19t-19-45v-128q0-26 19-45t45-19h1408q26 0 45 19t19 45zm0-512v128q0 26-19 45t-45 19h-1408q-26 0-45-19t-19-45v-128q0-26 19-45t45-19h1408q26 0 45 19t19 45z">
                            </path>
                        </svg>
                    </button>
                </div>
                @auth
                <div class="hidden md:block">
                    <div class="ml-10 flex items-baseline space-x-4">
                    <form action="{{ route("admin.dashboard") }}">
                    <button type="submit">
                        <a class="text-gray-300  hover:text-gray-800 dark:hover:text-white px-3 py-2 rounded-md text-sm font-medium">
                            Admin
                        </a>
                    </button>
                    </form>
                    <form action="{{ route("admin.logout") }}" method="POST">
                    @csrf
                    <button type="submit">
                        <a class="text-gray-300  hover:text-gray-800 dark:hover:text-white px-3 py-2 rounded-md text-sm font-medium">
                            Uitloggen
                        </a>
                    </button>
                    </form>
                    </div>
                </div>
                @endauth
            </div>
        </div>
        <div class="md:hidden">
            <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3">
                <a class="text-gray-300 hover:text-gray-800 dark:hover:text-white block px-3 py-2 rounded-md text-base font-medium" href="/#">
                    Home
                </a>
                <a class="text-gray-300 hover:text-gray-800 dark:hover:text-white block px-3 py-2 rounded-md text-base font-medium" href="/#">
                    Evenementen
                </a>
                <a class="text-gray-300 hover:text-gray-800 dark:hover:text-white block px-3 py-2 rounded-md text-base font-medium" href="/#">
                    Contact
                </a>
                @auth
                <a class="text-gray-300 hover:text-gray-800 dark:hover:text-white block px-3 py-2 rounded-md text-base font-medium" href="{{ route("admin.logout") }}">
                    Loguit
                </a>
                @endauth
            </div>
        </div>
    </nav>
</div>
