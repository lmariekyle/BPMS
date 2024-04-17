<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Barangay Health Workers') }}
        </h2>
    </x-slot>

    <style>
        .adminStatus select:invalid {
            background-color: none;
        }

        .adminStatus select:valid {
            background-color: green;
        }
    </style>

    @role('Admin')
    @include('layouts.navigation')
    @endrole

    <div class="bg-olive-green w-[1400px] h-[813px] ml-8 mt-16 px-5 py-5 rounded-[48px] flex flex-row">

        @role('User')
        <p class="text-dirty-white font-robotocondensed ml-3 font-bold text-[48px] text-start">YOUR REQUESTS</p>
        <!--Search-->
        <div class="flex flex-row  w-max h-max mt-6 ml-8 space-x-5">
            <div>
                <a href="" data-status="Pending" class="status-link px-2 py-1 w-max h-max bg-green border-1 border-deep-green shadow-md hover:bg-dirty-white text-dirty-white font-robotocondensed font-semibold hover:text-deep-green">UNPAID</a>
            </div>
            <div>
                <a href="" data-status="Paid" class="status-link px-2 py-1 w-max h-max bg-green border-1 border-deep-green shadow-md hover:bg-dirty-white text-dirty-white font-robotocondensed font-semibold hover:text-deep-green">PAID</a>
            </div>
            <div>
                <a href="" data-status="Processing" class="status-link px-2 py-1 w-max h-max bg-green border-1 border-deep-green shadow-md hover:bg-dirty-white text-dirty-white font-robotocondensed font-semibold hover:text-deep-green">ACTIVE</a>
            </div>
            <div>
                <a href="" data-status="Released" class="status-link px-2 py-1 w-max h-max bg-green border-1 border-deep-green shadow-md hover:bg-dirty-white text-dirty-white font-robotocondensed font-semibold hover:text-deep-green">RELEASED</a>
            </div>
            <div>
                <a href="" data-status="Denied" class="status-link px-2 py-1 w-max h-max bg-green border-1 border-deep-green shadow-md hover:bg-dirty-white text-dirty-white font-robotocondensed font-semibold hover:text-deep-green">DENIED</a>
            </div>
        </div>


        <!--ACTUAL TABLE -->
        <div class="bg-dirty-white w-[1400px] h-max absolute mt-20 -ml-5 border shadow-inner">
            <!--TABLE HEADER-->
            <div class="bg-green w-[1400px] h-[48px] absolute flex flex-row border border-white shadow-lg">
                <p class="font-robotocondensed text-dirty-white text-[16px] font-bold px-max py-2 ml-6">DATE OF REQUEST</p>
                <p class="font-robotocondensed text-dirty-white text-[16px] font-bold px-max py-2 ml-20">REQUEST TYPE</p>
                <p class="font-robotocondensed text-dirty-white text-[16px] font-bold px-max py-2 ml-40">TYPE OF DOCUMENT</p>
                <p class="font-robotocondensed text-dirty-white text-[16px] font-bold px-max py-2 ml-32">PAYMENT STATUS</p>
                <p class="font-robotocondensed text-dirty-white text-[16px] font-bold px-max py-2 ml-32">REQUEST STATUS</p>
                <p class="font-robotocondensed text-dirty-white text-[16px] font-bold px-max py-2 ml-44">ACTION</p>
            </div>

            <!--DISPLAY ONLY PLS CHANGE WHEN CODING WITH THE ACTUAL DATABASE-->
            <table id="documents-table" class="mt-10">
                <tbody>
                   @foreach($userTransactions as $userTransaction)
                    <tr class="border shadow-md">
                        <td class="px-6 py-4 w-[295px] font-robotocondensed text-deep-green text-[16px] font-bold">
                           {{$userTransaction->created_at->format('F d, Y')}}
                        </td>
                        <td class="px-6 py-4 w-[470px] font-robotocondensed text-deep-green text-[16px] font-bold">
                        {{$userTransaction->document->docType}}
                        </td>
                        <td class="px-6 py-4 w-[490px] font-robotocondensed text-deep-green text-[16px] font-bold">
                        {{$userTransaction->document->docName}}
                        </td>
                        <td class="px-6 py-4 w-[420px] font-robotocondensed text-deep-green text-[16px] font-bold ">
                        {{$userTransaction->transactionpayment->paymentStatus}}
                        </td>
                        <td class="px-6 py-4 w-[450px] font-robotocondensed text-deep-green text-[16px] font-bold">
                        {{$userTransaction->serviceStatus}}
                        </td>
                        <td class="px-6 py-4 w-[190px]">
                            <a href="{{route('resident.showrequest', $userTransaction->id)}}" class="text-deep-green hover:text-green"><i class="fa-solid fa-eye"></i></a>
                        </td>
                    </tr>
                 @endforeach
                </tbody>
            </table>
            <div class="flex flex-row justify-evenly mt-4 self-center">
               
            </div>    
        </div>
        @endrole
    </div>

</x-app-layout>