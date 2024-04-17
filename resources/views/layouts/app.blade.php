<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'BPMS') }}</title>

    <script src="https://kit.fontawesome.com/c0346081e5.js" crossorigin="anonymous"></script>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script&family=Libre+Baskerville&family=Lora&family=Playfair+Display&family=Poppins&family=Roboto&family=Roboto+Condensed&family=Rozha+One&display=swap" rel="stylesheet">
    <!-- Scripts -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script src="{{ asset('js/app.js') }}" defer></script>

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
        <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v3.x.x/dist/alpine.min.js" defer></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

</head>

<body class=" bg-dirty-white font-sans antialiased mb-5">
    <div class="min-h-screen bg-dirty-white mb-10">
        @hasanyrole('Barangay Captain|Barangay Secretary|User|Barangay Health Worker')
        @include('layouts.navigation')
        @endhasanyrole
        <!-- Page Heading -->


        <!-- Page Content -->
        <main>
            {{ $slot }}
        </main>
    </div>

    <script>





    document.addEventListener('DOMContentLoaded', function () {
    const infoTypeSelect = document.getElementById('info-type');
    const infoInput = document.getElementById('info-input');
    const infoLabel = document.getElementById('current-info-label');

    infoTypeSelect.addEventListener('change', function () {
        const selectedType = this.value;

        // Fetch user information dynamically
        fetch(`/residents/get-current-user-info?type=${selectedType}`)
            .then(response => response.json())
            .then(data => {
                console.log(data);
                // Check if the 'user' property exists in the response
                if (data && data.user && data.relatedInfo) {
                    const relatedInfo = data.relatedInfo;
                    const currentInfo = relatedInfo[selectedType];

                    console.log('Related Info:', relatedInfo);

                    // Update the input field with fetched data
                    if (currentInfo !== null && currentInfo !== undefined) {
                        infoInput.value = currentInfo;
                        infoLabel.innerHTML = `OLD INFORMATION`;
                    } else {
                        infoInput.value = `No data available for ${selectedType}`;
                    }
                } else {
                    infoInput.value = `Error: Unable to fetch user information`;
                }
            })
            .catch(error => {
                console.error('Fetch error:', error);
                infoInput.value = `Unable to fetch user information`;
                infoLabel.innerHTML = `Error`;
            });
    });
});

    document.addEventListener('DOMContentLoaded', function () {
        function showRequirements() {
            // Get the selected option
            var selectedOption = document.getElementById('selectedDocument').value;
            console.log('Selected Option:', selectedOption);
            var requirements;
            var note;

            // Set requirements based on selected option
            switch(selectedOption) {
            case '1':
                requirements = "* Purpose of Request:";
                note = "Ex: Scholarship Application"
            break;
            case '2':
                requirements = "* Please specify the sitio where the disco will be held: ";
                note = "Ex: Sitio Labangon"
                break;
            case '4':
                requirements = "* Purpose of Request: ";
                note = "Ex: Senior Citizen Association Membership Update/Application"
                break;
            case '11':
                requirements = "* Please specify the name of the Business in the Purpose of Request Field";
                note = "Ex: Nicko's Kitchen"
                break;
            case '5':
                requirements = "*Please choose between Financial Assistance or Low Income";
                note = "Reason for Request of Indigency"
                break;
            case '6':
                requirements = "Please specify the name of the Business in the Purpose of Request Field";
                break;
            default:
                requirements = "";
                note = "";
        }


            // Show the corresponding requirements container
            document.getElementById('requirementsContainer').innerHTML = requirements;
            document.getElementById('notesContainer').innerHTML = note;
        }

        // Call the function initially to show requirements for the default selected option
        showRequirements();

        // Attach event listener to the dropdown to update requirements when option is changed
        document.getElementById('selectedDocument').addEventListener('change', function() {
            showRequirements();
        });

    });

    $(document).ready(function () {
        $('.status-link').click(function (e) {
            e.preventDefault();
            var status = $(this).data('status');
            $.ajax({
                url: '/get-documents',
                method: 'GET',
                data: { status: status },
                success: function (response) {
                    $('#documents-table tbody').empty();
                    $.each(response, function(index, document) {
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
                        newRow.append('<td class="px-6 py-4 w-[295px] font-robotocondensed text-deep-green text-[16px] font-bold">' + formattedDate + '</td>');
                        newRow.append('<td class="px-6 py-4 w-[470px] font-robotocondensed text-deep-green text-[16px] font-bold">' + docType + '</td>');
                        newRow.append('<td class="px-6 py-4 w-[490px] font-robotocondensed text-deep-green text-[16px] font-bold">' + docName + '</td>');
                        newRow.append('<td class="px-6 py-4 w-[420px] font-robotocondensed text-deep-green text-[16px] font-bold">' + paymentStatus + '</td>');
                        newRow.append('<td class="px-6 py-4 w-[450px] font-robotocondensed text-deep-green text-[16px] font-bold">' + document.serviceStatus + '</td>');
                        newRow.append('<td class="px-6 py-4 w-[190px]"><a href="/showRequest/' + document.id + '" class="text-deep-green hover:text-green"><i class="fa-solid fa-eye"></i></a></td>');
                        $('#documents-table tbody').append(newRow);
                });
            },
                error: function (xhr, status, error) {
                    console.error(error); // Log any errors
                }
            });
        });
    });

        document.getElementById('captainstatus').addEventListener('click', function() {
            var selectedValue = this.value;
            var submitButton = document.getElementById('submitButton');
            console.log(selectedValue);
            if (selectedValue == 0) {
                submitButton.disabled = true;
            } else {
                submitButton.disabled = false;
            }
        });

        document.addEventListener('DOMContentLoaded', function() {
            const printLink = document.getElementById('printLink');
            const approvePickup = document.getElementById('approvePickup');

            if (printLink) {
                printLink.addEventListener('click', function(event) {
                    console.log('Print link clicked');
                    // After a short delay to ensure the download has started, remove the 'hidden' attribute
                    setTimeout(() => {
                        approvePickup.removeAttribute('hidden');
                    }, 500); // Adjust the delay as needed
                });
            }
        });

    </script>


</body>

</html>