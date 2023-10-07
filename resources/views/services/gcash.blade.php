@role('User')
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Barangay Health Workers') }}
        </h2>
    </x-slot>

    <div class="w-[1400px] h-[1024px] font-robotocondensed text-[26px] ml-8 mt-16 border-2 border-black text-deep-green">
        <form method="POST" action="{{route('services.gcash')}}" enctype="multipart/form-data">
            @csrf
            <div class="flex flex-col justify-start place-items-center bg-blue-600 w-full h-[1024px]">
                <p class="text-blue-600 bg-white text-[64px] w-full h-max px-4 py-4 text-center">GCASH</p>
                <input class="hidden px-2 focus:outline-none border-2 w-[225px] bg-green text-dirty-white" style="border-color: #414833;" value="{{$payment->id}}" name="id">
                <div class="bg-dirty-white h-[300px] w-[300px] border-2 border-black">
                    <p>INSERT GCASH QR CODE HERE.</p>
                </div>

                <div class="flex flex-col">
                    <label>GCASH Number</label>
                    <input class="px-2 focus:outline-none border-2 w-[225px] bg-green text-dirty-white" style="border-color: #414833;" value="" name="accountNumber">
                    <label>Reference Number</label>
                    <input class="px-2 focus:outline-none border-2 w-[225px] bg-green text-dirty-white" style="border-color: #414833;" value="" name="successURL">
                </div>
            </div>
            <button class="border-2 rounded-lg font-bold px-3 py-1" style="border-color: #414833;">PAY</button>
        </form>

    </div>
</x-app-layout>
@endrole