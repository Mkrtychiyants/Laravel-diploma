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
                                        <div class=" absolute bg-contain bg-no-repeat size-6 z-3  right-[60px] top-[37px]  -rotate-0 bg-[url('../../public/switch.png')]" > </div>
                                </header>
                            </a>
                            <div class="px-20 relative">
                                <div class="flex flex-col items-start px-6 pt-6 ">
                                    <ul class="flex  flex-col items-start ">
                                        <h2 class="text-lg  text-black py-2 ">Доступные залы:</h2>
                                            @foreach ($allRooms as $room)
                                                <li class="flex items-start gap-2 rounded-lg">
                                                    <div class="text-md font-bold uppercase text-black ">- Зал  {{ $room->id }}</div>
                                                    <a  href="" >
                                                        <button class="rounded-lg bg-[length:25px_15px] bg-[bottom_3.5px_left_3.5px] bg-no-repeat bg-white hover:bg-slate-300 border-solid border-2 border-indigo-600 size-6  bg-[url('../../public/trash-sprite.png')]">
                                                        </button>
                                                    </a> 
                                                </li>
                                            @endforeach
                                    </ul>
                                </div>
                                <form  method="post" action=""  >
                                        @csrf
                                    <button type="submit" class="uppercase my-4 rounded-md px-8  ml-6 mb-6 py-2 text-white font-bold text-sm  bg-emerald-700 shadow-lg hover:bg-emerald-500  transition-all ease-in  delay-300  duration-200">Создать зал</button>
                                </form>
                                <div class="absolute h-full bg-purple-400 font-black text-2xl z-20 w-1 top-0 left-[57px]" ></div>
                            </div> 
                        </section>
                        <section class="container mx-auto ">
                            <a  href="{{route('admin.homepage')}}" class="relative" >
                                <header class="w-full flex content-center  flex-wrap bg-fuchsia-900  indent-24 z-5  py-8 text-xl  text-white font-bold uppercase tracking-tighter transition-all ease-in  hover:tracking-wide hover:bg-fuchsia-400  delay-300  duration-200 "> Конфигурация залов
                                        <div class=" absolute bg-white bg-no-repeat border-purple-400 rounded-full bg-contain  border-4  size-10 top-[27px] left-[40px]" ></div> 
                                        <div class="absolute text-black font-black text-2xl top-[30px] left-[-42px] " >2</div>
                                        <div class="absolute bg-purple-400 font-black text-2xl z-20 h-8 w-1 top-[-2px] left-[57px]" ></div>
                                        <div class="absolute bg-purple-400 font-black text-2xl z-20 h-6 w-1 top-[67px] left-[57px]" ></div>
                                        <div class=" absolute bg-contain bg-no-repeat size-6 z-3  right-[60px] top-[37px] -rotate-0 bg-[url('../../public/switch.png')]" ></div>
                                </header>
                            </a>
                            <div class="pl-28 pr-10 container relative mx-auto text-lg">
                                <div class="absolute h-full bg-purple-400 font-black  z-20 w-1 top-0 left-[57px]" ></div>
                                <div class="flex  flex-col container mx-auto items-start">
                                    <h2 class=" pb-2 pt-6 ">Выберете зал для конфигурации:</h2>
                                    <ul class="flex flex-row">
                                        @foreach ($allRooms as $room)
                                            <li  class="flex border flex-wrap border-stone-300 items-start gap-1 rounded-md py-3 px-6 bg-white text-base hover:bg-gray-300 shadow-lg">
                                                <a href="{{ route('admin.roomConfiguration', $room) }}" class="uppercase font-bold ">Зал {{ $room->id }}</a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                                <div class="flex  flex-col container mx-auto items-start ">  
                                    <h2 class="py-2 ">Укажите количество рядов и максимальное количество кресел в ряду:</h2>
                                    <form  method="post" action="{{ route('admin.updateRoom', $firstRoom) }}" class="flex  flex-row items-center gap-4" id="config_room_form" >
                                        @csrf
                                        @method('PUT')
                                        <div class="flex  flex-col w-20">
                                            <label for="room_row" class="text-xs text-slate-400">Рядов, шт</label>
                                            <input name="room_row" id="room_row" type="number" value="{{ $firstRoom->rows}}" class="px-2 py-1 border-2 border-stone-300" >
                                        </div>
                                        <p class="text-sm mt-3">X</p>
                                        <div class="flex  flex-col w-20">
                                            <label for="room_columns" class="text-xs text-slate-400">Мест, шт:</label>
                                            <input name="room_columns" id="room_columns" type="number" value="{{$firstRoom->columns }}" class="px-2 py-1 border-2 border-stone-300">
                                        </div>
                                            <button type="reset"for="config_room_form" class="uppercase  mt-5   rounded-md px-8  ml-6  py-2 text-white font-bold text-sm  bg-emerald-700 shadow-lg hover:bg-emerald-500 transition-all ease-in  delay-300  duration-200">
                                            отмена   
                                            </button>
                                            <button type="submit" for="config_room_form" class="uppercase  mt-5  mx-2 rounded-md px-8  ml-1  py-2 text-white font-bold text-sm  bg-emerald-700 shadow-lg hover:bg-emerald-500 transition-all ease-in  delay-300  duration-200">
                                            сохранить   
                                            </button>  
                                    </form>
                                </div> 
                                <div class="flex  flex-col container mx-auto items-start py-2   ">
                                    <h2 class="py-2 ">Теперь вы можете указать типы кресел на схеме зала:</h2>
                                        <div class="flex items-center gap-2 text-xs text-slate-400">
                                            <span class="inline-block  size-7 bg-slate-300 border border-slate-600 rounded-md" ></span><span class="lowercase">- Обычные кресла</span>
                                            <span class="inline-block  size-7 bg-emerald-300 border border-slate-600 rounded-md" ></span><span  class="uppercase"> - Vip</span> <span class="lowercase">кресла</span>
                                            <span class="inline-block  size-7 bg-gray-300 border border-slate-600 rounded-md" ></span><span class="lowercase"> - Заблокированные (нет кресла)</span>
                                        </div>
                                    <p class=" py-2 text-xs text-slate-400">Чтобы изменить вид кресла, кликните по нему левой кнопкой мыши:</p>
                                </div> 
                                <div class="grid grid-flow-row  mx-auto border border-zinc-900 p-5 ">
                                        <div class="pb-4 tracking-[1.3rem] text-center text-sm uppercase ">Экран</div> 
                                        <div class="grid  place-content-center mx-auto ">          
                                        <table class="table-auto">
                                                <tbody class=" ">   
                                                    @php $nubmerSeats=0; @endphp
                                                    @for ($i = 1; $i<=$firstRoom->rows; $i+=1)
                                                        <tr> 
                                                            @for ($j = 1; $j<=$firstRoom->columns; $j+=1)
                                                                <td>
                                                                    @if ($seats[$nubmerSeats]->is_blocked)
                                                                      <a href="{{route('admin.updateSeatType',['room'=>$firstRoom,'seat'=> $seats[$nubmerSeats]])}}" class="inline-block size-7 bg-gray-300 rounded border border-slate-600 bg-black mr-1 mb-1"><span></span></a>
                                                                        @php $nubmerSeats++; @endphp
                                                                    @elseif ($seats[$nubmerSeats]->is_vip)
                                                                      <a href="{{route('admin.updateSeatType',['room'=>$firstRoom,'seat'=> $seats[$nubmerSeats]])}}"  class="inline-block size-7 rounded bg-emerald-300 border border-slate-600 mr-1 mb-1"><span ></span></a>
                                                                        @php $nubmerSeats++; @endphp
                                                                    @else
                                                                      <a href="{{route('admin.updateSeatType',['room'=>$firstRoom,'seat'=> $seats[$nubmerSeats]])}}"   class="inline-block size-7 bg-slate-300 border border-slate-600 rounded mr-1 mb-1"><span ></span></a>
                                                                        @php $nubmerSeats++; @endphp
                                                                    @endif
                                                                </td>   
                                                            @endfor
                                                        </tr>
                                                    @endfor
                                                </tbody> 
                                        </table>    
                                        </div> 
                                </div>
                                            
                                <div class="flex flex-two justify-center py-6">           
                                    <a  href="{{route('admin.homepage')}}" class="uppercase  rounded-md mr-4 px-8  py-3 text-slate-400 font-bold text-sm  bg-white  shadow-lg hover:bg-pink-100 transition-all ease-in  delay-300  duration-200">отмена</a>    
                                    <a  href="{{route('admin.roomsPricesConfiguration')}}" class="uppercase  rounded-md px-8  py-3 text-white font-bold text-sm  bg-emerald-700 shadow-lg hover:bg-emerald-500 transition-all ease-in  delay-300  duration-200">далее</a>
                                </div>
                            </div>
                        </section>
                        <section class="container mx-auto ">
                            <a  href="{{route('admin.homepage')}}" class="relative" >
                                <header class="w-full flex content-center  flex-wrap bg-fuchsia-900  indent-24 z-5  py-8 text-xl  text-white font-bold uppercase tracking-tighter transition-all ease-in  hover:tracking-wide hover:bg-fuchsia-400  delay-300  duration-200 ">         
                                        Конфигурация цен
                                        <div class=" absolute bg-white bg-no-repeat border-purple-400 rounded-full bg-contain  border-4  size-10 top-[27px] left-[40px]" ></div> 
                                        <div class="absolute text-black font-black text-2xl top-[30px] left-[-42px] " >3</div>
                                        <div class="absolute bg-purple-400 font-black text-2xl z-20 h-8 w-1 top-[-2px] left-[57px]" > </div>
                                        <div class="absolute bg-purple-400 font-black text-2xl z-20 h-6 w-1 top-[67px] left-[57px]" ></div>
                                        <div class=" absolute bg-contain bg-no-repeat size-6 z-3  right-[60px] top-[37px] -rotate-90 bg-[url('../../public/switch.png')]" ></div>
                                </header>
                            </a>
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
