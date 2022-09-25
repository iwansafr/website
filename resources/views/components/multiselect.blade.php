<div>
    <div class="form-group">
        <label for="{{ $name }}">{{ $label }}</label>
        <select class="form-control multiple form-select @error($name) is-invalid @enderror" id="{{ $name }}"
            wire:model="{{ $name }}" style="width: 100%;" multiple>
            @if (!empty($options))
                @foreach ($options as $key => $value)
                    <option value="{{ $key }}">{{ $value }}</option>
                @endforeach
            @endif
        </select>
        <div class="hidden @error($name) is-invalid @enderror"></div>
        <div class="invalid-feedback">
            @error($name)
                {{ $message }}
            @enderror
        </div>
    </div>
</div>
