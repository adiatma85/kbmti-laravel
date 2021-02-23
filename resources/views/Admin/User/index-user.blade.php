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
$domFormId = 'user-form';
$topic = 'User';
$itemName = 'title-user';
@endphp
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Daftar User</h3>
                </div>
                <div class="card-body">
                    <div class="row mb-2">
                        <div class="col-12">
                            <a href="{{route('admin.users.create')}}">
                                <button type="button" class="btn btn-primary">
                                    Register New User
                                </button>
                            </a>
                        </div>
                    </div>
                    <table id="article-table" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Nama User</th>
                                <th>Username / Email</th>
                                <th>Role</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                            <tr>
                                <td>{{$user->name ?? ''}}</td>
                                <td> {{$user->email ?? ''}}</td>
                                <td>{{$user->adminId}}</td>
                                <td>
                                    <div class="row">
                                        <div class="col">
                                            <a
                                                href="{{$user->adminId == "Master Admon" ? route('admin.users.edit', ['user' => $user->id]) : ''}}">
                                                <button type="button" class="btn btn-warning"
                                                    {{auth()->user()->adminId == "Master Admon" ? '' : 'disabled'}}>
                                                    <i class="far fa-edit"></i>
                                                </button>
                                            </a>
                                        </div>
                                        <div class="col">

                                            <button type="button" class="btn btn-danger delete-butt-conf"
                                                data-toggle="modal" data-target="#delete-modal"
                                                data-artId="{{$user->adminId == "Master Admon" ? $user->id : ''}}"
                                                data-artName="{{$user->adminId == "Master Admon" ? $user->id : ''}}"
                                                {{auth()->user()->adminId == "Master Admon" ? '' : 'disabled'}}>
                                                <i class="fas fa-trash"></i>
                                            </button>

                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <th>Nama User</th>
                            <th>Username / Email</th>
                            <th>Role</th>
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

<script>
    $(function () {
        $('#article-table thead th').each( function () {
            var title = $(this).text();
            $(this).html( '<input type="text" placeholder="Search '+title+'" />' );
    } );
    // Data Tables
    var theTable = $("#article-table").DataTable({
        initComplete: function () {
            // Apply the search
            this.api().columns().every( function () {
                var that = this;
                var searchTextBoxes = $('input', this.header())
                searchTextBoxes.on( 'keyup change clear', function () {
                    if ( that.search() !== this.value ) {
                        that
                            .search( this.value )
                            .draw();
                    }
                } );
                searchTextBoxes.on('click', function (event) {
                    event.stopPropagation()
                })
            } );
        },
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"],
    }).buttons().container().appendTo('#article-table_wrapper .col-md-6:eq(0)');

    // var table = $('#article-table').DataTable({
        
    // });

  });

//   On-Click delete confirmation modals
    $('.delete-butt-conf').click( function (event) {
        var button = $(this)
        var artId = button.attr("data-artid")
        var titleArticle = button.attr("data-artName")
        // Set the value in form
        document.getElementById('title-article').value = titleArticle
        document.getElementById('article-form').setAttribute('action', `<?php echo url()->current()?>` + `/${artId}`)
    } )

</script>
@stop
