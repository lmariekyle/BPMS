@if ($message = Session::get('success'))
<div class="alert py-3 px-4 relative text-[16px] w-max h-max bg-lime-300 rounded-md shadow-md" role="alert" x-data="{ isOpen: true }" x-show="isOpen" class="alert">
	<span>{{ $message }}</span>
	<span class="close absolute top-0 bottom-0 right-0 ml-8 px-2 py-2" @click="isOpen = false">
            <svg class="fill-current h-6 w-6 text-red-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/></svg>
    </span>
</div>
@endif


@if ($message = Session::get('error'))
<div class="alert bg-red-100 border border-red-400 text-red-700 pr-[2rem] py-3 px-4 relative text-[16px] w-max h-max rounded-md shadow-md" role="alert" x-data="{ isOpen: true }" x-show="isOpen" class="alert">
        <strong> {{$message}}</strong>
        <span class="close absolute top-0 bottom-0 right-0 ml-8 px-2 py-2" @click="isOpen = false">
            <svg class="fill-current h-6 w-6 text-red-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/></svg>
        </span>
</div>
@endif


@if ($message = Session::get('warning'))
<div class="alert bg-red-100 border border-red-400 text-red-700 pr-[2rem] py-3 px-4 relative text-[16px] w-max h-max rounded-md shadow-md" role="alert" x-data="{ isOpen: true }" x-show="isOpen" class="alert">
        <strong>{{$message}}</strong>
        <span class="close absolute top-0 bottom-0 right-0 ml-8 px-2 py-2" @click="isOpen = false">
            <svg class="fill-current h-6 w-6 text-red-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/></svg>
        </span>
</div>
@endif


@if ($message = Session::get('info'))
<div class="alert w-max h-max font-roboto bg-lime-200 text-deep-green text-[16px] py-3 px-4 rounded-md shadow-md" role="alert" x-data="{ isOpen: true }" x-show="isOpen" class="alert">
	<strong>{{ $message }}</strong>
    <span class="close absolute top-0 bottom-0 right-0 ml-8 px-2 py-2" @click="isOpen = false">
            <svg class="fill-current h-6 w-6 text-red-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/></svg>
    </span>
</div>
@endif

@if ($errors->any())
<div class="alert bg-red-100 border border-red-400 text-red-700 pr-[2rem] pl-4 py-2 rounded-md shadow-md relative text-[14px] w-max" role="alert" x-data="{ isOpen: true }" x-show="isOpen" class="alert">
    @foreach ($errors->all() as $error)
                <li>
                    <span class="block md:inline">{{ $error }}</span>
                </li>
     @endforeach 
        <span class="close absolute top-0 bottom-0 right-0 ml-8 px-2 py-2" @click="isOpen = false">
            <svg class="fill-current h-6 w-6 text-red-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/></svg>
        </span>
</div>
@endif