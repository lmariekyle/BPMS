@props(['errors'])
@if ($errors->any())
<div {{ $attributes }} x-data="{ isOpen: true }" x-show="isOpen" class="alert">
    <div class="flex flex-row bg-red-100 border border-red-400 text-red-700 px-2 py-2 rounded relative text-[12px] w-max h-max" role="alert">
        <div class="flex flex-col">
            @foreach ($errors->all() as $error)
                <li>
                    <span class="block sm:inline">{{ $error }}</span>
                </li>
            @endforeach 
        </div>
        <span class="close top-0 bottom-0 right-0 ml-10" @click="isOpen = false">
            <svg class="fill-current h-6 w-6 text-red-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/></svg>
        </span>
    </div>
</div>

@endif