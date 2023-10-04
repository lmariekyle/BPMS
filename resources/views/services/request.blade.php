@role('User')
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Barangay Health Workers') }}
        </h2>
    </x-slot>

    <div class="w-[1400px] h-[813px] font-robotocondensed text-[26px] ml-8 mt-16 border-2 border-black text-deep-green">

        <div class="text-6xl px-6 py-1 bg-green text-dirty-white">

            <p class="font-bold">
                {{$doctypename}}
            </p>
        </div>
        <form>
            <div class="flex flex-row">
                <div>
                    <div class="ml-12 mt-6 font-bold w-[650px]">
                        <div class="">
                            <label>TYPE OF CERTIFICATE</label>
                            <select class="rounded-lg border-2 w-full h-[50px] text-[26px]" style="border-color: #414833;">
                                @foreach($documents as $document)
                                <option value="{{$document->id}}">{{$document->docName}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mt-8 flex flex-row text-[23px]">
                            <div class="">
                                <input class="px-2 focus:outline-none border-2 w-[200px] bg-green text-dirty-white" style="border-color: #414833;" value="{{$user->firstName}}" name="requesteeFName">
                                <br>
                                <label>FIRST NAME</label>
                            </div>
                            <div class="ml-8">
                                <input class="px-2 focus:outline-none border-2 w-[200px] bg-green text-dirty-white" style="border-color: #414833;" value="{{$user->lastName}}" name="requesteeLName">
                                <br>
                                <label>LAST NAME</label>
                            </div>
                            <div class="ml-10">
                                <input class="px-2 focus:outline-none border-2 w-[175px] bg-green text-dirty-white" style="border-color: #414833;" value="{{$user->middleName}}" name="requesteeMName">
                                <br>
                                <label>MIDDLE NAME</label>
                            </div>
                        </div>
                        <div class="mt-6 flex flex-row text-[23px]">
                            <div class="">
                                <input class="px-2 focus:outline-none border-2 w-[225px] bg-green text-dirty-white" style="border-color: #414833;" value="{{$user->email}}" name="requesteeEmail">
                                <br>
                                <label>EMAIL ADDRESS</label>
                            </div>
                            <div class="ml-20">
                                <input class="px-2 focus:outline-none border-2 w-[225px] bg-green text-dirty-white" style="border-color: #414833;" value="{{$user->contactNumber}}" name="requesteeContactNumber">
                                <br>
                                <label>CONTACT NUMBER</label>
                            </div>
                        </div>
                        <div class="mt-6" style="">
                            <label>PURPOSE OF REQUEST</label>
                            <textarea class="px-2 focus:outline-none border-2 rounded-lg w-[650px] pl-6" style="border-color: #414833;" name="requestPurpose"> </textarea>
                        </div>
                        <div class="mt-8 justify-center rounded-lg text-center bg-deep-green text-dirty-white h-[232px]" style="">
                            <p class="py-6">REQUIREMENTS FOR THE TYPE OF CERTIFICATE</p>
                            @if($doctypename == 'BARANGAY CERTIFICATE')
                            <p class="">Resident Certificate</p>
                            @elseif($doctypename == 'BARANGAY CLEARANCE')
                            <p class="">Cedula</p>
                            <p class="">Copy of Previous Permit</p>
                            <p class="">Tax Declaration</p>
                            <p class="">Affidavit of Consent</p>
                            @endif
                        </div>
                        <div class="py-1">
                            <p class="text-right mr-1 font-extralight italic text-[16px]">Note: Requirements may vary depending of type of document</p>
                        </div>
                    </div>
                </div>
                <div class="ml-12 mt-16 font-text[23px]">
                    <div class="h-[300px] w-[605px]" style="">
                        <input type="file" id="fileButton" style="" multiple>
                        <p class="mt-1 font-extralight italic text-[16px]">Note: Upload any necessary documents stated in the requirements</p>
                    </div>
                    <div class="mt-6 text-right" style="">
                        <div>
                            <p>CERTIFICATE FEE:</p>
                            @php($y=1)<!--If the price varies on each type of doc. If not remove this condition-->
                            <p>
                                @if($y==1)
                                PHP 100.00
                                @endif
                            </p>
                        </div>
                        <br>
                        <div class="mb-6">
                            <p>SELECT PAYMENT TYPE:</p>
                            <label>GCASH</label>
                            <input type="radio">
                            <br>
                            <label>CASH-ON-SITE</label>
                            <input type="radio">
                        </div>
                        <button class="border-2 rounded-lg font-bold px-3 py-1" style="border-color: #414833;">PROCEED</button>
                    </div>
                </div>
            </div>
        </form>

    </div>
</x-app-layout>
@endrole