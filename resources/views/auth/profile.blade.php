<x-page-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="pt-10 pb-14 bg-dirty-white">
        <div class="max-w-max max-h-max sm:px-6 lg:px-8">
            <div class="">
                <div class="">
                    <div class="max-w-sm max-h-12 w-96 h-12 text-center">
                        <a href="{{ route('dashboard') }}" class="float-left mt-4">
                            <i class="fa-sharp fa-solid fa-arrow-left text-3xl text-black"></i>
                        </a>
                        <p class="font-roboto font-bold text-black text-5xl">VIEW PROFILE</p>
                        <a href="{{ route('notifications') }}" class="info absolute right-0 mr-14 -mt-[3rem] border-2 border-dirty-white rounded-full w-[12rem] px-2 py-2 bg-green text-dirty-white font-robotocondensed text=[24px] shadow-lg font-bold">
                            NOTIFICATIONS
                        </a>
                        <div class="still hide bg-dirty-white py-2 px-2 border-2 rounded-xl right-0 mr-10">
                            <hr class="h-px bg-stone-500 border-0">
                            @forelse($notifications as $notification)
                            <p class="text-xs font-robotocondensed w-80 text-justify">
                                <br>
                                New {{ $notification->data['type'] }} Notification
                                @if($notification->data['type'] == 'Transaction')
                            <p class="text-xs font-robotocondensed text-justify">
                                {{ $notification->resident['firstName'] }} {{ $notification->resident['lastName'] }} requested {{ $notification->document['docName'] }}
                            </p>
                            @else
                            <p class="text-xs font-robotocondensed text-justify">
                                {{ $notification->document['docName'] }} is now {{ $notification->data['transaction']['serviceStatus'] }}
                            </p>
                            @endif
                            <!--Notification title then like at most 20 letters per notif (if exceeded then
                                        replace the rest of the text with [...]-->
                            </p>
                            <br>
                            <hr class="h-px bg-stone-500 border-0">
                            @empty
                            <p class="text-xs font-robotocondensed w-80 text-justify">
                                <br>
                                NO NEW NOTIFICATIONS LOSER
                                <br>
                                <br>
                                <hr>
                            </p>
                            @endforelse
                        </div>
                    </div>

                    <div class="max-h-[837px] h-[837px] max-w-[1178px] w-[1178px] mt-8 ml-14 p-14 border rounded bg-dirty-white font-roboto">
                        <div class="relative">
                            <div class="mr-14 float-left max-h-[324px] max-w-[273px] place-content-center bg-dirty-white border-2 border-green h-[324px] w-[273px]">
                                <img src="/{{$user->profileImage}}" class="max-h-[324px] max-w-[273px] h-[324px] w-[273px]" alt="Profile Image">
                            </div>
                            <a href="{{ route('password.request') }}" class="absolute mt-[22rem] left-0 button w-[248px] h-[49px] text-dirty-white text-center px-1 py-2 text-[22px]">
                                Change Password
                            </a>
                            <div class="absolute mt-[26rem] left-0 button w-[248px] h-[49px] text-dirty-white text-center px-1 py-2 text-[22px]">
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <a href="route('logout')" onclick="event.preventDefault();
                                                    this.closest('form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                </form>
                            </div>
                            <a href="{{ route('password.request') }}" class="absolute mt-[22rem] right-0 button w-[248px] h-[49px] text-dirty-white text-center px-1 py-2 text-[22px]">
                                Request Account Update
                            </a>

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