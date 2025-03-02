<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">  
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('title')</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        
    </head>
    <body class="h-full w-full  bg-repeat-y min-w-[700px] bg-black "> 
                <header class="grid grid-cols-2 items-center gap-2 py-10 text-white w-9/12 mx-auto">
                        <div class="flex flex-col items-start ml-14">
                            <div class="text-3xl uppercase tracking-tighter">
                                <a href="" >
                                    <b>идём</b><span class="font-thin">в</span><b>кино</b>
                                </a>
                            </div>
                            <div class="text-xs uppercase tracking-widest">
                                администраторская
                            </div>
                        </div>
                    @if (Route::has('login'))
                        <nav class="flex  justify-end mr-9 ">
                            @auth
                                <a
                                    href="{{ url('/dashboard') }}"
                                    class="rounded-md px-3 py-2  ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
                                >
                                    Dashboard
                                </a>
                            @else
                                <a
                                    href="{{ route('login') }}"
                                    class="rounded-md px-3 py-2  ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
                                >
                                    Log in
                                </a>

                                @if (Route::has('register'))
                                    <a
                                        href="{{ route('register') }}"
                                        class="rounded-md px-3 py-2  ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
                                    >
                                        Register
                                    </a>
                                @endif
                            @endauth
                        </nav>
                    @endif
                </header>

                <main class=" h-screen flex  flex-col flex-nowrap gap-10 container mx-auto   text-md text-black ">
                    <section class="flex  flex-row justify-between content-center items-center  gap-1">
                            <a  href="{{ route('client.SessionsList', \Carbon\Carbon::now('Europe/Moscow')->locale('ru_RU')->format('Y-m-d'))}}" class=" hover:flex-2 flex-1  p-3  bg-amber-200/90 min-w-28 w-1/5 h-16 border-1 border-black rounded-sm">
                                <p class="">         
                                Сегодня
                                </p>
                                <p class="capitalize  ">         
                                    {{\Carbon\Carbon::now('Europe/Moscow')->locale('ru_RU')->isoFormat('dd, D')}}
                                </p>
                            </a>
                            <a  href="{{route('client.SessionsList', \Carbon\Carbon::now('Europe/Moscow')->addDay(1)->locale('ru_RU')->format('Y-m-d')) }}" id="{{\Carbon\Carbon::now('Europe/Moscow')->addDay(1)->locale('ru_RU')->format('Y-m-d')}}" class="target:shadow-lg p-3   flex-1 bg-amber-200/90 min-w-28 w-1/5 h-16 border-1 border-black rounded-sm" >
                                <p class="capitalize  ">         
                                {{ \Carbon\Carbon::now('Europe/Moscow')->locale('ru_RU')->addDay(1)->isoFormat('dd, D')}}
                                </p>
                            </a>
                            <a  href="{{route('client.SessionsList', \Carbon\Carbon::now('Europe/Moscow')->addDay(2)->locale('ru_RU')->format('Y-m-d')) }}" class="p-3 flex-1 bg-amber-200/90 min-w-28 w-1/5 h-16 border-1 border-black rounded-sm" >
                                <p class="capitalize  ">         
                                {{ \Carbon\Carbon::now('Europe/Moscow')->locale('ru_RU')->addDay(2)->isoFormat('dd, D')}}
                                </p>
                            </a>
                            <a  href="{{route('client.SessionsList', \Carbon\Carbon::now('Europe/Moscow')->addDay(3)->locale('ru_RU')->format('Y-m-d'))  }}" class="p-3 flex-1 bg-amber-200/90 min-w-28 w-1/5 h-16 border-1 border-black rounded-sm" >
                                <p class="capitalize  ">         
                                {{ \Carbon\Carbon::now('Europe/Moscow')->locale('ru_RU')->addDay(3)->isoFormat('dd, D')}}
                                </p>
                            </a>
                            <a  href="{{route('client.SessionsList', \Carbon\Carbon::now('Europe/Moscow')->addDay(4)->locale('ru_RU')->format('Y-m-d')) }}"  class="p-3 flex-1 bg-amber-200/90 min-w-28 w-1/5 h-16 border-1 border-black rounded-sm" >

                                <p class="capitalize  ">         
                                {{ \Carbon\Carbon::now('Europe/Moscow')->locale('ru_RU')->addDay(4)->isoFormat('dd, D')}}
                                </p>
                            </a>
                            <a  href="{{route('client.SessionsList', \Carbon\Carbon::now('Europe/Moscow')->addDay(5)->locale('ru_RU')->format('Y-m-d')) }}" class="p-3 flex-1 bg-amber-200/90 min-w-28 w-1/5 h-16 border-1 border-black rounded-sm" >
                                <p class="capitalize  ">         
                                {{ \Carbon\Carbon::now('Europe/Moscow')->locale('ru_RU')->addDay(5)->isoFormat('dd, D')}}
                                </p>
                            </a>
                            <a  href="{{route('client.SessionsList', \Carbon\Carbon::now('Europe/Moscow')->addDay(6)->locale('ru_RU')->format('Y-m-d')) }}" class="flex flex-1 flex-column justify-center items-center p-3 bg-amber-200/90 min-w-28 w-1/5 h-16 " >
                                <p class="  ">         
                                <i class=" fa-solid fa-chevron-right"></i>
                                </p>
                            </a>    
                    </section>
                    @foreach ($movies as $movie)
                        <section class="flex flex-col relative container mx-auto items-start bg-amber-200/90">
                            <div class=" absolute w-36 h-52 m-5"> 
                                <img class="" src="{{asset($movie->thumbnail) }}">
                            </div>
                            <div class="w-fill ml-48 mt-5">
                                <div class="font-bold capitalize text-base">{{ $movie->title }}</div>
                                <div class=" capitalize text-sm">{{ $movie->description }}</div>
                                <div class="text-slate-400">{{ $movie->duration }} минут, {{ $movie->country }}</div>
                            </div>
                            <div class="mt-32 md:container  md:mx-auto">
                                <div class=" flex flex-col items-center  gap-6 overflow-hidden  bg-amber-200/90">        
                                    <div class="container w-full gap-2 px-3 items-center">
                                            @foreach ($rooms as $room)
                                                <div class=" px-4 mb-7">
                                                        <div class="font-bold text-base capitalize mb-2" >Зал {{ $room->id }}</div>  
                                                        <div class="flex flex-row  justify-start gap-1 h-11 ">                  
                                                                    @foreach ($seanses as $seans)
                                                                                    @if ($seans->room_id === $room->id)
                                                                                            @if ($seans->movie_id === $movie->id)
                                                                                            <a href="{{route('client.SessionShow', $seans->id)}}" class="uppercase font-bold">
                                                                                                <div class="gap-1 bg-amber-50 h-10 border border-zinc-900 w-16 text-base text-center pt-[6px] px-1 rounded-sm">
                                                                                                    {{\Carbon\Carbon::parse($seans->session_datetime)->format('H:i')}}
                                                                                                </div>
                                                                                            </a>
                                                                                            @break
                                                                                            @else
                                                                                            <div class="gap-1 bg-amber-50 h-10 border border-zinc-900    text-base text-center pt-[6px] px-1 rounded-sm">
                                                                                                Сегодня сеансов нет
                                                                                            </div>
                                                                                            @break
                                                                                            @endif 
                                                                                    @endif   
                                                                    @endforeach
                                                        </div>
                                                </div>
                                            @endforeach
                                    </div>         
                                </div> 
                            </div>
                        </section>
                    @endforeach
                </main>

                <footer class="py-16 text-center text-sm text-white">
                    Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})
                </footer> 

    </body>
</html>
