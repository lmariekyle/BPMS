@role('User')
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Barangay Health Workers') }}
        </h2>
    </x-slot>

    <div class="flex flex-col justify-center place-items-center ml-[25rem] w-[600px] h-max font-robotocondensed text-[26px] mt-[2rem] border-2 border-black text-deep-green shadow-md rounded-md bg-slate-50 py-4">
        <img src="/images/Gcash.png" alt="" style="width: 350px; height: 140px;" class="self-center">
        <form method="POST" action="{{route('services.storepayment', $payment->id)}}" enctype="multipart/form-data" class="flex flex-col">
            @csrf
            <div class="flex flex-col justify-center place-items-center w-max h-max bg-slate-50 rounded-md px-10 py-10">
                <input class="hidden" style="border-color: #414833;" value="{{$payment->id}}" name="id">
                <div class="flex flex-col bg-white h-[200px] w-[200px] border-2 border-black">
                    <img src="/images/qr.png" alt="" style="width: 800px; height:300px;">
                    <div class="flex flex-row w-max px-4 mt-6 -ml-[5rem] ">
                    <p class="font-poppins text-[18px] text-center font-medium w-max text-gray-800">Merchant: </p>
                    <p class="font-poppins text-[18px] text-center text-black font-medium w-max ml-2">Brgy. Hall Poblacion Dalaguete</p>
                    </div>
                    <div class="flex flex-row w-max px-4 mt-2 -ml-[5rem]">
                    <p class="font-poppins text-[18px] text-center font-medium w-max text-gray-800">Amount Due: </p>
                    <!-- <p class="font-poppins text-[18px] text-center text-black font-medium w-max ml-2">{{$document->fee}}</p> -->
                    <input type="hidden" name="amountPaid" value="{{$document->fee}}">
                    <input class="font-poppins text-[18px] text-start text-black ml-2" style="border-color: #414833;" value="PHP {{$document->fee}}" name="amountPaid" disabled>
                    </div>
                </div>

                <div class="flex flex-col justify-start mt-[5rem]  -ml-2">
                @include('components.flash')
                    <label class="mt-4 mb-2 -ml-3 font-poppins text-[18px]">Reference Number:</label>
                    <input class="px-2 focus:outline-none border-2 w-[300px]  text-deep-green -ml-3" style="border-color: #414833;" value="" name="referenceNumber" required>
                    <p class="mt-1 font-extralight italic text-[14px] -ml-3">Note: Reference Number contains 13 numbers only</p>
                    <p class="mt-1 font-extralight italic text-[14px] -ml-3">Example: 8347138123948</p>
                    <div class="mt-4 h-max -ml-3">
                        <input type="file" id="fileButton" name="screenshot" class="text-[18px]" required>
                        <p class="mt-1 font-extralight italic text-[14px]">Upload Screenshot of GCASH Receipt</p>
                    </div>
                    <button class="border-2 rounded-lg font-bold px-2 py-1 mt-6 w-max text-[18px] self-center hover:bg-blue-400" style="border-color: #414833;">SUBMIT PAYMENT</button>
                </div>
            </div>
        </form>

    </div>
</x-app-layout>
@endrole