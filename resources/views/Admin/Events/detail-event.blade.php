@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
@include('include.admin.breadcrumbs', [
'pageTitle' => 'Hasil Pendaftaran Event',
'preBreadcrumbs' => [
'Home' => route('admin.index'),
'Events' => route('admin.events.index'),
],
'activeItem' => 'Detail Event'
])
@stop

@section('content')

@php
// Localization Indonesia
setLocale(LC_TIME, 'id_ID.utf8');
// Sett for modal
$topic = 'Pendaftaran Event';
$domFormId = 'eventRegistration-form';
$itemName = 'title-eventRegistration';
@endphp

<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">List Artikel</h3>
                </div>
                <div class="card-body">
                    <table id="main-table" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th class="is-using-setup">Nama</th>
                                <th class="is-using-setup">NIM</th>
                                <th class="is-using-setup">Angkatan</th>
                                <th class="is-using-setup">Email</th>
                                <th class="is-using-setup">Phone</th>
                                <th class="is-using-setup">ID LINE</th>
                                @foreach ($event->eventFields as $field)
                                    <th>{{$field->name}}</th>
                                @endforeach
                                {{-- <th>Action</th> --}}
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($event->eventRegistration as $item)
                            <tr>
                                <td>{{$item->id}}</td>
                                <td>{{$item->name}}</td>
                                <td>{{$item->nim}}</td>
                                <td>{{$item->angkatan}}</td>
                                <td>{{$item->email}}</td>
                                <td>{{$item->phone}}</td>
                                <td>{{$item->line_id}}</td>
                                @foreach ($item->fieldResponses as $response)
                                    <th>{{$response->response}}</th>
                                @endforeach
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <th>No</th>
                                <th>Nama</th>
                                <th>NIM</th>
                                <th>Angkatan</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>ID LINE</th>
                                @foreach ($event->eventFields as $field)
                                    <th>{{$field->name}}</th>
                                @endforeach
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

{{--  Modal  --}}
@include('include.modals.on-delete-confirmation', compact('domFormId', 'itemName', 'topic'))
@stop

@section('css')
{{-- Datatables --}}
@include('include.plugins.load-datatables-css')

{{-- Response --}}
@include('include.plugins.load-response-css')

@stop

@section('js')
{{-- Jquery --}}
<script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>

{{-- Datatables --}}
@include('include.plugins.load-datatables-js')

{{-- Response --}}
@include('include.plugins.load-response-js')

{{-- Datatable setup --}}
@include('include.admin.datatable-setup')

@stop
