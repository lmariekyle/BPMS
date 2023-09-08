@role('Admin')
<x-page-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Barangay Health Workers') }}
        </h2>
    </x-slot>
    <a href="{{ route('services.index') }}"><i class="fa-solid fa-arrow-left text-dirty-white text-[40px] ml-14 mt-20"></i></a>
    <div class="font-robotocondensed text-deep-green w-[1400px] h-[813px] ml-40 mt-16 px-16 pt-6 bg-dirty-white border-2 border-black" style="border-color: black;">
        <div class="justify-center flex flex-row">
            <p class="text-center mt-8 font-bold text-5xl">Are you sure to deny this request?</p>
        </div>
        <div class="flex flex-row mt-8">
            <div class="text-[30px] ml-12">
                <div class="mt-4">
                    <p class="font-bold text-4xl">Reason for Denial of Request</p>
                    <div class="w-[500px] h-[250px] border-2 border-black px-4 py-4" style="border-color: black;">
                        <p class="text-xl">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, 
                            sed do eiusmod tempor incididunt ut labore et dolore magna
                            Ut enim ad minim veniam, quis nostrud exercitation ullamco
                            nisi ut aliquip ex ea commodo consequat. Duis aute irure 
                        </p>
                    </div>
                </div>
            </div>
            <div class="text-5xl ml-44">
                <p class="font-bold">Name of Requester</p>
                <p class="ml-10">----</p>
                <p class="font-bold">ID Number</p>
                <p class="ml-10">----</p>
                <p class="font-bold">Account Type</p>
                <p class="ml-10">----</p>
            </div>
        </div>
        <div class="justify-center flex flex-row mt-12">
            <a href="" class="text-center w-[400px] font-robotocondensed font-bold text-[32px] text-dirty-white bg-deep-green px-4 py-2" style="width: 400px; font-size: 32px;">Notify User</a>
        </div>
    </div>
</x-page-layout>
@endrole