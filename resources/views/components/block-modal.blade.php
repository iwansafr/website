<div>
    <div class="card">
        <div class="card-body">
            <button type="button" class="w-100 btn btn-primary block"
                data-bs-toggle="modal" data-bs-target="#{{ $name }}">
                {{ __($label) }}
            </button>
            <div class="modal fade text-left" id="{{ $name }}" tabindex="-1"
                role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
                <div class="modal-dialog modal-dialog-scrollable" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="myModalLabel1">
                                {{ __('Block '.$label) }}</h5>
                            <button type="button" class="close rounded-pill"
                                data-bs-dismiss="modal" aria-label="Close">
                                <i data-feather="x"></i>
                            </button>
                        </div>
                        <div class="modal-body">
                            {{ $slot }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>