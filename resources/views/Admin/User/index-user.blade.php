@extends('Admin.base-layout')

{{-- Content Header --}}
@section('content_header')
@include('include.admin.breadcrumbs', [
    'pageTitle' => 'Users',
    'preBreadcrumbs' => [
    'Home' => route('admin.index'),
    'Users' => route('admin.users.index')
    ],
    'activeItem' => 'List User'
    ])
@endsection


{{-- Custom CSS --}}
@section('custom-style')
    
@endsection

{{-- Content --}}
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
                        <table id="main-table" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th class="is-using-setup">Nama User</th>
                                    <th class="is-using-setup">Username / Email</th>
                                    <th class="is-using-setup">Role</th>
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
                                                    data-artId="{{auth()->user()->adminId == "Master Admon" ? $user->id : ''}}"
                                                    data-artName="{{auth()->user()->adminId == "Master Admon" ? $user->name : ''}}"
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
@endsection

{{-- Custom JS --}}
@section('custom-scripts')
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
@endsection