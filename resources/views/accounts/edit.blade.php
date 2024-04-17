<x-page-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Account Update') }}
        </h2>
    </x-slot>

    <div class="pt-10 pb-14 bg-green">
        <div class="max-w-7xl w-[1280px] px-12">
            <div class="max-w-[1250px] w-[1250px]">
                <div class="relative">
                    
                    
                    @role('Admin')
                    <div class="max-w-full max-h-12 w-full h-12 text-center flex justify-start">
                        <a href="{{ route('accounts.show', $user->id) }}" class="float-left mt-4">
                            <i class="fa-sharp fa-solid fa-arrow-left text-3xl" style="color:#fdffee;"></i>
                        </a>
                        <p class="font-robotocondensed font-bold text-dirty-white text-5xl ml-5">Update Account</p>
                        <div class="ml-12 mt-3">
                            @include('components.flash')
                        </div>
                    </div>
                    <form method="POST" action="{{ route('accounts.update', Auth::user()->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="max-w-[223px] max-h-[700px] w-[223px] h-[700px] float-left ml-8 mr-11">
                                <img src="/{{$user->profileImage}}" alt="Profile Image" class="mb-5">
                                <div class="absolute -mt-[1px] w-[13rem] h-[8rem]">
                                    <div>
                                        <input id="profileImage" class="-mt-[10rem] w-[15rem] h-[42px] px-2 py-2 text-center text-[14px] text-dirty-white file:w-[7rem] file:h-[42px]file:overflow-hidden file:bg-deep-green file:text-[14px] file:text-dirty-white file:font-robotocondensed file:cursor-pointer" type="file" name="profileImage" value="{{$user->profileImage}}"/>
                                    </div>
                                </div>
                        </div>

                        <div class="mt-10 font-robotocondensed text-2xl text-dirty-white">
                            <input type="hidden" name="id" value="{{$user->id}}">

                            <div class="max-w-[1250px] w-[1250px] max-h-[66px]">
                                <div class="float-left mr-10">
                                    <label for="firstname" class="font-roboto">First Name</label>
                                    <br>
                                    <input type="text" class="block mb-4 w-[455px] h-[42px] bg-dirty-white rounded text-deep-green" name="firstName" value="{{$personalInfo->firstName}}" required>
                                </div>
                                <div class="">
                                        <label for="barangay" class="font-roboto">Barangay</label>
                                        <br>
                                        <input type="text" name="barangay" class="block mb-4 w-[455px] h-[42px] bg-dirty-white rounded text-deep-green" value="{{$personalInfo->barangay}}" readonly>
                                </div>
                            </div>
                            <br>
                            <div class="max-w-[1250px] w-[1250px] max-h-[66px]">
                                <div class="float-left mr-10">
                                    <label for="lastname" class="font-roboto">Last Name</label>
                                    <br>
                                    <input type="text" name="lastName" class="block mb-4 w-[455px] h-[42px] bg-dirty-white rounded text-deep-green" value="{{$personalInfo->lastName}}" required>
                                </div>
                               
                                <div class="">
                                    <label for="sitio" class="font-roboto">Sitio</label>
                                    <br>
                                    <select id="sitio" name="sitio" class="block mb-4 w-[455px] h-[42px] bg-dirty-white rounded text-deep-green">
                                        <option value="{{$user->sitioID}}">{{$personalInfo->sitio}}</option>
                                        @foreach ($sitios as $sitio)
                                            <option value="{{$sitio->id}}">{{ $sitio->sitioName }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                
                            </div>
                            <br>
                            <div class="max-w-[1250px] w-[1250px] max-h-[66px]">
                                <div class="float-left mr-10">
                                    <label for="middlename" class="font-roboto">Middle Name</label>
                                    <br>
                                    <input type="text" name="middleName" class="block mb-4 w-[455px] h-[42px] bg-dirty-white rounded text-deep-green" value="{{$personalInfo->middleName}}">
                                </div>
                                <div class="">
                                    <label for="userlevel" class="font-roboto">Account Type</label>
                                    <br>
                                    <select id="userLevel" name="userLevel" class="block mb-4 w-[455px] h-[42px] bg-dirty-white rounded text-deep-green">
                                        <option value="{{$user->userLevel}}">{{$user->userLevel}}</option>
                                        @foreach($roles as $role)
                                        <option value="{{$role->name}}">{{$role->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <br>
                            <div class="max-w-[1250px] w-[1250px] max-h-[66px]">
                                <div class="float-left mr-10" class="font-roboto">
                                    <label for="email">Email</label>
                                    <br>
                                    <input type="email" name="email" class="block mb-4 w-[455px] h-[42px] bg-dirty-white rounded text-deep-green" value="{{$user->email}}">
                                </div>
                                <div class="mt-4">
                                    <label for="dateOfBirth" class="font-roboto">Date of Birth</label>
                                    <br>
                                    <input type="date" name="dateOfBirth" class="block mb-4 w-[227.5px] h-[42px] bg-dirty-white rounded text-deep-green" value="{{$personalInfo->dateOfBirth}}">
                                </div>
                            </div>
                            <br>
                            <div class="max-w-[1250px] w-[1250px] max-h-[66px]">
                                <div class="float-left mr-10">
                                    <label for="contactnumber" class="font-roboto">Contact Number</label>
                                    <br>
                                    <input type="text" name="contactNumber" class="block mb-4 w-[455px] h-[42px] bg-dirty-white rounded text-deep-green" value="{{$user->contactNumber}}">
                                </div>
                            </div>
                            <br>
                            <div class="mt-[18px]">
                                <button type="submit" name="submit" class="rounded bg-deep-green w-60 left-12 mx-auto">Update Account</button>
                            </div> 
                        </div>
                    </form> 
                    @endrole
                </div>
            </div>
        </div>
    </div>
</x-page-layout>