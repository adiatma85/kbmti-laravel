@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
@include('include.admin.breadcrumbs', [
'pageTitle' => 'Users',
'preBreadcrumbs' => [
'Home' => route('admin.index'),
'Users' => route('admin.users.index')
],
'activeItem' => 'List User'
])
@stop

@section('content')

@php
// Localization Indonesia
setLocale(LC_TIME, 'id_ID.utf8');
// Sett for modal
$domFormId = 'peserta-form';
$topic = 'Peserta';
$itemName = 'peserta-name';
@endphp
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Daftar User</h3>
                </div>
                <div class="card-body">
                    <table id="main-table" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th class="is-using-setup">Nama</th>
                                <th class="is-using-setup">NIM</th>
                                <th class="is-using-setup">Id Line</th>
                                <th class="is-using-setup">Nomor WA</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($staffAhli as $user)
                            <tr>
                                <td>{{$user->name ?? ''}}</td>
                                <td> {{$user->nim ?? ''}}</td>
                                <td>{{$user->id_line}}</td>
                                <td>{{$user->no_wa}}</td>
                                <td>
                                    <div class="row">
                                        <div class="col">
                                            {{-- Storage --}}
                                            <a href="">
                                                <button type="button" class="btn btn-info">
                                                    <i class="fas fa-download"></i>
                                                </button>
                                            </a>
                                        </div>
                                        <div class="col">
                                            <button type="button" class="btn btn-{{$user->isAccepted ? 'success' : 'danger'}} on-change-status"
                                                data-toggle="modal" data-target="#change-status-modal"
                                                data-artId="{{$user->id}}" data-artName="{{$user->name}}"
                                                data-userStat="{{$user->isAccepted}}">
                                                <i class="fas {{$user->isAccepted ? 'fa-check' : 'fa-skull-crossbones'}}"></i>
                                            </button>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <th>Nama</th>
                            <th>NIM</th>
                            <th>Id Line</th>
                            <th>Nomor WA</th>
                            <th>Action</th>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

{{--  Specific on Confirmation Modal to change the peserta status  --}}
<div class="modal fade" id="change-status-modal" tabindex="-1" role="dialog" aria-labelledby="center-modal-title"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal-title">Konfirmasi Penggantian Status</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="" method="POST" id="{{$domFormId}}">
                <div class="modal-body">
                    <p id="on-change-status-text">Apakah Anda yakin mengubah status kelulusan peserta ini?</p>
                    <label for="{{$itemName}}">Nama {{$topic}}</label>
                    <input type="text" class="form-control" id="{{$itemName}}" disabled>
                    {{-- <input type="hidden" name="status" value=""> --}}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    @csrf
                    @method('PUT')
                    <button type="submit" class="btn btn-danger" id="status-change-form-button">Ubah Status</button>
                </div>
            </form>
        </div>
    </div>
</div>
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

{{-- DataTables Setup --}}
@include('include.admin.datatable-setup')

<script>
    //   On-Click delete confirmation modals
    $('.on-change-status').click( function (event) {
        var button = $(this)
        var itemId = button.attr("data-artid")
        var itemName = button.attr("data-artName")
        var itemStatus = button.attr("data-userStat");
        console.log(itemStatus)
        // Set the value in form
        document.getElementById('{{$itemName}}').value = itemName
        document.getElementById('{{$domFormId}}').setAttribute('action', `<?php echo url()->current()?>` + `/${itemId}`)
        document.getElementById('on-change-status-text').innerHTML = (itemStatus == 1 ? 'Apakah Anda ingin menolak peserta ini?' : 'Apakah Anda ingin menerima peserta ini?')
        document.getElementById('status-change-form-button').setAttribute('class', (itemStatus == 1 ? 'btn btn-danger' : 'btn btn-success'))
    } )
</script>
@stop