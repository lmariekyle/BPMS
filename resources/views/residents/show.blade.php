<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Barangay Health Workers') }}
        </h2>
    </x-slot>
    
    <div class="flex flex-col w-[1400px] h-max ml-8 px-5 py-5 rounded-lg border-2 border-black" style="border-color: black;">
        <div class="flex flex-row">
            <div>
                <div class="flex flex-row ml-10">
                    <a href="{{ route('resident.requests',auth()->user()->id)}}"><i class="fa-solid fa-arrow-left text-deep-green text-[28px] py-3"></i></a>
                    <p class="font-robotocondensed text-[32px] font-bold text-deep-green ml-8 flex" style="font-size: 32px;">REQUEST NO. {{ $transaction->id }}</p>
                </div>
                <div class="ml-24 mt-4 flex flex-col" style="margin-left: 92px;">
                    <div class="font-robotocondensed font-bold text-deep-green" style="font-size: 18px;">
                        <p>Request Status:</p>
                        <p class="px-6 border-2 w-[300px] h-[max]" style="border-color: #414833;">{{ $transaction->serviceStatus}}</p>
                    </div>
                    <div class="font-robotocondensed font-bold text-deep-green mt-6" style="font-size: 18px;">
                        <p>Document Number:</p>
                        <p class="px-6 border-2 w-[300px]" style="border-color: #414833;">{{ $transaction->docNumber}}</p>
                    </div>
                    <div class="font-robotocondensed font-bold  text-deep-green mt-6" style="font-size: 18px;">
                        <p>Document Type:</p>
                        <p class="px-6 border-2 w-[300px]" style="border-color: #414833;">{{ $transaction->document->docType }}</p>
                    </div>
                    <div class="font-robotocondensed font-bold text-deep-green mt-6" style="font-size: 18px;">
                        <p>Requested Document:</p>
                        <p class="px-6 border-2 w-[300px] mt-1" style="border-color: #414833;"> {{$transaction->document->docName}}</p>
                    </div>
                </div>
            </div>
            <div>
                <div class="ml-24 mt-[43px] flex flex-col">
                        <div class="font-robotocondensed font-bold text-deep-green mt-6" style="font-size: 18px;">
                            <p>Requestee Name:</p>
                            <p class="px-6 border-2 w-[300px] h-[max]" style="border-color: #414833;">{{ $requester->requesteeFName }} {{ $requester->requesteeLName }}</p>
                        </div>
                        <div class="font-robotocondensed font-bold text-deep-green mt-6" style="font-size: 18px;">
                            <p>Email:</p>
                            <p class="px-6 border-2 w-[300px]" style="border-color: #414833;">{{ $requester->requesteeEmail }}</p>
                        </div>
                        <div class="font-robotocondensed font-bold text-deep-green mt-6" style="font-size: 18px;">
                            <p>Contact Number:</p>
                            <p class="px-6 border-2 w-[300px]" style="border-color: #414833;">{{ $requester->requesteeContactNumber }}</p>
                        </div>
                </div>
            </div>
            
            <div>
                <div class="ml-24 mt-[67px] flex flex-col">
                    <div class="font-robotocondensed font-bold text-deep-green" style="font-size: 18px;">
                        <p>Payment Method:</p>
                        <p class="px-6 border-2 w-[300px]" style="border-color: #414833;">{{ $transaction->payment->paymentMethod}}</p>
                    </div>
                    <div class="font-robotocondensed font-bold  text-deep-green mt-6" style="font-size: 18px;">
                        <p>Service Amount:</p>
                        <p class="px-6 border-2 w-[300px]" style="border-color: #414833;">{{ $transaction->payment->amountPaid }}</p>
                    </div>
                    <div class="font-robotocondensed font-bold text-deep-green mt-6" style="font-size: 18px;">
                        <p>Payment Status:</p>
                        <p class="px-6 border-2 w-[300px] mt-1" style="border-color: #414833;"> {{$transaction->payment->paymentStatus}}</p>
                    </div>
                </div>
            </div>
        </div>
        <hr class="mt-8 border-[1.5px] border-deep-green">
        <div class="flex flex-row">
            <div>
                <div class="ml-24 mt-4 flex flex-col" style="margin-left: 92px;">
                    <div class="font-robotocondensed font-bold text-deep-green mt-6" style="font-size: 18px;">
                        <p>Reviewed By:</p>
                        <p class="px-6 border-2 w-[300px]" style="border-color: #414833;">{{ $requester->requesteeEmail }}</p>
                    </div>
                    <div class="font-robotocondensed font-bold text-deep-green mt-6" style="font-size: 18px;">
                        <p>Reviewed On:</p>
                        <p class="px-6 border-2 w-[300px]" style="border-color: #414833;">{{ $requester->requesteeContactNumber }}</p>
                    </div>
                    <div class="font-robotocondensed font-bold text-deep-green mt-6" style="font-size: 18px;">
                        <p>Endorsed By:</p>
                        <p class="px-6 border-2 w-[300px]" style="border-color: #414833;">Pending</p>
                    </div>
                    <div class="font-robotocondensed font-bold  text-deep-green mt-6" style="font-size: 18px;">
                        <p>Endorsed On:</p>
                        <p class="px-6 border-2 w-[300px]" style="border-color: #414833;">Pending</p>
                    </div>
                </div>
            </div>
            <div>
                <div class="ml-24 mt-4 flex flex-col" style="margin-left: 92px;">
                    <div class="font-robotocondensed font-bold text-deep-green mt-6" style="font-size: 18px;">
                        <p>Approved By:</p>
                        <p class="px-6 border-2 w-[300px] mt-1" style="border-color: #414833;"> Pending</p>
                    </div>

                    <div class="font-robotocondensed font-bold text-deep-green mt-6" style="font-size: 18px;">
                        <p>Approved On:</p>
                        <p class="px-6 border-2 w-[300px] h-[max]" style="border-color: #414833;">Pending</p>
                    </div>
                    <div class="font-robotocondensed font-bold text-deep-green mt-6" style="font-size: 18px;">
                        <p>Issued By:</p>
                        <p class="px-6 border-2 w-[300px]" style="border-color: #414833;">Pending</p>
                    </div>
                    <div class="font-robotocondensed font-bold text-deep-green mt-6" style="font-size: 18px;">
                        <p>Issued On:</p>
                        <p class="px-6 border-2 w-[300px]" style="border-color: #414833;">Pending</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    


</x-app-layout>
