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
                                <a href="{{route('admin.homepage')}}">
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
                <main class="mt-6 mb-20 container mx-auto bg-gray-300 w-9/12 ">
                    <div class="grid grid-cols-1">
                        <section class="container mx-auto ">
                            <a  href="{{route('admin.homepage')}}" class="relative" >
                                <header class="w-full flex content-center  flex-wrap bg-fuchsia-900  indent-24 z-5  py-8 text-xl  text-white font-bold uppercase tracking-tighter transition-all ease-in  hover:tracking-wide hover:bg-fuchsia-400  delay-300  duration-200 ">Управление залами
                                        <div class="absolute bg-white bg-no-repeat border-purple-400 rounded-full bg-contain  border-4  size-10 top-[27px] left-[40px]" > </div> 
                                        <div class="absolute text-black font-black text-2xl top-[30px] left-[-42px] " >1</div>
                                        <div class="absolute bg-purple-400 font-black text-2xl z-20 h-6 w-1 top-[67px] left-[57px]" > </div>
                                        <div class=" absolute bg-contain bg-no-repeat size-6 z-3  right-[60px] top-[37px]  -rotate-90 bg-[url('../../public/switch.png')]" > </div>
                                </header>
                            </a>
                        </section>
                        <section class="container mx-auto ">
                            <a  href="{{route('admin.homepage')}}" class="relative" >
                                <header class="w-full flex content-center  flex-wrap bg-fuchsia-900  indent-24 z-5  py-8 text-xl  text-white font-bold uppercase tracking-tighter transition-all ease-in  hover:tracking-wide hover:bg-fuchsia-400  delay-300  duration-200 "> Конфигурация залов
                                        <div class=" absolute bg-white bg-no-repeat border-purple-400 rounded-full bg-contain  border-4  size-10 top-[27px] left-[40px]" ></div> 
                                        <div class="absolute text-black font-black text-2xl top-[30px] left-[-42px] " >2</div>
                                        <div class="absolute bg-purple-400 font-black text-2xl z-20 h-8 w-1 top-[-2px] left-[57px]" ></div>
                                        <div class="absolute bg-purple-400 font-black text-2xl z-20 h-6 w-1 top-[67px] left-[57px]" ></div>
                                        <div class=" absolute bg-contain bg-no-repeat size-6 z-3  right-[60px] top-[37px] -rotate-90 bg-[url('../../public/switch.png')]" ></div>
                                </header>
                            </a>
                        </section>
                        <section class="container mx-auto ">
                            <a  href="{{route('admin.homepage')}}" class="relative" >
                                <header class="w-full flex content-center  flex-wrap bg-fuchsia-900  indent-24 z-5  py-8 text-xl  text-white font-bold uppercase tracking-tighter transition-all ease-in  hover:tracking-wide hover:bg-fuchsia-400  delay-300  duration-200 ">         
                                        Конфигурация цен
                                        <div class=" absolute bg-white bg-no-repeat border-purple-400 rounded-full bg-contain  border-4  size-10 top-[27px] left-[40px]" ></div> 
                                        <div class="absolute text-black font-black text-2xl top-[30px] left-[-42px] " >3</div>
                                        <div class="absolute bg-purple-400 font-black text-2xl z-20 h-8 w-1 top-[-2px] left-[57px]" > </div>
                                        <div class="absolute bg-purple-400 font-black text-2xl z-20 h-6 w-1 top-[67px] left-[57px]" ></div>
                                        <div class=" absolute bg-contain bg-no-repeat size-6 z-3  right-[60px] top-[37px] -rotate-0 bg-[url('../../public/switch.png')]" ></div>
                                </header>
                            </a>
                            <div class="px-24 container relative mx-auto text-lg">
                                    <div class="absolute h-full bg-purple-400 font-black text-2xl z-20 w-1 top-0 left-[57px]" ></div>
                                    <div class="flex  flex-col container mx-auto items-start">
                                        <h2 class=" pt-5  pb-2">Выберете зал для конфигурации:</h2>
                                        <ul class="flex flex-row">
                                            @foreach ($rooms as $room)
                                                <li class="flex border flex-wrap border-stone-300 items-start gap-1 rounded-md py-3 px-6 bg-white text-base hover:bg-gray-300 shadow-lg">
                                                    <a href="{{route('admin.roomPricesConfiguration',  $room->id)}}" class="uppercase font-bold">Зал {{ $room->id}}</a>
                                                </li>
                                            @endforeach
                                            </ul>
                                        </div>
                                    <div class="flex  flex-col container mx-auto items-start ">  
                                        <h2 class="pt-5 pb-2">Установите цены для типов кресел:</h2>
                                        <form  method="post" action="{{route('admin.seatsPricesUpdate', $currentRoom)}}" class="flex  flex-col items-center gap-1 py-2 " id="room_prices_config" >
                                            @csrf
                                            @method('PUT')
                                                <div class="w-full">
                                                    <label for="regular_seat_price" class="block text-xs text-slate-400">Цена, руб</label>
                                                    <input name="regular_seat_price" id="regular_seat_price" type="number-to-text" value="100" class="w-20 inline-block border-2 border-stone-300 px-2 py-1 my-1 mr-1" ><span class="py-1" >за</span>
                                                    <span class="inline-block size-6 bg-slate-300 border border-slate-600 rounded-md align-middle"></span><span class="inline-block lowercase px-2"> обычные кресла</span>
                                                </div> 
                                                <div class="w-full">
                                                    <label for="vip_seat_price" class="block text-xs text-slate-400">Цена, руб</label>
                                                    <input name="vip_seat_price" id="vip_seat_price" type="number-to-text" value="250" class="w-20 inline-block border-2 border-stone-300 px-2 py-1 my-1 mr-1  "><span class="py-1 ">за</span>
                                                    <span class="inline-block  size-6 bg-emerald-300 border border-slate-600 rounded-md align-middle"></span><span  class="uppercase px-1">VIP</span> <span class="lowercase">кресла</span>
                                                </div>
                                                <div class="mx-auto p-6">           
                                                    <button type="reset"for="updateSeatsPrices" class="uppercase  rounded-md mr-4 px-8  py-3 text-slate-400 font-bold text-sm  bg-white  shadow-lg hover:bg-pink-100  transition-all ease-in  delay-300  duration-200">
                                                    отмена   
                                                    </button>
                                                    <button type="submit" for="updateSeatsPrices" class="uppercase  rounded-md px-8  py-3 text-white font-bold text-sm  bg-emerald-700 shadow-lg hover:bg-emerald-500  transition-all ease-in  delay-300  duration-200">
                                                    далее   
                                                    </button> 
                                                </div>
                                        </form> 
                                    </div>
                                        
                            </div>  
                        </section>
        
                        <section class="container mx-auto ">
                            <a  href="{{route('admin.homepage')}}" class="relative" >
                                <header class="w-full flex content-center  flex-wrap bg-fuchsia-900  indent-24 z-5  py-8 text-xl  text-white font-bold uppercase tracking-tighter transition-all ease-in  hover:tracking-wide hover:bg-fuchsia-400  delay-300  duration-200 "> Сетка сеансов
                                        <div class=" absolute bg-white bg-no-repeat border-purple-400 rounded-full bg-contain  border-4  size-10 top-[27px] left-[40px]" ></div> 
                                        <div class="absolute text-black font-black text-2xl top-[30px] left-[-42px] " > 4</div>
                                        <div class="absolute bg-purple-400 font-black text-2xl z-20 h-8 w-1 top-[-2px] left-[57px]" ></div>
                                        <div class="absolute bg-purple-400 font-black text-2xl z-20 h-6 w-1 top-[67px] left-[57px]" ></div>
                                        <div class=" absolute bg-contain bg-no-repeat size-6 z-3  right-[60px] top-[37px] -rotate-90 bg-[url('../../public/switch.png')]" ></div>
                                </header>
                            </a>
                        </section>
                        <section class="container mx-auto ">
                            <a  href="{{route('admin.homepage')}}" class="relative" >
                                <header class="w-full flex content-center  flex-wrap bg-fuchsia-900  indent-24 z-5  py-8 text-xl  text-white font-bold uppercase tracking-tighter transition-all ease-in  hover:tracking-wide hover:bg-fuchsia-400  delay-300  duration-200 ">открыть продажи<div class=" absolute bg-white bg-no-repeat border-purple-400 rounded-full bg-contain  border-4  size-10 top-[27px] left-[40px]" > </div> 
                                        <div class="absolute text-black font-black text-2xl top-[30px] left-[-42px] " >5 </div>
                                        <div class="absolute bg-purple-400 font-black text-2xl z-20 h-8 w-1 top-[-1px] left-[57px]" ></div>
                                        <div class=" absolute bg-contain bg-no-repeat size-6 z-3  right-[60px] top-[37px] -rotate-90 bg-[url('../../public/switch.png')]" ></div>
                                </header>
                            </a>
                        </section>
                    </div>
                </main> 

                <footer class="py-16 text-center text-sm text-white">
                    Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})
                </footer> 
        </div>
    </body>
</html>
