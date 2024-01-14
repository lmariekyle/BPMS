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
                    @role('Barangay Secretary')
                        @if ($transaction->serviceStatus == 'For Signature')
                        <a href="{{route('pdf.export', $id)}}" class="float-right mr-4" style="margin-right: 16px;"><i class="fa-solid fa-print text-deep-green text-[28px] py-3"></i></a>
                        @endif
                    @endrole
            </div>
            <div class="flex flex-row mt-6">
                <!-- start of doc template -->
                <div class="w-max h-max bg-dirty-white border-2 border-black ml-32 px-[3rem] py-8">
                @include('documents.barangaycertificate')
                </div>
                <!-- end of doc template -->
                <div class="ml-20 text-center items-center w-[580px] h-[700px] pt-[275px]" style="width: 580px; height: 700px; padding-top: 275px;">
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
                        <a href="{{ route('signed', $id) }}" class="text-center w-[400px] font-robotocondensed font-bold text-[32px] text-deep-green bg-[#a9ce5f] px-4 py-2" style="width: 400px; font-size: 32px; background-color: #a9ce5f;">Approve Pickup</a>
                        @endif
                        @endrole
                        @role('Barangay Captain')
                        <form action="{{ route('approval', $id)}}" method="get">
                            @csrf
                            <select name="status" id="status" class="text-center w-[400px] font-robotocondensed font-bold text-[24px] text-deep-green bg-dirty-white border-2 border-deep-green px-4 h-[50px]">
                                <option value=" 0" class="">Request</option>
                                <option value="1" class="">Approve Request</option>
                                <option value="2" class="">Deny Request</option>
                            </select>
                            <button class="bg-deep-green text-dirty-white rounded-md h-[50px] px-8 text-center mt-8 font-semibold text-[18px]">Forward</button>
                        </form>
                        @endrole
                    </div>
                </div>
            </div>
        </div>
        <div class="bg-green h-[79px] w-max absolute mt-[425px]" style="width: 1440px; margin-top: 425px;">

        </div>
    </div>
</x-app-layout>