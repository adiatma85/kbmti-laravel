@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<h1>Article</h1>
@stop

@section('content')
{{-- @section('plugins.Datatables', true) --}}

{{-- Localization Indonesia --}}
@php
setLocale(LC_TIME, 'id_ID.utf8');
@endphp
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            {{--  Button trigger modal  --}}
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
                Launch demo modal
            </button>

        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Daftar Artikel</h3>
                </div>
                <div class="card-body">
                    <div class="row mb-2">
                        <div class="col-12">
                            <a href="{{route('articles.create')}}">
                                <button type="button" class="btn btn-primary">
                                    Create new Article
                                </button>
                            </a>
                        </div>
                    </div>
                    <table id="article-table" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Nama Artikel</th>
                                <th>Konten Artikel</th>
                                <th>Last updated</th>
                                <th>Total dikunjungi</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($articles as $article)
                            <tr>
                                <td>{{$article->name}}</td>
                                <td>
                                    @php
                                    echo substr($article->content, 0, 40);
                                    @endphp
                                    ...</td>
                                <td>{{Carbon::parse($article->created_at)->formatLocalized('%A %d %B %Y')}}</td>
                                <td>{{$article->counter}}</td>
                                <td>
                                    <div class="row">
                                        <div class="col">
                                            <a
                                                href="{{route('articles.edit', ['article' => str_replace(' ', '-', $article->name)])}}">
                                                <button type="button" class="btn btn-warning">
                                                    <i class="far fa-edit"></i>
                                                </button>
                                            </a>
                                        </div>
                                        <div class="col">

                                            <button type="button" class="btn btn-danger delete-butt-conf"
                                                data-toggle="modal" data-target="#delete-modal"
                                                data-artId="{{$article->id}}" data-artName="{{$article->name}}">
                                                <i class="fas fa-trash"></i>
                                            </button>

                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <th>Nama Artikel</th>
                            <th>Konten Artikel</th>
                            <th>Last updated</th>
                            <th>Total dikunjungi</th>
                            <th>Action</th>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

{{--  Modal  --}}
<div class="modal fade" id="delete-modal" tabindex="-1" role="dialog" aria-labelledby="center-modal-title"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal-title">Konfirmasi Penghapusan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Apakah anda yakin menghapus ini?</p>
                <label for="on-delete-confirmation">Judul Artikel</label>
                <input type="text" class="form-control" id="title-article" placeholder="Judul Artikel" name="name"
                    value="{{old('name') ?? ''}}" id="on-delete-confirmation">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <input type="hidden" name="articleId" id="article-id">
                <form action="" method="POST" id="article-form">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                    {{-- <a href="#" id="delete-button-link">
                </a> --}}
                </form>
            </div>
        </div>
    </div>
</div>
@stop

@section('css')
{{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
{{-- Datatables --}}
<link rel="stylesheet" href="{{asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
@stop

@section('js')
{{-- Jquery --}}
<script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
{{-- Datatables --}}
<script src="{{asset('plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{asset('plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{asset('plugins/jszip/jszip.min.js')}}"></script>
<script src="{{asset('plugins/pdfmake/pdfmake.min.js')}}"></script>
<script src="{{asset('plugins/pdfmake/vfs_fonts.js')}}"></script>
<script src="{{asset('plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{asset('plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
<script src="{{asset('plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>

{{-- Jquery Form Plugin --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.3.0/jquery.form.min.js"
    integrity="sha384-qlmct0AOBiA2VPZkMY3+2WqkHtIQ9lSdAsAn5RUJD/3vA5MKDgSGcdmIv4ycVxyn" crossorigin="anonymous">
</script>

<script>
    $(function () {

    // Data Tables
    $("#article-table").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#article-table_wrapper .col-md-6:eq(0)');

    // Jquery on submit

  });

//   On-Click delete confirmation modals
    $('.delete-butt-conf').click( function (event) {
        var button = $(this)
        var artId = button.attr("data-artid")
        var titleArticle = button.attr("data-artName")
        // Set the value in form
        document.getElementById('article-id').value = artId
        document.getElementById('title-article').value = titleArticle
        document.getElementById('article-form').setAttribute('action', `<?php echo url()->current()?>` + `/${artId}`)
    } )

    // Ajax
</script>
@stop