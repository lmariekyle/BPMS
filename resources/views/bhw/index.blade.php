<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Barangay Health Workers') }}
        </h2>
    </x-slot>

    <div class="bg-olive-green w-[1400px] h-[813px] ml-8 mt-16 px-5 py-5 rounded-[48px] flex flex-row">

        <p class="text-dirty-white font-robotocondensed ml-3 font-bold text-[48px] absolute text-start">BARANGAY HEALTH WORKERS</p>
        <!--Search-->
        <form type="get" action="{{ route('bhwSearch') }}">
            <div class="ml-[620px]">
                <div class="mt-4 flex w-[370px] h-[30px] flex-wrap items-stretch">
                    <input type="type"
                    name="search"
                    class="m-0 -mr-0.5 block w-[1px] min-w-0 flex-auto rounded-lg border border-solid border-neutral-300 bg-white bg-clip-padding px-3 py-[0.25rem] text-base font-normal leading-[1.6] text-neutral-700 outline-none transition duration-200 ease-in-out focus:z-[3] focus:border-primary focus:text-neutral-700 focus:shadow-[inset_0_0_0_1px_rgb(59,113,202)] focus:outline-none dark:border-neutral-600 dark:text-neutral-200 dark:placeholder:text-neutral-200 dark:focus:border-primary"
                    placeholder="Search"
                    aria-label="Search"
                    aria-describedby="button-addon1" />
    
                    <!--Search Button-->
                    <button
                    class="relative z-[2] flex items-center rounded-r bg-primary px-6 py-2.5 text-xs font-medium uppercase leading-tight text-white shadow-md transition duration-150 ease-in-out hover:bg-primary-700 hover:shadow-lg focus:bg-primary-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-primary-800 active:shadow-lg"
                    type="submit"
                    id="button-addon1"
                    data-te-ripple-init
                    data-te-ripple-color="light">
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 20 20"
                            fill="currentColor"
                            class="h-5 w-5">
                            <path
                            fill-rule="evenodd"
                            d="M9 3.5a5.5 5.5 0 100 11 5.5 5.5 0 000-11zM2 9a7 7 0 1112.452 4.391l3.328 3.329a.75.75 0 11-1.06 1.06l-3.329-3.328A7 7 0 012 9z"
                            clip-rule="evenodd" />
                        </svg>
                    </button>
                </div>
            </div>
        </form>

        <a href="/assign" class="button h-8 w-max text-center mt-6 py-1 ml-[200px]">Assign Sitio</a>

                    <!--ACTUAL TABLE -->

        <div class="bg-dirty-white w-[1400px] h-max absolute mt-20 -ml-5 border shadow-inner">
            <!--TABLE HEADER-->
            <div class="bg-green w-[1400px] h-[48px] absolute flex flex-row border border-white shadow-lg">
                    <p class="font-robotocondensed text-dirty-white text-[18px] font-bold px-max py-2 ml-7">ID</p>
                    <p class="font-robotocondensed text-dirty-white text-[18px] font-bold px-max py-2 ml-44">BHW NAME</p>
                    <p class="font-robotocondensed text-dirty-white text-[18px] font-bold px-max py-2 ml-60">SITIO ASSIGNED</p>
                    <p class="font-robotocondensed text-dirty-white text-[18px] font-bold px-max py-2 ml-52">STATUS</p>
                    <p class="font-robotocondensed text-dirty-white text-[18px] font-bold px-max py-2 ml-72">ACTIONS</p>
            </div>

            <table class="mt-10">
                <tbody>
                @foreach ($bhws as $bhw)
                     <tr class="border shadow-md">
                        <td class="px-6 py-4 w-[200px] font-robotocondensed text-deep-green text-[16px] font-bold">
                        {{ $bhw->idNumber }}
                        </td>
                        <td class="px-6 py-4  w-[350px] font-robotocondensed text-deep-green text-[16px] font-bold">
                        {{ $bhw->lastName }}, {{ $bhw->firstName }} {{ $bhw->middleName[0] }}
                        </td>
                        <td class="px-6 py-4  w-[350px] font-robotocondensed text-deep-green text-[16px] font-bold">
                            {{ $bhw->assignedSitioName }}
                        </td>
                        <td class="px-6 py-4 w-[380px] font-robotocondensed text-deep-green text-[16px] font-bold ">
                            {{ $bhw->userStatus}}
                        </td>
                        <td class="px-6 py-4 w-[205px]">
                            <a href="{{ route('bhw.show', $bhw->id) }}" class="text-deep-green hover:text-green"><i class="fa-solid fa-eye"></i></a>
                        </td>
                    </tr>
                @endforeach
                                      
                </tbody>
            </table>




        </div>

</x-app-layout>
