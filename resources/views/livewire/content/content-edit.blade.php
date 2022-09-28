<div>
    <form wire:submit.prevent="save">
        <div class="card">
            <div class="card-header">
                {{ __('Content Form') }}
            </div>
            <div class="card-body">
                @if (session()->has('msg'))
                    <div class="alert alert-success"><i class="bi bi-file-excel"></i> {{ session('msg') }}</div>
                @endif
                
                <x-input name="title" label="Title"></x-input>
                <div wire:ignore>
                    <div id="full" wire:model="content">
                        
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <div wire:loading wire:target="save">
                    <button class="btn btn-primary ml-1 disabled">
                        <i class="bi bi-clock-history"></i>
                        <span>{{ __('Sedang Mengirim Data') }} ...</span>
                    </button>    
                </div>
                <div wire:loading.remove wire:target="save">
                    <button type="submit" class="btn btn-primary ml-1">
                        <i class="bi bi-upload"></i>
                        <span>{{ __('Save') }}</span>
                    </button>
                </div>
            </div>
        </div>
    </form>
</div>
