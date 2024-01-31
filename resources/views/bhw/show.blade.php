<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Barangay Health Workers') }}
        </h2>
    </x-slot>

    <div class="pt-10 pb-14">
        <div class="max-w-max max-h-max sm:px-6 lg:px-8">
        <div class="">
                <div class="">
                <div class="max-w-sm max-h-12 w-96 h-12 text-center">
                        <a href="{{ route('bhw') }}" class="float-left mt-4">
                            <i class="fa-sharp fa-solid fa-arrow-left text-3xl text-deep-green"></i>
                        </a>
                        <p class="font-roboto font-bold text-dirty-white text-5xl">VIEW ACCOUNT</p>
                    </div>
                    <div class="max-h-[837px] h-[837px] max-w-[1178px] w-[1178px] mt-8 ml-14 p-14 border rounded bg-dirty-white font-roboto">
                        <div class="relative">
                            <div class="mr-14 float-left max-h-[324px] max-w-[273px] place-content-center bg-green h-[324px] w-[273px]">
                                <div>
                                    <img src="/{{$user->profileImage}}" class="max-h-[700px] h-[324px] w-[273px]" alt="Profile Image">
                                </div>
                            </div>

                            <div class="pt-9 pb-10 max-h-[324px] max-w-[725px] h-[324px] w-[725px] border border-green text-2xl float-left">
                                <div class="float-left">
                                    <div>
                                        <p class="pl-3 text-deep-green">First Name:</p>
                                        <div class="pl-8 w-[318px] text-dirty-white bg-green">{{$personalInfo->firstName}}</div>
                                    </div>
                                    <div class="mt-4">
                                        <p class="pl-3 text-deep-green">Last Name:</p>
                                        <div class="pl-8 w-[318px] text-dirty-white bg-green">{{$personalInfo->lastName}}</div>
                                    </div>
                                    <div class="mt-4">
                                        <p class="pl-3 text-deep-green">Middle Initial:</p>
                                        <div class="pl-8 w-[318px] text-dirty-white bg-green">{{$personalInfo->middleName[0]}}.</div>
                                    </div>
                                </div>
                                <div class="float-right ml-20">
                                    <div>
                                        <p class="pl-3 text-deep-green">Address:</p>
                                        <div class="pl-8 w-[318px] text-dirty-white bg-green">{{$personalInfo->sitio}}, {{$personalInfo->barangay}}</div>
                                    </div>
                                    <div class="mt-4">
                                        <p class="pl-3 text-deep-green">Email:</p>
                                        <div class="pl-8 w-[318px] text-dirty-white bg-green">{{$user->email}}</div>
                                    </div>
                                    <div class="mt-4">
                                        <p class="pl-3 text-deep-green">Contact Number:</p>
                                        <div class="pl-8 w-[318px] text-dirty-white bg-green">{{$user->contactNumber}}</div>
                                    </div>                        
                                </div>
                            </div>
                        </div>
                        <div class="ml-12 mt-14 float-left text-2xl font-roboto">
                            <div class="float-left max-w-[554px] max-h-[324px] w-[554px] h-[324px] border border-green mr-12">
                            <div>
                                    <p class="text-deep-green px-1 mt-6">Account Status:</p>
                                    <div class="bg-green text-dirty-white pl-4">{{$user->userStatus}}</div>
                                </div>
                                @if (null!==$user->archiveDate)
                                <div>
                                    <p class="text-deep-green px-1 mt-6">Archived Date:</p>
                                    <div class="bg-green text-dirty-white pl-4">
                                            <p>{{$user->archiveDate}}</p>
                                    </div>
                                </div>
                                <div>
                                    <p class="text-deep-green px-1 mt-6">Archived By:</p>
                                    <div class="bg-green text-dirty-white pl-4">
                                            <p>{{$user->archivedBy}}</p>
                                    </div>
                                </div>

                            </div>
                                
                            <div class="float-left max-w-[342px] max-h-[324px] w-[342px] h-[324px] border border-green mr-12">
                                <p class="text-center py-5 text-deep-green">Reason For Archive:</p>
                                <div class="text-center">{{$user->reasonForArchive}}</div>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>