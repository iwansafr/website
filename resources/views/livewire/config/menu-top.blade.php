<div>
    <form wire:submit.prevent="save">
        <x-alert></x-alert>
        <x-select name="menu_top" label="Pilih Menu" :options="$position_menu"></x-select>
        <button type="submit" class="btn btn-sm btn-primary"><i class="bi bi-upload"></i> {{ __('Save') }}</button>
    </form>
</div>
