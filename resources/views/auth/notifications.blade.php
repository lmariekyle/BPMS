<x-page-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="pt-10 pb-14 bg-green">
        <div class="max-w-sm max-h-12 w-96 h-12 text-center ml-14">
            <a href="{{ route('profile') }}" class="float-left mt-4">
                <i class="fa-sharp fa-solid fa-arrow-left text-3xl" style="color:#fdffee;"></i>
            </a>
        </div>       
        <div class="max-h-[837px] h-[837px] max-w-[1178px] w-[1178px] mt-8 ml-14 p-14 border rounded bg-dirty-white font-roboto text-deep-green">
            <p class="text-5xl">NOTIFICATIONS</p>
            <hr class="h-px bg-stone-500 border-0">
            <br>
            <div class="overflow-y-scroll max-h-[630px] h-[630px] bg-stone-200 border-2 border-stone-500">
                @forelse($notifications as $notification)
                    <div class="flex flex-row h-[108px] border-1 border-stone-500">
                        <div class="float-left w-[900px] pl-4 py-2">
                            <p class="font-bold text-2xl">{{ $notification->data['type'] }} Notification (NOTIFICATION #{{ $notification->id }})</p>
                            <div class="inline">
                                @if($notification->data['type'] == 'Transaction')
                                <div class="text-xl">
                                    <p class="font-robotocondensed text-justify">
                                        {{ $notification->resident['firstName'] }} {{ $notification->resident['lastName'] }} requested {{ $notification->document['docName'] }}
                                    </p>
                                </div>
                                @else
                                <div class="text-xl">
                                    <p class="font-robotocondensed text-justify">
                                        {{ $notification->document['docName'] }} is now {{ $notification->data['transaction']['serviceStatus'] }}
                                    </p>
                                </div>
                                @endif
                                @if($notification->read_at==NULL) <!--Probably the only idea I got rn if the notification is [Unread] LMAO-->
                                    <p class="inline text-red-600">[ New ]</p>
                                @endif
                            </div>
                        </div>
                        <div class="float-right flex flex-row bg-stone-300 max-h-[107.4px] w-[145px]">
                            <div class="m-auto text-xl">
                                <button id="btn{{ $notification->id }}" class="hover:text-green"><i class="fa-solid fa-eye"></i></button>
                                <button class="hover:text-green ml-8"><i class="fa-solid fa-trash"></i></button>
                            </div>
                        </div>
                        <div id="NotifModal" class="modal hidden fixed z-10 pt-28 top-0 mx-auto mt-[150px] w-[1000px] h-[1000px] drop-shadow-lg border-deep-green">
                            <div class="bg-dirty-white m-auto p-5 border-1 rounded w-5/6">
                                <span class="close font-deep-green float-right text-xl font-bold hover:cursor-pointer">&times;</span>
                                <div class="">
                                    <p class="font-robotocondensed text-[28px] text-deep-green" >NOTIFICATION TITLE (NOTIFICATION #{{ $notification->id }})</p>
                                    <p>{{ $notification->resident['firstName'] }} {{ $notification->resident['lastName'] }} requested {{ $notification->document['docName'] }} Document {{ $notification->created_at }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr class="h-px bg-stone-700 border-0">
                    <script>
                        var modal = document.getElementById("NotifModal");
                        
                        var btn = document.getElementById("btn{{ $notification->id }}");
                        
                        var span = document.getElementsByClassName("close")[0];
                        
                        // Open Modal
                        btn.onclick = function() {
                            modal.style.display = "block";
                        }
                        
                        // Close Modal (using the X button)
                        span.onclick = function() {
                            modal.style.display = "none";
                        }
                    </script>
                @empty
                    <p class="text-xs font-robotocondensed w-80 text-justify">
                        <br>
                        NO NOTIFICATION
                        <br>
                        <br>
                        <hr>
                    </p>
                @endforelse
            </div>
        </div>
    </div>
</x-page-layout>

