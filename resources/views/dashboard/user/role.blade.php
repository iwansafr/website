@extends('dashboard.main')
@section('title')
    {{ __('User Role') }}
@endsection
@push('styles')
<link rel="stylesheet" href="/dist/assets/extensions/simple-datatables/style.css">
<link rel="stylesheet" href="/dist/assets/css/pages/simple-datatables.css">
@endpush
@section('content')
    @livewire('user.role')
@endsection
@push('scripts')
<script src="/dist/assets/extensions/simple-datatables/umd/simple-datatables.js"></script>
<script src="/dist/assets/js/pages/simple-datatables.js"></script>
@endpush
