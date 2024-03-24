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
        // $("document").ready(function() {
        //     setTimeout(function() {
        //         $("div.alert").remove();
        //     }, 10000);
        // });

        document.addEventListener('DOMContentLoaded', function () {
    const infoTypeSelect = document.getElementById('info-type');
    const infoContainer = document.getElementById('current-info-container');
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
                    const currentUser = data.user;
                    const relatedInfo = data.relatedInfo;
                    const currentInfo = relatedInfo[selectedType];

                    console.log('Current User:', currentUser);
                    console.log('Related Info:', relatedInfo);
                    
                    // Update the current-info-container with fetched data
                    if (currentInfo !== null && currentInfo !== undefined) {
                        infoContainer.innerHTML = `${currentInfo}`;
                        infoLabel.innerHTML = `OLD INFORMATION`;
                    } else {
                        infoContainer.innerHTML = `No data available for ${selectedType}`;
                    }
                } else {
                    infoContainer.innerHTML = `Error: Unable to fetch user information`;
                }
            })
            .catch(error => {
                console.error('Fetch error:', error);
                infoContainer.innerHTML = `Unable to fetch user information`;
                infoLabel.innerHTML = `Error`;
            });
    });
});
    </script>


</body>

</html>