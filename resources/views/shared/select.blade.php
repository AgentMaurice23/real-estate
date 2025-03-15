{{-- <div class="form-group">
    <label class="text-xl font-semibold mb-2 ml-2 " for="{{ $name }}">{{ $label }}</label><span class=" ml-1 text-xl font-semibold text-red-500">*</span>

    <select class="form-control p-3 @error($name) is-invalid @enderror" id="{{ $name }}" name="{{ $name }}">
        @foreach ($options as $optionValue => $optionLabel)
            <option value="{{ $optionValue }}" {{ $optionValue == $selected ? 'selected' : '' }}>{{ $optionLabel }}</option>
        @endforeach
    </select>
    @error($name)
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div> --}}
{{-- shared/select.blade.php --}}
<div class="form-group">
    <label class="text-lg font-semibold mt-2 mb-2 ml-2 " for="{{ $name }}">{{ $label }}</label><span class=" ml-1 text-xl font-semibold text-red-500">*</span>
    <select class="form-control mb-2 p-2 @error($name) is-invalid @enderror" id="{{ $name }}" name="{{ $name }}">
        @foreach($options as $option)
            <option value="{{ $option }}" {{ (isset($value) && $value == $option) ? 'selected' : '' }}>{{ $option }}</option>
        @endforeach
    </select>
    @error($name)
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
