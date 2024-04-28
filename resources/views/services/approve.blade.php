<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Barangay Health Workers') }}
        </h2>
    </x-slot>
    <div class="relative">
        <div class="w-[1400px] h-max ml-8 mt-16 px-5 py-5 rounded-lg border-2 absolute z-10" style="border-color: black;">
            <div class="flex-row">
                <a href="{{ route('services.index') }}" class="ml-4"><i class="fa-solid fa-arrow-left text-deep-green text-[28px] py-3"></i></a>
            </div>
            <div class="flex flex-row mt-6">
                <!-- start of doc template -->
                <div class="w-max h-max bg-dirty-white border-2 border-black ml-[2rem] px-[3rem] py-4">
                    @include('documents.barangaycertificate')
                </div>
                <!-- end of doc template -->
                <div class="ml-[2.5rem] text-center items-center w-[580px] h-[700px] pt-[275px]" style="width: 580px; height: 700px; padding-top: 275px;">
                    <div class="">
                        <p class="font-robotocondensed font-bold text-[46px] text-dirty-white" style="font-size: 46px;">
                            {{ $requestee->requesteeLName }}, {{ $requestee->requesteeFName }}
                        </p>
                        <p class="font-robotocondensed font-bold text-[32px] text-deep-green mt-1" style="font-size: 32px;">
                            RESIDENT
                        </p>
                    </div>
                    <div class="justify-center flex mt-6">
                        @role('Barangay Secretary')
                        @if ($transaction->serviceStatus == 'Processing')
                        <a href="{{ route('forwarded', $id) }}" class="text-center w-[400px] font-robotocondensed font-bold text-[32px] text-deep-green bg-[#a9ce5f] px-4 py-2" style="width: 400px; font-size: 32px; background-color: #a9ce5f;">Forward to Barangay Captain</a>
                        @else
                        <form method="POST" action="{{ route('signed', $id) }}">
                            @csrf
                            @if($transaction->payment->paymentMethod == 'GCASH')
                            <div class="flex flex-col mt-2">
                            <hr class="border-1 border-black">
                            <p class="mt-4 text-center font-robotocondensed text-[18px] font-bold text-deep-green">Official Receipt Details:</p>
                            <div class="flex flex-col mt-4">
                                <label for="orNumber" class="text-left font-robotocondensed text-[18px] text-deep-green">O.R Number:</label>
                                <input type="text" name="orNumber" class="px-6 border-2 w-[300px] mt-1 bg-" style="border-color: #414833;" maxlength="225" required>
                            </div>
                            <div class="flex flex-col mt-4">
                                <label for="remarks" class="text-left font-robotocondensed text-[18px] text-deep-green">Remarks:</label>
                                <input type="text" name="remarks" class="px-6 border-2 w-[300px] mt-1 bg-" style="border-color: #414833;" maxlength="225">
                            </div>
                            <button type="submit" class="mt-7 ml-4 text-center w-[200px] h-max font-robotocondensed font-bold text-[22px] text-dirty-white bg-deep-green px-2 py-2">Notify Pickup</button>     
                            @else
                            <div class="flex flex-col mt-4">
                                <input type="text" name="orNumber" class="hidden px-6 border-2 w-[300px] mt-1 bg-" style="border-color: #414833;" value="000000" maxlength="225" required>
                            </div>
                            <button type="submit" class="ml-4 text-center w-[200px] h-max font-robotocondensed font-bold text-[22px] text-dirty-white bg-deep-green px-2 py-2">Notify Pickup</button>     
                            @endif
                        
                        </div>
                        </form>
                        @endif
                        @endrole
                        @role('Barangay Captain')
                        <form action="{{ route('approval', $id)}}" method="get" id="approvalForm">
                            @csrf
                            <select name="status" id="captainstatus" class="text-center w-[400px] font-robotocondensed font-bold text-[24px] text-deep-green bg-dirty-white border-2 border-deep-green px-4 h-[50px]">
                                <option value="0" class="">Request Status</option>
                                <option value="1" class="">Approve Request</option>
                                <option value="2" class="">Deny Request</option>
                            </select>
                            <button class="bg-deep-green text-dirty-white rounded-md h-[50px] px-8 text-center mt-8 font-semibold text-[18px]" id="submitButton" disabled>Forward</button>
                        </form>
                        @endrole
                    </div>
                </div>
            </div>
        </div>
        <div class="bg-green h-[79px] w-max absolute mt-[425px]" style="width: 1440px; margin-top: 425px;">

        </div>
    </div>

    <script>
            document.getElementById('captainstatus').addEventListener('click', function(event) {
            event.stopPropagation(); // Stop event propagation
            var selectedValue = this.value;
            var submitButton = document.getElementById('submitButton');
            console.log(selectedValue);
            if (selectedValue == 0) {
                submitButton.disabled = true;
            } else {
                submitButton.disabled = false;
            }
        });
    </script>
</x-app-layout>