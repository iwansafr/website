@extends('dashboard.main')
@section('title')
    {{ __('Product') }}
@endsection
@section('content')
    <div class="col-md-12">
        <a href="{{ url('admin/product/edit') }}" class="btn btn-sm btn-primary block position-absolute" style="z-index: 999;">
            <i class="bi bi-plus"></i>{{ __('Add Product') }}
        </a>
        <div class="modal fade text-left" id="deleteModal" tabindex="-1" role="dialog" data-bs-backdrop="false" aria-labelledby="myModalLabel1"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="myModalLabel1">{{ __('Product Form') }}</h5>
                    </div>
                    @livewire('product.product-delete')
                </div>
            </div>
        </div>
    </div>
    @livewire('product.product-list')
@endsection
