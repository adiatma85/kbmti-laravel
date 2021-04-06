@extends('Admin.base-layout')

@section('content-header')
    @include('include.admin.breadcrumbs', [
        'pageTitle' => 'Article',
        'preBreadcrumbs' => [
        'Home' => route('admin.index'),
        'Events' => route('admin.events.index')
        ],
        'activeItem' => 'Edit Pendaftaran Event'
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
        <div class="card card-warning">
            <div class="card-header">
                <h3 class="card-title">Form Mengedit Pendaftaran Event</h3>
            </div>
            {{-- /.card-header --}}
            {{-- form start --}}
            <form method="POST" action="{{route('admin.events.update', [ 'event' => $event->id])}}"
                enctype="multipart/form-data" id="main-form">
                @csrf
                @method('PUT')
                <div class="card-body">
                    <div class="form-group">
                        <label for="title-events">Nama Event Pendaftaran</label>
                        <input type="text" class="form-control" id="title-events" placeholder="Judul Artikel" name="name"
                            value="{{old('name') ?? $event->name ?? ''}}">
                    </div>
                    <div class="form-group">
                        <label for="descripiton-events">Description Event</label>
                        <textarea id="descripiton-events" class="form-control" rows="3" placeholder="Description"
                            name="description">{{old('description') ?? $event->description ?? ''}}</textarea>
                    </div>
                </div>
                {{-- /.card-body --}}

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>

    {{--  Modal  --}}
    <div class="modal fade" id="edit-modal" tabindex="-1" role="dialog" aria-labelledby="center-modal-title"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modal-title">Konfirmasi Pengeditan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="" method="POST" id="article-form">
                    <fieldset disabled>
                        <div class="modal-body">
                            <p>Apakah Anda yakin mengedit Event Pendaftaran ini?</p>
                            <label for="on-delete-confirmation">Judul Artikel</label>
                            <input type="text" class="form-control" id="title-article" value="{{old('name') ?? ''}}"
                                id="on-delete-confirmation">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            @csrf
                            @method('PUT')
                            <button type="submit" class="btn btn-danger">Edit</button>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('custom-style')
    
@endsection

@section('custom-scripts')
    {{-- bs-custom-file-input --}}
    <script src="{{asset('plugins/bs-custom-file-input/bs-custom-file-input.min.js')}}"></script>
    <script>
        // init bscustomfile
        $(function () {
        bsCustomFileInput.init();
        });
    </script>
@endsection