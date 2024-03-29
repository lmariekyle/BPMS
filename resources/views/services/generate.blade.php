<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Barangay Health Workers') }}
        </h2>
    </x-slot>
    <div class="relative">
        @hasanyrole('Barangay Captain|Barangay Secretary')
        <div class="w-[1400px] h-[813px] ml-8 mt-16 px-5 py-5 rounded-lg border-2 absolute z-10" style="border-color: black;">
            <div class="flex flex-row ml-4">
                <a href="{{ route('services.index') }}"><i class="fa-solid fa-arrow-left text-deep-green text-[28px] py-3"></i></a>
            </div>
            <div class="flex flex-row mt-6">
                <div class="w-[540px] h-[700px] bg-deep-green ml-32" style="width: 540px; height: 700px;">

                </div>
                <div class="ml-20 text-center items-center w-[580px] h-[700px] pt-[275px]" style="width: 580px; height: 700px; padding-top: 275px;">
                    <div class="">
                        <p class="font-robotocondensed font-bold text-[46px] text-dirty-white" style="font-size: 46px;">
                            CAMPOMANES, LOURDES
                        </p>
                        <p class="font-robotocondensed font-bold text-[32px] text-deep-green mt-1" style="font-size: 32px;">
                            RESIDENT
                        </p>
                    </div>
                    <div class="justify-center flex mt-6">
                        @role('Barangay Captain')
                        <a href="" class="text-center w-[400px] font-robotocondensed font-bold text-[32px] text-dirty-white bg-deep-green px-4 py-2" style="width: 400px; font-size: 32px;">Approve Request</a>
                        @endrole
                        @role('Barangay Secretary')
                        <a href="" class="text-center w-[400px] font-robotocondensed font-bold text-[32px] text-dirty-white bg-deep-green px-4 py-2" style="width: 400px; font-size: 32px;">Forward to Barangay Captain</a>
                        @endrole
                    </div>
                </div>
            </div>
        </div>
        @endhasanyrole
        <div class="bg-green h-[79px] w-[1440px] absolute mt-[425px]" style="width: 1440px; margin-top: 425px;">

        </div>
    </div>
</x-app-layout>