<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Barangay Health Workers') }}
        </h2>
    </x-slot>

    <div class="w-[1400px] h-[813px] ml-8 mt-16 px-5 py-5 rounded-lg border-2" style="border-color: black;">
        <div class="flex flex-row">
            <div>
                <div class="flex flex-row ml-10 mt-12">
                    <a href="{{ route('services.index') }}"><i class="fa-solid fa-arrow-left text-deep-green text-[28px] py-3"></i></a>
                    <p class="font-robotocondensed text-[32px] font-bold text-deep-green ml-8 flex" style="font-size: 32px;">REQUEST NO. ----</p>
                </div>
                <div class="ml-24 mt-12" style="margin-left: 92px;">
                    <div class="font-robotocondensed font-bold text-[32px] text-deep-green" style="font-size: 32px;">
                        <p>Name of Requester:</p>
                        <p class="px-6 border-2 w-[500px]" style="border-color: #414833;">----</p>
                    </div>
                    <div class="font-robotocondensed font-bold text-[32px] text-deep-green mt-6" style="font-size: 32px;">
                        <p>Email:</p>
                        <p class="px-6 border-2 w-[500px]" style="border-color: #414833;">----</p>
                    </div>
                    <div class="font-robotocondensed font-bold text-[32px] text-deep-green mt-6" style="font-size: 32px;">
                        <p>Request Type:</p>
                        <p class="px-6 border-2 w-[500px]" style="border-color: #414833;">----</p>
                    </div>
                    <div class="font-robotocondensed font-bold text-[32px] text-deep-green mt-6" style="font-size: 32px;">
                        <p>Purpose:</p>
                        <p class="px-6 border-2 w-[500px]" style="border-color: #414833;">----</p>
                    </div>
                </div>
            </div>
            <div class="ml-10 mt-12">
                <div class="ml-40 h-[172px]" style="height: 172px;">
                <p class="font-robotocondensed text-[32px] font-bold text-deep-green ml-8 flex" style="font-size: 32px;">Uploaded Documents</p>

                </div>
                <div class="ml-24 mt-12" style="margin-left: 92px;">
                    <div class="font-robotocondensed font-bold text-[32px] text-deep-green" style="font-size: 32px;">
                        <p>Payment Type:</p>
                        <p class="px-6 border-2 w-[500px]" style="border-color: #414833;">----</p>
                    </div>
                    <div class="font-robotocondensed font-bold text-[32px] text-deep-green mt-6" style="font-size: 32px;">
                        <p>Payment Status:</p>
                        <p class="px-6 border-2 w-[500px]" style="border-color: #414833;">----</p>
                    </div>
                    <div class="font-robotocondensed font-bold text-[32px] text-deep-green mt-6" style="font-size: 32px;">
                        <p>Processed By:</p>
                        <p class="px-6 border-2 w-[500px]" style="border-color: #414833;">----</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="justify-center flex flex-row mt-14">
            <a href="" class="text-center w-[400px] font-robotocondensed font-bold text-[32px] text-dirty-white bg-deep-green px-4 py-2" style="width: 400px; font-size: 32px;">Approve Request</a>
            <a href="" class="text-center w-[400px] ml-8 font-robotocondensed font-bold text-[32px] text-dirty-white px-4 py-2" style="width: 400px; font-size: 32px; background-color: #D86F4D;">Deny Request</a>
        </div>
    </div>
    
</x-app-layout>
