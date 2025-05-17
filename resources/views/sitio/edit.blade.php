<x-page-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Sitio Create/Update') }}
        </h2>
    </x-slot>

    <div class="pt-10 pb-14 bg-green">
        <div class="max-w-7xl w-[1280px] px-12">
            <div class="max-w-[1250px] w-[1250px]">
                <div class="relative">
                    
                    
                    @role('Admin')
                        @if ($crud == "create")
                            <div class="max-w-full max-h-12 w-full h-12 text-center flex justify-start">
                                <a href="{{ route('sitio.index') }}" class="float-left mt-4">
                                    <i class="fa-sharp fa-solid fa-arrow-left text-3xl" style="color:#fdffee;"></i>
                                </a>
                                <p class="font-robotocondensed font-bold text-dirty-white text-5xl ml-5">Create Sitio</p>
                                <div class="ml-12 mt-3">
                                    @include('components.flash')
                                </div>
                            </div>
                            <form method="POST" action="{{ route('sitio.store') }}" enctype="multipart/form-data">
                                @csrf
                                @method('POST')
                                <div class="mt-10 font-robotocondensed text-2xl text-dirty-white">
                                    <div class="max-w-[1250px] w-[1250px] max-h-[120px]">
                                        <div class="float-left mr-10">
                                            <label for="sitio" class="font-roboto">Sitio</label>
                                            <br>
                                            <input type="text" class="block mb-4 w-[455px] h-[42px] bg-dirty-white rounded text-deep-green" name="sitioName" required>
                                        </div>
                                        <div class="">
                                            <label for="barangay" class="font-roboto">Barangay</label>
                                            <br>
                                            <select id="barangayID" name="barangayID" class="block mb-4 w-[455px] text-[16px] h-[42px] bg-dirty-white rounded text-deep-green">
                                                @foreach ($barangays as $barangay)
                                                    <option value="{{$barangay->id}}">{{$barangay->barangayName}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <br>
                                </div>
                                <br>
                                <div class="max-w-[1250px] w-[1250px] max-h-[66px]"></div>
                                <br>
                                <div class="mt-[18px]">
                                    <button type="submit" name="submit" class="rounded bg-deep-green w-60 left-12 mx-auto">Create Sitio</button>
                                </div> 
                            </form> 
                        @else
                            <div class="max-w-full max-h-12 w-full h-12 text-center flex justify-start">
                                <a href="{{ route('sitio.show', $sitio->id) }}" class="float-left mt-4">
                                    <i class="fa-sharp fa-solid fa-arrow-left text-3xl" style="color:#fdffee;"></i>
                                </a>
                                <p class="font-robotocondensed font-bold text-dirty-white text-5xl ml-5">Update Sitio</p>
                                <div class="ml-12 mt-3">
                                    @include('components.flash')
                                </div>
                            </div>
                            <form method="POST" action="{{ route('sitio.update', $sitio->id) }}" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="mt-10 font-robotocondensed text-2xl text-dirty-white">
                                    <div class="max-w-[1250px] w-[1250px] max-h-[120px]">
                                        <div class="float-left mr-10">
                                            <label for="sitio" class="font-roboto">Sitio</label>
                                            <br>
                                            <input type="text" class="block mb-4 w-[455px] h-[42px] bg-dirty-white rounded text-deep-green" name="sitioName" value="{{$sitio->sitioName}}" required>
                                        </div>
                                        <div class="">
                                            <label for="barangay" class="font-roboto">Barangay</label>
                                            <br>
                                            <select id="barangayID" name="barangayID" class="block mb-4 w-[455px] text-[16px] h-[42px] bg-dirty-white rounded text-deep-green" value="{{$sitio->barangayID}}">
                                                <option value="{{$sitio->barangayID}}" selected>{{$sBarangay}}</option>
                                                @foreach ($barangays as $barangay)
                                                    <option value="{{$barangay->id}}">{{$barangay->barangayName}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <br>
                                </div>
                                <br>
                                <div class="max-w-[1250px] w-[1250px] max-h-[66px]"></div>
                                <br>
                                <div class="mt-[18px]">
                                    <button type="submit" name="submit" class="rounded bg-deep-green w-60 left-12 mx-auto">Update Account</button>
                                </div> 
                            </form> 
                        @endif
                    @endrole
                </div>
            </div>
        </div>
    </div>
</x-page-layout>