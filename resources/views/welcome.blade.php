<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>BPMS</title>

        <script src="https://kit.fontawesome.com/c0346081e5.js" crossorigin="anonymous"></script>
        <script src="{{ asset('js/app.js') }}" defer></script>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400;500&family=Libre+Baskerville:wght@400;700&family=Lora&family=Roboto&family=Roboto+Condensed&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">        
    </head>
<body class="bg-dirty-white">
    <!-- header -->
    <div class="px-5 py-5 justify-center w-50 h-40 bg-olive-green"> 
            <h1 class="font-dancingscript text-6xl text-dirty-white text-center">Municipality of Dalaguete</h1>
            <h2 class="font-libre text-4xl p-3 -mt-5 text-dirty-white text-center">BARANGAY POBLACION</h2>

        <div>
        @if (Route::has('login'))
                <div class="hidden absolute bottom-[37rem] right-3 px-6 py-4 sm:block">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="text-xl mx-2 text-dirty-white font-robotocondensed">HOME</a>
                    @else
                        <a href="{{ route('login') }}" class="text-xl mx-3 text-dirty-white font-robotocondensed">LOGIN</a>
                        @if (Route::has('create'))
                                <a href="{{ route('create') }}"  class="text-xl mx-3 text-dirty-white font-robotocondensed">
                                       REGISTER
                                </a>
                        @endif
                    @endauth
                </div>
        @endif
        </div>

        <div class= "mb-12 -mt-28 ml-8 w-64 h-64 rounded-full border-2 bg-dirty-white border-green flex justify-center items-center">
        <img src="{{ asset('images/PoblacionDalLogo.png') }}" alt="">
        </div>
    </div>
    
    <!-- green background rectangle -->
    <div class="h-16 w-full bg-green mt-80"></div>      

    <!-- welcome statistics conten -->
    <div class="p-3 ml-[18rem] -mt-56 h-max w-[60rem] bg-dirty-white border-2 border-deep-green rounded-xl shadow-3xl">
        <p class="font-robotocondensed mt-12 text-4xl p-3 text-deep-green text-center">BARANGAY POBLACION,DALAGUETE 2020 CENSUS DATA</p>
    
        <div class="mt-0.5 grid grid-rows-2 grid-flow-col gap-4 justify-center ">

            <div class="bg-dirty-white mt-12 h-64 w-80 border-2 border-deep-green shadow-inner rounded-xl">
                <div class="-mt-[20px] mx-12 h-12 w-fit bg-olive-green border-2 border-green rounded-xl px-3 py-3">
                    <h1 class="font-robotocondensed text-base text-dirty-white text-center">TOTAL RESIDENTS PER SITIO</h1>
                </div>
            </div>

            <div class="bg-dirty-white mt-8 h-64 w-80 border-2 border-deep-green shadow-inner rounded-xl">
                 <h1 class="font-robotocondensed text-base text-deep-green text-center">TOTAL RESIDENTS</h1>
            </div>

            <div class="bg-dirty-white mt-12 h-64 w-80 border-2 border-deep-green shadow-inner rounded-xl">
                <div class="-mt-[20px] mx-12 h-12 w-max bg-olive-green border-2 border-green rounded-xl px-3 py-3">
                    <h1 class="font-robotocondensed text-base text-dirty-white text-center">TOTAL HOUSEHOLDS PER SITIO</h1>
                </div>
            </div>

            <div class="bg-dirty-white mt-8 h-64 w-80 border-2 border-deep-green shadow-inner rounded-xl">
                    <h1 class="font-robotocondensed text-base text-deep-green text-center">TOTAL HOUSEHOLDS</h1>
            </div>

        </div>
    </div>
    
    <div class="ml-[35rem] mr-96 -mt-[55rem] h-32 w-[25rem] bg-olive-green border-2 border-green rounded-xl px-3 py-3">
        <h1 class="font-dancingscript text-8xl -mt-5 text-dirty-white text-center">Welcome</h1>
    </div>

    <!-- DALAGUETE TOURISM -->
        
    <!-- green background rectangle -->
    <div class="h-[262px] w-full bg-green mt-[50rem]">
        <h1 class="font-dancingscript text-8xl text-dirty-white text-center pt-6">Enjoy Dalaguete!</h1>
    </div>     
    
    <div class="p-3 ml-[10rem] -mt-28 h-[821.46px] w-[1230px] bg-olive-green border-2 border-deep-green rounded-xl shadow-3xl">
        <section class="bg-deep-green h-max w-max ml-10 mt-5">
            <div class="relative">
                <ul id="slider">
                    <li class="h-[700px] w-[1100px] relative">
                        <img class="h-full object-cover w-full "src="{{ asset('images/ObongSpring.png') }}" alt="">
                    </li>

                    <li class="h-[700px] w-[1100px] relative hidden">
                        <img class="h-full object-cover w-full "src="{{ asset('images/OsmenaPeak.png') }}" alt="">

                    </li>

                    <li class="h-[700px] w-[1100px] relative hidden">
                        <img class="h-full object-cover w-full "src="{{ asset('images/CasayBeach.png') }}" alt="">
                    </li>
                </ul>
            </div>
            <div class="ml-[10rem] mt-[135rem] absolute px-5 flex h-[12px] w-[1230px] top-0 left-0">
                <div class="my-auto  w-full flex justify-between">
                    <button onclick="prev()" class="p-3">
                            <i class="fa-regular fa-circle-left"></i>
                    </button>
                    <button onclick="next()" class="p-3">
                    <i class="fa-regular fa-circle-right"></i>
                    </button>
                </div>
            </div>
        </section>
    </div>

    <footer class=" bg-olive-green mt-36 p-5">
            <h1 class="font-dancingscript text-[48px] text-dirty-white text-left">Contact Us!</h1>
            <h1 class="font-roboto text-[20px] text-dirty-white text-left"><i class="fa-regular fa-envelope fa-sm"></i> dbarangaypoblacion@gmail.com</h1>
            <h1 class="font-roboto text-[20px] text-dirty-white text-left"><i class="fa-solid fa-phone"></i> 4848-9004</h1>
    </footer>   




    <script>
            let currentSlideID =1;
            let sliderElement = document.getElementById('slider');
            let totalSlides = sliderElement.childElementCount;

            function next(){
                if(currentSlideID < totalSlides){
                    currentSlideID++;
                    showSlide()
                }
            }

            function prev(){
                if(currentSlideID > 1){
                    currentSlideID--;
                    showSlide()
                }
            }

            function showSlide(){
                slides = document.getElementById('slider').getElementsByTagName('li')
                for (let index = 0; index < totalSlides; index++) {
                    const element = slides[index];
                    if (currentSlideID === index+1) {
                        element.classList.remove('hidden')
                    }else{
                        element.classList.add('hidden')
                    }
                }
            }
    </script>
</body>
</html>
