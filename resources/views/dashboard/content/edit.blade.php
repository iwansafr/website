@extends('dashboard.main')
@section('title')
    {{ __('Content') }}
@endsection
@push('styles')
    <link rel="stylesheet" href="/dist/assets/css/pages/summernote.css">
    <link rel="stylesheet" href="/dist/assets/extensions/summernote/summernote-lite.css">
@endpush
@section('content')
    @livewire('content.content-edit')
@endsection