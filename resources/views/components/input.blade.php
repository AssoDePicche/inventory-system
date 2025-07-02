<div>
    <label for="{{ $name }}">{{ $placeholder }}</label>

    <input type="{{ $type }}" name="{{ $name }}" id="{{ $name }}" value="{{ $value }}" placeholder="{{ $placeholder }}">

    @error($name)
        <div>{{ $message }}</div>
    @enderror
</div>
