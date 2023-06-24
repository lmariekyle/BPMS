<div class="bg-green max-h-[1024px] max-w-screen-2xl h-[1024px] w-[1440px] py-12 px-14">    
    <x-guest-layout>
            <x-slot name="logo">

            </x-slot>
            <!-- Validation Errors -->
            <x-auth-validation-errors class="mb-4" :errors="$errors" />

            <div class="max-w-sm max-h-12 w-96 h-12 text-center flex absolute left-14 top-12">
                    <a href="/accounts">
                        <i class="fa-sharp fa-solid fa-arrow-left text-3xl mt-4" style="color:#fdffee;"></i>
                    </a>
                    <p class="font-robotocondensed font-bold ml-[20px] text-dirty-white text-5xl">Account Registration</p>
            </div>

            <form method="POST" action="{{ route('register') }}" class="font-robotocondensed text-2xl">
            <div class="flex absolute left-14 top-44">
                @csrf
                <div class="max-w-[223px] max-h-[700px] w-[223px] h-[700px] float-left ml-8 mr-11">
                    <!--For the Photo part-->
                </div>
                
                <div>
                    <div>
                        <x-label for="firstname" :value="__('First Name')" class="font-roboto" style="color:white;"/>

                        <x-input id="firstname" class="block mb-4 w-[455px] h-[42px] bg-dirty-white" type="text" name="firstname" :value="old('name')" required autofocus />
                    </div>
                    
                    <div>
                        <x-label for="lastname" :value="__('Last Name')" class="font-roboto" style="color:white;"/>
            
                        <x-input id="lastname" class="block mb-4 w-[455px] h-[42px] bg-dirty-white" type="text" name="lastname" :value="old('lastname')" required autofocus />
                    </div>

                    <div>
                        <x-label for="middlename" :value="__('Middle Name')" class="font-roboto" style="color:white;"/>

                        <x-input id="middlename" class="block mb-4 w-[455px] h-[42px] bg-dirty-white" type="text" name="middlename" :value="old('middlename')" required autofocus />
                    </div>
                    
                    <!-- Email Address -->
                    <div>
                        <x-label for="email" :value="__('Email')" class="font-roboto" style="color:white;"/>

                        <x-input id="email" class="block mb-4 w-[455px] h-[42px] bg-dirty-white" type="email" name="email" :value="old('email')" required />
                    </div>

                    <div>
                        <x-label for="contactnumber" :value="__('Contact Number')" class="font-roboto" style="color:white;"/>

                        <x-input id="contactnumber" class="block mb-4 w-[455px] h-[42px] bg-dirty-white" type="text" name="contactnumber" :value="old('contactnumber')" required autofocus />
                    </div>

                    <div>
                        <x-label for="dateOfBirth" :value="__('Date of Birth')" class="font-roboto" style="color:white;"/>

                        <x-input id="dateOfBirth" class="block mb-4 w-[227.5px] h-[42px] bg-dirty-white" type="date" name="dateOfBirth" :value="old('dateOfBirth')" required autofocus />
                    </div>
                </div>

                <div class="ml-8">
                    @role('Admin')
                    <div class="">
                        <x-label for="idNumber" :value="__('ID Number')" class="font-roboto" style="color:white;"/>

                        <x-input id="idNumber" class="block mb-4 w-[455px] h-[42px] bg-dirty-white" type="text" name="idNumber" :value="old('idNumber')" required autofocus />
                    </div>
                    @endrole('Admin')
                    <div>
                        <x-label for="barangay" :value="__('Barangay')" class="font-roboto" style="color:white;"/>

                        <x-input id="barangay" class="block mb-4 w-[455px] h-[42px] bg-dirty-white" type="text" name="barangay" :value="'Poblacion'" readonly="readonly" required autofocus />
                    </div>

                    <div>
                        <x-label for="sitio" :value="__('Sitio')" class="font-roboto" style="color:white;"/>
                        <select id="sitio" class="block mb-4 w-[455px] h-[42px] bg-dirty-white rounded border-1" name="sitio" :value="old('sitio')" required autofocus>
                            @foreach($sitios as $sitio)
                            <option value="{{$sitio->id}}">{{$sitio->sitioName}}</option>
                            @endforeach
                        </select>
                    </div>

                    @role('Admin')
                    <div>
                        <x-label for="userlevel" :value="__('Account Type')" class="font-roboto" style="color:white;"/>
                        <select id="userlevel" class="block mb-4 w-[455px] h-[42px] bg-dirty-white rounded border-1" name="userlevel" :value="old('userlevel')" required autofocus>
                            @foreach($roles as $role)
                            <option value="{{$role->name}}">{{$role->name}}</option>
                            @endforeach
                            
                        </select>
                    </div>
                    @endrole
                </div>
                
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
                
                <div class="text-center absolute bottom-[245px] right-24 flex-none m-auto">
                <x-button class="bg-deep-green text-dirty-white border-0 w-[248px] h-[49px]">
                    <div class="generate-password mx-auto text-xl">                
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
    </x-guest-layout>
</div>