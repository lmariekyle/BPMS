<x-page-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="pt-10 pb-14 bg-dirty-white">
        <div class="max-w-sm max-h-12 w-96 h-12 text-center ml-14">
            <a href="{{ route('profile') }}" class="float-left mt-4">
                <i class="fa-sharp fa-solid fa-arrow-left text-3xl text-deep-green"></i>
            </a>
            <p class="font-robotocondensed font-bold ml-[20px] text-deep-green text-5xl">ALL NOTIFICATIONS</p>
        </div>      
         
        <div class=" overflow-y-scroll max-h-[837px] h-[837px] w-[90%] mt-8 ml-16 p-14  font-roboto text-deep-green">
           
                @forelse($notifications as $notification)
                    <div class="flex flex-row h-max rounded-sm shadow-md py-4 border-2 border-deep-green mt-2 bg-[#fffcf7]">
                        
                        <div class="float-left w-[900px] pl-4">
                        @if($notification->read_at==NULL) <!--Probably the only idea I got rn if the notification is [Unread] LMAO-->
                                    <p class="inline text-dirty-white bg-green px-2 py-2 w-max rounded-sm shadow-sm">[ New ]</p>
                                @endif
                            <p class="font-bold text-[18px] mt-2">{{ $notification->data['type'] }} Notification</p>
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
                            </div>
                        </div>
                        @hasanyrole('Barangay Captain|Barangay Secretary')
                            <div class="float-right flex flex-row max-h-[30px] ml-4 mt-10">
                                <form method="GET" action="{{ route('viewNotifications', $notification->id) }}">
                                    <button id="btn{{ $notification->id }}" class="hover:text-green"><i class="fa-solid fa-eye"></i></button>
                                </form>
                                <button class="hover:text-green ml-8 mr-4"><i class="fa-solid fa-trash"></i></button>
                            </div>
                            <div id="NotifModal" class="modal hidden fixed z-10 pt-28 top-0 mx-auto mt-[150px] w-[1000px] h-[1000px] drop-shadow-lg border-deep-green">
                                <div class="bg-dirty-white m-auto p-5 border-1 rounded w-5/6">
                                    <span class="close font-deep-green float-right text-xl font-bold hover:cursor-pointer">&times;</span>
                                    <div class="">
                                        <p class="font-robotocondensed text-[28px] text-deep-green" >{{ $notification->document['docName'] }} Document</p>
                                        <p>{{ $notification->resident['firstName'] }} {{ $notification->resident['lastName'] }} requested {{ $notification->document['docName'] }} Document</p>
                                        <br>
                                        <p>{{ $notification->notificationCreated }}</p>
                                    </div>
                                </div>
                            </div>
                        @endhasanyrole
                        @hasanyrole('User|Barangay Health Worker')
                            <div class="float-right flex flex-row max-h-[30px] ml-4 mt-10">
                                <form method="GET" action="{{ route('viewNotifications', $notification->id) }}">
                                    <button id="btn{{ $notification->id }}" class="hover:text-green"><i class="fa-solid fa-eye"></i></button>
                                </form>
                                <button class="hover:text-green ml-8 mr-4"><i class="fa-solid fa-trash"></i></button>
                            </div>
                            <div id="NotifModal" class="modal hidden fixed z-10 pt-28 top-0 mx-auto mt-[50px] w-[1000px] h-[1000px] drop-shadow-lg border-deep-green">
                                <div class="bg-deep-green p-5 border-1 rounded">
                                    <span class="close font-deep-green float-right text-xl font-bold hover:cursor-pointer">&times;</span>
                                    <div class="">
                                        <p class="font-robotocondensed text-[28px] text-deep-green" >{{ $notification->document['docName'] }} {{ $notification->data['transaction']['serviceStatus'] }}</p>
                                        <p>Your Document {{ $notification->document['docName'] }} with a document number: {{ $notification->data['transaction']['docNumber'] }} is being {{ $notification->data['transaction']['serviceStatus'] }} by {{ $notification->processedByUser['firstName'] }} {{ $notification->processedByUser['lastName'] }}.</p>
                                        <br>
                                        <p>{{ $notification->processedByUser['firstName'] }} {{ $notification->processedByUser['lastName'] }}</p>
                                        <p>{{ $notification->processedBy['userLevel'] }}</p>
                                        <p>{{ $notification->notificationCreated }}</p>
                                    </div>
                                </div>
                            </div>
                        @endhasanyrole
                    </div>
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
                            window.location.reload();
                        }
                    </script>
                @empty
                    <div class="py-8">
                        <hr class="h-2 mt-4 w-[315px] ml-[388px] bg-stone-700 border-0">
                        <p class="mt-4 text-4xl ml-[395px] font-robotocondensed w-80 text-justify">
                            NOTHING HERE TO SEE
                        </p>
                        <hr class="h-2 mt-4 w-[315px] ml-[388px] bg-stone-700 border-0">
                    </div>
                @endforelse
           
        </div>
    </div>
</x-page-layout>

