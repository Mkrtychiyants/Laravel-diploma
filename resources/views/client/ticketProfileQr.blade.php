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
    <body> 
        <div 
        style="background-image: url(../../../../welcome-wallpaper-cinema.jpg);"
        class="min-h-screen w-full bg-cover bg-no-repeat min-w-[700px] ">
                <header class="grid grid-cols-2 items-center gap-2 py-10 text-white w-9/12 mx-auto">
                        <div class="flex flex-col items-start ml-14">
                            <div class="text-3xl uppercase tracking-tighter">
                                <a href="" 
                                >
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

                <main class=" h-screen flex  flex-col gap-[11.75px] flex-wrap container mx-auto  text-md text-black ">
                    <header class="uppercase relative text-xl py-6 px-4 bg-orange-50/90   border-dotted">
                        <div class="font-bold absolute left-[0px] top-[-4px] w-full h-1  bg-[url('../../public/border-top.png')]  bg-repeat-x  "></div>                 
                        <div class="font-bold text-orange-400 ">электронный билет</div>
                        <div class="font-bold w-full h-2 absolute left-[0px] bottom-[-8px] bg-[url('../../public/border-bottom.png')] bg-repeat-x  "></div>
                        <div class="font-bold w-full h-2 absolute left-[0px] bottom-[-14px]  bg-[url('../../public/border-top.png')]  bg-repeat-x "></div>   
                    </header> 
                    
                    <div class="container mx-auto  bg-orange-50/90 ">
                        <section class=" text-sm py-2 px-4 ">           
                            <div class="font-bold "><span class="font-normal ">На фильм: </span>{{$session->movie->title}}</div>
                            <div class="font-bold "><span class="font-normal ">Места: </span>{{$finalTicket->seats}} </div>  
                            <div class="font-bold "><span class="font-normal ">Ряд: </span>{{$finalTicket-> row}} </div>  
                            <div class="font-bold "><span class="font-normal ">В зале: </span>{{$session->room_id}}</div>
                            <div class="font-bold "><span class="font-normal ">Начало сеанса: </span>{{\Carbon\Carbon::parse($session->start_time)->format('H:i')}}</div>
                            <div class="font-bold "><span class="font-normal ">Стоимость : </span>{{$finalTicket->price}}</div>
                        </section>  
                        <section class="flex flex-two justify-center py-2 ">           
                            <div  class="    m-2 rounded-md p-3 bg-white"> <span> {{$image}} </span></div>
                        </section>
                        <section class="text-xs py-6 px-4 relative">
                            <span>Покажите QR-код нашему контролёру для подтверждения бронирования</span><br>
                            <span>Приятного просмотра!</span>
                            <div class="font-bold w-full h-2 absolute left-[0px] bottom-[-8px] bg-[url('../../public/border-bottom.png')] bg-repeat-x  "></div>
                        </section>
                
                    </div>      
                </main>

                <footer class="py-16 text-center text-sm text-white">
                    Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})
                </footer> 
        </div>
    </body>
</html>
