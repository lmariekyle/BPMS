@role('User')
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Barangay Health Workers') }}
        </h2>
    </x-slot>
    @php($x=0)<!--If the request is document related-->
    <div class="w-[1400px] h-[813px] font-robotocondensed text-[26px] ml-8 mt-16 border-2 border-black text-deep-green" style="">
        @if($x==1)
        <div class="text-6xl px-6 py-1 bg-green text-dirty-white">
            @php($y=1)<!--What type of document request-->
            <p class="font-bold">
                @if($y==1)
                INSERT TYPE OF REQUEST HERE
                @endif
            </p>
        </div>
        <form>
            <div class="flex flex-row">
                <div>
                    <div class="ml-12 mt-6 font-bold w-[650px]" style="">
                        <div class="" style="">
                            <label>TYPE OF CERTIFICATE</label>
                            <select class="rounded-lg border-2 w-full h-[50px] text-[26px]" style="border-color: #414833;">
                                <option value="1">Yeah</option>
                                <option value="2">Put</option>
                                <option value="3">All</option>
                                <option value="4">Available</option>
                                <option value="5">Options</option>
                                <option value="6">Here</option>
                            </select>
                        </div>
                        <div class="mt-8 flex flex-row text-[23px]">
                            <div class="" style="">
                                <input class="px-2 focus:outline-none border-2 w-[200px] bg-green text-dirty-white" style="border-color: #414833;">
                                <br>
                                <label>FIRST NAME</label>
                            </div>
                            <div class="ml-8" style="">
                                <input class="px-2 focus:outline-none border-2 w-[200px] bg-green text-dirty-white" style="border-color: #414833;">
                                <br>
                                <label>LAST NAME</label>
                            </div>
                            <div class="ml-10" style="">
                                <input class="px-2 focus:outline-none border-2 w-[175px] bg-green text-dirty-white" style="border-color: #414833;">
                                <br>
                                <label>MIDDLE NAME</label>
                            </div>
                        </div>
                        <div class="mt-6 flex flex-row text-[23px]">
                            <div class="" style="">
                                <input class="px-2 focus:outline-none border-2 w-[225px] bg-green text-dirty-white" style="border-color: #414833;">
                                <br>
                                <label>EMAIL ADDRESS</label>
                            </div>
                            <div class="ml-20" style="">
                                <input class="px-2 focus:outline-none border-2 w-[225px] bg-green text-dirty-white" style="border-color: #414833;">
                                <br>
                                <label>CONTACT NUMBER</label>
                            </div>
                        </div>
                        <div class="mt-6" style="">
                            <label>PURPOSE OF REQUEST</label>
                            <input class="px-2 focus:outline-none border-2 rounded-lg w-[650px] pl-6" style="border-color: #414833;">
                        </div>
                        <div class="mt-8 justify-center rounded-lg text-center bg-deep-green text-dirty-white h-[232px]" style="">
                            <p class="py-6">REQUIREMENTS FOR THE TYPE OF CERTIFICATE</p>
                            <p class="">Insert quote what is the requirements chuchu blah blah blah blah blah blah
                               depending on which file is requested
                            </p>
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
        @else<!--Otherwise it is a File of Complain-->
        <div class="text-6xl px-6 py-1 bg-green text-dirty-white">
            <p class="font-bold">
                FILE FOR COMPLAIN
            </p>
        </div>
        <form>
            <div class="flex flex-row">
                <div>
                    <div class="ml-12 mt-6 font-bold w-[650px]" style="">
                        <div class="px-6 py-4 border-2 h-[273px]" style="border-color: #414833;">
                            <p>COMPLAINT DETAILS:</p>
                            <div class="mt-4 flex flex-row text-[23px]">
                                <div class="" style="">
                                    <input class="px-2 focus:outline-none border-2 w-[200px]" style="border-color: #414833;">
                                    <br>
                                    <label>FIRST NAME</label>
                                </div>
                                <div class="ml-4" style="">
                                    <input class="px-2 focus:outline-none border-2 w-[200px]" style="border-color: #414833;">
                                    <br>
                                    <label>LAST NAME</label>
                                </div>
                                <div class="ml-6" style="">
                                    <input class="px-2 focus:outline-none border-2 w-[155px]" style="border-color: #414833;">
                                    <br>
                                    <label>MIDDLE NAME</label>
                                </div>
                            </div>
                            <div class="mt-6 flex flex-row text-[23px]">
                                <div class="" style="">
                                    <input class="px-2 focus:outline-none border-2 w-[225px]" style="border-color: #414833;">
                                    <br>
                                    <label>EMAIL ADDRESS</label>
                                </div>
                                <div class="ml-20" style="">
                                    <input class="px-2 focus:outline-none border-2 w-[225px]" style="border-color: #414833;">
                                    <br>
                                    <label>CONTACT NUMBER</label>
                                </div>
                            </div>
                        </div>
                        <div class="mt-6 text-center" style="">
                            <label class="text-center">STATE REASON FOR FILING COMPLAIN:</label>
                        </div>
                        <div>
                            <textarea class="focus:outline-none border-2 w-[650px] h-[300px] text-[23px] mt-4" style="border-color: #414833;"></textarea>
                        </div>
                    </div>
                </div>
                <div class="ml-4 mt-6 font-bold text[23px]">
                    <div class="px-6 py-4 border-2" style="border-color: #414833;">
                            <p>COMPLAINEE DETAILS:</p>
                            <div class="mt-4 flex flex-row text-[23px]">
                                <div class="" style="">
                                    <input class="px-2 focus:outline-none border-2 w-[200px]" style="border-color: #414833;">
                                    <br>
                                    <label>FIRST NAME</label>
                                </div>
                                <div class="ml-4" style="">
                                    <input class="px-2 focus:outline-none border-2 w-[200px]" style="border-color: #414833;">
                                    <br>
                                    <label>LAST NAME</label>
                                </div>
                                <div class="ml-6" style="">
                                    <input class="px-2 focus:outline-none border-2 w-[155px]" style="border-color: #414833;">
                                    <br>
                                    <label>MIDDLE NAME</label>
                                </div>
                            </div>
                            <div class="mt-6 flex flex-row text-[23px]">
                                <div class="" style="">
                                    <select class="border-2 w-[300px] h-[50px] text-[26px]" style="border-color: #414833;">
                                        <option value="1">Yeah</option>
                                        <option value="2">Put</option>
                                        <option value="3">All</option>
                                        <option value="4">Available</option>
                                        <option value="5">Options</option>
                                        <option value="6">Here</option>
                                    </select>
                                    <br>
                                    <label>SITIO</label>
                                </div>
                            </div>
                    </div>
                    <div class="mt-6 px-4 justify-center rounded-lg text-center bg-deep-green text-dirty-white h-[232px] w-[645px]" style="">
                            <p class="py-6">REQUIREMENTS FOR FILING OF COMPLAIN</p>
                            <p class="text-[18px]">COMPLAINS MUST BE A RESIDENT OF BARANGAY POBLACION FOR COMPLAIN TO BE PROCESSED</p>
                            <p class="mt-6 text-[18px]">HEARINGS ARE DONE AT BARANGAY POBLACION, DALAGUETE BARANGAY HALL</p>
                        </div>
                    <div class="mt-4 text-right" style="">
                        <div>
                            <p>SERVICE FEE:</p>
                            <p>
                                PHP 0.00
                            </p>
                        </div>
                        <button class="border-2 rounded-lg font-bold px-3 py-1" style="border-color: #414833;">PROCEED</button>
                    </div>
                </div>
            </div>
        </form>
        @endif
    </div>
</x-app-layout>
@endrole