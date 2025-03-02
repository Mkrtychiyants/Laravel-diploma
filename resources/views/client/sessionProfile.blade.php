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
        style="background-image: url(../../../welcome-wallpaper-cinema.jpg);"
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

                <main class="h-screen flex flex-col flex-wrap gap-10 container mx-auto text-md text-black ">
                    <div class="container mx-auto border border-white">
                        <header class="capitalize text-sm   text-white py-2 px-8 ">           
                            <div class="font-bold ">{{$session->movie->title}}</div>
                            <div class="my-2 "> начало сеанса {{\Carbon\Carbon::parse($session->start_time)->format('H:i')}}</div>
                            <div class="font-bold  "> Зал {{$session->room->id}}</div>
                        </header> 
                        <section class="grid  mx-auto justify-center py-3 ">
                                <div class="pb-8  h-1.5 mb-8 text-right text-sm uppercase  bg-no-repeat bg-center bg-[url('../../../public/screen.png')] bg-contain"></div>     
                                <div class="grid  place-content-center mx-auto ">          
                                    <table class="table-auto">
                                            <tbody>   
                                                @php $nubmerSeats=0; @endphp
                                                @for ($i = 1; $i<=$session->room->rows; $i+=1)
                                                    <tr> 
                                                        @for ($j = 1; $j<=$session->room->columns; $j+=1)
                                                            <td >
                                                                @if ($tickets[$nubmerSeats]->is_blocked)
                                                                    <p class="inline-block text-white w-5 h-5 rounded bg-black  mr-1 mb-1"><span></span></p>
                                                                    @php $nubmerSeats++; @endphp
                                                                @elseif (($tickets[$nubmerSeats]->is_purchased))
                                                                    <p class="inline-block text-white w-5 h-5 rounded bg-orange-400 border border-gray-400 mr-1 mb-1"><span></span></p>
                                                                @php $nubmerSeats++; @endphp
                                                                @elseif ($tickets[$nubmerSeats]->is_selected)
                                                                <a href="{{route('client.seatSelect', $tickets[$nubmerSeats]->id)}}"  class="inline-block text-white w-5 h-5 rounded bg-teal-400 border border-gray-400 mr-1 mb-1"><span ></span>
                                                                </a>
                                                                @php $nubmerSeats++; @endphp
                                                                @elseif ($tickets[$nubmerSeats]->is_vip)
                                                                    <a href="{{route('client.seatSelect', $tickets[$nubmerSeats]->id)}}"  class="inline-block  bg-orange-400 text-white w-5 h-5 rounded border border-gray-400 mr-1 mb-1"><span ></span>
                                                                    </a>
                                                                    @php $nubmerSeats++; @endphp
                                                                @else
                                                                    <a href="{{route('client.seatSelect', $tickets[$nubmerSeats]->id)}}" class="inline-block text-white w-5 h-5 rounded bg-zinc-50 border border-gray-400 mr-1 mb-1"  ></span>
                                                                    @php $nubmerSeats++; @endphp
                                                                @endif
                                                            </td>   
                                                        @endfor
                                                    </tr>
                                                @endfor
                                            </tbody>
                                        </table>    
                                </div> 
                                <div class="grid gap-2 grid-cols-2 justify-items-start pl-14  pt-10  ">
                                        <div> 
                                            <span class="inline-block text-white w-5 h-5 rounded bg-zinc-50 border border-gray-400"></span> 
                                            <span class="text-white capitalize  m-1">свободно </span>
                                            <span class="text-white  capitalize ">({{$regularPrice}}руб) </span>
                                        </div>
                                        <div> 
                                            <span class="inline-block text-white w-5 h-5 rounded bg-black border border-gray-400"></span>  
                                            <span class="text-white capitalize mx-1">занято </span>
                                        </div>
                                        <div> 
                                            <span class=" inline-block text-white w-5 h-5  rounded bg-orange-400 border border-gray-400"></span> 
                                            <span class="text-white capitalize mx-1">свободно VIP </span>
                                            <span class="text-white  capitalize ">({{$vipPrice}}руб) </span> 
                                        </div>
                                        <div> 
                                            <span class=" inline-block text-white w-5 h-5 rounded bg-teal-400 border border-gray-400"></span>  
                                            <span class="text-white capitalize mx-1">выбрано </span>
                                        </div>
                                </div>  
                        </section>  
                                <div class="flex flex-two justify-center py-4 ">           
                                    <a  href="{{route('client.GetFinalTicket', $session)}}" class="uppercase my-4 mx-2 rounded-md px-8 py-2 text-white font-bold text-sm  bg-teal-400">Забронировать</a>
                                </div>   
                    </div>      
                </main>

                <footer class="py-16 text-center text-sm text-white">
                    Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})
                </footer> 
        </div>
    </body>
</html>
