@php
    $type ??= 'text';
    $class ??= null;
    $name ??= '';
    $value ??= '';
    $label ??= ucfirst($name);
@endphp

<div @class(['form-group', $class])>
    <label class="text-lg font-semibold mt-2 mb-2 ml-2" for="{{ $name }}">{{ $label }}</label>
    <span class="ml-1 text-lg font-semibold text-red-500">*</span>

    @if($type == 'textarea')
        <textarea class="form-control p-2 @error($name) is-invalid @enderror" id="{{ $name }}" name="{{ $name }}">{{ old($name, $value) }}</textarea>
    @elseif($type == 'file')
        <input class="form-control mb-2 p-2 @error($name) is-invalid @enderror" type="{{ $type }}" id="{{ $name }}" name="{{ $name }}" accept=".png,.jpg,.jpeg,.pdf">
    @elseif($type == 'date')
        <input class="form-control mb-2 p-2 @error($name) is-invalid @enderror" type="{{ $type }}" id="{{ $name }}" name="{{ $name }}" value="{{ old($name, $value) }}">
    @else
        <input class="form-control mb-2 p-2 @error($name) is-invalid @enderror" type="{{ $type }}" id="{{ $name }}" name="{{ $name }}" value="{{ old($name, $value) }}">
    @endif

    @error($name)
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror
</div>
