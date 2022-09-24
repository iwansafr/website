@extends('dashboard.main')
@section('title')
    {{ __('User Role') }}
@endsection
@section('content')
    <div class="col-md-12">
        <button type="button" class="btn btn-sm btn-primary block" data-bs-toggle="modal" data-bs-target="#roleEdit">
            <i class="bi bi-plus"></i>{{ __('Add Role') }}
        </button>

        <div class="modal fade text-left" id="roleEdit" tabindex="-1" role="dialog" data-bs-backdrop="false" aria-labelledby="myModalLabel1"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="myModalLabel1">{{ __('Role Form') }}</h5>
                    </div>
                    @livewire('user.role-edit')
                </div>
            </div>
        </div>
        <div class="modal fade text-left" id="roleDelete" tabindex="-1" role="dialog" data-bs-backdrop="false" aria-labelledby="myModalLabel1"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="myModalLabel1">{{ __('Role Form') }}</h5>
                    </div>
                    @livewire('user.role-delete')
                </div>
            </div>
        </div>
    </div>
    @livewire('user.role')
@endsection
