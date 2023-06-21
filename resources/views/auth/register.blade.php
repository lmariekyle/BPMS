<div class="bg-green h-[1024px] w-[1440px]">    
    <x-guest-layout>
        <x-auth-card>
            <x-slot name="logo">
                <div class="absolute left-[33px] top-[49px] flex">
                    <a href="/accounts">
                        <i class="fa-sharp fa-solid fa-arrow-left text-3xl mt-4" style="color:#fdffee;"></i>
                    </a>
                    <p class="font-robotocondensed font-bold ml-[20px] text-dirty-white text-5xl">Account Registration</p>
                </div>
            </x-slot>
            <!-- Validation Errors -->
            <x-auth-validation-errors class="mb-4" :errors="$errors" />

            <form method="POST" action="{{ route('register') }}" class="font-robotocondensed text-xl">
                @csrf

                <!-- Name -->
                @role('Admin')
                <div class="absolute left-[866px] top-[181px]">
                    <x-label for="idNumber" :value="__('ID Number')" class="font-roboto text-xl" style="color:white;"/>

                    <x-input id="idNumber" class="block mb-4 w-[500px] h-[42px] bg-dirty-white" type="text" name="idNumber" :value="old('idNumber')" required autofocus />
                </div>
                @endrole('Admin')

                <div class="absolute left-[333px] top-[181px]">
                <div>
                    <x-label for="firstname" :value="__('First Name')" class="font-roboto text-xl" style="color:white;"/>

                    <x-input id="firstname" class="block mb-4 w-[500px] h-[42px] bg-dirty-white" type="text" name="firstname" :value="old('name')" required autofocus />
                </div>
                
                <div>
                    <x-label for="lastname" :value="__('Last Name')" class="font-roboto text-xl" style="color:white;"/>
        
                    <x-input id="lastname" class="block mb-4 w-[500px] h-[42px] bg-dirty-white" type="text" name="lastname" :value="old('lastname')" required autofocus />
                </div>

                <div>
                    <x-label for="middlename" :value="__('Middle Name')" class="font-roboto text-xl" style="color:white;"/>

                    <x-input id="middlename" class="block mb-4 w-[500px] h-[42px] bg-dirty-white" type="text" name="middlename" :value="old('middlename')" required autofocus />
                </div>
                
                <!-- Email Address -->
                <div>
                    <x-label for="email" :value="__('Email')" class="font-roboto text-xl" style="color:white;"/>

                    <x-input id="email" class="block mb-4 w-[500px] h-[42px] bg-dirty-white" type="email" name="email" :value="old('email')" required />
                </div>

                <div>
                    <x-label for="contactnumber" :value="__('Contact Number')" class="font-roboto text-xl" style="color:white;"/>

                    <x-input id="contactnumber" class="block mb-4 w-[500px] h-[42px] bg-dirty-white" type="text" name="contactnumber" :value="old('contactnumber')" required autofocus />
                </div>

                <div>
                    <x-label for="dateOfBirth" :value="__('Date of Birth')" class="font-roboto text-xl" style="color:white;"/>

                    <x-input id="dateOfBirth" class="block mb-4 w-52 h-[42px] bg-dirty-white" type="date" name="dateOfBirth" :value="old('dateOfBirth')" required autofocus />
                </div>
                </div>

                <div class="absolute left-[866px] top-[269.5px]">
                <div>
                    <x-label for="barangay" :value="__('Barangay')" class="font-roboto text-xl" style="color:white;"/>

                    <x-input id="barangay" class="block mb-4 w-[500px] h-[42px] bg-dirty-white" type="text" name="barangay" :value="'Poblacion'" readonly="readonly" required autofocus />
                </div>

                <div>
                    <x-label for="sitio" :value="__('Sitio')" class="font-roboto text-xl" style="color:white;"/>
                    <select id="sitio" class="block mb-4 w-[500px] h-[42px] bg-dirty-white rounded border-1" name="sitio" :value="old('sitio')" required autofocus>
                        @foreach($sitios as $sitio)
                        <option value="{{$sitio->id}}">{{$sitio->sitioName}}</option>
                        @endforeach
                    </select>
                </div>

                @role('Admin')
                <div>
                    <x-label for="userlevel" :value="__('Account Type')" class="font-roboto text-xl" style="color:white;"/>
                    <select id="userlevel" class="block mb-4 w-[500px] h-[42px] bg-dirty-white rounded border-1" name="userlevel" :value="old('userlevel')" required autofocus>
                        @foreach($roles as $role)
                        <option value="{{$role->name}}">{{$role->name}}</option>
                        @endforeach
                        
                    </select>
                </div>
                @endrole
                

                
                <div class="mt-4">
                <div class="input-group">
                    <x-input id="password" class="form-control hidden"
                                    type="password"
                                    name="password"
                                    required autocomplete="new-password" 
                    />
                </div>
                </div>

                <!-- Confirm Password -->
                <div class="mt-4">
                <div class="input-group">
                    <x-input id="password_confirmation" class="form-control hidden"
                                    type="password"
                                    name="password_confirmation" required />
                </div>
                </div>
                
                <div class="text-center">
                <x-button class="text-base mt-8 bg-deep-green text-dirty-white border-0 w-60 l-12"> 
                    <div class="generate-password">                
                        {{ __('Create Account') }}
                    </div>
                </x-button>
                </div>
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

                });



            </script>
        </x-auth-card>
    </x-guest-layout>
</div>