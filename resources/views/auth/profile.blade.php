<x-page-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="pt-10 pb-14">
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
                        <div class="still hide p-1 border-2 bg-green rounded right-0 mr-10">
                            <div class="bg-[#fffcf7] border-2 border-stone-500 rounded">
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
                                <p class="text-xs font-robotocondensed w-80 text-justify ml-3">
                                    <br>
                                    NO NEW NOTIFICATIONS
                                    <br>
                                    <br>
                                    <hr>
                                </p>
                                @endforelse
                        </div>
                    </div>

                    <div class="max-h-[837px] h-[550px] max-w-[1178px] w-[1800px] mt-[4rem] ml-[8rem] p-14 border-2 border-deep-green shadow-md rounded bg-dirty-white font-roboto">
                        <div class="relative">
                            <div class="mr-14 mt-2 float-left max-h-[324px] max-w-[273px] place-content-center">
                                <img src="/{{$user->profileImage}}" class="max-h-[324px] max-w-[273px] h-[324px] w-[273px] rounded-lg border-8 shadow-sm border-white" alt="Profile Image">
                            </div>
                            
                            <div class="absolute flex flex-col w-max h-max mt-[22rem] space-y-2 ml-[1rem]">
                                @role('User')
                                <a href="{{ route('change_password') }}" class="left-0 button w-[228px] h-max text-deep-green  text-center px-1 py-1 text-[14px] bg-[#fffcf7] hover:shadow-md border-2 border-green">
                                    Change Password
                                </a>
                                @endrole
                                <a href="{{ route('services.request', ['docType' => 'Account Information Change']) }}" class="right-0 button w-[228px] h-max text-deep-green text-center px-1 py-1 text-[14px] bg-[#fffcf7] hover:shadow-md border-2 border-green">
                                    Request Account Update
                                </a>
                                <div class="left-0 button w-[228px] h-max text-deep-green  text-center px-1 py-1 text-[14px] bg-[#fffcf7] border-2 hover:shadow-md border-green">
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <a href="route('logout')" onclick="event.preventDefault();
                                                        this.closest('form').submit();">
                                            {{ __('Logout') }}
                                        </a>
                                    </form>
                                </div>
                            </div>

                            <div class="pt-9 pb-10 max-h-[324px] h-[324px] w-max text-2xl float-right -mt-[24rem]">
                                <div class="float-left">
                                    <div class="">
                                        <p class="text-left text-deep-green text-[18px]">First Name:</p>
                                        <div class="text-center w-[318px] text-deep-green bg-[#f5f3f4] shadow-inner rounded-md py-2">{{$personalInfo->firstName}}</div>
                                    </div>
                                    <div class="mt-8">
                                        <p class="text-left text-deep-green text-[18px]">Last Name:</p>
                                        <div class="text-center w-[318px] text-deep-green bg-[#f5f3f4] shadow-inner rounded-md py-2">{{$personalInfo->lastName}}</div>
                                    </div>
                                    <div class="mt-8">
                                        <p class="text-left text-deep-green text-[18px]">Middle Initial:</p>
                                        <div class="text-center w-[318px] text-deep-green bg-[#f5f3f4] shadow-inner rounded-md py-2">{{$personalInfo->middleName[0]}}.</div>
                                    </div>
                                </div>
                                <div class="float-right ml-8">
                                    <div>
                                        <p class="text-left text-deep-green text-[18px]">Address:</p>
                                        <div class="text-center w-[418px] text-deep-green bg-[#f5f3f4] shadow-inner rounded-md py-2">{{$personalInfo->sitio}}, {{$personalInfo->barangay}}</div>
                                    </div>
                                    <div class="mt-8">
                                        <p class="text-left text-deep-green text-[18px]">Email:</p>
                                        <div class="text-center w-[418px] text-deep-green bg-[#f5f3f4] shadow-inner rounded-md py-2">{{$user->email}}</div>
                                    </div>
                                    <div class="mt-8">
                                        <p class="text-left text-deep-green text-[18px]">Contact Number:</p>
                                        <div class="text-center w-[418px] text-deep-green bg-[#f5f3f4] shadow-inner rounded-md py-2">{{$user->contactNumber}}</div>
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