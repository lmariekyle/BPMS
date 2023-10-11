@role('User')
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Barangay Health Workers') }}
        </h2>
    </x-slot>

    <div class="w-[1400px] h-max font-robotocondensed text-[26px] ml-8 mt-16 border-2 border-black text-deep-green">

        <div class="text-6xl px-6 py-1 bg-green text-dirty-white">

            <p class="font-bold">
                {{$doctypename}}
            </p>
        </div>
        <form method="POST" action="{{route('services.storerequest' , $doctypename)}}" enctype="multipart/form-data">
            @csrf
            <div class="flex flex-row">
                <div>
                    <div class="ml-12 mt-[4rem] font-bold w-[650px]">
                        <div class="">
                            <label>TYPE OF CERTIFICATE</label>
                            <select class="rounded-lg border-2 w-full h-[50px] text-[26px]" style="border-color: #414833;" name="selectedDocument">
                                @foreach($documents as $document)
                                <option value="{{$document->id}}">{{$document->docName}}</option>
                                @endforeach
                            </select>
                        </div>
                        <p class="font-poppins text-[24px] text-deep-green mt-[2rem] underline underline-offset-8">REQUESTEE INFORMATION</p>
                        <div class="mt-[1rem] flex flex-row text-[23px]">
                            <div class="">
                                <input class="px-2 focus:outline-none border-2 w-[200px] bg-white text-deep-green" style="border-color: #414833;" value="{{$user->firstName}}" name="requesteeFName">
                                <br>
                                <label>FIRST NAME</label>
                            </div>
                            <div class="ml-8">
                                <input class="px-2 focus:outline-none border-2 w-[200px] bg-white text-deep-green" style="border-color: #414833;" value="{{$user->lastName}}" name="requesteeLName">
                                <br>
                                <label>LAST NAME</label>
                            </div>
                            <div class="ml-10">
                                <input class="px-2 focus:outline-none border-2 w-[175px] bg-white text-deep-green" style="border-color: #414833;" value="{{$user->middleName}}" name="requesteeMName">
                                <br>
                                <label>MIDDLE NAME</label>
                            </div>
                        </div>
                        <div class="mt-6 flex flex-row text-[23px]">
                            <div class="">
                                <input class="px-2 focus:outline-none border-2 w-[225px] bg-white text-deep-green" style="border-color: #414833;" value="{{$user->email}}" name="requesteeEmail">
                                <br>
                                <label>EMAIL ADDRESS</label>
                            </div>
                            <div class="ml-20">
                                <input class="px-2 focus:outline-none border-2 w-[225px] bg-white text-deep-green" style="border-color: #414833;" value="{{$user->contactNumber}}" name="requesteeContactNumber">
                                <br>
                                <label>CONTACT NUMBER</label>
                            </div>
                        </div>
                        <div class="mt-[3rem]">
                            <label>PURPOSE OF REQUEST</label>
                            <textarea class="px-2 focus:outline-none border-2 rounded-lg w-[650px] pl-6" style="border-color: #414833;" name="requestPurpose"> </textarea>
                        </div>
                    </div>
                </div>

                <div class="flex flex-col ml-[5rem] mt-[3rem]">
                    <div class="mt-8 justify-center rounded-lg text-center bg-dirty-white text-deep-green border-2 border-black shadow-md w-[510px] h-[332px]">
                        <p class="py-6 text-[24px] font-semibold">REQUIREMENTS FOR THE TYPE OF CERTIFICATE</p>
                        @if($doctypename == 'BARANGAY CERTIFICATE')
                        <li class="font-poppins text-[20px] text-start ml-10 font-semibold w-[410px]">Resident Certificate</li>
                        @elseif($doctypename == 'BARANGAY CLEARANCE')
                        <li class="font-poppins text-[20px] text-start ml-10 font-semibold w-[410px]">Cedula</p>
                        <li class="font-poppins text-[20px] text-start ml-10 font-semibold w-[410px]">Copy of Previous Permit</p>
                        <li class="font-poppins text-[20px] text-start ml-10 font-semibold w-[410px]">Tax Declaration</p>
                        <li class="font-poppins text-[20px] text-start ml-10 font-semibold w-[410px]">Affidavit of Consent</p>
                            @endif
                    </div>
                    <div class="py-1">
                        <p class="text-right mr-[7rem] font-extralight italic text-[16px]">Note: Requirements may vary depending of type of document</p>
                    </div>
                    <div class="ml-[0.25rem] mt-[3rem] font-text[23px]">
                        <div class="h-[300px] w-[605px]">
                            <input type="file" id="fileButton" name="file[]" multiple>
                            <p class="mt-1 font-extralight italic text-[16px]">Note: Upload any necessary documents stated in the requirements</p>
                        </div>
                        <div class="-mt-[13rem] mr-[5rem] text-right">
                            <div class="w-[300px] ml-[15rem]">
                                <p>CERTIFICATE FEE:</p>
                                <p>PHP {{$document->fee}}</p>
                                <input class="hidden px-2 focus:outline-none border-2 w-[225px] bg-green text-dirty-white" style="border-color: #414833;" value="{{$document->fee}}" name="docfee">
                            </div>
                            <br>
                            <div class="-mt-[2rem]">
                                <p class="mb-2 mt-2">Available Payment Method:</p>
                                <label for="gcash" class="mr-2">GCASH</label>
                                <input type="radio" name="paymentMethod" id="gcash" value="GCASH" class="w-[20px] h-[20px]">
                                <br>
                                <label for="cash-on-site" class="mr-2">CASH-ON-SITE</label>
                                <input type="radio" name="paymentMethod" id="cash-on-site" value="CASH-ON-SITE" class="w-[20px] h-[20px]">
                            </div>
                            <br>
                            <button class="border-2 rounded-lg font-bold px-3 py-1 -mt-[7rem] mb-[2rem] right-0" style="border-color: #414833;">PROCEED</button>
                        </div>
                    </div>
                </div>

            </div>
        </form>

    </div>
</x-app-layout>
@endrole