@extends('dashboard.main')
@section('title')
    {{ __('Content') }}
@endsection
@push('styles')
    <link rel="stylesheet" href="/dist/assets/css/widgets/scrollbar.css">
    <link rel="stylesheet" href="/dist/assets/extensions/quill/quill.snow.css">
    <link rel="stylesheet" href="/dist/assets/extensions/quill/quill.bubble.css">
@endpush
@section('content')
    @livewire('content.content-edit')
@endsection
@push('scripts')
    <script src="/dist/assets/extensions/quill/quill.min.js"></script>
    <script src="/dist/assets/js/pages/quill.js"></script>
@endpush
