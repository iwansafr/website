<div>
    <div class="form-group">
        <label for="{{ $name }}">{{ $label }}</label>
        <select class="choices form-select multiple-remove @error($name) is-invalid @enderror" wire:model="{{ $name }}" multiple="multiple">
            @if (!empty($options))
                <optgroup label="{{ $label }}">
                    @foreach ($options as $key => $value)
                        <option value="{{ $key }}">{{ $value }}</option>
                    @endforeach
                </optgroup>
            @endif
        </select>
        <div class="invalid-feedback">
            @error($name) {{ $message }} @enderror
        </div>
    </div>
</div>