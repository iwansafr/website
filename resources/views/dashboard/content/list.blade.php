@extends('dashboard.main')
@section('title')
    {{ __('Content') }}
@endsection
@section('content')
    <div class="col-md-12">
        <a type="button" class="btn btn-sm btn-primary block">
            <i class="bi bi-plus"></i>{{ __('Add Content') }}
        </a>
        <div class="modal fade text-left" id="deleteModal" tabindex="-1" role="dialog" data-bs-backdrop="false" aria-labelledby="myModalLabel1"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="myModalLabel1">{{ __('Content Form') }}</h5>
                    </div>
                    @livewire('content.content-delete')
                </div>
            </div>
        </div>
    </div>
    @livewire('content.content-list')
@endsection
