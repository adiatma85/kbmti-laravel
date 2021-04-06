@extends('Admin.base-layout')

@section('content-header')
    @include('include.admin.breadcrumbs', [
        'pageTitle' => 'Article',
        'preBreadcrumbs' => [
            'Home' => route('admin.index'),
            'Articles' => route('admin.events.index')
        ],
        'activeItem' => 'Create Event'
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
                <h3 class="card-title">Form Menambah Pendaftaran Event</h3>
            </div>
            <form method="POST" action="{{route('admin.events.store')}}" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="title-events">Nama Event Pendaftaran</label>
                        <input type="text" class="form-control" id="title-events" placeholder="Nama Event Pendaftaran" name="name"
                            value="{{old('name') ?? ''}}">
                    </div>
                    <div class="form-group">
                        <label for="descripiton-events">Description Event</label>
                        <textarea id="descripiton-events" class="form-control" rows="3" placeholder="Description"
                            name="description">{{old('content') ?? ''}}</textarea>
                    </div>
                    
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('custom-style')
    
@endsection

@section('custom-scripts')
    {{-- bs-custom-file-input --}}
    <script src="{{asset('plugins/bs-custom-file-input/bs-custom-file-input.min.js')}}"></script>
    {{-- init bs-custom-file --}}
    <script>
        $(function () {
        bsCustomFileInput.init();
        });
    </script>
@endsection