<nav class="p-6 bg-gray-600 ">
    <div class="flex justify-between items-center">
        <a href="/">
      <h1 class="pr-6 border-r-2 text-2xl font-bold text-white">
        <img src="{{asset('logo.png')}}" style="width: 60px;height:60px" alt="">
    </a>

</h1>
      <div class="flex justify-between flex-grow">
        <div class="flex ml-6 items-center">
          <span>
            {{-- <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-4 cursor-pointer text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
            </svg>
          </span>
          <input class="outline-none text-sm flex-grow bg-gray-100" type="text" placeholder="Search saunas in Finland…" /> --}}
          <img src="{{asset('text.png')}}" style="width: auto;height:60px" alt="">
        </div>
        <div class="md:flex spance-x-6 hidden">
            <span class="text-white text-md px-2"><a href="/">Home</a></span>
      
          <span class="text-white text-md px-2"><a href="{{route('cheeses.cheeseList')}}">All Items</a></span>
          <span class="text-white text-md px-2"><a href="{{route('about')}}">About</a></span>
          @guest
          <span class="text-white text-md px-2"><a href="{{route('login')}}">Login</a></span>
          <span class="text-white text-md"><a href="{{route('register')}}">Register</a></span>
        @endguest
          @auth
             <!-- Settings Dropdown -->
      <div class="ml-3 relative">
          <x-jet-dropdown align="right" width="48">
              <x-slot name="trigger">
                  @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                      <button class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition">
                          <img class="h-8 w-8 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                      </button>
                  @else
                      <span class="inline-flex rounded-md">
                          <button type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md  bg-white  focus:outline-none transition">
                              {{ Auth::user()->name }}

                              <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                  <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                              </svg>
                          </button>
                      </span>
                  @endif
              </x-slot>

              <x-slot name="content">
                  <!-- Account Management -->
                  <div class="block px-4 py-2 text-xs text-gray-400">
                      {{ __('Manage Account') }}
                  </div>

                  <x-jet-dropdown-link href="{{ route('profile.show') }}">
                      {{ __('Profile') }}
                  </x-jet-dropdown-link>

                  @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                      <x-jet-dropdown-link href="{{ route('api-tokens.index') }}">
                          {{ __('API Tokens') }}
                      </x-jet-dropdown-link>
                  @endif

                  <div class="border-t border-gray-100"></div>

                  <!-- Authentication -->
                  <form method="POST" action="{{ route('logout') }}">
                      @csrf

                      <x-jet-dropdown-link href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                      this.closest('form').submit();">
                          {{ __('Log Out') }}
                      </x-jet-dropdown-link>
                  </form>
              </x-slot>
          </x-jet-dropdown>
      </div>
          @if (Auth::user()->type=='admin')
          <span class="text-white text-md px-2"><a href="{{route('dashboard')}}">Admin Dashboard</a></span>
          @endif
          @endauth    
          
        </div>
      </div>
    </div>
  </nav>