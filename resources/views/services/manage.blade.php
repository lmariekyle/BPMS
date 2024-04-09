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
                    <div class="font-robotocondensed font-bold text-[32px] text-deep-green mt-6" style="font-size: 18px;">
                        <p>Amount Due:</p>
                        <p class="px-6 border-2 w-[300px]" style="border-color: #414833;">PHP {{ $transaction->serviceAmount }}</p>
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
                @if($transaction->approval != 1)
                    <button id="remarks" type="submit" class="text-center w-max font-robotocondensed font-bold text-[22px] text-dirty-white bg-deep-green px-4 py-2" style="width: 300px; font-size: 22px;" disabled>Approve Request </button>
                @else
                    <button id="remarks" type="submit" class="text-center w-max font-robotocondensed font-bold text-[22px] text-dirty-white bg-deep-green px-4 py-2" style="width: 300px; font-size: 22px;">Approve Request </button>
                @endif
                <form method="POST" action="{{ route('accepted', $transaction->id) }}">
                <div id="RemarksModal" class="modal hidden fixed z-10 pt-28 top-0 mt-[120px] w-[800px] h-max drop-shadow-lg -ml-[20rem] border-deep-green">
                        <div class="bg-dirty-white m-auto p-5 border-1 rounded w-5/6">
                                @csrf
                                <span class="close font-deep-green float-right text-xl font-bold hover:cursor-pointer">&times;</span>
                                <div class="input-area">
                                    <label for="remarks" class="font-robotocondensed text-[28px] text-deep-green">Remarks:</label>
                                    <input type="text" name="remarks" class="block mt-4 w-full h-[100px] bg-dirty-white" maxlength="225">
                                </div>
                                <x-button class="text-base mt-8 bg-deep-green text-dirty-white border-0 w-60 l-12">
                                    <div class="m-auto">
                                        Approve Request
                                    </div>
                                </x-button>  
                            </form>
                        </div>
                    </div>
                </form>
                <button id="remarksDeny" type="submit" class="text-center w-max ml-8 font-robotocondensed font-bold text-[22px] text-dirty-white px-4 py-2" style="width: 300px; font-size: 22px; background-color: #D86F4D;">Deny Request</button>
            <form method="POST" action="{{ route('deny', $transaction->id) }}">
            <div id="DenyRemarksModal" class="modal hidden fixed z-10 pt-28 top-0 mt-[120px] w-[800px] h-max drop-shadow-lg -ml-[40rem] border-deep-green">
                        <div class="bg-dirty-white m-auto p-5 border-1 rounded w-5/6">
                                @csrf
                                <span class="closedeny font-deep-green float-right text-xl font-bold hover:cursor-pointer">&times;</span>
                                <div class="input-area">
                                    <label for="remarks" class="font-robotocondensed text-[28px] text-deep-green">Remarks:</label>
                                    <input type="text" name="remarks" class="block mt-4 w-full h-[100px] bg-dirty-white" maxlength="225">
                                </div>
                                <x-button class="text-base mt-8 bg-deep-green text-dirty-white border-0 w-60 l-12">
                                    <div class="m-auto">
                                        Deny Request
                                    </div>
                                </x-button>  
                            </form>
                        </div>
                    </div>
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
    

<script>
    var modal = document.getElementById("RemarksModal");
    var denymodal = document.getElementById("DenyRemarksModal");
    var btn = document.getElementById("remarks");
    var btnDeny = document.getElementById("remarksDeny");

    var span = document.getElementsByClassName("close")[0];
    var spandeny = document.getElementsByClassName("closedeny")[0];
    // Open Modal
    btn.onclick = function() {
        modal.style.display = "block";
    }

    btnDeny.onclick = function() {
        denymodal.style.display = "block";
    }


    // Close Modal (using the X button)
    span.onclick = function() {
        modal.style.display = "none";
    }

    spandeny.onclick = function() {
        denymodal.style.display = "none";
    }

    // Close Modal (clicking anywhere else outside the Modal)
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }

    window.onclick = function(event) {
        if (event.target == denymodal) {
            denymodal.style.display = "none";
        }
    }
</script>
</x-app-layout>
@endhasanyrole