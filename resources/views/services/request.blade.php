@role('User')
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Barangay Health Workers') }}
        </h2>
    </x-slot>

    <form method="POST" action="{{route('services.storerequest' , $doctypename)}}" enctype="multipart/form-data">
        @csrf
        <div class="w-[1400px] h-max font-robotocondensed text-[26px] ml-8 mt-14 py-2 border-2 border-black text-deep-green">

            <div class="text-6xl px-6 py-1 -mt-2 bg-green text-dirty-white">

                <p class="font-bold">
                    {{$doctypename}}
                </p>
            </div>
            <div class="flex flex-row">
                <div>
                    <div class="ml-12 mt-[4rem] font-bold w-[650px]">
                        @if ($doctypename == 'BARANGAY CERTIFICATE' || $doctypename == 'BARANGAY CLEARANCE' )
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
                        @elseif ($doctypename == 'FILE COMPLAIN')
                        <input class="hidden px-2 focus:outline-none border-2 w-[225px] bg-green text-dirty-white" style="border-color: #414833;" value="16" name="selectedDocument">
                        <p class="font-poppins text-[24px] text-deep-green mt-[2rem] underline underline-offset-8">COMPLAINT DETAILS</p>
                        <div class="mt-[1rem] flex flex-row text-[23px]">
                            <div class="">
                                <input class="px-2 focus:outline-none border-2 w-[200px] bg-white text-deep-green" style="border-color: #414833;" name="complaintFName">
                                <br>
                                <label>FIRST NAME</label>
                            </div>
                            <div class="ml-8">
                                <input class="px-2 focus:outline-none border-2 w-[200px] bg-white text-deep-green" style="border-color: #414833;" name="complaintLName">
                                <br>
                                <label>LAST NAME</label>
                            </div>
                            <div class="ml-10">
                                <input class="px-2 focus:outline-none border-2 w-[175px] bg-white text-deep-green" style="border-color: #414833;" name="complaintMName">
                                <br>
                                <label>MIDDLE NAME</label>
                            </div>
                        </div>
                        <div class="mt-6 flex flex-row text-[23px]">
                            <div class="">
                                <input class="px-2 focus:outline-none border-2 w-[225px] bg-white text-deep-green" style="border-color: #414833;" name="complaintEmail">
                                <br>
                                <label>EMAIL ADDRESS</label>
                            </div>
                            <div class="ml-20">
                                <input class="px-2 focus:outline-none border-2 w-[225px] bg-white text-deep-green" style="border-color: #414833;" name="complaintContactNumber">
                                <br>
                                <label>CONTACT NUMBER</label>
                            </div>
                        </div>
                        <p class="font-poppins text-[24px] text-deep-green mt-[2rem] underline underline-offset-8">COMPLAINEE DETAILS</p>
                        <div class="mt-[1rem] flex flex-row text-[23px]">
                            <div class="">
                                <input class="px-2 focus:outline-none border-2 w-[200px] bg-white text-deep-green" style="border-color: #414833;" name="complaineeFName">
                                <br>
                                <label>FIRST NAME</label>
                            </div>
                            <div class="ml-8">
                                <input class="px-2 focus:outline-none border-2 w-[200px] bg-white text-deep-green" style="border-color: #414833;" name="complaineeLName">
                                <br>
                                <label>LAST NAME</label>
                            </div>
                            <div class="ml-10">
                                <input class="px-2 focus:outline-none border-2 w-[175px] bg-white text-deep-green" style="border-color: #414833;" name="complaineeMName">
                                <br>
                                <label>MIDDLE NAME</label>
                            </div>
                        </div>
                        <div class="mt-6 flex flex-row text-[23px]">
                            <div class="">
                                <input class="px-2 focus:outline-none border-2 w-[225px] bg-white text-deep-green" style="border-color: #414833;" name="complaineeSitio">
                                <br>
                                <label>SITIO</label>
                            </div>
                        </div>
                        <div class="mt-[3rem]">
                            <label>PURPOSE OF REQUEST</label>
                            <textarea class="px-2 focus:outline-none border-2 rounded-lg w-[650px] pl-6" style="border-color: #414833;" name="requestPurpose"> </textarea>
                        </div>
                        @elseif($doctypename == 'ACCOUNT INFORMATION CHANGE')
                        <div class="flex flex-col">
                        <input class="hidden px-2 focus:outline-none border-2 w-[225px] bg-green text-dirty-white" style="border-color: #414833;" value="17" name="selectedDocument">
                            <input class="hidden px-2 focus:outline-none border-2 w-[225px] bg-green text-dirty-white" style="border-color: #414833;" value="{{$user->id}}" name="requestee">
                            <div class="">
                                <label>SELECT INFORMATION TO CHANGE</label>
                                <select class="rounded-lg border-2 w-full h-[50px] text-[26px]" style="border-color: #414833;" name="selectedInformation">
                                    <option value="firstName">First Name</option>
                                    <option value="middleName">Middle Name</option>
                                    <option value="lastName">Last Name</option>
                                    <option value="email">Email Name</option>
                                    <option value="contactNumber">Contact Number</option>
                                </select>
                            </div>
                            <div class=" mt-10">
                                <input class="px-2 focus:outline-none border-2 w-[650px] bg-white text-deep-green" style="border-color: #414833;" value="" name="requesteeOldInformation">
                                <br>
                                <label class="mt-8">OLD INFORMATION</label>
                            </div>
                            <div class=" mt-10">
                                <input class="px-2 focus:outline-none border-2 w-[650px] bg-white text-deep-green" style="border-color: #414833;" value="" name="requesteeNewInformation">
                                <br>
                                <label class="mt-8">NEW INFORMATION</label>
                            </div>
                            <div class="mt-[3rem]">
                                <label>PURPOSE OF REQUEST</label>
                                <textarea class="px-2 focus:outline-none border-2 rounded-lg w-[650px] pl-6" style="border-color: #414833;" name="requestPurpose"> </textarea>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>

                <div class="flex flex-col ml-[5rem] mt-[3rem]">
                    <div class="mt-8 justify-center rounded-lg text-center bg-dirty-white text-deep-green border-2 border-black shadow-md w-[510px] h-[332px]">
                        @if($doctypename == 'BARANGAY CERTIFICATE')
                        <p class="py-6 text-[24px] font-semibold">REQUIREMENTS FOR THE TYPE OF CERTIFICATE</p>
                        <li class="font-poppins text-[20px] text-start ml-10 font-semibold w-[410px]">Resident Certificate</li>
                        @elseif($doctypename == 'BARANGAY CLEARANCE')
                        <p class="py-6 text-[24px] font-semibold">REQUIREMENTS FOR THE TYPE OF CERTIFICATE</p>
                        <li class="font-poppins text-[20px] text-start ml-10 font-semibold w-[410px]">Cedula</p>
                        <li class="font-poppins text-[20px] text-start ml-10 font-semibold w-[410px]">Copy of Previous Permit</p>
                        <li class="font-poppins text-[20px] text-start ml-10 font-semibold w-[410px]">Tax Declaration</p>
                        <li class="font-poppins text-[20px] text-start ml-10 font-semibold w-[410px]">Affidavit of Consent</p>
                            @elseif($doctypename == 'FILE COMPLAIN')
                            <p class="py-6 text-[24px] font-semibold">REQUIREMENT FOR FILING OF COMPLAIN</p>
                        <li class="font-poppins text-[20px] text-start ml-10 font-semibold w-[410px]">COMPLAINEE MUST BE A RESIDENT OF BARANGAY POBLACION FOR COMPLAIN TO BE PROCESSED</p>
                        <li class="font-poppins text-[20px] text-start ml-10 font-semibold w-[410px]">HEARINGS ARE ONE DONE AT BARANGAY POBLACION, DALAGUETE BARANGAY HALL.</p>
                            @elseif($doctypename == 'ACCOUNT INFORMATION CHANGE')
                            <p class="py-6 text-[24px] font-semibold">REQUIREMENT FOR ACCOUNT INFORMATION CHANGE</p>
                            <ul class="font-poppins text-[20px] text-start ml-10 font-semibold w-[410px]">FOR CHANGE OF NAME OR BIRTH OF DATE</p>
                                <li class="font-poppins text-[20px] text-start ml-10 font-semibold w-[410px] mt-2x">Amended Birth Certificate</li>
                                <li class="font-poppins text-[20px] text-start ml-10 font-semibold w-[410px] mt-4">Certificate of Finality</li>
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
                    </div>
                </div>
            </div>
        </div>
        <div class="flex flex-col -mt-[13.5rem] text-left ml-[5rem]">
            @if($doctypename != 'FILE COMPLAIN' && $doctypename != 'ACCOUNT INFORMATION CHANGE')
            <div class="w-[300px]">
                <p class="font-robotocondensed text-[24px] text-deep-green font-semibold">CERTIFICATE FEE:</p>
                <p class="font-robotocondensed text-[24px] text-deep-green font-semibold">PHP 100</p>
                <input class="hidden px-2 focus:outline-none border-2 w-[225px] bg-green text-dirty-white" style="border-color: #414833;" value="100" name="docfee">
            </div>
            <br>
            <div class="-mt-[2rem] w-max">
                <p class="mb-2 mt-4 font-robotocondensed text-[24px] text-deep-green font-semibold">Available Payment Method:</p>
                <label for="gcash" class="mr-2 font-robotocondensed text-[22px] text-deep-green font-semibold">GCASH</label>
                <input type="radio" name="paymentMethod" id="gcash" value="GCASH" class="w-[20px] h-[20px] mb-1">
                <br>
                <label for="cash-on-site" class="mr-2 font-robotocondensed text-[22px] text-deep-green font-semibold">CASH-ON-SITE</label>
                <input type="radio" name="paymentMethod" id="cash-on-site" value="CASH-ON-SITE" class="w-[20px] h-[20px] mb-1">
            </div>
            @else
            <p class="mb-2 mt-4 font-robotocondensed text-[24px] text-deep-green font-semibold underline underline-offset-8 mt-[10rem]">THIS SERVICE HAS NO CHARGE</p>
            <input class="hidden px-2 focus:outline-none border-2 w-[225px] bg-green text-dirty-white" style="border-color: #414833;" value="0" name="docfee">
            <input name="paymentMethod" id="cash-on-site" value="FREE" class="hidden w-[20px] h-[20px] mb-1">
            @endif
            <br>
            <button class="border-2 rounded-lg px-3 py-1 -mt-[5rem] ml-[70rem] font-robotocondensed text-[24px] text-deep-green font-semibold w-max hover:bg-deep-green hover:text-dirty-white" style="border-color: #414833;">PROCEED</button>
        </div>
    </form>
</x-app-layout>
@endrole