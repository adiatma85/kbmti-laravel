@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    @yield('content_header')
@stop

@section('content')
    @yield('content')
@stop

@section('css')
    @yield('custom-style')
    {{-- Datatables --}}
    @include('include.plugins.load-datatables-css')

    {{-- Response --}}
    @include('include.plugins.load-response-css')
@stop

@section('js')
    @yield('custom-scripts')
    {{-- Jquery --}}
    <script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>

    {{-- Datatables --}}
    @include('include.plugins.load-datatables-js')
    {{-- Response --}}
    @include('include.plugins.load-response-js')

    {{-- DataTables Setup --}}
    @include('include.admin.datatable-setup')
@stop