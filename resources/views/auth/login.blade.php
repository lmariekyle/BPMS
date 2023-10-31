<x-guest-layout>
    <x-auth-card>
        
            <div class="mb-4 absolute ml-[150px] w-[300px] h-[300px] rounded-full bg-dirty-white border-2 flex justify-center items-center">
                <img src="{{ asset('images/PoblacionDalLogo.png') }}" alt="">
            </div>
        

        <!-- Session Status -->

        <!-- Validation Errors -->
        <div class="bg-dirty-white">
            <form method="POST" action="{{ route('login') }}" class="mt-28 bg-green z-0 w-[594px] l-[594px]">
                @csrf
                <p class="font-dancingscript text-8xl text-dirty-white text-center pt-52">Welcome</p>
                <div class="flex flex-col">
                    <x-auth-session-status class="mb-4" :status="session('status')" />
                    <x-auth-validation-errors class="mb-2 ml-12 text-white" :errors="$errors"/>  
                    <div class="ml-10">
                    @include('components.flash')
                    </div>
                </div>
                <div class="ml-12">
                    <!-- Email Address -->
                    <div class="mt-3">
                        <x-label for="email" :value="__('Email')" class="text-xl font-roboto" style="color:white"/>

                        <x-input id="email" class="block mt-1 w-[500px] bg-dirty-white" type="email" name="email" :value="old('email')" required autofocus />
                    </div>

                    <!-- Password -->
                    <div class="mt-7">
                        <x-label for="password" :value="__('Password')" class="text-xl font-roboto" style="color:white"/>

                        <x-input id="password" class="block mt-1 w-[500px] bg-dirty-white"
                                        type="password"
                                        name="password"
                                        required autocomplete="current-password" />
                    </div>

                    <!-- Remember Me -->
                    <div class="block mt-1">
                        <label for="remember_me" class="inline-flex items-center">
                            <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="remember">
                            <span class="ml-2 text-xl text-gray-600" style="color:white;">{{ __('Remember me') }}</span>
                        </label>
                    </div>
                </div>

            <div class="flex object-center justify-end mt-7 pb-16">
                @if (Route::has('password.request'))
                    <a class="loginText underline text-xl text-dirty-white hover:text-gray-900" href="{{ route('password.request') }}" style="margin: auto;">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif
            </div>
            <div class="object-center justify-end z-50 absolute -mt-6 ml-[170px] pb-12">
                <x-button class="w-60 h-12 bg-deep-green text-dirty-white font-roboto border-0 m-auto">
                    <div class="text-2xl m-auto">
                    {{ __('LOGIN') }}
                    </div>
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>

</div>