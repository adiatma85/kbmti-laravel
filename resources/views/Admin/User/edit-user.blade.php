@extends('Admin.base-layout')

{{-- Content Header --}}
@section('content_header')
    @include('include.admin.breadcrumbs', [
    'pageTitle' => 'User',
    'preBreadcrumbs' => [
    'Home' => route('admin.index'),
    'Users' => route('admin.users.index')
    ],
    'activeItem' => 'Edit a User'
    ])
@endsection

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
            <h3 class="card-title">Form Editing a User</h3>
        </div>
        {{-- /.card-header --}}
        {{-- form start --}}
        <form method="POST" action="{{route('admin.users.update', ['user' => $thisUser->id])}}">
            @csrf
            @method('PUT')
            <div class="card-body">
                <div class="form-group">
                    <label for="title-article">Nama User</label>
                    <input type="text" class="form-control" id="title-article" placeholder="Nama User" name="name"
                        value="{{$thisUser->name ?? old('name') ?? ''}}">
                </div>
                {{-- <div class="form-group">
                    <label for="title-article">Email / Username User</label>
                    <input type="email" class="form-control" id="title-article" placeholder="Alamat Email User" name="email"
                        value="{{old('email') ?? ''}}">
                </div> --}}
                {{-- <div class="form-group">
                    <label for="title-article">Password</label>
                    <input type="password" class="form-control" id="title-article" placeholder="Password"
                        name="password" value="{{old('password') ?? ''}}">
                </div>
                <div class="form-group">
                    <label for="title-article">Confirm Password</label>
                    <input type="password" class="form-control" id="title-article" placeholder="Confirm Password"
                        name="confirm_password" value="{{old('confirm_password') ?? ''}}">
                </div> --}}
                <div class="form-group">
                    <label for="user-role-selection">User Role</label>
                    <select class="custom-select" name="adminId">
                        <?php
                            $roleIndex = 0; 
                            $roleArray = [
                                'Kahim',
                                'Wakil Ketua Himpunan',
                                'Internal',
                                'Sekretaris',
                                'Bendahara',
                                'Human Resource and Development',
                                'Advocacy',
                                'Social Environment',
                                'Entrepreneurship',
                                'Administrative',
                                'Research and Development',
                                'Master Admin'
                            ]
                            ?>
                        <option>Open this select menu</option>
                        <?php 
                            foreach ($roleArray as $role) {
                                ?>
                                    <option value="{{$roleIndex}}" {{$thisUser->adminId == $roleIndex ? "selected" : ""}}>{{$roleArray[$roleIndex]}}</option>
                                <?php
                                $roleIndex++;
                            }
                        ?>
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