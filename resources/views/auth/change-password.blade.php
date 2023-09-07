<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors  class="mb-2 ml-12" :errors="$errors" />

        <form method="POST" action="{{ route('update_password')}}">
            @csrf

            <!-- Password Reset Token -->
          

            <!-- Email Address -->
            <div>
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="block mt-1 w-[25rem] bg-dirty-white" type="email" name="email" required autofocus />
            </div>


            <!-- Old Password -->
            <div class="mt-4">
                <x-label for="old_password" :value="__('Old Password')" />

                <x-input id="old_password" class="block mt-1 w-full bg-dirty-white" type="password" name="old_password" required />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="new_password" :value="__('New Password')" />

                <x-input id="new_password" class="block mt-1 w-full bg-dirty-white" type="password" name="new_password" required />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-label for="confirm_password" :value="__('Confirm Password')" />

                <x-input id="confirm_password" class="block mt-1 w-full bg-dirty-white"
                                    type="password"
                                    name="confirm_password" required />
            </div>

            <div class="flex items-center justify-end mt-4 text-dirty-white">
                <x-button>
                    {{ __('Reset Password') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
