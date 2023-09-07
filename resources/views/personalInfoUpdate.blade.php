<x-page-layout>

    <div class="float-left -mt-10 ml-8">
        <a href="">
            <i class="fa-sharp fa-solid fa-arrow-left text-3xl text-dirty-white"></i>
        </a>
    </div>
    
    <div class="mt-[5rem] p-5 ml-24 h-full w-[1342px] bg-dirty-white border-2 border-deep-green shadow-3xl">

        <p class="font-robotocondensed text-[28px] text-deep-green px-1 py-5 mb-8 text-center font-semibold">Request Type: Account Information Update</p>
        
        <div class="h-max w-max flex-col">
            <p class="font-robotocondensed text-[28px] text-deep-green px-1 py-1 text-left font-semibold">Reason for Change:</p>
            <input id="reason" class="w-[30rem] bg-dirty-white border-2 border-deep-green shadow-3xl" type="text" name="reason" :value="old('reason')" required autofocus />
        </div>

        <div class="-mt-[6rem] ml-[45rem] h-max w-max flex-col">
            <p class="font-robotocondensed text-[28px] text-deep-green px-1 py-1 text-left font-semibold">Name of Requester:</p>
            <p class="font-robotocondensed text-[28px] text-deep-green px-1 py-1 text-left underline underline-offset-8 ">Cate Frances Zamora</p>
        </div>

        <div class="-mt-[-10px] ml-[45rem] h-max w-max flex-col">
            <p class="font-robotocondensed text-[28px] text-deep-green px-1 py-1 text-left font-semibold">Sitio:</p>
            <p class="font-robotocondensed text-[28px] text-deep-green px-1 py-1 text-left underline underline-offset-8 ">Catadman</p>
        </div>

        <div class="h-max w-max flex-col mt-5">
            <p class="font-robotocondensed text-[28px] text-deep-green px-1 py-1 text-left font-semibold">Supporting Document:</p>
            <input id="profileImage" class="-mt-[5px] w-[15rem] h-[42px] px-2 py-2 text-center text-[14px] text-dirty-white file:w-[7rem] file:h-[42px]file:overflow-hidden file:bg-deep-green file:text-[14px] file:text-dirty-white file:font-robotocondensed file:cursor-pointer" type="file" name="profileImage"/>
        </div>

        <div class="bg-deep-green mt-10 h-1 w-full"></div> <!-- straight line-->
        <div class="p-3 mt-3 h-max w-full bg-dirty-white">
           <div class="h-max w-max grid grid-flow-col p-3 gap-4">

                        <div class="h-max w-max grid grid-rows-2 grid-flow-col gap-4 px-8">
                            <p class="font-robotocondensed text-[24px] text-deep-green px-1 py-1 text-left">Type of Information to Change:</p>
                            <div class="border-deep-green border-2 px-1 py-1">
                                <p class="font-robotocondensed text-[20px] text-deep-green px-1 py-1 text-left">Enail Address</p>
                            </div>
                        </div>

                        <div class="h-max w-max grid grid-rows-2 grid-flow-col gap-4 px-[5rem]">
                            <p class="font-robotocondensed text-[24px] text-deep-green px-1 py-1 text-left">Old Information:</p>
                            <div class="border-deep-green border-2 px-1 py-1">
                                <p class="font-robotocondensed text-[20px] text-deep-green px-1 py-1 text-left">catezamora@email.com</p>
                            </div>
                        </div>

                        <div class="h-max w-max grid grid-rows-2 grid-flow-col gap-4 px-8">
                            <p class="font-robotocondensed text-[24px] text-deep-green px-1 py-1 text-left">New Information: </p>
                            <div class="border-deep-green border-2 px-1 py-1">
                                <p class="font-robotocondensed text-[20px] text-deep-green px-1 py-1 text-left">zamoracate@bpms.com</p>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="bg-deep-green mt-5 h-1 w-full"></div> <!-- straight line-->
                
                <div class="mt-8 flex flex-row place-content-evenly px-2 py-2">
                <div class="text-center">
                <x-button class="mt-4 bg-deep-green text-dirty-white border-0 w-60 l-12">
                    <div class="m-auto">                 
                        {{ __('Approve Request') }}
                    </div>
                </x-button>
                </div>

                <div class="text-center">
                <x-button class="mt-4 bg-deep-green text-dirty-white border-0 w-60 l-12">
                    <div class="m-auto">                 
                        {{ __('Deny Request') }}
                    </div>
                </x-button>
                </div>
                </div>  

            </div>


</x-page-layout>
