@if ($message = Session::get('success'))
<div class="alert w-max h-max font-roboto bg-lime-200 text-deep-green text-[18px] px-1 py-1 drop-shadow-md border rounded-md" id="alert">
        <strong>{{ $message }}</strong>
</div>
@endif


@if ($message = Session::get('error'))
<div class="alert w-max h-max font-roboto bg-red-200 text-deep-green text-[18px] px-4 py-4 drop-shadow-md" id="alert">
        <strong>{{ $message }}</strong>
</div>
@endif


@if ($message = Session::get('warning'))
<div class="alert w-max h-max font-roboto bg-red-200 text-deep-green text-[18px] px-4 py-4 drop-shadow-md" id="alert">
	<strong>{{ $message }}</strong>
</div>
@endif


@if ($message = Session::get('info'))
<div class="alert w-max h-max font-roboto bg-lime-200 text-deep-green text-[18px] px-1 py-1 drop-shadow-md border rounded-md" id="alert">
	<strong>{{ $message }}</strong>
</div>
@endif


@if ($errors->any())
<div class="alert alert w-max h-max font-roboto bg-red-200 text-deep-green text-[18px] px-1 py-1 drop-shadow-md border rounded-md" id="alert">	
	Please check the form below for errors
</div>
@endif