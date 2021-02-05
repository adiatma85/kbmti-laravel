@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<div class="row">
    <div class="col-12">
        <h1>Article</h1>
    </div>
    <div class="col-12">
        <ol class="breadcrumb float-sm-left">
            <li class="breadcrumb-item">Home</li>
            <li class="breadcrumb-item">Articles</li>
            <li class="breadcrumb-item active">Edit Articles</li>
        </ol>
    </div>
</div>
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
        <form method="POST" action="{{route('articles.update', [ 'article' => $article->id])}}" enctype="multipart/form-data">
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

@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">

@stop

@section('js')
{{-- Jquery --}}
<script src="{{asset(' plugins/jquery/jquery.min.js')}}"></script>
{{-- bs-custom-file-input --}}
<script src="{{asset('plugins/bs-custom-file-input/bs-custom-file-input.min.js')}}"></script>
{{-- init bs-custom-file --}}
<script>
    $(function () {
      bsCustomFileInput.init();
    });
</script>
@stop