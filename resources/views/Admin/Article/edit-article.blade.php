@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
@include('include.admin.breadcrumbs', [
'pageTitle' => 'Article',
'preBreadcrumbs' => [
'Home' => route('admin.index'),
'Articles' => route('articles.index')
],
'activeItem' => 'Edit Article'
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
    {{-- @include('include.modals.modal-create', ['variable' => 'INI VARIABEL']) --}}
    <div class="card card-warning">
        <div class="card-header">
            <h3 class="card-title">Form Mengedit Artikel</h3>
        </div>
        {{-- /.card-header --}}
        {{-- form start --}}
        <form method="POST" action="{{route('articles.update', [ 'article' => $article->id])}}"
            enctype="multipart/form-data" id="main-form">
            @csrf
            @method('PUT')
            <div class="card-body">
                <div class="form-group">
                    <label for="title-article">Judul Artikel</label>
                    <input type="text" class="form-control" id="title-article" placeholder="Judul Artikel" name="name"
                        value="{{old('name') ?? $article->name ?? ''}}">
                </div>
                <div class="form-group">
                    <label for="content-article">Konten Artikel</label>
                    {{-- <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Konten Artikel"> --}}
                    <textarea id="content-article" class="form-control" rows="3" placeholder="Konten ..."
                        name="content">{{old('content') ?? $article->content ?? ''}}</textarea>
                </div>
                <div class="form-group">
                    <label for="img-article">Gambar Artikel</label>
                    <div class="input-group">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="img-article" name="image"
                                value="{{old('image') ?? ''}}">
                            <label class="custom-file-label" for="img-article">Choose file</label>
                        </div>
                        <div class="input-group-append">
                            <span class="input-group-text">Upload</span>
                        </div>
                    </div>
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
                        <p>Apakah Anda yakin mengedit Artikel ini?</p>
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

@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">

@stop

@section('js')
{{-- Jquery --}}
<script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
{{-- bs-custom-file-input --}}
<script src="{{asset('plugins/bs-custom-file-input/bs-custom-file-input.min.js')}}"></script>
<script>
    // init bscustomfile
    $(function () {
      bsCustomFileInput.init();
    });

    // on-submit-event

    // this is the id of the form
//         $("#idForm").submit(function(e) {

//             e.preventDefault(); // avoid to execute the actual submit of the form.

// var form = $(this);
// var url = form.attr('action');

// $.ajax({
//        type: "POST",
//        url: url,
//        data: form.serialize(), // serializes the form's elements.
//        success: function(data)
//        {
//            alert(data); // show response from the php script.
//        }
//      });


// });
</script>
@stop