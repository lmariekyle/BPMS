@props(['value'])

<label {{ $attributes->merge(['class' => 'block font-roboto text-2xl text-deep-green']) }}>
    {{ $value ?? $slot }}
</label>
