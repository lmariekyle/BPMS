@role('User')
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Barangay Health Workers') }}
        </h2>
    </x-slot>

    <div class="w-[1400px] h-[1024px] font-robotocondensed text-[26px] ml-8 mt-16 border-2 border-black text-deep-green">
        <form method="POST" action="{{route('services.createpayment', $payment->id)}}" enctype="multipart/form-data">
            @csrf
            <div class="flex flex-col justify-start place-items-center w-full h-[1024px]">
                <img src="/images/Gcash.png" alt="" style="width: 450px; height: 240px;">
                <input class="hidden px-2 focus:outline-none border-2 w-[225px] bg-green text-dirty-white" style="border-color: #414833;" value="{{$payment->id}}" name="id">
                <div class="flex flex-col bg-dirty-white h-[300px] w-[300px] border-2 border-black">
                    <img src="/images/qr.png" alt="" style="width: 800px; height:300px;">
                    <p class="font-poppins text-[32px] text-center mt-4 text-blue-800 font-medium">Ba****** Po******* D.</p>
                </div>

                <div class="flex flex-col mt-[5rem] ml-[20rem]">
                    <!-- <label class="-ml-1 mb-2">GCASH Number</label>
                    <input class="px-2 focus:outline-none border-2 w-[300px]  text-deep-green -ml-2" style="border-color: #414833;" value="" name="accountNumber"> -->
                    <x-auth-validation-errors class="mb-4" :errors="$errors" />
                    <label class="mt-4 -ml-1 mb-2">Reference Number</label>
                    <input class="px-2 focus:outline-none border-2 w-[300px]  text-deep-green -ml-2" style="border-color: #414833;" value="" name="successURL">
                    <div class="mt-8 -ml-1 mb-2 h-max w-[605px]">
                        <input type="file" id="fileButton" name="screenshot" required>
                        <p class="mt-1 font-extralight italic text-[16px]">Upload Screenshot of Payment</p>
                    </div>
                    <button class="border-2 rounded-lg font-bold px-2 py-1 mt-4 w-max ml-10" style="border-color: #414833;">SUBMIT PAYMENT</button>
                </div>
            </div>
        </form>

    </div>
</x-app-layout>
@endrole