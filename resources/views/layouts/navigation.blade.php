@role('Admin')
<nav x-data="{ open: false }">
    <!-- Primary Navigation Menu -->
    <!-- <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-center h-16">
            <div class="flex"> -->

    <!-- Logo -->
    <!-- <div class= "mb-12 mt-16 w-64 h-64 rounded-full border-2 bg-dirty-white border-green flex justify-center items-center">
                <img src="{{ asset('images/PoblacionDalLogo.png') }}" alt="">
                </div>
            </div>   
        </div>
    </div> -->

    <div class="w-full">

        <!-- Logo -->

        <img src="{{ asset('images/PoblacionDalLogo.png') }}" alt="" class="absolute top-0 right-0 w-[130px] h-[130px] mx-5 my-5">

        <svg class="mt-12 flex justify-center w-[1350px] bg-green h-[79px] border-b border-gray-100 clip-path-polygon-[_0%_0%,_0%_0%,_100%_0%,_95%_50%,_100%_100%,_0%_100%,_0_calc(100%_-_1rem)]">
            <div class="absolute flex-row -mt-[70px] px-4 py-3 items-center w-[1270px]">
                <a href="{{ route('dashboard') }}"><i class="fa-solid fa-arrow-left text-dirty-white text-[24px]"></i></a>
                <a href="" class="font-robotocondensed text-[24px] text-dirty-white px-10">ACCOUNTS</a>
                <a href="" class="font-robotocondensed text-[24px] text-dirty-white px-10">REQUESTS</a>
            </div>
        </svg>
    </div>
    @endrole


    @hasanyrole('Barangay Captain|Barangay Secretary')
    <nav x-data="{ open: false }">
        <div class="w-full">

            <!-- Logo -->

            <img src="{{ asset('images/PoblacionDalLogo.png') }}" alt="" class="absolute top-0 right-0 w-[130px] h-[130px] mx-5 my-5">


            <svg class="mt-12 flex justify-center w-[1350px] bg-green h-[79px] border-b border-gray-100 clip-path-polygon-[_0%_0%,_0%_0%,_100%_0%,_95%_50%,_100%_100%,_0%_100%,_0_calc(100%_-_1rem)]">
                <div class="absolute flex-row -mt-[75px] px-4 py-3 items-center w-[1270px]">
                    <a href="{{ route('landingpage') }}"><i class="fa-solid fa-arrow-left text-dirty-white text-[24px]"></i></a>
                    <a href="{{ route('landingpage') }}" class="font-robotocondensed text-[24px] text-dirty-white px-10">HOME</a>
                    <a href="{{ route('services.index') }}" class="font-robotocondensed text-[24px] text-dirty-white px-10">SERVICES</a>
                    <a href="{{ route('bhw') }}" class="font-robotocondensed text-[24px] text-dirty-white px-10">BHW</a>
                    <a href="{{route('profile')}}"><i class="fa-solid fa-circle-user text-dirty-white text-[40px] ml-[680px]"></i></a>
                </div>
            </svg>
        </div>
        @endhasanyrole


        @hasanyrole('User|Barangay Health Worker')
        <nav x-data="{ open: false }">
            <div class="w-full">

                <!-- Logo -->

                <img src="{{ asset('images/PoblacionDalLogo.png') }}" alt="" class="absolute top-0 right-0 w-[130px] h-[130px] mx-5 my-5">


                <svg class="mt-12 flex justify-center w-[1350px] bg-green h-[79px] border-b border-gray-100 clip-path-polygon-[_0%_0%,_0%_0%,_100%_0%,_95%_50%,_100%_100%,_0%_100%,_0_calc(100%_-_1rem)]">
                    <div class="absolute flex-row -mt-[75px] px-4 py-3 items-center w-[1270px]">
                        <!-- <a href=""><i class="fa-solid fa-arrow-left text-dirty-white text-[24px]"></i></a> -->
                        <a href="{{ route('landingpage') }}" class="font-robotocondensed text-[24px] text-dirty-white px-10">HOME</a>
                        <a href="{{ route('dashboard') }}" class="font-robotocondensed text-[24px] text-dirty-white px-10">SERVICES</a>
                        <a href="{{route('profile')}}"><i class="fa-solid fa-circle-user text-dirty-white text-[40px] ml-[750px]"></i></a>
                    </div>
                </svg>
            </div>
            @endhasanyrole
        </nav>