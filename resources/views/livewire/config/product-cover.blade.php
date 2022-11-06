<div>
    <form wire:submit.prevent="save">
        <x-alert></x-alert>
        <x-select name="product_category_id" label="Pilih Category" :options="$product_category"></x-select>
        <button type="submit" class="btn btn-sm btn-primary"><i class="bi bi-upload"></i> {{ __('Save') }}</button>
    </form>
</div>
