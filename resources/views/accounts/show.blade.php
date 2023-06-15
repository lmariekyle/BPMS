<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Barangay Health Workers') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    
                    
                    @role('Admin')
                     wow issa account {{$personalInfo->lastName}},{{$personalInfo->firstName}} {{$personalInfo->middleName[0]}}.
                     <br>
                     account contact thru {{$personalInfo->email}},{{$personalInfo->contactNumber}}
                     <br>
                     account is living in {{$personalInfo->sitio}}, {{$personalInfo->barangay}}

                    <br>

                    <div class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150">
                        <a href="/edit">Update Account</a>
                    </div>

                    <div class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150">
                        <a href="/archive">Archive Account</a>
                    </div>

                    @endrole
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
