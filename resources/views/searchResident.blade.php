<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Resident Search') }}
        </h2>
    </x-slot>
   
        <div class="bg-green h-[58px] w-full mt-[18rem]">

            <div class="absolute -mt-[15rem] p-5 ml-24 h-full w-[1342px] bg-dirty-white border-2 border-deep-green rounded-xl shadow-3xl">

                <div class="h-max w-max flex-col">
                    <p class="font-robotocondensed text-[24px] text-deep-green px-1 py-1 text-left font">RESIDENT NAME:</p>
                    <p class="bg-green font-robotocondensed text-[28px] text-dirty-white px-1 py-1 text-center font-semibold">KIM , JISOO</p>
                </div>

                <div class="p-3 mt-5 h-max w-full bg-dirty-white border-2 border-deep-green shadow-3xl">
                    <div class="h-max w-max grid grid-rows-3 grid-flow-col gap-4 p-3">
                        <p class="font-robotocondensed text-[24px] text-deep-green px-1 py-1 text-left ">Age : 25</p>
                        <!-- <p class="font-robotocondensed text-[24px] text-deep-green px-1 py-1 text-left ">Age : {$res->age}</p> EXAMPLE HEHEHE-->
                        <p class="font-robotocondensed text-[24px] text-deep-green px-1 py-1 text-left ">Barangay: Poblacion</p>
                        <p class="font-robotocondensed text-[24px] text-deep-green px-1 py-1 text-left ">Sitio: Labangon</p>
                        <p class="font-robotocondensed text-[24px] text-deep-green px-1 py-1 text-left ml-3">State of Living: Middle Class</p>
                    </div>
                </div>

                <div class="bg-deep-green mt-5 h-1 w-[500px]"></div> <!-- straight line-->
                <p class="bg-green font-robotocondensed mt-3 text-[28px] w-max text-dirty-white px-5 py-2 text-center font-semibold">REQUEST HISTORY</p>

                <div class="p-3 mt-5 h-max w-full bg-dirty-white border-2 border-deep-green shadow-3xl">
                    <div class="h-max w-max grid grid-rows-3 grid-flow-col p-3 gap-4">

                        <div class="h-max w-max grid grid-flow-col gap-4 px-5">
                            <p class="font-robotocondensed text-[24px] text-deep-green px-1 py-1 text-left">Barangay Certificate:</p>
                            <div class="border-deep-green border-2 px-1 py-1">
                                <p class="font-robotocondensed text-[20px] text-deep-green px-1 py-1 text-left">1</p>
                            </div>
                        </div>

                        <div class="h-max w-max grid grid-flow-col gap-4 px-5">
                            <p class="font-robotocondensed text-[24px] text-deep-green px-1 py-1 text-left">Summon:</p>
                            <div class="border-deep-green border-2 px-1 py-1">
                                <p class="font-robotocondensed text-[20px] text-deep-green px-1 py-1 text-left">2</p>
                            </div>
                        </div>

                        <div class="h-max w-max grid grid-flow-col gap-4 px-5">
                            <p class="font-robotocondensed text-[24px] text-deep-green px-1 py-1 text-left">Barangay Clearance: </p>
                            <div class="border-deep-green border-2 px-1 py-1">
                                <p class="font-robotocondensed text-[20px] text-deep-green px-1 py-1 text-left">3</p>
                            </div>
                        </div>

                        <div class="h-max w-max grid grid-flow-col gap-4 px-5">
                            <p class="font-robotocondensed text-[24px] text-deep-green px-1 py-1 text-left">Personal Information Update: </p>
                            <div class="border-deep-green border-2 px-1 py-1">
                                <p class="font-robotocondensed text-[20px] text-deep-green px-1 py-1 text-left">4</p>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="bg-deep-green mt-5 h-1 w-[500px]"></div> <!-- straight line-->
                <p class="mt-1 font-robotocondensed text-[24px] text-deep-green text-left">Last Updated by: Zamora, C. (BHW002) - (4/24/2023)</p>

            </div>

        </div>

</x-app-layout>
