<x-guest-layout>
<x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />
        
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <script src="{{ asset('js/app.js') }}" defer></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

        <form method="POST" action="{{ route('create') }}">
            @csrf

            <!-- Name -->
            <div>
                <!-- <x-label for="idNumber" :value="__('ID Number')" /> -->

                <x-input id="idNumber" class="mt-1 w-full hidden" type="text" name="idNumber" :value="00000" readonly="readonly" required autofocus />
            </div>

            <div>
                <x-label for="firstname" :value="__('First Name')" />

                <x-input id="firstname" class="block mt-1 w-full" type="text" name="firstname" :value="old('firstname')" required autofocus />
            </div>

            <div>
                <x-label for="middlename" :value="__('Middle Name')" />

                <x-input id="middlename" class="block mt-1 w-full" type="text" name="middlename" :value="old('middlename')" required autofocus />
            </div>

            <div>
                <x-label for="lastname" :value="__('Last Name')" />
    
                <x-input id="lastname" class="block mt-1 w-full" type="text" name="lastname" :value="old('lastname')" required autofocus />
            </div>

            <div>
                <x-label for="dateOfBirth" :value="__('Date of Birth')" />

                <x-input id="dateOfBirth" class="block mt-1 w-full" type="date" name="dateOfBirth" :value="old('dateOfBirth')" required autofocus />
            </div>

            <div>
                <x-label for="contactnumber" :value="__('Contact Number')" />

                <x-input id="contactnumber" class="block mt-1 w-full" type="text" name="contactnumber" :value="old('contactnumber')" required autofocus />
            </div>

            <div>
                <x-label for="barangay" :value="__('Barangay')" />

                <x-input id="barangay" class="block mt-1 w-full" type="text" name="barangay" :value="'Poblacion'" readonly="readonly" required autofocus />
            </div>

            <div>
                <x-label for="sitio" :value="__('Sitio')" />
                <select id="sitio" class="block mt-1 w-full" name="sitio" :value="old('sitio')" required autofocus>
                    @foreach($sitios as $sitio)
                    <option value="{{$sitio->sitioName}}">{{$sitio->sitioName}}</option>
                    @endforeach
                </select>
            </div>

            <div>
                <!-- <x-label for="userlevel" :value="__('Account Type')" /> -->
                <x-input id="userlevel" class="mt-1 w-full hidden" type="text" name="userlevel" :value="'User'" readonly="readonly" required autofocus />       
            </div>

            <div class="mt-4">
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>

            <!-- Password -->
            
            <div class="mt-4">
                <x-label for="password" :value="__('Password')" />
                <div class="input-group">
                    <x-input id="password" class="form-control"
                                    type="password"
                                    name="password"
                                    required autocomplete="new-password" 
                    />
                </div>
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-label for="password_confirmation" :value="__('Confirm Password')" />
                <div class="input-group">
                    <x-input id="password_confirmation" class="form-control"
                                    type="password"
                                    name="password_confirmation" required />
                </div>
            </div>
<!-- 
            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>
            </div> -->

            <x-button class="mt-4">                 
                    {{ __('Create') }}
            </x-button>
           
        </form>

        <script>
            $(document).ready(function(){
                
                function generatePassword(){
                    let charset = document.getElementById('lastname').value;
                    let password = "poblacion";
                    password += charset;
                    return password;
                }

                // sets password input fields
                $('.generate-password').on('click',function(){
                    let password = generatePassword();

                    $('#password').val(password);
                    $('#password_confirmation').val(password);
                });

            });



        </script>
    </x-auth-card>
    </x-guest-layout>
