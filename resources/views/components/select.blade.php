<div>
    <div class="form-group">
        <label for="{{ $name }}">{{ $label }}</label>
        <select class="form-control form-select @error($name) is-invalid @enderror" id="{{ $name }}"
            wire:model="{{ $name }}">
            <option value>{{ __('Pilih') }} {{ $label }}</option>
            @if (!empty($options))
                @foreach ($options as $key => $value)
                    <option value="{{ $key }}">{{ $value }}</option>
                @endforeach
            @endif
        </select>
        <div class="invalid-feedback">
            @error($name)
                {{ $message }}
            @enderror
        </div>
    </div>
</div>
