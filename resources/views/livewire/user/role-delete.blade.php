<div>
    <form wire:submit.prevent="delete">
        <div class="modal-body">
            @if (session()->has('msg'))
                <div class="alert alert-success"><i class="bi bi-file-excel"></i> {{ session('msg') }}</div>
            @endif
            @if (!empty($name))
                <p>{{ __('Apakah Anda yakin ingin menghapus Role ') }} <b>{{ $name }}</b> ?</p>
            @endif
        </div>
        <div class="modal-footer">
            <button type="button" class="btn" data-bs-dismiss="modal" wire:click="clear">
                <i class="bx bx-x d-block d-sm-none"></i>
                <span class="d-none d-sm-block">Close</span>
            </button>
            <div wire:loading wire:target="delete">
                <button class="btn btn-danger ml-1 disabled">
                    <i class="bx bx-check d-block d-sm-none"></i>
                    <span class="d-none d-sm-block">{{ __('Sedang Mengirim Data') }} ...</span>
                </button>    
            </div>
            @if (!empty($name))
                <div wire:loading.remove wire:target="delete">
                    <button type="submit" class="btn btn-danger ml-1">
                        <i class="bx bx-check d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">{{ __('Delete') }}</span>
                    </button>
                </div>
            @endif
        </div>
    </form>
    
</div>
