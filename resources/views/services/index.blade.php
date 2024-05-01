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
        @role('Admin')
        <p class="text-dirty-white font-robotocondensed ml-3 font-bold text-[48px] text-start">REQUESTS</p>

        <!--ACTUAL TABLE -->
        <div class="bg-dirty-white w-[1400px] h-max absolute mt-20 -ml-5 border shadow-inner">
            <!--TABLE HEADER-->
            <div class="bg-green w-[1400px] h-[48px] absolute flex flex-row border border-white shadow-lg">
                <p class="font-robotocondensed text-dirty-white text-[18px] font-bold px-max py-2 ml-6">REQUEST NO.</p>
                <p class="font-robotocondensed text-dirty-white text-[18px] font-bold px-max py-2 ml-[8rem]">SELECTED INFORMATION</p>
                <p class="font-robotocondensed text-dirty-white text-[18px] font-bold px-max py-2 ml-32">REQUESTED BY</p>
                <p class="font-robotocondensed text-dirty-white text-[18px] font-bold px-max py-2 ml-32">REQUEST STATUS</p>
                <p class="font-robotocondensed text-dirty-white text-[18px] font-bold px-max py-2 ml-44">ACTION</p>
            </div>

            <table class="mt-10">
                <tbody>
                    @forelse($accounts as $account)
                    <tr class="border shadow-md">
                        <td class="px-6 py-4 w-[295px] font-robotocondensed text-deep-green text-[16px] font-bold" style="width: 225px">
                            {{$account->id}}
                        </td>
                        <td class="px-8 py-4 w-[470px] font-robotocondensed text-deep-green text-[16px] font-bold" style="width: 360px">
                            @if($account->selectedInformation == 'email' || $account->selectedInformation == 'Email Address')
                                Email
                            @elseif($account->selectedInformation == 'contactNumber' || $account->selectedInformation == 'Contact Number')
                                Contact Number
                            @endif
                        </td>
                        <td class="px-[5rem] py-4 w-[490px] font-robotocondensed text-deep-green text-[16px] font-bold" style="width: 348px">
                            {{$account->resident['firstName']}} {{$account->resident['lastName']}}
                        </td>
                        <td class="px-6 py-4 font-robotocondensed text-deep-green text-[16px] font-bold w-[400px]">
                            {{$account->status}}
                        </td>
                        <td class="py-4 w-[190px]" style="width: 230px">
                            @if($account->status == "PENDING")
                                <a href="{{ route('auth.updateinfo', $account->id) }}" class="text-deep-green hover:text-green"><i class="fa-solid fa-eye"></i></a>
                            @else
                                
                            @endif
                        </td>
                        @empty
                        <td class="px-6 py-4 w-[420px] font-robotocondensed text-deep-green text-[16px] font-bold" style="width: 330px">
                            No Requests
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
            <div class="flex flex-row justify-evenly mt-4 self-center">
                {{$accounts->links()}}
            </div>  
        </div>
        @endrole
        @hasanyrole('Barangay Captain|Barangay Secretary')
        <p class="text-dirty-white font-robotocondensed ml-3 font-bold text-[48px] text-start">SEARCH REQUESTS</p>
        <!--Search-->
        <div class="">
            <form type="get" action="{{ route('requestSearch') }}">
                <div class="mt-4 ml-12 flex w-[370px] h-[30px] flex-wrap items-stretch">
                    <input type="type" name="search" class="m-0 -mr-0.5 block w-[1px] min-w-0 flex-auto rounded-lg border border-solid border-neutral-300 bg-white bg-clip-padding px-3 py-[0.25rem] text-base font-normal leading-[1.6] text-neutral-700 outline-none transition duration-200 ease-in-out focus:z-[3] focus:border-primary focus:text-neutral-700 focus:shadow-[inset_0_0_0_1px_rgb(59,113,202)] focus:outline-none dark:border-neutral-600 dark:text-neutral-200 dark:placeholder:text-neutral-200 dark:focus:border-primary" placeholder="Search" aria-label="Search" aria-describedby="button-addon1" />

                    <!--Search Button-->
                    <button class="relative z-[2] flex items-center rounded-r bg-primary px-6 py-2.5 text-xs font-medium uppercase leading-tight text-white shadow-md transition duration-150 ease-in-out hover:bg-primary-700 hover:shadow-lg focus:bg-primary-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-primary-800 active:shadow-lg" type="submit" id="button-addon1" data-te-ripple-init data-te-ripple-color="light">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="h-5 w-5">
                            <path fill-rule="evenodd" d="M9 3.5a5.5 5.5 0 100 11 5.5 5.5 0 000-11zM2 9a7 7 0 1112.452 4.391l3.328 3.329a.75.75 0 11-1.06 1.06l-3.329-3.328A7 7 0 012 9z" clip-rule="evenodd" />
                        </svg>
                    </button>
                </div>
            </form>
        </div>

        <div class="flex flex-row  space-x-5 w-[200px] h-[80px] ml-16 mt-7">
        
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
                <p class="font-robotocondensed text-dirty-white text-[18px] font-bold px-max py-2 ml-6">REQUEST ID</p>
                <p class="font-robotocondensed text-dirty-white text-[18px] font-bold px-max py-2 ml-20">SERVICE/CERTIFICATE TYPE</p>
                <p class="font-robotocondensed text-dirty-white text-[18px] font-bold px-max py-2 ml-40">DATE REQUESTED</p>
                <p class="font-robotocondensed text-dirty-white text-[18px] font-bold px-max py-2 ml-32">REQUESTED BY</p>
                <p class="font-robotocondensed text-dirty-white text-[18px] font-bold px-max py-2 ml-32">STATUS</p>
                <p class="font-robotocondensed text-dirty-white text-[18px] font-bold px-max py-2 ml-44">ACTION</p>
            </div>

            <!--DISPLAY ONLY PLS CHANGE WHEN CODING WITH THE ACTUAL DATABASE-->
            <table id="secretary-documents-table" class="mt-10">
                <tbody>
                    @forelse ($transactions as $transaction)
                    <tr class="border shadow-md">
                        <td class="px-6 py-4 w-[295px] font-robotocondensed text-deep-green text-[16px] font-bold">
                            {{ $transaction->id }}
                        </td>
                        <td class="px-6 py-4 w-[470px] font-robotocondensed text-deep-green text-[16px] font-bold">
                            {{ $transaction->document['docName'] }}
                        </td>
                        <td class="px-6 py-4 w-[490px] font-robotocondensed text-deep-green text-[16px] font-bold">
                            {{ $transaction->createdDate }}
                        </td>
                        <td class="px-6 py-4 w-[420px] font-robotocondensed text-deep-green text-[16px] font-bold ">
                            {{ $transaction->requesteeName}}
                        </td>
                        <td class="px-6 py-4 w-[450px] font-robotocondensed text-deep-green text-[16px] font-bold">
                            {{ $transaction->serviceStatus }}
                        </td>
                        <td class="px-6 py-4 w-[190px]">
                            <a href="{{ route('direction', $transaction->id) }}" class="text-deep-green hover:text-green"><i class="fa-solid fa-eye"></i></a>
                        </td>

                        @empty
                        <td class="px-6 py-4 font-robotocondensed text-deep-green text-[16px] font-bold">
                            We can't find the transaction
                        </td>
                    </tr>
                    @endforelse
                </tbody>   
            </table>
            <div class="flex flex-row justify-evenly mt-4 mb-2">
                {{$transactions->links()}}
            </div> 
        </div>
        @endhasanyrole
    </div>

    <script>
    $(document).ready(function () {
        $('.status-link').click(function (e) {
            e.preventDefault();
            var status = $(this).data('status');
            $.ajax({
                url: '/get-transactions',
                method: 'GET',
                data: { status: status },
                success: function (response) {
                    $('#secretary-documents-table tbody').empty();
                    $.each(response, function(index, document) {
                        console.log(document);
                        var residentFName = document.user.resident ? document.user.resident.firstName : 'N/A';
                        var residentLName = document.user.resident ? document.user.resident.lastName : 'N/A';
                        var paymentStatus = document.transactionpayment ? document.transactionpayment.paymentStatus : 'N/A';
                        var docType = document.document ? document.document.docType : 'N/A';
                        var docName = document.document ? document.document.docName : 'N/A';

                        var monthNames = ["January", "February", "March", "April", "May", "June",
                        "July", "August", "September", "October", "November", "December"];
                        var createdAt = new Date(document.created_at);

                        // Extract individual components of the date
                        var month = createdAt.getMonth(); // Months are zero-based, so add 1
                        var day = createdAt.getDate();
                        var year = createdAt.getFullYear();

                        // Format the date as Month-Day-Year
                        var formattedDate = monthNames[month] + ' ' + day + ', ' + year;

                        var newRow = $('<tr class="border shadow-md"></tr>');
                        newRow.append('<td class="px-6 py-4 w-[295px] font-robotocondensed text-deep-green text-[16px] font-bold">' + document.id + '</td>');
                        newRow.append('<td class="px-6 py-4 w-[470px] font-robotocondensed text-deep-green text-[16px] font-bold">' + docName + '</td>');
                        newRow.append('<td class="px-6 py-4 w-[490px] font-robotocondensed text-deep-green text-[16px] font-bold">' + formattedDate + '</td>');
                        newRow.append('<td class="px-6 py-4 w-[420px] font-robotocondensed text-deep-green text-[16px] font-bold">' + residentFName + ' ' + residentLName +'</td>');
                        newRow.append('<td class="px-6 py-4 w-[450px] font-robotocondensed text-deep-green text-[16px] font-bold">' + document.serviceStatus + '</td>');
                        newRow.append('<td class="px-6 py-4 w-[190px]"><a href="/direction/' + document.id + '" class="text-deep-green hover:text-green"><i class="fa-solid fa-eye"></i></a></td>');
                        $('#secretary-documents-table tbody').append(newRow);
                });
            },
                error: function (xhr, status, error) {
                    console.error(error); // Log any errors
                }
            });
        });
    });
    </script>

</x-app-layout>