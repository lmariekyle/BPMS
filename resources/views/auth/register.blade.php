    <x-page-layout>
        <div class="absolute left-[33px] top-[49px] flex justify-start">
            <a href="/accounts">
                <i class="fa-sharp fa-solid fa-arrow-left text-3xl mt-4" style="color:#fdffee;"></i>
            </a>
            <p class="font-robotocondensed font-bold ml-[20px] text-dirty-white text-5xl">Account Registration</p>
            <div class="ml-12 mt-3">
                @include('components.flash')
            </div>
        </div>


        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('register') }}" class="font-robotocondensed text-xl" enctype="multipart/form-data">
            @csrf

            <div class="absolute mt-[8rem] ml-14 w-[13rem] h-[8rem]">
                <i class="fa-solid fa-image text-[200px] text-dirty-white"></i>
                <div>
                    <input id="profileImage" class="-mt-[5px] w-[15rem] h-[42px] px-2 py-2 text-center text-[14px] text-dirty-white file:w-[7rem] file:h-[42px]file:overflow-hidden file:bg-deep-green file:text-[14px] file:text-dirty-white file:font-robotocondensed file:cursor-pointer" type="file" name="profileImage" />
                </div>
            </div>

            <!-- Name -->
            @role('Admin')
            <!-- <div class="absolute left-[866px] top-[181px]">
                    <x-label for="idNumber" :value="__('ID Number')" class="font-roboto text-xl" style="color:white;"/>

                    <x-input id="idNumber" class="block mb-4 w-[500px] h-[42px] bg-dirty-white" type="text" name="idNumber" :value="old('idNumber')" required autofocus />
                </div> -->
            @endrole('Admin')

            <div class="absolute left-[333px] top-[181px]">
                <div class="-mt-6 mb-2">
                    <p class="font-poppins font-light text-dirty-white text-[12px]">Fields with * are required fields.</p>
                </div>
                <div>
                    <x-label for="firstname" :value="__('* First Name')" class="font-roboto text-xl" style="color:white;" />

                    <x-input id="firstname" class="block mb-4 w-[500px] h-[42px] bg-dirty-white" type="text" name="firstname" :value="old('name')" required autofocus />
                </div>

                <div>
                    <x-label for="lastname" :value="__('* Last Name')" class="font-roboto text-xl" style="color:white;" />

                    <x-input id="lastname" class="block mb-4 w-[500px] h-[42px] bg-dirty-white" type="text" name="lastname" :value="old('lastname')" required autofocus />
                </div>

                <div>
                    <x-label for="middlename" :value="__('Middle Name')" class="font-roboto text-xl" style="color:white;" />

                    <x-input id="middlename" class="block mb-4 w-[500px] h-[42px] bg-dirty-white" type="text" name="middlename" :value="old('middlename')" autofocus />
                </div>

                <!-- Email Address -->
                <div>
                    <x-label for="email" :value="__('* Email')" class="font-roboto text-xl" style="color:white;" />

                    <x-input id="email" class="block mb-4 w-[500px] h-[42px] bg-dirty-white" type="email" name="email" :value="old('email')" required />
                </div>

                <div>
                    <x-label for="contactnumber" :value="__('* Contact Number')" class="font-roboto" style="color:white;" />
                    <div class="flex flex-row">
                    <input type="text" class="block mb-4 w-[50px] h-[42px] bg-dirty-white rounded-md" id="contactnumber" name="contactnumber" value="63" readonly>
                    <x-input id="contactnumber" class="block mb-4 w-[450px] h-[42px] bg-dirty-white" type="text" name="contactnumber" :value="old('contactnumber')" required autofocus />
                </div>
               
            </div>

                <div>
                    <x-label for="dateOfBirth" :value="__('* Date of Birth')" class="font-roboto text-xl" style="color:white;" />

                    <x-input id="dateOfBirth" class="block mb-4 w-52 h-[42px] bg-dirty-white" type="date" name="dateOfBirth" :value="old('dateOfBirth')" required autofocus />
                </div>
            </div>

            <div class="absolute left-[866px] top-[181px]">
                <div>
                    <x-label for="barangay" :value="__('* Barangay')" class="font-roboto text-xl" style="color:white;" />

                    <x-input id="barangay" class="block mb-4 w-[500px] h-[42px] bg-dirty-white" type="text" name="barangay" :value="'Poblacion'" readonly="readonly" required autofocus />
                </div>

                <div>
                    <x-label for="sitio" :value="__('* Sitio')" class="font-roboto text-xl" style="color:white;" />
                    <select id="sitio" class="block mb-4 w-[500px] h-[42px] bg-dirty-white rounded border-1" name="sitio" :value="old('sitio')" required autofocus>
                        @foreach($sitios as $sitio)
                        <option value="{{$sitio->id}}">{{$sitio->sitioName}}</option>
                        @endforeach
                    </select>
                </div>

                @role('Admin')
                <div>
                    <x-label for="userlevel" :value="__('* Account Type')" class="font-roboto text-xl" style="color:white;" />
                    <select id="userlevel" class="block mb-4 w-[500px] h-[42px] bg-dirty-white rounded border-1" name="userlevel" :value="old('userlevel')" required autofocus>
                        @foreach($roles as $role)
                        <option value="{{$role->name}}">{{$role->name}}</option>
                        @endforeach

                    </select>
                </div>
                @endrole



                <div class="mt-4" style="display: none;">
                    <div class="input-group">
                        <x-input id="password" class="form-control hidden" type="password" name="password" required autocomplete="new-password" />
                    </div>
                </div>

                <!-- Confirm Password -->
                <div class="mt-4" style="display: none;">
                    <div class="input-group">
                        <x-input id="password_confirmation" class="form-control hidden" type="password" name="password_confirmation" required />
                    </div>
                </div>

                <div class="text-center">
                    <x-button class="text-base mt-8 bg-deep-green text-dirty-white border-0 l-12">
                        <div class="generate-password">
                            {{ __('Create Account') }}
                        </div>
                    </x-button>
                </div>
            </div>

        </form>

        <script>
            $(document).ready(function() {

                function generatePassword() {
                    let charset = document.getElementById('lastname').value;
                    let password = "poblacion";
                    password += charset;
                    return password;
                }

                // sets password input fields
                $('.generate-password').on('click', function() {
                    let password = generatePassword();

                    $('#password').val(password);
                    $('#password_confirmation').val(password);
                });

            });

            document.addEventListener("DOMContentLoaded", function() {
                var currentDate = new Date();
                var maxYear = currentDate.getFullYear() - 18; // Maximum year for 18 years old and above

                var dateOfBirthInput = document.getElementById("dateOfBirth");
                dateOfBirthInput.setAttribute("max", formatDate(maxYear, 12, 31)); // Set maximum date to the end of the calculated maximum year

                // Format the date as YYYY-MM-DD
                function formatDate(year, month, day) {
                    month = String(month).padStart(2, "0");
                    day = String(day).padStart(2, "0");
                    return year + "-" + month + "-" + day;
                }
            });
        </script>
    </x-page-layout>