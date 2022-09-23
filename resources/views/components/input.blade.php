<div>
    <div class="form-group">
        <label for="{{ $name }}">{{ $label }}</label>
        <input type="{{ $type }}" class="form-control @error($name) is-invalid @enderror" wire:model="{{ $name }}" id="{{ $name }}" placeholder="Enter {{ $label }}">
        <div class="invalid-feedback">
            @error($name) {{ $message }} @enderror
        </div>
    </div>
</div>