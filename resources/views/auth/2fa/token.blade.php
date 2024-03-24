<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Dancing+Script&family=Libre+Baskerville&family=Lora&family=Playfair+Display&family=Poppins&family=Roboto&family=Roboto+Condensed&family=Rozha+One&display=swap" rel="stylesheet">

        <!-- Scripts -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <script src="{{ asset('js/app.js') }}" defer></script>

    </head>
<body class="bg-dirty-white flex flex-col justify-center">

<div class="px-5 py-5 flex flex-row justify-start w-50 h-max bg-olive-green">

<div class="ml-10 w-[150px] h-[150px] rounded-full border-2 bg-dirty-white border-green flex justify-center items-center">
    <img src="{{ asset('images/PoblacionDalLogo.png') }}" alt="">
</div>
<div class="flex flex-col ml-5 mt-7">
    <h1 class="font-roboto text-[40px] text-dirty-white text-center">BARANGAY POBLACION</h1>
    <h2 class="font-roboto text-[40px] -mt-3 text-dirty-white text-center tracking-wide">MANAGEMENT SYSTEM</h2>
</div>
</div>

   
<div class="flex flex-col mt-[4rem] justify-center items-center w-max h-max ml-[5rem]">
    @if(session()->has('error'))
        <p class="alert alert-info">
            {!! session()->get('error') !!}
        </p>
    @endif

    <form method="POST" action="{{ route('auth.2fa.store') }}">
        {{ csrf_field() }}
        
        <h1 class="font-poppin text-[24px] font-bold ">Two Factor Verification</h1>

        <p class="mt-2 font-poppin text-[18px] text-muted">
            For security reasons, you must provide the two factor code sent to your email address
            @if ($reason)
                {{ ' because ' . $reason }}
            @endif
            .
        </p>

        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text">
                    <i class="fa fa-lock"></i>
                </span>
            </div>
            
            <input  name="token" 
                    type="text" 
                    class="form-control {{ $errors->has('token') ? 'is-invalid' : '' }} mt-4" 
                    required 
                    autofocus 
                    placeholder="Two Factor Code" />

            @if($errors->has('token'))
                <div class="invalid-feedback">
                    {{ $errors->first('token') }}
                </div>
            @endif
        </div>

        <div class="row">
            <div class="col-6">
                <button type="submit" class="btn btn-primary px-4 py-1 bg-olive-green rounded-md shadow-md text-dirty-white text-[16px] font-poppin">
                    VERIFY
                </button>
            </div>
        </div>

        <a class="btn btn-link font-poppin text-[14px] mt-[4rem]" href="{{ url('/login') }}">
            Need a new code ?
        </a>
    </form>

</div>



</html>