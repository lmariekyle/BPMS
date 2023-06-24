<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Barangay Health Workers') }}
        </h2>
    </x-slot>

    <div class="pt-10 pb-14 bg-green">
        <div class="max-w-max max-h-max sm:px-6 lg:px-8">
            <div class="">
                <div class="">
                    <div class="max-w-sm max-h-12 w-96 h-12 text-center">
                        <a href="/index" class="float-left mt-4">
                            <i class="fa-sharp fa-solid fa-arrow-left text-3xl" style="color:#fdffee;"></i>
                        </a>
                        <p class="font-roboto font-bold text-dirty-white text-5xl">VIEW ACCOUNT</p>
                    </div>
                    
                    <div class="max-h-[837px] h-[837px] max-w-[1178px] w-[1178px] mt-8 ml-14 p-14 border rounded bg-dirty-white font-roboto">
                    <div class="relative">
                            <div class="mr-14 float-left max-h-[324px] max-w-[273px] place-content-center bg-green h-[324px] w-[273px]">
                                <!--Photo here-->
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
                        <div class="mt-14 float-left text-2xl font-roboto">
                            <div class="float-left max-w-[342px] max-h-[324px] w-[342px] h-[324px] border border-green mr-12">
                                <div>
                                    <p class="text-deep-green px-1 mt-6">Account Status:</p>
                                    <div class="bg-green text-dirty-white pl-4"><p>{{$user->userStatus}}</p></div>
                                </div>
                                <div>
                                    <p class="text-deep-green px-1 mt-6">Archived Date:</p>
                                    <div class="bg-green text-dirty-white pl-4">
                                            @if (null!==$user->archiveDate)
                                            <p>{{$user->archiveDate}}</p>
                                            @else
                                            <p>---------------------</p>
                                            @endif
                                    </div>
                                </div>
                                <div>
                                    <p class="text-deep-green px-1 mt-6">Archived By:</p>
                                    <div class="bg-green text-dirty-white pl-4">
                                            @if (null!==$user->archivedBy)
                                            <p>{{$user->archivedBy}}</p>
                                            @else
                                            <p>---------------------</p>
                                            @endif
                                    </div>
                                </div>
                            </div>
                                
                            <div class="float-left max-w-[342px] max-h-[324px] w-[342px] h-[324px] border border-green mr-12">
                                <p class="text-center py-5 text-deep-green">Reason for Archive:</p>
                                <div class="text-center">{{$user->reasonForArchive}}</div>
                            </div>

                            <div class="float-left max-w-[260px] max-h-[364px] w-[280px] h-[324px] text-center py-20">
                                    <div class="mt-8 bg-deep-green text-dirty-white border-0 w-60 l-12">
                                        <a href="{{ route('accounts.edit', $user->id) }}">Update Account</a>
                                    </div>
                                    <div class="mt-8 bg-deep-green text-dirty-white border-0 w-60 l-12">
                                        <a href="">Archive Account</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150">
                        <button id="AdminBtn">ARCHIVE ACCOUNT</button>
                    </div>

                    <div id="AdminModal" class="modal hidden fixed z-10 pt-28 top-0 left-0 w-full h-full overflow-auto bg-black bg-black/[0.4]">
                        <div class="bg-dirty-white m-auto p-5 border-1 rounded w-5/6">
                            <form action="{{ route('accounts.destroy', Auth::user()->id) }}"method="POST">
                                @csrf
                                @method('DELETE')

                                <span class="close font-deep-green float-right text-xl font-bold hover:bg-black hover:cursor-pointer">&times;</span>
                                <div class="input-area">
                                    <input type="hidden" name="userID" value="{{$user->id}}">

                                    <label for="reason">Reason for Archiving Account</label>
                                    <input type="text" name="reason" class="form-control">
                                </div>
                                <x-button class="text-base mt-8 bg-deep-green text-dirty-white border-0 w-60 l-12"> 
                                    <div class="m-auto">                
                                        {{ __('Archive Account') }}
                                    </div>
                                </x-button>
                            </form>
                        </div>
                    </div>


                  
                </div>
            </div>
        </div>
    </div>
</x-app-layout>


<script>

    var modal = document.getElementById("AdminModal");
    
    var btn = document.getElementById("AdminBtn");
    
    var span = document.getElementsByClassName("close")[0];
    
    // Open Modal
    btn.onclick = function() {
        modal.style.display = "block";
    }
    
    // Close Modal (using the X button)
    span.onclick = function() {
        modal.style.display = "none";
    }
    
    // Close Modal (clicking anywhere else outside the Modal)
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
</script>