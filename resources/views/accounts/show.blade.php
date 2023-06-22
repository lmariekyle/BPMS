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
                     status? {{$user->userStatus}}
                     <br>
                     account contact thru {{$user->email}},{{$user->contactNumber}}
                     <br>
                     account is living in {{$personalInfo->sitio}}, {{$personalInfo->barangay}}
                     <br>
                     account was archived {{$user->archiveDate}}, for the reason of {{$user->reasonForArchive}}

                    <br>

                    <div class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150">
                        <a href="{{ route('accounts.edit', $user->id) }}">Update Account</a>
                    </div>

                    <div class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150">
                        <button id="AdminBtn">ARCHIVE ACCOUNT</button>
                    </div>

                    <div id="AdminModal" class="modal hidden fixed z-10 pt-28 top-0 left-0 w-full h-full overflow-auto bg-black bg-black/[0.4]">
                        <div class="bg-dirty-white m-auto p-5 border-1 rounded w-5/6">
                            <form action={{ route('accounts.destroy', Auth::user()->id) }} method="POST">
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


                    @endrole
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