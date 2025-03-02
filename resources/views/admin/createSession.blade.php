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
        <div style="background-image: url(../../../welcome-wallpaper-cinema.jpg);" class="min-h-screen w-full bg-cover bg-no-repeat min-w-[700px] ">
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
                <main class="container mx-auto bg-gray-300  w-9/12">
                    <section class="container mx-auto">
                        <a  href="{{route('admin.homepage')}}" class="flex w-full flex-col relative items-start">
                            <header class="w-full flex content-center  flex-wrap bg-fuchsia-900  indent-24 z-5  py-8 text-xl  text-white font-bold uppercase tracking-tighter transition-all ease-in  hover:tracking-wide hover:bg-fuchsia-400  delay-300  duration-200">         
                                    Cоздать сеанс
                                    <div class=" absolute  bg-white bg-no-repeat border-purple-400 rounded-full bg-contain  border-4  size-10 top-[27px] left-[40px]" ></div> 
                                    <div class="absolute text-black font-black text-2xl top-[30px] left-[-42px] " > 6 </div>
                                    <div class="absolute bg-purple-400 font-black text-2xl  h-8 w-1 top-[-2px] left-[57px]" > </div>
                                    <div class="absolute bg-purple-400 font-black text-2xl z-20 h-6 w-1 top-[67px] left-[57px]" ></div>
                                    <div class=" absolute bg-contain bg-no-repeat size-6 z-3  right-[60px] top-[37px] bg-[url('../../public/switch.png')]" > </div>
                            </header>
                        </a>
                        <div class=" p-6 gap-6 flex flex-col items-center  bg-white  md:container relative md:mx-auto">             
                                <form  method="post" action="{{route('admin.storeSession', $movie_id )}}"  class ="flex  flex-col items-center gap-1 py-2" >
                                        @csrf
                                        <label for="room_id">Номер зала:</label>
                                        <input class=" border border-stone-300 rounded-sm  w-20 inline-block border-2 border-stone-300 px-2 py-1 my-1 mr-1" name="room_id" id="room_id" type="number" value="1"><br>
                                        <label for="movie_id">Номер фильма:</label>
                                        <input class=" border border-stone-300 rounded-sm  w-20 inline-block border-2 border-stone-300 px-2 py-1 my-1 mr-1"  name="movie_id" id="movie_id" type="number" value="{{$movie_id}}"><br>

                                        <label for="start"> Дата и время начала сеанса:</label>
                                        <input class=" border border-stone-300 rounded-sm  w-20 inline-block border-2 border-stone-300 px-2 py-1 my-1 mr-1" name="start" id="start" type="datetime-local" ><br>
                                        <label for="distributionFinish"> Конечная дата проката фильма:</label>
                                        <input class=" border border-stone-300 rounded-sm  w-20 inline-block border-2 border-stone-300 px-2 py-1 my-1 mr-1" name="distributionFinish" id="distributionFinish" type="date" ><br>

                                        <div class="flex  flex-two container mx-auto  justify-center ">  
                                                <button type="reset" class="uppercase my-4 mx-2 rounded-md px-8 py-2 text-white font-bold text-sm  bg-teal-400 hover:bg-teal-300 transition-all ease-in  delay-300  duration-200">
                                                    отмена   
                                                </button>
                                                <button type="submit"   class="uppercase my-4 mx-2 rounded-md px-8 py-2 text-white font-bold text-sm  bg-teal-400 hover:bg-teal-300 transition-all ease-in  delay-300  duration-200">
                                                    сохранить   
                                                </button>
                                        </div> 
                                </form>
                            <div class="absolute  bg-purple-400 font-black text-2xl z-20 w-1 top-0 left-[57px]" ></div>   
                        </div>
                    </section>
                 </main>
                <footer class="py-16 text-center text-sm text-white">
                    Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})
                </footer> 
        </div>
    </body>
</html>

