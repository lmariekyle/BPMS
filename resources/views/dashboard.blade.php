<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-1 mt-[8rem] flex flex-col justify-center bg-dirty-white">
        <div class="max-w-7xl  mx-auto sm:px-6 lg:px-8">
        @role('Admin')
            <div class="bg-green w-[450px] h-[80px] text-center py-2 my-9">
                    <!-- <div class="admin-container self-center">
                        <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Create Account</a>
                    </div> -->
                    <a href="{{ route('accounts') }}" class="font-robotocondensed text-[40px] text-dirty-white text-center">MANAGE ACCOUNTS</a>
            </div>
            <div class="bg-green w-[450px] h-[80px] text-center py-2 my-9">
                    <!-- <div class="admin-container self-center">
                        <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Create Account</a>
                    </div> -->
                    <a href="{{ route('register') }}" class="font-robotocondensed text-[40px] text-dirty-white text-center">MANAGE REQUESTS</a>
            </div>

            <!-- Authentication -->
            <div class="bg-green h-[40px] w-[140px] text-center ml-36">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('LOGOUT') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        @endrole

        @role('Barangay Captain')
        <div class="p-3 -mt-20 -ml-24 h-max w-[1342px] bg-dirty-white border-2 border-deep-green rounded-xl shadow-3xl ">

            <div class=" flex flex-row px-4 py-3 items-center justify-between h-16 w-[1250px] ml-3 mt-3">

                <div class="bg-transparent h-16 w-40">
                    <x-label for="sitio" :value="__('Sitio')" />
                    <select id="sitio" class="rounded-lg border-2 mt-1 w-full bg-dirty-white" name="sitio" :value="old('sitio')" required autofocus>
                        <option value="sitioName"></option>
                    </select>
                </div>

                <div class="bg-transparent h-16 w-40">
                    <x-label for="gender" :value="__('Gender')" />
                    <select id="gender" class="rounded-lg border-2 mt-1 w-full bg-dirty-white" name="gender" :value="old('gender')" required autofocus>
                        <option value="genderName"></option>
                    </select>
                </div>

                <div class="bg-transparent h-16 w-max">
                    <x-label for="ageclass" :value="__('Age Classification')" />
                    <select id="ageclass" class="rounded-lg border-2 mt-1 w-40 bg-dirty-white" name="ageclass" :value="old('ageclass')" required autofocus>
                        <option value="ageclassName"></option>
                    </select>
                </div>

                <a href=""><i class="fa-solid fa-filter text-deep-green text-[28px] ml-96"></i></a>
                <a href=""><i class="fa-solid fa-print text-deep-green text-[28px]"></i></a>

            </div>

            <p class="font-robotocondensed mt-16 text-4xl p-3 text-deep-green text-center">BARANGAY POBLACION,DALAGUETE 2020 CENSUS DATA</p>
        
            <div class="mt-0.5 ml-60 grid grid-cols-2 justify-center p-3">

                <div class="bg-dirty-white mt-16 h-64 w-80 border-2 border-deep-green shadow-inner rounded-xl">
                    <div class="-mt-[20px] mx-12 h-12 w-fit bg-olive-green border-2 border-green rounded-xl px-3 py-3">
                        <h1 class="font-robotocondensed text-base text-dirty-white text-center">TOTAL RESIDENTS PER SITIO</h1>
                    </div>
                </div>

                <div class="bg-dirty-white mt-16 h-64 w-80 border-2 border-deep-green shadow-inner rounded-xl">
                    <div class="-mt-[20px] mx-12 h-12 w-max bg-olive-green border-2 border-green rounded-xl px-3 py-3">
                        <h1 class="font-robotocondensed text-base text-dirty-white text-center">TOTAL HOUSEHOLDS PER SITIO</h1>
                    </div>
                </div>

                <div class="bg-dirty-white mt-16 h-64 w-80 border-2 border-deep-green shadow-inner rounded-xl">
                        <h1 class="font-robotocondensed text-base text-deep-green text-center">TOTAL RESIDENTS</h1> 
                </div>

                <div class="bg-dirty-white mt-16 h-64 w-80 border-2 border-deep-green shadow-inner rounded-xl">
                        <h1 class="font-robotocondensed text-base text-deep-green text-center">TOTAL HOUSEHOLDS</h1>
                </div>
            </div>

                            <!-- TEMPORARY LOGOUT!! -->
                            <div class="bg-green h-[40px] w-[140px] text-center ml-36">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('LOGOUT') }}
                    </x-responsive-nav-link>
                </form>

            </div>
        </div>
        @endrole
        

        @role('User')
            <div class="w-max h-max grid grid-rows-2 grid-flow-col gap-16 -ml-32 -mt-20 px-5 py-5 justify-between font-bold">
                <div class="bg-dirty-white w-[472px] h-[421px] border">
                    <p class="bg-green font-robotocondensed text-[24px] text-dirty-white border border-deep-green px-1 py-1 text-center">BARANGAY CERTIFICATE</p>
                    <p class="bg-olive-green mt-3 font-robotocondensed text-[18px] text-dirty-white border border-deep-green text-start px-1">PURPOSES BARANGAY CERTIFICATION:</p>
                    <ul class="ml-10 mt-2 list-disc font-roboto text-deep-green">
                        <li>Good Moral Character</li>
                        <li>Senior Citizen</li>
                        <li>Financial Assistance</li>
                        <li>Low Income</li>
                        <li>Indigency</li>
                        <li>Late Registration</li>
                        <li>Cutting/Transport of Trees</li>
                        <li>Others</li>
                    </ul>
                    <p class="bg-olive-green mt-3 font-robotocondensed text-[18px] text-dirty-white border border-deep-green text-start px-1">REQUIREMENTS</p>
                    <ul class="ml-10 mt-2 list-disc font-roboto text-deep-green">
                        <li>Residence Certificate</li>
                    </ul>
                    <div class="mt-16">
                    <x-button class="button">
                        Request Barangay Certificate
                    </x-button>
                    </div>
                </div>
                <div class="bg-dirty-white w-[472px] h-[300px] border">
                    <p class="bg-green font-robotocondensed text-[24px] text-dirty-white border border-deep-green px-1 py-1 text-center">FILING OF COMPLAINTS</p>
                    <p class="bg-olive-green mt-3 font-robotocondensed text-[18px] text-dirty-white border border-deep-green text-start px-1">PURPOSE:</p>
                    <ul class="ml-10 mt-2 list-disc font-roboto text-deep-green">
                        <li>Settlement</li>
                    </ul>
                    <p class="bg-olive-green mt-3 font-robotocondensed text-[18px] text-dirty-white border border-deep-green text-start px-1">REQUIREMENTS</p>
                    <ul class="ml-10 mt-2 list-disc font-roboto text-deep-green">
                        <li>Complainant can either be a resident or not a resident of Barangay Poblacion</li>
                        <li>Complainee must be a resident of Barangay Poblacion</li>
                    </ul>
                    <div class="mt-16">
                    <x-button class="button">
                        File Complain
                    </x-button>
                    </div>
                </div>
                <div class="bg-dirty-white w-max h-[421px] border">
                    <p class="bg-green font-robotocondensed text-[24px] text-dirty-white border border-deep-green px-1 py-1 text-center">BARANGAY CLEARANCE</p>
                    <p class="bg-olive-green mt-3 font-robotocondensed text-[18px] text-dirty-white border border-deep-green text-start px-1">PURPOSE:</p>
                    <ul class="ml-10 mt-2 list-disc font-roboto text-deep-green">
                        <li>Business/Mayor's Permit</li>
                        <li>Building Permit</li>
                        <li>Fencing Permit</li>
                        <li>Electrical Permit</li>
                        <li> Others</li>
                    </ul>
                    <p class="bg-olive-green mt-3 font-robotocondensed text-[18px] text-dirty-white border border-deep-green text-start px-1">REQUIREMENTS</p>
                    <ul class="ml-10 mt-2 mr-2 list-disc font-roboto text-deep-green">
                        <li>Cedula</li>
                        <li>Copy of the previous permit (If Any) for Building, Fencing, Electrical Permit</li>
                        <li>Tax Declaration or Lot Title (If the applicant is not the registered owner of the lot) </li>
                        <li>Affidavit of consent, deed of sale, or contact whichever is applicable</li>
                    </ul>
                    <div class="mt-16">
                    <x-button class="button">
                        Request Barangay Clearance
                    </x-button>
                    </div>
                </div>
                <div class="bg-dirty-white w-[620px] h-[300px] border">
                    <p class="bg-green font-robotocondensed text-[24px] text-dirty-white border border-deep-green px-1 py-1 text-center">PERSONAL INFORMATION CHANGE</p>
                    <p class="bg-olive-green mt-3 font-robotocondensed text-[18px] text-dirty-white border border-deep-green text-start px-1">PURPOSE:</p>
                    <ul class="ml-10 mt-2 list-disc font-roboto text-deep-green">
                        <li>Up-to-date Personal Record</li>
                    </ul>
                    <p class="bg-olive-green mt-3 font-robotocondensed text-[18px] text-dirty-white border border-deep-green text-start px-1">REQUIREMENTS</p>
                    <ul class="ml-10 mt-2 mr-2 list-disc font-roboto text-deep-green">
                        <li>Supporting Documents that will validate the requested change</li>
                    </ul>
                    <div class="mt-28">
                    <x-button class="button">
                        Request Personal Information Change
                    </x-button>
                    </div>
                </div>
            </div>
        @endrole

        </div>
    </div>
</x-app-layout>
