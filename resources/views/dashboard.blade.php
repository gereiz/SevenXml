@extends('layouts.master')
@section('title')
    Início
@endsection
@section('content')

    <x-page-title title="Início" pagetitle="Dashboards" />

    <!-- start content -->
    
@endsection
@push('scripts')
    <!-- App js -->
    <script src="{{ URL::asset('build/js/app.js') }}"></script>
@endpush
