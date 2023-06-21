<x-guest-layout>
<x-auth-card>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div>
                <x-label for="idNumber" :value="__('ID Number')" />

                <x-input id="idNumber" class="block mt-1 w-full" type="text" name="idNumber" :value="old('idNumber')" required autofocus />
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
                <x-label for="userlevel" :value="__('Account Type')" />
                <select id="userlevel" class="block mt-1 w-full" name="userlevel" :value="old('userlevel')" required autofocus>
                    @foreach($roles as $role)
                    <option value="{{$role->name}}">{{$role->name}}</option>
                    @endforeach
                    
                </select>
            </div>

            <div class="mt-4">
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
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
            
            <x-button class="generate-password">                 
                    {{ __('Create Account') }}
            </x-button>
         
        </form>

    </x-auth-card>
    </x-guest-layout>
