
    <x-page-layout>

            <div class="absolute left-[33px] top-[49px] flex justify-start">
                <a href="/">
                    <i class="fa-sharp fa-solid fa-arrow-left text-3xl mt-4" style="color:#fdffee;"></i>
                </a>
                <p class="font-robotocondensed font-bold ml-[20px] text-dirty-white text-5xl">Register</p>
                <div class="ml-12 mt-3">
                            @include('components.flash')
                </div>
            </div>


        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />
        
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <script src="{{ asset('js/app.js') }}" defer></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

        <form method="POST" action="{{ route('create') }}" class="font-robotocondensed" enctype="multipart/form-data">
            @csrf

            <div class="absolute left-36 top-[143px] text-2xl">
                <!-- Name -->
                <div>
                    <!-- <x-label for="idNumber" :value="__('ID Number')" /> -->

                    <x-input id="idNumber" class="mt-1 w-full hidden" type="text" name="idNumber" :value="00000" readonly="readonly" required autofocus />
                </div>

                

                <div>
                    <x-label for="firstname" :value="__('First Name')" class="font-roboto" style="color:white;"/>

                    <x-input id="firstname" class="block mb-4 w-[500px] h-[42px] bg-dirty-white" type="text" name="firstname" :value="old('firstname')" required autofocus />
                </div>

                <div>
                    <x-label for="middlename" :value="__('Middle Name')" class="font-roboto" style="color:white;"/>

                    <x-input id="middlename" class="block mb-4 w-[500px] h-[42px] bg-dirty-white" type="text" name="middlename" :value="old('middlename')" required autofocus />
                </div>

                <div>
                    <x-label for="lastname" :value="__('Last Name')" class="font-roboto" style="color:white;"/>
        
                    <x-input id="lastname" class="block mb-4 w-[500px] h-[42px] bg-dirty-white" type="text" name="lastname" :value="old('lastname')" required autofocus />
                </div>

                <div>
                    <x-label for="dateOfBirth" :value="__('Date of Birth')" class="font-roboto" style="color:white;"/>

                    <x-input id="dateOfBirth" class="block mb-4 w-52 h-[42px] bg-dirty-white" type="date" name="dateOfBirth" :value="old('dateOfBirth')" required autofocus />
                </div>

                <div>
                    <x-label for="contactnumber" :value="__('Contact Number')" class="font-roboto" style="color:white;"/>

                    <x-input id="contactnumber" class="block mb-4 w-[500px] h-[42px] bg-dirty-white" type="text" name="contactnumber" :value="old('contactnumber')" required autofocus />
                </div>

                <div>
                    <x-label for="barangay" :value="__('Barangay')" class="font-roboto" style="color:white;"/>

                    <x-input id="barangay" class="block mb-4 w-[500px] h-[42px] bg-dirty-white" type="text" name="barangay" :value="'Poblacion'" readonly="readonly" required autofocus />
                </div>

                <div>
                    <x-label for="sitio" :value="__('Sitio')" class="font-roboto" style="color:white;"/>
                    <select id="sitio" class="block mb-4 w-[500px] h-[42px] bg-dirty-white rounded border-1" name="sitio" :value="old('sitio')" required autofocus>
                        @foreach($sitios as $sitio)
                        <option value="{{$sitio->id}}">{{$sitio->sitioName}}</option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <!-- <x-label for="userlevel" :value="__('Account Type')" /> -->
                    <x-input id="userlevel" class="mt-1 w-full hidden" type="text" name="userlevel" :value="'User'" readonly="readonly" required autofocus />       
                </div>

                <div class="mt-4">
                    <x-label for="email" :value="__('Email')" class="font-roboto" style="color:white;"/>

                    <x-input id="email" class="block mb-4 w-[500px] h-[42px] bg-dirty-white" type="email" name="email" :value="old('email')" required />
                </div>

                <!-- Password -->
                
                <div class="mt-4">
                    <x-label for="password" :value="__('Password')" class="font-roboto" style="color:white;"/>
                    <div class="input-group">
                        <x-input id="password" class="form-control block mb-4 w-[500px] h-[42px] bg-dirty-white"
                                        type="password"
                                        name="password"
                                        required autocomplete="new-password" 
                        />
                    </div>
                </div>

                <!-- Confirm Password -->
                <div class="mt-4">
                    <x-label for="password_confirmation" :value="__('Confirm Password')" class="font-roboto" style="color:white;"/>
                    <div class="input-group">
                        <x-input id="password_confirmation" class="form-control block mb-4 w-[500px] h-[42px] bg-dirty-white"
                                        type="password"
                                        name="password_confirmation" required />
                    </div>
                </div>

                <div class="w-[13rem] h-[8rem]">
                    <!-- <i class="fa-solid fa-image text-[200px] text-dirty-white"></i> -->
                    <x-label for="profileImage" :value="__('Profile Image')" class="font-roboto" style="color:white;"/>
                    <div>
                        <input id="profileImage" class="-mt-[5px] w-[15rem] h-[42px] px-2 py-2 text-center text-[14px] text-dirty-white file:w-[7rem] file:h-[42px]file:overflow-hidden file:bg-deep-green file:text-[14px] file:text-dirty-white file:font-robotocondensed file:cursor-pointer" type="file" name="profileImage"/>
                    </div>
                </div>
                <!-- 
                    <div class="flex items-center justify-end mt-4">
                        <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                            {{ __('Already registered?') }}
                        </a>
                    </div>
                -->
            </div>
            <div class="absolute left-[739px] top-[143px]">
                <div class="border-2 w-[545px] l-[617px] bg-dirty-white text-deep-green">
                    <p class="text-center text-5xl font-bold mt-6">TERMS AND AGREEMENT</p>
                    <div class="text-justify text-base mx-[18px] mt-8">
                        <p class="mb-4">Welcome to Barangay Poblacion Management System (BPMS). The terms and agreement for you 
                            (the users) are stated that:
                        </p>
                        <p class="text-2xl font-bold">I.</p>
                        <p class="mb-3">
                        Your information must be genuine and real. BPMS requires your personal 
                        information that reflects to the user for the services to function as 
                        they are intended to. Do not worry, however, we guarantee you that your 
                        personal information is secured, and will not be easily detectable by others.
                        </p>
                        <p class="text-2xl font-bold">II.</p>
                        <p class="mb-3">
                        You are responsible for the services you requested. Should there be issues 
                        in relation to the services in the technical perspective such as the system 
                        not responding properly, bugs, and errors, you may the contact us about them. 
                        We are not responsible for situations outside of our control such as providing 
                        wrong information, damaged papers, and etc. Situations like these should be 
                        handled between you and the other users involved (e.g. Barangay Secretary).
                        </p>
                        <p class="text-2xl font-bold">III.</p>
                        <p class="mb-3">
                        Avoid tampering the system with third-party software. We highly discourage you 
                        to use any third-party software that could potentially damage the system. This 
                        could cause many issues not only for others, but also to you as well. Tampering 
                        with the system and its data can be punishable as it can be perceived as a sabotage 
                        act, and we will not tolerate this action as soon as we find out.
                        </p>
                    </div>
                </div>
                <div class="text-center text-2xl mt-4">
                    <label for="terms_and_agreement" class="inline-flex items-center">
                        <input id="terms_and_agreement" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="termsAndAgreement">
                        <span class="ml-2 text-dirty-white">{{ __('I HAVE READ THE TERMS AND AGREEMENT') }}</span>
                    </label>
                </div>
                <div class="text-center">
                <x-button class="mt-4 bg-deep-green text-dirty-white border-0 w-60 l-12">
                    <div class="m-auto">                 
                        {{ __('Create Account') }}
                    </div>
                </x-button>
                </div>
            </div>
        </form>
    </x-page-layout>
