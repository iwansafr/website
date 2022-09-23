@extends('dashboard.main')
@section('title')
    {{ __('User Role') }}
@endsection
@section('content')
    @livewire('user.role')
@endsection