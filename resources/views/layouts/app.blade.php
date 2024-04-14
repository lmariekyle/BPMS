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

            // Set requirements based on selected option
            switch(selectedOption) {
            case '2':
                requirements = "Please specify the Sitio where the Disco will be held in the Purpose of Request Field. Ex: Sitio Labangon";
                break;
            case '11':
                requirements = "Please specify the name of the Business in the Purpose of Request Field";
                break;
            default:
                requirements = "Default requirements";
        }


            // Show the corresponding requirements container
            document.getElementById('requirementsContainer').innerHTML = requirements;
        }

        // Call the function initially to show requirements for the default selected option
        showRequirements();

        // Attach event listener to the dropdown to update requirements when option is changed
        document.getElementById('selectedDocument').addEventListener('change', function() {
            showRequirements();
        });

    });

    </script>


</body>

</html>