<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <div class="font-robotocondensed  text-[18px] text-deep-green px-4  text-center indent-4 break-normal w-max h-max"">
            {{ __('Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}
        </div>

        @if (session('status') == 'verification-link-sent')
            <div class="font-robotocondensed  text-[18px] text-deep-green px-4  text-center indent-4 break-normal w-max h-max"">
                {{ __('A new verification link has been sent to the email address you provided during registration.') }}
            </div>
        @endif

        <div class="mt-4 flex items-center justify-center text-dirty-white">
            <form method="POST" action="{{ route('verification.send') }}">
                @csrf

                <div>
                    <x-button>
                        {{ __('Resend Verification Email') }}
                    </x-button>
                </div>
            </form>

            <form method="POST" action="{{ route('logout') }}">
                @csrf

                <button type="submit" class="bg-green h-[40px] w-[140px] text-center mt-8 -ml-48 absolute">
                    {{ __('LOGOUT') }}
                </button>
            </form>
        </div>
    </x-auth-card>
</x-guest-layout>