@props(['active'])

@php
$classes = ($active ?? false)
            ? 'font-robotocondensed text-[30px] text-dirty-white text-center'
            : 'font-robotocondensed text-[30px] text-dirty-white text-center';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
