@props(['value'])

<div class="flex py-2">
    <label {{ $attributes->merge(['class' => 'block font-semibold text-lg text-black']) }}>
    {{ $value ?? $slot }}
</label><span class=" ml-1 text-xl font-semibold text-red-500">*</span>

</div>
