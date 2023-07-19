@props(['errors'])

@if ($errors->any())
    <div {{ $attributes }} class="alert">
        <div class="alert w-max h-max font-roboto bg-red-200 text-deep-green text-[18px] px-1 py-1 drop-shadow-md border rounded-md">
            {{ __('Whoops! Something went wrong.') }}
        </div>

        <ul class="alert mt-3 list-disc list-inside text-sm text-red-600">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
