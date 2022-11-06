<div>
    <div class="@if(session()->missing('message')) d-none  @endif alert alert-{{ session('alert') ?? '' }}">
        {{ session('message') ?? ''}}
    </div>
    <form wire:submit.prevent="save">
        <x-input name="title" label="Logo Title"></x-input>
        <x-input name="image" type="file" label="Logo Image"></x-input>
        @if ($image)
            <div class="mb-3">
                <img src="{{ $imageUrl ?? asset('storage/'.$image) }}" class="img img-fluid" height="250" alt="{{ $title }}">
            </div>
        @endif
        @php
            $options = ['Show Text','Show Image'];
        @endphp
        <x-select name="showImage" label="Logo Type" :options="$options"></x-select>
        <button type="submit" class="btn btn-primary"> <i class="bi bi-upload"></i> {{ __('Save') }}</button>
    </form>
</div>
