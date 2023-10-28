<x-page-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="pt-10 pb-14 bg-green">
        <div class="max-w-max max-h-max sm:px-6 lg:px-8">
            <div class="">
                <div class="">
                    <div class="max-w-sm max-h-12 w-96 h-12 text-center">
                        <a href="{{ route('dashboard') }}" class="float-left mt-4">
                            <i class="fa-sharp fa-solid fa-arrow-left text-3xl text-dirty-white"></i>
                        </a>
                        <p class="font-roboto font-bold text-dirty-white text-5xl">VIEW PROFILE</p>
                        <a href="{{ route('notifications') }}" class="info absolute right-0 mr-14 -mt-[3rem] border-2 border-dirty-white rounded-full w-[12rem] px-2 py-2 bg-green text-dirty-white font-robotocondensed text=[24px] shadow-lg font-bold">
                            NOTIFICATIONS
                        </a>
                        <div class="still hide bg-dirty-white p-1 border-2 bg-green rounded right-0 mr-10">
                            <div class="bg-dirty-white border-2 border-stone-500 rounded">
                                @forelse($notifications as $notification)
                                <p class="font-bold pt-1 text-xl font-robotocondensed mx-2 w-80 text-justify">
                                    New {{ $notification->data['type'] }} Notification
                                </p>
                                @if($notification->data['type'] == 'Transaction')
                                <div class="text-base font-robotocondensed text-justify mr-3 ml-4 mb-1 flex flex-row">
                                    <p>• {{ $notification->resident['firstName'] }} {{ $notification->resident['lastName'] }} requested</p>
                                    <p class="ml-1 text-red-500">[{{ $notification->document['docName'] }}]</p>
                                    <p>.</p>
                                </div>
                                @else
                                <div class="text-base font-robotocondensed text-justify mr-3 ml-4 mb-1 flex flex-row">
                                    <p>• {{ $notification->document['docName'] }} is now</p>
                                    <p class="ml-1 text-red-500">[{{ $notification->data['transaction']['serviceStatus'] }}]</p>
                                    <p>.</p>
                                </div>
                                @endif
                                <!--Notification title then like at most 20 letters per notif (if exceeded then
                                            replace the rest of the text with [...]-->
                                <hr class="h-px bg-stone-500 border-0">
                                @empty
                                <p class="text-base ml-4 font-robotocondensed w-80 text-justify">
                                    <br>
                                    NO NEW NOTIFICATIONS
                                    <br>
                                    <br>
                                    <hr>
                                </p>
                                @endforelse
                        </div>
                    </div>

                    <div class="max-h-[837px] h-[550px] max-w-[1178px] w-[1178px] mt-[8rem] ml-[18rem] p-14 border-2 border-deep-green shadow-md rounded bg-dirty-white font-roboto">
                        <div class="relative">
                            <div class="mr-14 float-left max-h-[324px] max-w-[273px] place-content-center bg-dirty-white border-2 border-green h-[324px] w-[273px]">
                                <img src="/{{$user->profileImage}}" class="max-h-[324px] max-w-[273px] h-[324px] w-[273px]" alt="Profile Image">
                            </div>
                            
                            <div class="absolute flex flex-row w-max h-max mt-[22rem] ml-[20.5rem] space-x-4">
                                @role('User')
                                <a href="{{ route('password.request') }}" class="left-0 button w-[228px] h-[49px] text-deep-green  text-center px-1 py-2 text-[18px] bg-dirty-white hover:shadow-md border-2 border-green">
                                    Change Password
                                </a>
                                @endrole
                                <a href="{{ route('password.request') }}" class="right-0 button w-[228px] h-[49px] text-deep-green text-center px-1 py-2 text-[18px] bg-dirty-white hover:shadow-md border-2 border-green">
                                    Request Account Update
                                </a>
                                <div class="left-0 button w-[228px] h-[49px] text-deep-green  text-center px-1 py-2 text-[18px] bg-dirty-white border-2 hover:shadow-md border-green">
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <a href="route('logout')" onclick="event.preventDefault();
                                                        this.closest('form').submit();">
                                            {{ __('Logout') }}
                                        </a>
                                    </form>
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
                    </div>
                </div>
            </div>
        </div>
</x-page-layout>

<style>
    .hide {
        display: none;
    }

    .still:hover {
        position: absolute;
        display: block;
        z-index: 9;
    }

    .info:hover+.hide {
        position: absolute;
        display: block;
        z-index: 9;
    }
</style>


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