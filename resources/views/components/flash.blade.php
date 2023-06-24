@if ($message = Session::get('success'))
<div class="alert alert-success alert-block" id="alert">
	<button type="button" class="close" data-bs-dismiss="alert">×</button>	
        <strong>{{ $message }}</strong>
</div>
@endif


@if ($message = Session::get('error'))
<div class="alert alert-danger alert-block" id="alert">
	<button type="button" class="close" data-bs-dismiss="alert">×</button>	
        <strong>{{ $message }}</strong>
</div>
@endif


@if ($message = Session::get('warning'))
<div class="alert alert-warning alert-block" id="alert">
	<button type="button" class="close" data-bs-dismiss="alert">×</button>	
	<strong>{{ $message }}</strong>
</div>
@endif


@if ($message = Session::get('info'))
<div class="alert alert-info alert-block" id="alert">
	<button type="button" class="close" data-bs-dismiss="alert">×</button>	
	<strong>{{ $message }}</strong>
</div>
@endif


@if ($errors->any())
<div class="alert alert-danger" id="alert">
	<button type="button" class="close" data-bs-dismiss="alert">×</button>	
	Please check the form below for errors
</div>
@endif