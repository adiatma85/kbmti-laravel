@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
@include('include.admin.breadcrumbs', [
'pageTitle' => 'User',
'preBreadcrumbs' => [
'Home' => route('admin.index'),
'Users' => route('admin.users.index')
],
'activeItem' => 'Register a User'
])
@stop

@section('content')
<div class="container-fluid">
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Form Register Users</h3>
        </div>
        {{-- /.card-header --}}
        {{-- form start --}}
        <form method="POST" action="{{route('admins.uses.store')}}">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="title-article">Nama User</label>
                    <input type="text" class="form-control" id="title-article" placeholder="Nama User" name="name"
                        value="{{old('name') ?? ''}}">
                </div>
                <div class="form-group">
                    <label for="title-article">Email / Username User</label>
                    <input type="email" class="form-control" id="title-article" placeholder="Alamat Email User" name="email"
                        value="{{old('email') ?? ''}}">
                </div>
                <div class="form-group">
                    <label for="title-article">Password</label>
                    <input type="password" class="form-control" id="title-article" placeholder="Password"
                        name="password" value="{{old('password') ?? ''}}">
                </div>
                <div class="form-group">
                    <label for="title-article">Confirm Password</label>
                    <input type="password" class="form-control" id="title-article" placeholder="Confirm Password"
                        name="confirm_password" value="{{old('confirm_password') ?? ''}}">
                </div>
                <div class="form-group">
                    <label for="user-role-selection">User Role</label>
                    <select class="custom-select" name="adminId">
                        <option selected>Open this select menu</option>
                        <option value="0">Kahim</option>
                        <option value="1">Wakil Ketua Himpunan</option>
                        <option value="2">Internal</option>
                        <option value="3">Sekretaris</option>
                        <option value="4">Bendahara</option>
                        <option value="5">Human Resource Development</option>
                        <option value="6">Advocacy</option>
                        <option value="7">Social Environment</option>
                        <option value="8">Entrepreneurship</option>
                        <option value="9">Relation and Creative</option>
                        <option value="10">Administrative</option>
                        <option value="11">Master Admin</option>
                    </select>
                </div>
            </div>
            {{-- /.card-body --}}

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
</div>

@stop

@section('css')

{{-- Response --}}
@include('include.plugins.load-response-css')
@stop

@section('js')
{{-- Jquery --}}
<script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
{{-- Response --}}
@include('include.plugins.load-response-js')
{{-- init bs-custom-file --}}
@stop