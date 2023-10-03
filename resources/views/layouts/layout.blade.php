<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Absen') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <!DOCTYPE html>
    <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
        <head>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <meta name="csrf-token" content="{{ csrf_token() }}">
    
            <title>Web Pertanian</title>
    
            <!-- Fonts -->
            <link rel="preconnect" href="https://fonts.bunny.net">
            <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    
            <!-- Scripts -->
            @vite(['resources/css/app.css', 'resources/js/app.js'])
        </head>
     <body>
        <div class="h-screen">
            <div class="navbar bg-base-300">
      <div class="navbar-start">
        <div class="dropdown">
          <label tabindex="0" class="btn btn-ghost lg:hidden">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h8m-8 6h16" /></svg>
          </label>
          <ul tabindex="0" class="menu menu-compact dropdown-content mt-3 p-2 shadow bg-base-100 rounded-box w-52">
            <li><a>Item 1</a></li>
          
            <li><a>Item 3</a></li>
          </ul>
        </div>
        <a class="btn btn-ghost normal-case text-xl text-gray-100 font-bold">

            {{-- image from public iamges --}}
            <img src="{{ asset('storage/images/logo.png') }}" alt="logo" width="50px" height="50px">
        </a>
      </div>
      <div class="navbar-center hidden lg:flex">
        @if (Route::has('login'))
        {{-- validate hanya yanf login yang bisa liat navigation --}}
        @auth
        <ul class="menu menu-horizontal px-1">
          <li><a href="/" class="text-gray-100 text-lg font-semibold">Home</a></li>
                      
          <li><a href="{{route('karyawan.index')}}" class="text-gray-100 text-lg font-semibold">Karyawan</a></li>
        
          <li><a href="{{route('absen.index')}}" class="text-gray-100 text-lg font-semibold">Rekap Absen</a></li>
       
          <li><a href="/absen/create" class="text-gray-100 text-lg font-semibold">Absen</a></li>
        </ul>
        @endauth
        @guest
        <ul class="menu menu-horizontal px-1">
            <li><a href="/" class="text-gray-100 text-lg font-semibold">Home</a></li>
          
            <li><a href="{{route('absen.index')}}" class="text-gray-100 text-lg font-semibold">Rekap Absen</a></li>
         
  
          </ul>
        @endguest
        @endif
    </div>
   
    @guest
      <div class="navbar-end">
        <a href="{{route('login')}}" class="btn btn-sm bg-green-500 rounded-full text-gray-100 font-semibold text-center hover:bg-green-400">Masuk</a>
      </div>
    @endguest
        @auth
        <div class="hidden sm:flex sm:items-center sm:ml-6 navbar-end">
            <x-dropdown align="right" width="48">
                <x-slot name="trigger">
                    <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 dark:text-gray-400 bg-white dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none transition ease-in-out duration-150">
                        <div>{{ Auth::user()->name }}</div>

                        <div class="ml-1">
                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </div>
                    </button>
                </x-slot>

                <x-slot name="content">
                    <x-dropdown-link :href="route('profile.edit')">
                        {{ __('Profile') }}
                    </x-dropdown-link>

                    <!-- Authentication -->
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <x-dropdown-link :href="route('logout')"
                                onclick="event.preventDefault();
                                            this.closest('form').submit();">
                            {{ __('Log Out') }}
                        </x-dropdown-link>
                    </form>
                </x-slot>
            </x-dropdown>
        </div>  
        @endauth
    </div>
    @yield('content')
        </div>
        
             
     </body>
    </html>
    
</html>


