@extends('dashboard.main')
@section('title')
    {{ __('Block Position') }}
@endsection
@push('styles')
    <style>
        #scaled-frame {
            zoom: 0.50;
            width: 200%;
            height: 750px;
            -moz-transform: scale(0.50);
            -moz-transform-origin: 0 0;
            -o-transform: scale(0.50);
            -o-transform-origin: 0 0;
            -webkit-transform: scale(0.50);
            -webkit-transform-origin: 0 0;
        }

        @media screen and (-webkit-min-device-pixel-ratio:0) {
            #scaled-frame {
                zoom: 1;
            }
        }
    </style>
@endpush
@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-content">
                    <div class="card-body">
                        <h4 class="card-title">{{ __('Block Position') }}</h4>
                        <h6 class="card-subtitle">{{ __('Custom Your block') }}</h6>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="card">
                                    <div class="card-body">
                                        <button type="button" class="w-100 btn btn-sm btn-primary block"
                                            data-bs-toggle="modal" data-bs-target="#block_config_logo">
                                            {{ __('Logo') }}
                                        </button>
                                        <div class="modal fade text-left" id="block_config_logo" tabindex="-1" role="dialog"
                                            aria-labelledby="myModalLabel1" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-scrollable" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="myModalLabel1">
                                                            {{ __('Block Logo') }}</h5>
                                                        <button type="button" class="close rounded-pill"
                                                            data-bs-dismiss="modal" aria-label="Close">
                                                            <i data-feather="x"></i>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        @livewire('config.logo')
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="card">
                                    <div class="card-content">
                                        <div class="card-body">
                                            <button type="button" class="w-100 btn btn-sm btn-primary block"
                                                data-bs-toggle="modal" data-bs-target="#block_menu">
                                                {{ __('Menu') }}
                                            </button>
                                            <div class="modal fade text-left" id="block_menu" tabindex="-1" role="dialog"
                                                aria-labelledby="myModalLabel1" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-scrollable" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="myModalLabel1">
                                                                {{ __('Block Menu') }}</h5>
                                                            <button type="button" class="close rounded-pill"
                                                                data-bs-dismiss="modal" aria-label="Close">
                                                                <i data-feather="x"></i>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            @livewire('config.menu-top')
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn" data-bs-dismiss="modal">
                                                                <i class="bx bx-x d-block d-sm-none"></i>
                                                                <span class="d-none d-sm-block">Close</span>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-content">
                    <button class="btn btn-sm btn-primary" id="refreshButton"><i class="bi bi-arrow-repeat"></i>
                        {{ __('refresh') }}</button>
                    <div class="card-body">
                        <h6 class="card-subtitle">{{ __('Preview Website') }}</h6>
                    </div>
                    <div class="card-body">
                        <iframe src="{{ url('/') }}" id="scaled-frame" frameborder="0"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        function reload() {
            document.getElementById('scaled-frame').src += '';
        }
        refreshButton.onclick = reload;
    </script>
@endpush
