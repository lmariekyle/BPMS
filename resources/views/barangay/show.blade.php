<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Barangay') }}
        </h2>
    </x-slot>

    <div class="pt-10 pb-14">
        <div class="max-w-max max-h-max sm:px-6 lg:px-8">
        <div class="">
                <div class="">
                <div class="max-w-sm max-h-12 w-96 h-12 text-center">
                        <a href="{{ route('barangay.index') }}" class="float-left mt-4">
                            <i class="fa-sharp fa-solid fa-arrow-left text-3xl text-deep-green"></i>
                        </a>
                        <p class="font-roboto font-bold text-deep-green text-5xl">VIEW BARANGAY</p>
                    </div>
                    <div class="max-h-[837px] h-[837px] max-w-[1178px] w-[1178px] mt-8 ml-14 p-14 border-2 border-black rounded bg-dirty-white font-roboto shadow-md">
                        <div class="relative">
                            <div class="float-left">
                                <div>
                                    <p class="pl-3 text-deep-green">Barangay:</p>
                                    <div class="pl-8 w-[318px] text-dirty-white bg-green">{{$barangay->barangayName}}</div>
                                </div>  
                                <div class="mt-4">
                                    <p class="pl-3 text-deep-green">Municipality</p>
                                    <div class="pl-8 w-[318px] text-dirty-white bg-green">{{$barangay->municipality}}</div>
                                </div>
                                <div class="mt-4">
                                    <p class="pl-3 text-deep-green">Zip Code:</p>
                                    <div class="pl-8 w-[318px] text-dirty-white bg-green">{{$barangay->zipCode}}.</div>
                                </div>
                                <div>
                                    <p class="pl-3 text-deep-green">Address:</p>
                                    <div class="pl-8 w-[318px] text-dirty-white bg-green">{{$barangay->HLocation}}</div>
                                </div>   
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>