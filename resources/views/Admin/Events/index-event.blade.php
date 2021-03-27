@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
@include('include.admin.breadcrumbs', [
'pageTitle' => 'Event',
'preBreadcrumbs' => [
'Home' => route('admin.index'),
'Events' => route('admin.events.index')
],
'activeItem' => 'List Event'
])
@stop

@section('content')
{{-- @section('plugins.Datatables', true) --}}

@php
// Localization Indonesia
setLocale(LC_TIME, 'id_ID.utf8');
// Sett for modal
$topic = 'Pendaftaran Event';
$domFormId = 'article-form';
$itemName = 'title-article';
@endphp

<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">List Artikel</h3>
                </div>
                <div class="card-body">
                    <div class="row mb-2">
                        <div class="col-12">
                            <a href="{{route('admin.events.create')}}">
                                <button type="button" class="btn btn-primary">
                                    Daftarkan Event Baru
                                </button>
                            </a>
                        </div>
                    </div>
                    <table id="main-table" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th class="is-using-setup">Nama Event</th>
                                <th class="is-using-setup">Description</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($events as $event)
                            <tr>
                                <td>{{$event->id}}</td>
                                <td>{{$event->name}}</td>
                                <td>
                                    @php
                                    echo substr($event->description, 0, 40).(strlen($event->description) > 40 ? '...' : '');
                                    @endphp
                                </td>
                                <td>
                                    <div class="row">
                                        <div class="m-2">
                                            <a
                                                href="{{route('admin.events.show', ['event' => str_replace(' ', '-', $event->id)])}}">
                                                <button type="button" class="btn btn-info">
                                                    <i class="far fa-eye"></i>
                                                </button>
                                            </a>
                                        </div>
                                        <div class="m-2">
                                            <a
                                                href="{{route('admin.events.edit', ['event' => str_replace(' ', '-', $event->id)])}}">
                                                <button type="button" class="btn btn-warning">
                                                    <i class="far fa-edit"></i>
                                                </button>
                                            </a>
                                        </div>
                                        <div class="m-2">
                                            <button type="button" class="btn btn-danger delete-butt-conf"
                                                data-toggle="modal" data-target="#delete-modal"
                                                data-artId="{{$event->id}}" data-artName="{{$event->name}}">
                                                <i class="fas fa-trash"></i>
                                            </button>

                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <th>No</th>
                            <th>Nama Event</th>
                            <th>Description</th>
                            <th>Action</th>
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

<script>
    //   On-Click delete confirmation modals
    $('.delete-butt-conf').click( function (event) {
        var button = $(this)
        var itemId = button.attr("data-artid")
        var itemName = button.attr("data-artName")
        // Set the value in form
        document.getElementById('{{$itemName}}').value = itemName
        document.getElementById('{{$domFormId}}').setAttribute('action', `<?php echo url()->current()?>` + `/${itemId}`)
    } )

</script>

@stop
