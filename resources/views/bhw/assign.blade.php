<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Barangay Health Workers') }}
        </h2>
    </x-slot>

    <div class="bg-dirty-white w-[1400px] h-[813px] ml-8 mt-16 px-5 py-5 rounded-[48px] border-2 border-deep-green flex flex-row">

        <a href=""><i class="fa-solid fa-arrow-left text-deep-green mt-6 text-[24px]"></i></a>
        <p class="text-deep-green font-robotocondensed ml-10 font-bold text-[48px] absolute text-start">SITIO ASSIGNMENT</p>
        
                    <!--ACTUAL TABLE -->

        <div class="bg-dirty-white w-[1390px] h-max absolute mt-28 -ml-5 flex justify-center">
            <!--TABLE HEADER-->
            <div class="bg-green w-[890px] h-[48px] absolute flex flex-row border border-white shadow-lg">
                    <p class="font-robotocondensed text-dirty-white text-[18px] font-bold px-max py-2 ml-7">ID</p>
                    <p class="font-robotocondensed text-dirty-white text-[18px] font-bold px-max py-2 ml-36">BHW NAME</p>
                    <p class="font-robotocondensed text-dirty-white text-[18px] font-bold px-max py-2 ml-[470px]">ASSIGN SITIO</p>
            </div>

            <table class="mt-10 flex justify-center place-content-center">
                <tbody>
                    <form method="POST" action="{{ route('assign.update', Auth::user()->id) }}">
                        @csrf
                        @method('PUT')
                    @foreach ($bhws as $bhw)
                        <tr class="border shadow-md px-16 py-16">
                            <input type="hidden" name="bhwID[]" value="{{$bhw->id}}">
                                <td class="px-6 py-4 w-[150px] font-robotocondensed text-deep-green text-[16px] font-bold">
                                {{ $bhw->idNumber }}
                                </td>
                                <td class="px-6 py-4  w-[500px] font-robotocondensed text-deep-green text-[16px] font-bold">
                                {{ $bhw->lastname }}, {{ $bhw->firstname }} {{ $bhw->middlename[0] }}
                                </td>
                                <td class="px-6 py-4  w-[50px] font-robotocondensed text-deep-green text-[16px] font-bold">
                                    {{ $bhw->assignedSitioName }}
                                </td>
                                <td class="px-6 py-4 font-robotocondensed text-deep-green text-[16px] font-bold text-right">
                                        <select id="sitio" name="sitio[]" class="bg-dirty-white">
                                        <option value="{{$bhw->assignedSitioID}}" class="bg-dirty-white">{{$bhw->assignedSitio}}</option>
                                        @foreach ($sitios as $sitio)
                                        <option value="{{$sitio->id}}" class="bg-dirty-white">{{ $sitio->sitioName }}</option>
                                        @endforeach
                                    </select>                            
                                </td>
                        </tr>
                    @endforeach                   
                </tbody>
            </table>
                     <!-- <a href="/submit" class="button absolute bottom-0 h-8 w-max text-center mt-3 ml-[550px]">Approve Assignments</a> -->
                <div class="absolute bottom-0 h-8 w-max text-center mt-3 ml-[550px]">
                    <x-button type="submit">
                        Approve Assignments
                    </x-button>
                </div>
        </div>
        </form>
    </div>  
   
</x-app-layout>
