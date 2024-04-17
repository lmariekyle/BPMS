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
                        <a href="{{ route('services.index')}}"><i class="fa-solid fa-arrow-left text-dirty-white text-[24px] mt-3"></i></a>
                        <p class="font-robotocondensed font-bold text-dirty-white text-5xl ml-5">REQUEST ACCOUNT INFORMATION CHANGE</p>
                        <div class="ml-12 mt-3">
                            @include('components.flash')
                        </div>
                    </div>
                    <form method="POST" action="{{ route('updateinfo', $request->id) }}" enctype="multipart/form-data">
                        @csrf
                        <div class="flex flex-col ml-5 mt-4">
                            <div class="mt-[2rem]">
                                <label class="font-poppin text-[24px] text-dirty-white font-semibold">INFORMATION TO CHANGE:</label>
                                <p class="rounded-lg border-2 border-black w-[550px] h-[50px] text-[26px] px-2 py-1 text-black bg-dirty-white">
                                @if($request->selectedInformation == 'email' || $request->selectedInformation == 'Email Address')
                                    Email
                                @elseif($request->selectedInformation == 'contactNumber' || $request->selectedInformation == 'Contact Number')
                                    Contact Number
                                @endif
                                </p>
                                <input class="hidden" value="{{$request->selectedInformation}}" name="selectedInformation">
                            </div>
                
                            <div class="mt-2 flex flex-col">
                                <label class="font-poppin text-[24px] text-dirty-white font-semibold">OLD INFORMATION:</label>
                                <input class="rounded-lg border-2 border-black w-[550px] h-[50px] text-[26px] px-2 py-1 text-black bg-dirty-white" style="border-color: #414833;" value="{{$request->requesteeOldInformation}}" name="requesteeOldInformation">
                            </div>
                            <div class="mt-4 flex flex-col">
                                <label class="font-poppin text-[24px] text-dirty-white font-semibold">NEW INFORMATION:</label>
                                <input class="rounded-lg border-2 border-black w-[550px] h-[50px] text-[26px] px-2 py-1 text-black bg-dirty-white" style="border-color: #414833;" value="{{$request->requesteeNewInformation}}" name="requesteeNewInformation">
                            </div>
                            <div class="mt-[2rem] flex flex-col">
                                <label class="font-poppin text-[24px] text-dirty-white font-semibold">PURPOSE OF REQUEST:</label>
                                <textarea class="rounded-lg border-2 border-black w-[550px] h-[50px] text-[26px] px-2 py-1 text-black bg-dirty-white" name="requestPurpose">{{$request->requestPurpose}}</textarea>
                            </div>
                            
                            <div class="mt-[2rem] flex flex-col">
                                <p class="font-poppin text-[24px] text-dirty-white font-semibold">UPLOADED REQUIREMENTS:</p>
                                @forelse($filePaths as $file)
                                <div class="flex flex-col justify-start w-[100px]">
                                    <a href="{{ route('view_file', $file) }}" class="text-center font-poppins w-max bg-olive-green hover:bg-deep-green text-dirty-white hover:text-dirty-white font-medium rounded-lg text-sm px-5 py-2.5">{{$file}}</a>
                                </div>
                                @empty
                                <p class="font-poppins text-[18px] mt-3 ml-10 font-semibold">No Uploaded Documents</p>
                                @endforelse
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