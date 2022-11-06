@extends('dashboard.main')
@section('title')
    {{ __('Content') }}
@endsection
@section('sub_title')
    <li class="breadcrumb-item active">{{ __('Tambah Content') }}</li>
@endsection
@push('styles')
    <link rel="stylesheet" href="/dist/assets/css/pages/summernote.css">
    <link rel="stylesheet" href="/dist/assets/extensions/summernote/summernote-lite.css">
@endpush
@section('content')
    @livewire('content.content-edit',['contentId'=>@intval($content_id)])
@endsection