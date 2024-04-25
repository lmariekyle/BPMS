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
                    const relatedInfo = data.user;
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
            var fee;

            // Set requirements based on selected option
            switch(selectedOption) {
            case '1':
                requirements = "* Purpose of Request:";
                note = "Ex: Scholarship Application"
                fee = "PHP 100"
            break;
            case '2':
                requirements = "* Please specify the sitio where the disco will be held: ";
                note = "Ex: Sitio Labangon"
                fee = "PHP 530"
                break;
            case '3':
                requirements = "* Purpose of Request: ";
                note = "Ex: Senior Citizen Association Membership Update/Application"
                fee = "FREE"
                break;
            case '5':
                requirements = "* Please specify the complete name of your mother (maiden) and father";
                note = "Ex: Milagrosa Cruz and Peping Fajardo"
                fee = "PHP 330"
                break;
            case '4':
                requirements = "*Please choose between Financial Assistance or Low Income";
                note = "Reason for Request of Indigency"
                fee = "PHP 100"
                break;
            case '6':
                requirements = "Please specify the name of the Business in the Purpose of Request Field";
                note = "Ex: Nicko's Kitchen"
                fee = "PHP 330"
                break;
            default:
                requirements = "";
                note = "";
        }


            // Show the corresponding requirements container
            document.getElementById('requirementsContainer').innerHTML = requirements;
            document.getElementById('notesContainer').innerHTML = note;
            document.getElementById('feeContainer').innerHTML = fee;
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

    // document.getElementById('captainstatus').addEventListener('click', function(event) {
    //         event.stopPropagation(); // Stop event propagation
    //         var selectedValue = this.value;
    //         var submitButton = document.getElementById('submitButton');
    //         console.log(selectedValue);
    //         if (selectedValue == 0) {
    //             submitButton.disabled = true;
    //         } else {
    //             submitButton.disabled = false;
    //         }
    //     });

    //     document.getElementById('cashstatus').addEventListener('click', function(event) {
    //         event.stopPropagation(); // Stop event propagation
    //         var selectedValue = this.value;
    //         var submitButton = document.getElementById('submitButton');
    //         console.log(selectedValue);
    //         if (selectedValue == 1) {
    //             submitButton.disabled = true;
    //         } else {
    //             submitButton.disabled = false;
    //         }
    //     });

        document.addEventListener("DOMContentLoaded", function() {
        var modal = document.getElementById("RemarksModal");
        var denymodal = document.getElementById("DenyRemarksModal");

        var btn = document.getElementById("remarks");
        var btnDeny = document.getElementById("remarksDeny");

        var span = document.getElementsByClassName("close")[0];
        var spandeny = document.getElementsByClassName("closedeny")[0];

        // Open Modal
        btn.onclick = function(event) {
            console.log("Button clicked - Opening Remarks Modal");
            modal.style.display = "block";
            event.stopPropagation(); // Stop event propagation
        }

        btnDeny.onclick = function(event) {
            console.log("Button clicked - Opening Deny Remarks Modal");
            denymodal.style.display = "block";
            event.stopPropagation(); // Stop event propagation
        }

        // Close Modal (using the X button)
        span.onclick = function() {
            console.log("Closing Remarks Modal");
            modal.style.display = "none";
        }

        spandeny.onclick = function() {
            console.log("Closing Deny Remarks Modal");
            denymodal.style.display = "none";
        }

        // Close Modal (clicking anywhere else outside the Modal)
        window.onclick = function(event) {
            if (event.target == modal) {
                console.log("Clicked outside Remarks Modal - Closing Remarks Modal");
                modal.style.display = "none";
            }
            if (event.target == denymodal) {
                console.log("Clicked outside Deny Remarks Modal - Closing Deny Remarks Modal");
                denymodal.style.display = "none";
            }
        }
    });
    
    </script>

</body>

</html>