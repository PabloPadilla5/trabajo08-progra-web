<!-- This example requires Tailwind CSS v2.0+ -->
<nav class="fixed top-0 m-0 w-full bg-white shadow-md z-50" x-data="{ open: false }">
    <div class="max-w-7xl my-0 mx-auto px-2 sm:px-6 lg:px-8">
      <div class="relative flex items-center justify-between h-16">
        <div class="absolute inset-y-0 left-0 flex items-center sm:hidden">
          <!-- Mobile menu button-->
          <button x-on:click="open = !open" type="button" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-white hover:bg-blue-500 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white" aria-controls="mobile-menu" aria-expanded="false">
            <span class="sr-only">Open main menu</span>
            <!--
              Icon when menu is closed.
  
              Heroicon name: outline/menu
  
              Menu open: "hidden", Menu closed: "block"
            -->
            <svg class="block h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
              <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
            </svg>
            <!--
              Icon when menu is open.
  
              Heroicon name: outline/x
  
              Menu open: "block", Menu closed: "hidden"
            -->
            <svg class="hidden h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
              <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
            </svg>
          </button>
        </div>
        <div class="flex-1 flex items-center justify-center sm:items-stretch sm:justify-start">
          <div onclick="window.location='{{ route('home') }}'" class="cursor-pointer flex-shrink-0 flex items-center">
            <img class="block h-8 w-auto" src="https://tailwindui.com/img/logos/workflow-mark-indigo-500.svg" alt="Workflow">
            <h1 class="ml-3 font-bold cursor-pointer">Blog</h1>
          </div>
          <div class="hidden sm:block sm:ml-6">
            <div class="flex space-x-4">
              <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
              <!--<a href="#" class="bg-pink-600 text-white px-3 py-2 rounded-3xl text-sm font-medium" aria-current="page">Dashboard</a>-->
  
              @foreach ($categories as $category)
                <a href="{{ route('posts.category', $category) }}" class="text-gray-900 hover:bg-blue-800 hover:text-white px-3 py-2 rounded-3xl text-sm font-medium">{{ $category->name }}</a>
              @endforeach
  
            </div>
          </div>
        </div>
  
        @if (auth()->check())   
          <div class="absolute inset-y-0 right-0 flex items-center pr-2 sm:static sm:inset-auto sm:ml-6 sm:pr-0">
            {{-- <button type="button" class="bg-white p-1 rounded-full text-gray-400 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-pink-600 focus:ring-white">
              <span class="sr-only">View notifications</span>
              <!-- Heroicon name: outline/bell -->
              <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
              </svg>
            </button> --}}
  
            <!-- Profile dropdown -->
            <div class="ml-3 relative" x-data="{ open: false }">
              <div class="flex flex-row">
                <h1 class="mr-3 hidden sm:block">{{ explode(' ', auth()->user()->name)[0] }}</h1>
                <button x-on:click="open = !open" type="button" class="bg-gray-800 flex text-sm rounded-full focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-blue-500 focus:ring-white" id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                  <span class="sr-only">Open user menu</span>
                  <svg style="width:24px;height:24px" viewBox="0 0 24 24" class="text-white">
                    <path fill="currentColor" d="M12,19.2C9.5,19.2 7.29,17.92 6,16C6.03,14 10,12.9 12,12.9C14,12.9 17.97,14 18,16C16.71,17.92 14.5,19.2 12,19.2M12,5A3,3 0 0,1 15,8A3,3 0 0,1 12,11A3,3 0 0,1 9,8A3,3 0 0,1 12,5M12,2A10,10 0 0,0 2,12A10,10 0 0,0 12,22A10,10 0 0,0 22,12C22,6.47 17.5,2 12,2Z" />
                  </svg>
                  {{-- <img class="h-8 w-8 rounded-full" src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt=""> --}}
                </button>
              </div>
  
              <!--
                Dropdown menu, show/hide based on menu state.
  
                Entering: "transition ease-out duration-100"
                  From: "transform opacity-0 scale-95"
                  To: "transform opacity-100 scale-100"
                Leaving: "transition ease-in duration-75"
                  From: "transform opacity-100 scale-100"
                  To: "transform opacity-0 scale-95"
              -->
              <div class="origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-2xl py-1 bg-blue-100 ring-1 ring-black ring-opacity-5 focus:outline-none" 
              role="menu" 
              aria-orientation="vertical" 
              aria-labelledby="user-menu-button" 
              tabindex="-1"
              x-show="open"
              x-on:click.away="open = false">
                <!-- Active: "bg-gray-100", Not Active: "" -->
                <a href="{{ route('posts.my-posts') }}" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-0">Your blogs</a>
                {{-- <a href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-1">Settings</a> --}}
                <form action="{{route('logout')}}" method="GET">
                  @csrf
                  <a href="{{route('logout')}}" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" 
                    tabindex="-1" 
                    id="user-menu-item-2"
                    onclick="
                      event.preventDefault();
                      this.closest('form').submit();
                    ">
                    Sign out
                  </a>
                </form>
              </div>
            </div>
          </div>
        @else
          <div>
            <a href="{{route('register')}}" class="text-blue-500 hover:border-solid border-white border-2 hover:border-blue-500 px-3 py-2 rounded-3xl text-sm font-medium">
              Register
            </a>
            <a href="{{route('login')}}" class="ml-3 text-white bg-blue-500 hover:bg-blue-800 hover:text-white px-3 py-2 rounded-3xl text-sm font-medium">
              Login
            </a>
          </div> 
        @endif
      </div>
    </div>
  
    <!-- Mobile menu, show/hide based on menu state. -->
    <div class="sm:hidden" id="mobile-menu" x-show="open" x-on:click.away="open = false">
      <div class="px-2 pt-2 pb-3 space-y-1">
        <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
        {{-- <a href="#" class="bg-pink-600 text-white block px-3 py-2 rounded-md text-base font-medium" aria-current="page">Dashboard</a> --}}
  
        @foreach ($categories as $category)
            <a href="{{ route('posts.category', $category) }}" class="text-gray-900 hover:bg-blue-500 hover:text-white block px-3 py-2 rounded-md text-base font-medium">{{ $category->name }}</a>
        @endforeach
      </div>
    </div>
</nav>

@if (!auth()->check())
    <div class="max-w-7xl mx-auto mt-20 mb-0 flex items-center p-5 leading-normal text-blue-600 bg-blue-100 rounded-lg" role="alert">
        <svg style="width:24px;height:24px" viewBox="0 0 24 24" class="inline w-6 h-6 fill-current mr-2">
          <path fill="currentColor" d="M13,9H11V7H13M13,17H11V11H13M12,2A10,10 0 0,0 2,12A10,10 0 0,0 12,22A10,10 0 0,0 22,12A10,10 0 0,0 12,2Z" />
        </svg>

        <p>To create your own blog 
            <a href="{{route('login')}}"> 
                <u>
                    <b>log in</b>
                </u>
            </a>
        </p>
    </div>
@else
    <div class="mt-20"></div>
@endif
  