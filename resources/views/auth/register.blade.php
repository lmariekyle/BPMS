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

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
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
                <x-label for="date_of_birth" :value="__('Date of Birth')" />

                <x-input id="date_of_birth" class="block mt-1 w-full" type="date" name="date_of_birth" :value="old('date_of_birth')" required autofocus />
            </div>

            <div>
                <x-label for="contactnumber" :value="__('Contact Number')" />

                <x-input id="contactnumber" class="block mt-1 w-full" type="text" name="contactnumber" :value="old('contactnumber')" required autofocus />
            </div>

            <div>
                <x-label for="barangay" :value="__('Barangay')" />

                <x-input id="barangay" class="block mt-1 w-full" type="text" name="barangay" :value="'Poblacion'" required autofocus />
            </div>

            <div>
                <x-label for="sitio" :value="__('Sitio')" />
                <select id="sitio" class="block mt-1 w-full" name="sitio" :value="old('sitio')" required autofocus>
                    <option value="Labangon">Labangon</option>
                    <option value="Lalin">Lalin</option>
                </select>
                <!-- <x-input id="sitio" class="block mt-1 w-full" type="select" name="sitio" :value="old('sitio')" required autofocus /> -->
            </div>
            @role('Admin')
            <div>
                <x-label for="userlevel" :value="__('Account Type')" />
                <select id="userlevel" class="block mt-1 w-full" name="userlevel" :value="old('userlevel')" required autofocus>
                    @foreach($roles as $role)
                    <option value="{{$role->name}}">{{$role->name}}</option>
                    @endforeach
                </select>
                <!-- <x-input id="sitio" class="block mt-1 w-full" type="select" name="sitio" :value="old('sitio')" required autofocus /> -->
            </div>
            @endrole

            <!-- Email Address -->
            <div class="mt-4">
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>

            <!-- Password -->
            
            <div class="mt-4">
                <!-- <x-label for="password" :value="__('Password')" /> -->
            <div class="input-group">
                <x-input id="password" class="form-control hidden"
                                type="password"
                                name="password"
                                required autocomplete="new-password" 
                />
                <!-- <div>
                    <button class="generate-password" type="button">Generate</button>
                </div> -->
                <!-- <div>
                    <button class="show-password" type="button">Show</button>
                </div> -->
            </div>
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <!-- <x-label for="password_confirmation" :value="__('Confirm Password')" /> -->
            <div class="input-group">
                <x-input id="password_confirmation" class="form-control hidden"
                                type="password"
                                name="password_confirmation" required />
                <!-- <div>
                    <button class="show-password" type="button">Show</button>
                </div> -->
            </div>
            </div>
<!-- 
            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a> -->

                <x-button class="generate-password">                 
                    {{ __('Create Account') }}
                </x-button>
            </div>
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

                // //show/hide password
                // $('.show-password').on('click',function(){
                //     let passwordInput = $(this).closest('.input-group').find('input');
                //     let passwordFieldType = passwordInput.attr('type');
                //     let newPasswordFieldType = passwordFieldType == 'password' ? 'text' : 'password';
                //     passwordInput.attr('type', newPasswordFieldType);
                //     $(this).text(newPasswordFieldType == 'password' ? 'show' : 'Hide');
                // });

            });



        </script>
    </x-auth-card>
