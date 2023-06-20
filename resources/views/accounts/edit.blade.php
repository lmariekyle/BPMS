<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Account Update') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    
                    
                    @role('Admin')
                    <div>
                        <a href="{{ route('accounts.show', $user->id) }}">back button</a>
                    </div>
                    <form method="POST" action="{{ route('accounts.update', Auth::user()->id) }}">
                        @csrf
                        @method('PUT')

                        <div class="column-portion">
                            <input type="hidden" name="id" value="{{$user->id}}">

                            <div class="row">
                                <div class="col-md-6">
                                    <label for="firstname">First Name</label>
                                    <input type="text" class="form-control" name="firstName" value="{{$personalInfo->firstName}}">
                                </div>
                                <div class="col-md-6">
                                    <label for="idnumber">ID Number</label>
                                    <input type="text" class="form-control" name="idNumber" value="{{$user->idNumber}}">
                                </div>
                            </div>
            
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="lastname">Last Name</label>
                                    <input type="text" name="lastName" class="form-control" value="{{$personalInfo->lastName}}">
                                </div>
                                <div class="col-md-6">
                                    <div class="input-area">
                                        <label for="barangay">Barangay</label>
                                        <input type="text" name="barangay" class="form-control" value="{{$personalInfo->barangay}}">
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="middlename">Middle Name</label>
                                    <input type="text" name="middleName" class="form-control" value="{{$personalInfo->middleName}}">
                                </div>
                                <div class="col-md-6">
                                    <label for="sitio">Sitio</label>
                                    <select id="sitio" name="sitio">
                                        <option value="{{$user->sitioID}}">{{$personalInfo->sitio}}</option>
                                        @foreach ($sitios as $sitio)
                                            <option value={{$sitio->id}}>{{ $sitio->sitioName }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <label for="email">Email</label>
                                    <input type="email" name="email" class="form-control" value="{{$user->email}}">
                                </div>
                                <div class="col-md-6">
                                    <label for="userlevel">Account Type</label>
                                    <select id="userLevel" name="userLevel">
                                        <option value="{{$user->userLevel}}">{{$user->userLevel}}</option>
                                        <option value="{{'Admin'}}">{{'Admin'}}</option>
                                        <option value="{{'Barangay Captain'}}">{{'Barangay Captain'}}</option>
                                        <option value="{{'Barangay Secretary'}}">{{'Barangay Secretary'}}</option>
                                        <option value="{{'Barangay Health Worker'}}">{{'Barangay Health Worker'}}</option>
                                    </select>
                                </div>
                            </div>
                        
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="contactnumber">Contact Number</label>
                                    <input type="text" name="contactNumber" class="form-control" value="{{$user->contactNumber}}">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <label for="contactnumber">Date of Birth</label>
                                    <input type="date" name="dateOfBirth" class="form-control" value="{{$personalInfo->dateOfBirth}}">
                                </div>
                            </div>

                            <div>
                                <button type="submit" name="submit" class="btn btn-primary">SUBMIT</button>
                            </div> 
                        </div>
                    </form> 
                    @endrole
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
