<div>
    <form wire:submit.prevent="save">
        <div class="modal-body">
            @if (session()->has('msg'))
                <div class="alert alert-success"><i class="bi bi-file-excel"></i> {{ session('msg') }}</div>
            @endif
            
            <x-select name="parent" label="Parent" :options="$categoryParent"></x-select>
            <x-input name="title" label="Title"></x-input>
            <x-input name="slug" label="Slug"></x-input>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn" data-bs-dismiss="modal" wire:click="clear">
                <i class="bi bi-x"></i>
                <span>Close</span>
            </button>
            <div wire:loading wire:target="save">
                <button class="btn btn-primary ml-1 disabled">
                    <i class="bi bi-check"></i>
                    <span>{{ __('Sedang Mengirim Data') }} ...</span>
                </button>    
            </div>
            <div wire:loading.remove wire:target="save">
                <button type="submit" class="btn btn-primary ml-1">
                    <i class="bi bi-check"></i>
                    <span>{{ __('Save') }}</span>
                </button>
            </div>
        </div>
    </form>
    
</div>
