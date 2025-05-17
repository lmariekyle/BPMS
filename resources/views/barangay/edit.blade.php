<x-page-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Barangay Create/Update') }}
        </h2>
    </x-slot>

    <div class="pt-10 pb-14 bg-green">
        <div class="max-w-7xl w-[1280px] px-12">
            <div class="max-w-[1250px] w-[1250px]">
                <div class="relative">
                    
                    
                    @role('Admin')
                        @if ($crud == "create")
                            <div class="max-w-full max-h-12 w-full h-12 text-center flex justify-start">
                                <a href="{{ route('barangay.index') }}" class="float-left mt-4">
                                    <i class="fa-sharp fa-solid fa-arrow-left text-3xl" style="color:#fdffee;"></i>
                                </a>
                                <p class="font-robotocondensed font-bold text-dirty-white text-5xl ml-5">Create Barangay</p>
                                <div class="ml-12 mt-3">
                                    @include('components.flash')
                                </div>
                            </div>
                            <form method="POST" action="{{ route('barangay.store') }}" enctype="multipart/form-data">
                                @csrf
                                @method('POST')
                                <div class="mt-10 font-robotocondensed text-2xl text-dirty-white">
                                    <div class="max-w-[1250px] w-[1250px] max-h-[120px]">
                                        <div class="float-left mr-10">
                                            <label for="barangay" class="font-roboto">Barangay</label>
                                            <br>
                                            <input type="text" class="block mb-4 w-[455px] h-[42px] bg-dirty-white rounded text-deep-green" name="barangayName" required>
                                        </div>
                                        <div class="">
                                            <label for="municipality" class="font-roboto">Municipality</label>
                                            <br>
                                            <input type="text" class="block mb-4 w-[455px] h-[42px] bg-dirty-white rounded text-deep-green" name="municipality" required>
                                        </div>
                                        <div class="float-left mr-10">
                                            <label for="zipcode" class="font-roboto">ZipCode</label>
                                            <br>
                                            <input type="text" class="block mb-4 w-[455px] h-[42px] bg-dirty-white rounded text-deep-green" name="zipCode" required>
                                        </div>
                                        <div class="">
                                            <label for="address" class="font-roboto">Barangay Hall Address</label>
                                            <br>
                                            <input type="text" class="block mb-4 w-[455px] h-[42px] bg-dirty-white rounded text-deep-green" name="HLocation" required>
                                        </div>
                                    </div>
                                    <br>
                                </div>
                                <br>
                                <div class="max-w-[1250px] w-[1250px] max-h-[66px]"></div>
                                <br>
                                <div class="mt-[18px]">
                                    <button type="submit" name="submit" class="rounded bg-deep-green w-60 left-12 mx-auto">Create Barangay</button>
                                </div> 
                            </form> 
                        @else
                            <div class="max-w-full max-h-12 w-full h-12 text-center flex justify-start">
                                <a href="{{ route('barangay.show', $barangay->id) }}" class="float-left mt-4">
                                    <i class="fa-sharp fa-solid fa-arrow-left text-3xl" style="color:#fdffee;"></i>
                                </a>
                                <p class="font-robotocondensed font-bold text-dirty-white text-5xl ml-5">Update Barangay</p>
                                <div class="ml-12 mt-3">
                                    @include('components.flash')
                                </div>
                            </div>
                            <form method="POST" action="{{ route('barangay.update', $barangay->id) }}" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="mt-10 font-robotocondensed text-2xl text-dirty-white">
                                    <div class="max-w-[1250px] w-[1250px] max-h-[120px]">
                                        <div class="float-left mr-10">
                                            <label for="barangay" class="font-roboto">Barangay</label>
                                            <br>
                                            <input type="text" class="block mb-4 w-[455px] h-[42px] bg-dirty-white rounded text-deep-green" name="barangayName" value="{{$barangay->barangayName}}">
                                        </div>
                                        <div class="">
                                            <label for="municipality" class="font-roboto">Municipality</label>
                                            <br>
                                            <input type="text" class="block mb-4 w-[455px] h-[42px] bg-dirty-white rounded text-deep-green" name="municipality" value="{{$barangay->municipality}}">
                                        </div>
                                        <div class="float-left mr-10">
                                            <label for="zipcode" class="font-roboto">ZipCode</label>
                                            <br>
                                            <input type="text" class="block mb-4 w-[455px] h-[42px] bg-dirty-white rounded text-deep-green" name="zipCode" value="{{$barangay->zipCode}}">
                                        </div>
                                        <div class="">
                                            <label for="address" class="font-roboto">Barangay Hall Address</label>
                                            <br>
                                            <input type="text" class="block mb-4 w-[455px] h-[42px] bg-dirty-white rounded text-deep-green" name="HLocation" value="{{$barangay->HLocation}}">
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