<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Resident') }}
        </h2>
    </x-slot>

    <form method="POST" action="{{route('services.storerequest' , $doctypename)}}" enctype="multipart/form-data">
        @csrf
        <div class="ml-8">

        @include('components.flash')
        </div>
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
                            @if($doctypename == 'BARANGAY CERTIFICATE')
                            <label>TYPE OF CERTIFICATE</label>
                            @elseif($doctypename == 'BARANGAY CLEARANCE')
                            <label>TYPE OF CLEARANCE</label>
                            @endif
                            <select class="rounded-lg border-2 w-full h-[50px] text-[26px]" style="border-color: #414833;" name="selectedDocument" id="selectedDocument">
                                @foreach($documents as $document)
                                <option value="{{$document->id}}">{{$document->docName}}</option>
                                @endforeach
                            </select>
                        </div>
                        <p class="font-poppins text-[24px] text-deep-green mt-[2rem] underline underline-offset-8">REQUESTEE INFORMATION</p>
                        <div class="mt-[1rem] flex flex-row text-[23px]">
                            <div class="">
                                <!-- <input type="hidden" name="requesteeFName" value="{{$user->firstName}}"> -->
                                <input class="px-2 focus:outline-none border-2 w-[200px] bg-white text-deep-green" style="border-color: #414833;" value="{{$user->firstName}}" name="requesteeFName" required >
                                <br>
                                <label>* FIRST NAME</label>
                            </div>
                            <div class="ml-8">
                                <!-- <input type="hidden" name="requesteeLName" value="{{$user->lastName}}"> -->
                                <input class="px-2 focus:outline-none border-2 w-[200px] bg-white text-deep-green" style="border-color: #414833;" value="{{$user->lastName}}" name="requesteeLName" required >
                                <br>
                                <label>* LAST NAME</label>
                            </div>
                            <div class="ml-10">
                                <input type="hidden" name="requesteeMName" value="{{$user->middleName}}">
                                <input class="px-2 focus:outline-none border-2 w-[175px] bg-white text-deep-green" style="border-color: #414833;" value="{{$user->middleName}}" name="requesteeMName">
                                <br>
                                <label>MIDDLE NAME</label>
                            </div>
                        </div>
                        <div class="mt-6 flex flex-row text-[23px]">
                            <div class="">
                                <input class="px-2 focus:outline-none border-2 w-max bg-white text-deep-green" style="border-color: #414833;" value="{{$userAuth->email}}" name="requesteeEmail" required>
                                <br>
                                <label>* EMAIL ADDRESS</label>
                            </div>
                            <div class="ml-20">
                                <input class="px-2 focus:outline-none border-2 w-[225px] bg-white text-deep-green" style="border-color: #414833;" value="{{$userAuth->contactNumber}}" name="requesteeContactNumber" required>
                                <br>
                                <label>* CONTACT NUMBER</label>
                            </div>
                        </div>
                        <div class="mt-[3rem]">
                            <!-- <label>* PURPOSE OF REQUEST</label> -->
                            <div id="requirementsContainer" class="text-[22px]">
                             <!-- Placeholder for requirements to be added dynamically -->
                            </div>
                            <textarea class="px-2 focus:outline-none border-2 rounded-lg w-[650px] pl-6" style="border-color: #414833;" name="requestPurpose" required>{{ old('requestPurpose') }}</textarea>
                            <div id="notesContainer" class="text-[18px] italic"></div>
                        </div>
                        @elseif ($doctypename == 'FILE COMPLAIN')
                        <input class="hidden px-2 focus:outline-none border-2 w-[225px] bg-green text-dirty-white" style="border-color: #414833;" value="7" name="selectedDocument">
                        <p class="font-poppins text-[24px] text-deep-green mt-[2rem] underline underline-offset-8">COMPLAINANT DETAILS</p>
                        <p class="font-poppins text-[14px] text-deep-green italic">(ANG NAG REKLAMO)</p>
                        <div class="mt-[1rem] flex flex-row text-[23px]">
                            <div class="">
                                <input class="px-2 focus:outline-none border-2 w-[200px] bg-white text-deep-green" style="border-color: #414833;" name="complaintFName" value="{{$user->firstName}}" required>
                                <br>
                                <label>* FIRST NAME</label>
                            </div>
                            <div class="ml-8">
                                <input class="px-2 focus:outline-none border-2 w-[200px] bg-white text-deep-green" style="border-color: #414833;" name="complaintLName" value="{{$user->lastName}}" required>
                                <br>
                                <label>* LAST NAME</label>
                            </div>
                            <div class="ml-10">
                                <input class="px-2 focus:outline-none border-2 w-[175px] bg-white text-deep-green" style="border-color: #414833;" name="complaintMName" value="{{$user->middleName}}">
                                <br>
                                <label>MIDDLE NAME</label>
                            </div>
                        </div>
                        <div class="mt-6 flex flex-row text-[23px]">
                            <div class="">
                                <input class="px-2 focus:outline-none border-2 w-max bg-white text-deep-green" style="border-color: #414833;" name="complaintEmail" value="{{$userAuth->email}}" required>
                                <br>
                                <label>* EMAIL ADDRESS</label>
                            </div>
                            <div class="ml-20">
                                <input class="px-2 focus:outline-none border-2 w-[225px] bg-white text-deep-green" style="border-color: #414833;" name="complaintContactNumber" value="{{$user->contactNumber}}" required>
                                <br>
                                <label>* CONTACT NUMBER</label>
                            </div>
                        </div>
                        <p class="font-poppins text-[24px] text-deep-green mt-[2rem] underline underline-offset-8">COMPLAINEE DETAILS</p>
                        <p class="font-poppins text-[14px] text-deep-green italic">(ANG GI REKLAMO)</p>
                        <div class="mt-[1rem] flex flex-row text-[23px]">
                            <div class="">
                                <input class="px-2 focus:outline-none border-2 w-[200px] bg-white text-deep-green" style="border-color: #414833;" name="complaineeFName" required>
                                <br>
                                <label>* FIRST NAME</label>
                            </div>
                            <div class="ml-8">
                                <input class="px-2 focus:outline-none border-2 w-[200px] bg-white text-deep-green" style="border-color: #414833;" name="complaineeLName" required>
                                <br>
                                <label>* LAST NAME</label>
                            </div>
                            <div class="ml-10">
                                <input class="px-2 focus:outline-none border-2 w-[175px] bg-white text-deep-green" style="border-color: #414833;" name="complaineeMName">
                                <br>
                                <label>MIDDLE NAME</label>
                            </div>
                        </div>
                        <div class="mt-6 flex flex-row text-[23px]">
                            <div class="">
                                <input class="px-2 focus:outline-none border-2 w-[225px] bg-white text-deep-green" style="border-color: #414833;" name="complaineeContactNumber" required>
                                <br>
                                <label>* CONTACT NUMBER</label>
                            </div>
                            <div class="ml-8">
                                <input class="px-2 focus:outline-none border-2 w-[225px] bg-white text-deep-green" style="border-color: #414833;" name="complaineeSitio" required>
                                <br>
                                <label>* SITIO</label>
                            </div>
                        </div>
                        <div class="mt-[2rem]">
                            <label>* STATE REASON OF COMPLAIN</label>
                            <textarea class="px-2 focus:outline-none border-2 rounded-lg w-[650px] pl-6" style="border-color: #414833;" name="requestPurpose" required>{{ old('requestPurpose') }}</textarea>
                        </div>
                        @elseif($doctypename == 'ACCOUNT INFORMATION CHANGE')
                        <div class="flex flex-col">
                        <input class="hidden px-2 focus:outline-none border-2 w-[225px] bg-green text-dirty-white" style="border-color: #414833;" value="8" name="selectedDocument">
                            <input class="hidden px-2 focus:outline-none border-2 w-[225px] bg-green text-dirty-white" style="border-color: #414833;" value="{{$user->id}}" name="requestee">
                            <div class="">
                                <label>* INFORMATION TO CHANGE</label>
                                <select class="rounded-lg border-2 w-full h-[50px] text-[26px]" id="info-type" style="border-color: #414833;" name="selectedInformation" required>
                                    <option value="">SELECT INFORMATION</option>
                                    <option value="email">Email</option>
                                    <option value="contactNumber">Contact Number</option>
                                </select>
                            </div>
                            <div class="mt-10">
                                    <!-- <div id="current-info-container" class="px-2 py-2 focus:outline-none border-2 w-[650px] h-[50px] bg-white text-deep-green" style="border-color: #414833;" name="requesteeOldInformation">
                            
                                    </div> -->
                                    <input id="info-input" class="px-2 focus:outline-none border-2 w-[650px] bg-white text-deep-green" style="border-color: #414833;" name="requesteeOldInformation">
                                <label id="current-info-label"></label>
                            </div>
                            <div class=" mt-10">
                                <input class="px-2 focus:outline-none border-2 w-[650px] bg-white text-deep-green" style="border-color: #414833;" value="" name="requesteeNewInformation">
                                <br>
                                <label class="mt-8">* NEW INFORMATION</label>
                            </div>
                            <div class="mt-[3rem]">
                                <label>* PURPOSE OF REQUEST</label>
                                <textarea class="px-2 focus:outline-none border-2 rounded-lg w-[650px] pl-6" style="border-color: #414833;" name="requestPurpose" required>{{ old('requestPurpose') }}</textarea>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>

                <div class="flex flex-col ml-[5rem] mt-[3rem]">
                    <div class="mt-8 justify-center rounded-lg text-center bg-dirty-white text-deep-green border-2 border-black shadow-md w-max h-max px-4 py-8">
                        @if($doctypename == 'BARANGAY CERTIFICATE')
                        <p class="text-[24px] font-semibold">REQUIREMENTS FOR THE TYPE OF CERTIFICATE</p>
                        <ul class="list-disc mt-4">
                            <li class="font-poppins text-[20px] text-start ml-10 font-semibold w-[410px]">Resident Certificate</li>
                        </ul>
                        @elseif($doctypename == 'BARANGAY CLEARANCE')
                        <p class="text-[24px] font-semibold">REQUIREMENT FOR BUSINESS PERMIT</p>
                        <ul class="list-disc mt-4">
                            <li class="font-poppins text-[20px] text-start ml-10 font-semibold w-[410px]">Cedula</p>
                        </ul>

                            @elseif($doctypename == 'FILE COMPLAIN')
                            <p class="text-[24px] font-semibold">REQUIREMENT FOR FILING OF COMPLAIN</p>
                            <ul class="list-disc ml-16 mt-4">
                                <li class="font-poppins text-[16px] text-start ml-10 font-semibold w-[410px]">COMPLAINEE MUST BE A RESIDENT OF BARANGAY POBLACION FOR COMPLAIN TO BE PROCESSED</p>
                                <li class="font-poppins text-[16px] text-start ml-10 font-semibold w-[410px]">HEARINGS ARE ONE DONE AT BARANGAY POBLACION, DALAGUETE BARANGAY HALL.</p>
                           
                                <li class="font-poppins text-[16px] text-start ml-10 font-semibold w-[410px]">DEPENDE SA RASON NGA GI-FILE SA IMONG KASO SA LUPON, MAHIMO NGA PANGAYUON SA OPISINA SA BARANGAY ANG IMONG MGA DOKUMENTO ALANG SA PROSESO. KON APRUBAHAN NA ANG IMONG HANGYO, MANGAYO KAMI OG IMONG KOORDINASYON ARON MA-SUBMIT ANG MGA KINAHANGLANON NGA DOKUMENTO SA OPISINA SA BARANGAY. MAKADAWAT KA OG PAHIBALO SA IMONG PROFILE HUMAN MATAPUS ANG TANAN. SALAMAT SA IMONG PAGTINABANGAY!</p>
                        </ul>   
                        @elseif($doctypename == 'ACCOUNT INFORMATION CHANGE')
                            <p class="text-[22px] font-semibold">REQUIREMENT FOR ACCOUNT INFORMATION CHANGE</p>
                            <!-- <p class="font-poppins text-[20px] text-start ml-10 mt-4 font-semibold w-[410px]">FOR CHANGE OF NAME OR BIRTH OF DATE:</p> -->
                            <ul class="list-disc ml-12">
                                <li class="font-poppins text-[20px] text-start ml-10 font-semibold w-[410px] mt-2">NO REQUIREMENTS</li>
                                <!-- <li class="font-poppins text-[20px] text-start ml-10 font-semibold w-[410px] mt-4">Certificate of Finality</li> -->
                            </ul>
                            <div class="py-1">
                                <!-- <p class="text-right mr-[7rem] font-extralight italic text-[16px]">Note: Requirements may vary depending of type of document</p> -->
                            </div>
                        @endif
                    </div>
                    @if ($doctypename == 'BARANGAY CERTIFICATE' || $doctypename == 'BARANGAY CLEARANCE')
                    <div class="ml-[0.25rem] mt-[3rem] font-text[23px]">
                        <div class="h-[300px] w-[605px]">
                            <input type="file" id="fileButton" name="file[]" required>
                            <!-- <p class="mt-1 font-extralight italic text-[16px]">Note: Upload any necessary documents stated in the requirements</p> -->
                        </div>
                    </div>
                    @else
                    <div class="ml-[0.25rem] mt-[3rem] font-text[23px]">
                        <div class="h-[300px] w-[505px]">
                            <p class="mt-1 font-extralight text-[16px]"></p>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
            <div class="flex flex-col text-left ml-[3rem] -mt-[2rem]">
            @if($doctypename != 'FILE COMPLAIN' && $doctypename != 'ACCOUNT INFORMATION CHANGE')
                @if($doctypename == 'BARANGAY CLEARANCE')
                <div class="w-[300px] mt-[3rem]">
                    <p class="font-robotocondensed text-[24px] text-deep-green font-semibold">CERTIFICATE FEE:</p>
                    <!-- <p class="font-robotocondensed text-[24px] text-deep-green font-semibold">PHP 100</p> -->
                    <div id="feeContainer" class="text-[22px] italic"></div>
                    <input class="hidden px-2 focus:outline-none border-2 w-[225px] bg-green text-dirty-white" style="border-color: #414833;" value="100" name="docfee">
                </div>
                @elseif($doctypename == 'BARANGAY CERTIFICATE')
                <div class="w-[300px] mt-[3.5rem]">
                    <p class="font-robotocondensed text-[24px] text-deep-green font-semibold">CERTIFICATE FEE:</p>
                    <!-- <p class="font-robotocondensed text-[24px] text-deep-green font-semibold">PHP 100</p> -->
                    <div id="feeContainer" class="text-[18px] italic"></div>
                    <input class="hidden px-2 focus:outline-none border-2 w-[225px] bg-green text-dirty-white" style="border-color: #414833;" value="100" name="docfee">
                </div>
                @endif
            <br>
            <div class="-mt-[2rem] w-max" id="paymentForm">
                <p class="mb-2 mt-4 font-robotocondensed text-[24px] text-deep-green font-semibold">Available Payment Method:</p>
                <label for="gcash" class="mr-2 font-robotocondensed text-[22px] text-deep-green font-semibold">GCASH</label>
                <input type="radio" name="paymentMethod" id="gcash" value="GCASH" class="w-[20px] h-[20px] mb-1" required>
                <br>
                <label for="cash-on-site" class="mr-2 font-robotocondensed text-[22px] text-deep-green font-semibold">CASH ON PICK-UP</label>
                <input type="radio" name="paymentMethod" id="cash-on-site" value="Cash-on-PickUp" class="w-[20px] h-[20px] mb-1" required>
            </div>
            @else
            <p class="mb-2 font-robotocondensed text-[24px] text-deep-green font-semibold underline underline-offset-8 -mt-[1rem]">THIS SERVICE HAS NO CHARGE</p>
            <input class="hidden px-2 focus:outline-none border-2 w-[225px] bg-green text-dirty-white" style="border-color: #414833;" value="0" name="docfee">
            <input name="paymentMethod" id="cash-on-site" value="FREE" class="hidden w-[20px] h-[20px] mb-1">
            @endif
            <br>
            <button class="border-2 rounded-lg px-3 py-1 -mt-[1rem] ml-[75rem] font-robotocondensed text-[24px] text-deep-green font-semibold w-max hover:bg-deep-green hover:text-dirty-white" style="border-color: #414833;">PROCEED</button>
        </div>
        </div>
        
    </form>

</x-app-layout>