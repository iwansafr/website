@extends('dashboard.main')
@section('title')
    {{ __('Product') }}
@endsection
@section('sub_title')
    <li class="breadcrumb-item active">{{ __('Tambah Product') }}</li>
@endsection
@push('styles')
    <link rel="stylesheet" href="/dist/assets/css/pages/summernote.css">
    <link rel="stylesheet" href="/dist/assets/extensions/summernote/summernote-lite.css">
@endpush
@section('content')
    @livewire('product.product-edit',['productId'=>@intval($content_id)])
@endsection