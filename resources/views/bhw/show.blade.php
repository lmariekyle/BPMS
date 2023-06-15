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
                     wow issa bhw {{$personalInfo->lastName}},{{$personalInfo->firstName}} {{$personalInfo->middleName[0]}}.
                     <br>
                     bhw contact thru {{$user->email}},{{$user->contactNumber}}
                     <br>
                     bhw currently assigned to {{$personalInfo->assignedSitioName}}
                     <br>
                     bhw is living in {{$personalInfo->sitio}},{{$personalInfo->barangay}}
                    @endrole
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
