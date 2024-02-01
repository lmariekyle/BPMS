<x-page-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Account Update') }}
        </h2>
    </x-slot>

    <div class="pt-10 pb-14 bg-green">
        <div class="max-w-7xl w-[1280px] px-12">
            <div class="max-w-[1250px] w-[1250px]">
                <div class="relative">
                    @role('Admin')
                    <div class="max-w-full max-h-12 w-full h-12 text-center flex justify-start">
                        <p class="font-robotocondensed font-bold text-dirty-white text-5xl ml-5">REQUEST ACCOUNT INFORMATION CHANGE</p>
                        <div class="ml-12 mt-3">
                            @include('components.flash')
                        </div>
                    </div>
                    <form method="POST" action="{{ route('updateinfo', $user->id) }}" enctype="multipart/form-data">
                        @csrf
                        <div class="flex flex-col ml-5">
                            <div class="mt-[2rem]">
                                <label class="font-poppins text-[24px] text-dirty-white font-semibold">Information to Change:</label>
                                <p class="rounded-lg border-2 border-black w-[550px] h-[50px] text-[26px] px-2 py-1 text-black bg-dirty-white">{{$request->selectedInformation}}</p>
                                <input class="hidden" value="{{$request->selectedInformation}}" name="selectedInformation">
                            </div>
                            <div class="mt-5 flex flex-col">
                                <label class="font-poppins text-[24px] text-dirty-white font-semibold">User Old Information:</label>
                                <input class="rounded-lg border-2 border-black w-[550px] h-[50px] text-[26px] px-2 py-1 text-black bg-dirty-white" style="border-color: #414833;" value="{{$request->requesteeOldInformation}}" name="requesteeOldInformation">
                            </div>
                            <div class="mt-5 flex flex-col">
                                <label class="font-poppins text-[24px] text-dirty-white font-semibold">User New Information:</label>
                                <input class="rounded-lg border-2 border-black w-[550px] h-[50px] text-[26px] px-2 py-1 text-black bg-dirty-white" style="border-color: #414833;" value="{{$request->requesteeNewInformation}}" name="requesteeNewInformation">
                            </div>
                            <div class="mt-[2rem] flex flex-col">
                                <label class="font-poppins text-[24px] text-dirty-white font-semibold">Purpose of Request:</label>
                                <textarea class="rounded-lg border-2 border-black w-[550px] h-[50px] text-[26px] px-2 py-1 text-black bg-dirty-white" name="requestPurpose">{{$request->requestPurpose}}</textarea>
                            </div>
                        </div>
                        <select name="status" id="status" class="ml-5 mt-8 text-center w-[300px] h-max font-robotocondensed font-bold text-[22px] text-deep-green bg-dirty-white px-4 py-2">
                                <option value="0" class="">Request Status</option>
                                <option value="1" class="">Approve Request</option>
                                <option value="2" class="">Deny Request</option>
                        </select>
                        <button type="submit" class="ml-5 text-center w-[200px] rounded-md h-max font-robotocondensed font-bold text-[22px] text-dirty-white bg-deep-green px-2 py-2">Update Request</button>
                    </form> 
                    @endrole
                </div>
            </div>
        </div>
    </div>
</x-page-layout>