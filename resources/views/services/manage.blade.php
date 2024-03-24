@role('Admin')
<x-page-layout>
    <x-slot name="header">
    </x-slot>
    <a href="{{ route('services.index') }}"><i class="fa-solid fa-arrow-left text-dirty-white text-[40px] ml-14 mt-20"></i></a>
    <div class="font-robotocondensed text-deep-green w-[1400px] h-[813px] ml-40 mt-16 px-16 pt-6 bg-dirty-white border-2 border-black" style="border-color: black;">
        <div class="justify-center flex flex-row">
            <p class="text-center font-bold text-[40px]">Request Type: Account Information Update</p>
        </div>
        <div class="flex flex-row mt-8">
            <div class="text-[30px]">
                <div>
                    <p class="font-bold">Reason for Change</p>
                    <div class="w-[500px] h-[250px] border-2 border-black px-4 py-4" style="border-color: black;">
                        <p class="text-xl">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                            sed do eiusmod tempor incididunt ut labore et dolore magna
                            Ut enim ad minim veniam, quis nostrud exercitation ullamco
                            nisi ut aliquip ex ea commodo consequat. Duis aute irure
                        </p>
                    </div>
                </div>
                <div class="mt-4">
                    <p class="font-bold">Supporting Document</p>
                    <div class="w-[500px] border-2 border-black mt-2 px-2" style="border-color: black;">
                        <a href="">None</a>
                    </div>
                </div>
            </div>
            <div class="text-5xl ml-40">
                <p class="font-bold">Name of Requester</p>
                <p class="ml-10">----</p>
                <p class="font-bold">ID Number</p>
                <p class="ml-10">----</p>
                <p class="font-bold">Account Type</p>
                <p class="ml-10">----</p>
            </div>
        </div>
        <div class="border-2 border-[#414833] mt-6" style="border-color: #414833;"></div>
        <div class="text-[30px] flex flex-row mt-2">
            <div class="ml-4">
                <p class="font-bold">Type of Information to Change</p>
                <div class="w-[380px] border-2 border-black mt-2 px-2" style="border-color: black;">
                    <a href="">----</a>
                </div>
            </div>
            <div class="ml-32">
                <p class="font-bold">Old Information</p>
                <div class="w-[300px] border-2 border-black mt-2 px-2" style="border-color: black;">
                    <a href="">----</a>
                </div>
            </div>
            <div class="ml-32">
                <p class="font-bold">New Information</p>
                <div class="w-[300px] border-2 border-black mt-2 px-2" style="border-color: black;">
                    <a href="">----</a>
                </div>
            </div>
        </div>
        <div class="border-2 border-[#414833] mt-6" style="border-color: #414833;"></div>
        <div class="justify-center flex flex-row mt-4">
            <a href="" class="text-center w-[400px] font-robotocondensed font-bold text-[32px] text-dirty-white bg-deep-green px-4 py-2" style="width: 400px; font-size: 32px;">Approve Request</a>
            <a href="" class="text-center w-[400px] ml-8 font-robotocondensed font-bold text-[32px] text-dirty-white bg-deep-green px-4 py-2" style="width: 400px; font-size: 32px;">Deny Request</a>
        </div>
    </div>
</x-page-layout>
@endrole

@hasanyrole('Barangay Captain|Barangay Secretary')
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Barangay Health Workers') }}
        </h2>
    </x-slot>
    
    <div class="w-[1400px] h-max ml-8 px-5 py-5 rounded-lg border-2 border-black" style="border-color: black;">
        <div class="flex flex-row">
            <div>
                <div class="flex flex-row ml-10">
                    <a href="{{ route('services.index') }}"><i class="fa-solid fa-arrow-left text-deep-green text-[28px] py-3"></i></a>
                    <p class="font-robotocondensed text-[32px] font-bold text-deep-green ml-8 flex" style="font-size: 32px;">REQUEST NO. {{ $transaction->id }}</p>
                </div>
                <div class="ml-24 mt-4 flex flex-col" style="margin-left: 92px;">
                    <div class="font-robotocondensed font-bold text-deep-green" style="font-size: 18px;">
                        <p>Name of Requester:</p>
                        <p class="px-6 border-2 w-[300px] mt-1" style="border-color: #414833;">{{ $transaction->detail['requesteeFName'] }} {{ $transaction->detail['requesteeMName'] }} {{ $transaction->detail['requesteeLName'] }}</p>
                    </div>
                    <div class="font-robotocondensed font-bold  text-deep-green mt-6" style="font-size: 18px;">
                        <p>Email:</p>
                        <p class="px-6 border-2 w-[300px]" style="border-color: #414833;">{{ $transaction->detail['requesteeEmail'] }}</p>
                    </div>
                    <div class="font-robotocondensed font-bold text-deep-green mt-6" style="font-size: 18px;">
                        <p>Request Type:</p>
                        <p class="px-6 border-2 w-[300px]" style="border-color: #414833;">{{ $transaction->document['docName'] }}</p>
                    </div>
                    <div class="font-robotocondensed font-bold text-deep-green mt-6" style="font-size: 18px;">
                        <p>Purpose:</p>
                        <p class="px-6 border-2 w-[300px] h-[max]" style="border-color: #414833;">{{ $transaction->detail['requestPurpose'] }}</p>
                    </div>
                    <div class="font-robotocondensed font-bold text-deep-green mt-6" style="font-size: 18px;">
                        <p>Processed By:</p>
                        <p class="px-6 border-2 w-[300px]" style="border-color: #414833;">{{ $transaction->issuedBy}}</p>
                    </div>
                </div>
            </div>
            <div class="ml-10 mt-[4.5rem]">
                <div class="ml-10 h-max mb-4">
                         <p class="font-robotocondensed text-[18px] font-bold text-deep-green">Uploaded Requirements:</p>
                        @forelse($filePaths as $file)
                        <div class="flex flex-col justify-start w-[100px]">
                            <a href="{{ route('view_file', $file) }}" class="text-center font-poppins w-max bg-olive-green hover:bg-deep-green text-dirty-white hover:text-dirty-white font-medium rounded-lg text-sm px-5 py-2.5">{{$file}}</a>
                        </div>
                        @empty
                        <p class="font-poppins text-[18px] mt-3 ml-10 font-semibold">No Uploaded Documents</p>
                        @endforelse
                </div>
                <div class="ml-10">
                    <div class="font-robotocondensed font-bold text-[32px] text-deep-green" style="font-size: 18px;">
                    @php
                        $key = $transaction->payment['screenshot'];
                    @endphp
                    @if($transaction->payment['paymentMethod'] == 'GCASH')
                        <p>Payment Type:</p>
                        
                        <p class="px-6 border-2 w-[300px]" style="border-color: #414833;">GCASH</p>
                    <div class="font-robotocondensed font-bold text-[32px] text-deep-green mt-6" style="font-size: 18px;">
                        <p>Payment Reference Code:</p>
                        <p class="px-6 border-2 w-[300px]" style="border-color: #414833;">{{ $transaction->payment['successURL'] }}</p>
                    </div>
                    @else
                    <p>Payment Type:</p>
                        <p class="px-6 border-2 w-[300px]" style="border-color: #414833;">CASH ON SITE</p>
                    @endif
                    </div>
                    <div class="font-robotocondensed font-bold text-[32px] text-deep-green mt-6" style="font-size: 18px;">
                        <p>Payment Status:</p>
                        <p class="px-6 border-2 w-[300px]" style="border-color: #414833;">{{ $transaction->payment['paymentStatus'] }}</p>
                    </div>
                </div>
            </div>
            @if($transaction->payment['paymentMethod'] == 'GCASH')
            <div class="ml-20 mt-20">
                <p class="font-robotocondensed font-bold text-[18px] text-deep-green">Payment Receipt:</p>
                <img src="{{ Storage::url($transaction->payment['screenshot']) }}" alt="Image {{ $key }}" class="mt-4 border-2 border-deep-green shadow-sm w-[280px] h-[400px]">
            </div>
            @endif
        </div>
        @role('Barangay Secretary')
        @if ($transaction->serviceStatus == 'Pending')
        <div class="justify-center flex flex-row mt-8">
            <form method="GET" action="{{ route('accepted', $transaction->id) }}">
                @if($transaction->approval != 1)
                    <button type="submit" class="text-center w-max font-robotocondensed font-bold text-[22px] text-dirty-white bg-deep-green px-4 py-2" style="width: 300px; font-size: 22px;" disabled>Approve Request </button>
                @else
                    <button type="submit" class="text-center w-max font-robotocondensed font-bold text-[22px] text-dirty-white bg-deep-green px-4 py-2" style="width: 300px; font-size: 22px;">Approve Request </button>
                @endif
            </form>
            <form method="GET" action="{{ route('deny', $transaction->id) }}">
                <button type="submit" class="text-center w-max ml-8 font-robotocondensed font-bold text-[22px] text-dirty-white px-4 py-2" style="width: 300px; font-size: 22px; background-color: #D86F4D;">Deny Request</button>
            </form>
        </div>
        @elseif ($transaction->serviceStatus == 'Signed')
        <div class="justify-center  flex flex-row mt-8">
            <form method="GET" action="{{ route('released', $transaction->id) }}">
                <button type="submit" class="text-center w-[400px] font-robotocondensed font-bold text-[32px] text-dirty-white bg-deep-green px-4 py-2" style="width: 300px; font-size: 22px;">Confirm Pickup</button>
            </form>
        </div>
        @endif
        @endrole

    </div>
</x-app-layout>
@endhasanyrole