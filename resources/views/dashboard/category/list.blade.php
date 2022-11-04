@extends('dashboard.main')
@section('title')
    {{ __('Category') }}
@endsection
@section('content')
    <div class="col-md-12">
        <button type="button" class="btn btn-sm btn-primary block" style="position:absolute;z-index:9999;" data-bs-toggle="modal" data-bs-target="#editModal">
            <i class="bi bi-plus"></i>{{ __('Add Category') }}
        </button>

        <div class="modal fade text-left" id="editModal" tabindex="-1" role="dialog" data-bs-backdrop="false" aria-labelledby="myModalLabel1"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="myModalLabel1">{{ __('Category Form') }}</h5>
                    </div>
                    @livewire('category.category-edit')
                </div>
            </div>
        </div>
        <div class="modal fade text-left" id="deleteModal" tabindex="-1" role="dialog" data-bs-backdrop="false" aria-labelledby="myModalLabel1"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="myModalLabel1">{{ __('Category Form') }}</h5>
                    </div>
                    @livewire('category.category-delete')
                </div>
            </div>
        </div>
    </div>
    @livewire('category.category-list')
@endsection
