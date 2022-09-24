@extends('dashboard.main')
@section('title')
    {{ __('User List') }}
@endsection
@section('content')
    <div class="col-md-12">
        <button type="button" class="btn btn-sm btn-primary block" data-bs-toggle="modal" data-bs-target="#userEdit">
            <i class="bi bi-plus"></i>{{ __('Add User') }}
        </button>

        <div class="modal fade text-left" id="userEdit" tabindex="-1" role="dialog" data-bs-backdrop="false" aria-labelledby="myModalLabel1"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="myModalLabel1">{{ __('User Form') }}</h5>
                    </div>
                    @livewire('user.user-edit')
                </div>
            </div>
        </div>
        <div class="modal fade text-left" id="userDelete" tabindex="-1" role="dialog" data-bs-backdrop="false" aria-labelledby="myModalLabel1"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="myModalLabel1">{{ __('User Form') }}</h5>
                    </div>
                    @livewire('user.user-delete')
                </div>
            </div>
        </div>
    </div>
    @livewire('user.user-list')
@endsection
