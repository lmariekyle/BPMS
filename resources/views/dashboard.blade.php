<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @role('Admin')
                    <div class="admin-container">
                        <h1 class="adminText"> {{ __('Hello, Admin') }} </h1>
                        <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Create Account</a>
                    </div>
                    @endrole
                    @role('Barangay Captain')
                    <div class="admin-container">
                        <h1 class="adminText"> {{ __('Hello, Barangay Captain') }} </h1>
                    </div>
                    @endrole
                    @role('Barangay Secretary')
                    <div class="admin-container">
                        <h1 class="adminText"> {{ __('Hello, Barangay Secretary') }} </h1>
                    </div>
                    @endrole

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
