<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://unpkg.com/tailwindcss@2.2.4/dist/tailwind.min.css" rel="stylesheet">
       
        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}" defer></script>
@livewireStyles
    </head>
    <body>

        <header>
            <nav class="p-6">
              <div class="flex justify-between items-center">
                <h1 class="pr-6 border-r-2 text-2xl font-bold text-gray-500"><a href="/">Phillips Cheese</a></h1>
                <div class="flex justify-between flex-grow">
                  <div class="flex ml-6 items-center">
                    <span>
                      <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-4 cursor-pointer text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                      </svg>
                    </span>
                    <input class="outline-none text-sm flex-grow bg-gray-100" type="text" placeholder="Search saunas in Finland…" />
                  </div>
                  <div class="md:flex spance-x-6 hidden">
                 @guest
                     
                 
                    <span class="text-gray-500 text-md px-2"><a href="{{route('login')}}">Login</a></span>
                    <span class="text-gray-500 text-md"><a href="{{route('register')}}">Register</a></span>
                    @endguest
                    <span class="text-gray-500 text-md px-2"><a href="{{route('cheeses.cheeseList')}}">All Items</a></span>
                    <span class="text-gray-500 text-md px-2"><a href="{{route('about')}}">About</a></span>
                  </div>
                </div>
              </div>
            </nav>
            <!-- Section Hero -->
          
          </header>
        <div class="font-sans text-gray-900 antialiased">
            {{ $slot }}
        </div>

        @livewireScripts
        <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    </body>
</html>
