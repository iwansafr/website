<div>
    <form wire:submit.prevent="save">
        <x-select name="menu_top" label="Pilih Menu" :options="$position_menu"></x-select>
    </form>
</div>
