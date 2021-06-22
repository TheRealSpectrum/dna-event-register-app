@extends("layouts.app")

@section("title", "Contact")

@section("content")
<section class="min-h-screen bg-gray-100 dark:bg-gray-900">
    
<div class="p-4">
    <div class="text-center mb-4 opacity-90">
        <a href="#" class="block relative">
            <img alt="profil" src="{{ asset("img/profile_image.jpg") }}" class="mx-auto object-cover rounded-full h-40 w-40 "/>
        </a>
    </div>
    <div class="text-center">
        <p class="text-2xl text-gray-800 dark:text-white">
            Maaike klant
        </p>
        <p class="text-l text-gray-500 dark:text-gray-200 font-light">
            Eigenaar PartyPlanner
        </p>
        <p class="text-md text-gray-500 dark:text-gray-400 py-4 font-light">
            <span class="hover:text-lapis-lazuli dark:hover:text-sun-ray">
                <a href="mailto: info@partyplanner.nl">
                <i class="fas fa-envelope"></i>
                     info@partyplanner.nl
                </a>
            </span>
        </p>
        <p class="text-md text-gray-500 dark:text-gray-400 py-4 font-light inline-block">
            <span class="hover:text-lapis-lazuli dark:hover:text-sun-ray">
                <a href="tel:06-12345678">
                <i class="fas fa-phone-alt"></i>
                   06-12345678
                </a>
            </span>
        </p>
    </div>
    <div class="pt-8 flex border-t border-sun-ray dark:border-lapis-lazuli w-44 mx-auto text-gray-500 items-center justify-between">
        <a href="#">
            <svg width="30" height="30" fill="currentColor" class="text-xl hover:text-gray-800 dark:hover:text-white transition-colors duration-200" viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg">
                <path d="M1343 12v264h-157q-86 0-116 36t-30 108v189h293l-39 296h-254v759h-306v-759h-255v-296h255v-218q0-186 104-288.5t277-102.5q147 0 228 12z">
                </path>
            </svg>
        </a>
        <a href="#">
            <svg width="30" height="30" fill="currentColor" class="text-xl hover:text-gray-800 dark:hover:text-white transition-colors duration-200" viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg">
                <path d="M1684 408q-67 98-162 167 1 14 1 42 0 130-38 259.5t-115.5 248.5-184.5 210.5-258 146-323 54.5q-271 0-496-145 35 4 78 4 225 0 401-138-105-2-188-64.5t-114-159.5q33 5 61 5 43 0 85-11-112-23-185.5-111.5t-73.5-205.5v-4q68 38 146 41-66-44-105-115t-39-154q0-88 44-163 121 149 294.5 238.5t371.5 99.5q-8-38-8-74 0-134 94.5-228.5t228.5-94.5q140 0 236 102 109-21 205-78-37 115-142 178 93-10 186-50z">
                </path>
            </svg>
        </a>
    </div>
</div>

</section>
@endsection