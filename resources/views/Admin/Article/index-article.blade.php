@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<h1>Article</h1>
@stop

@section('content')
@section('plugins.Datatables', true)

{{-- Localization Indonesia --}}
@php
setLocale(LC_TIME, 'id_ID.utf8');
@endphp
<div class="container-fluid">
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
                                        <div class="col">Edit</div>
                                        <div class="col">Hapus</div>
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
@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
{{-- Datatables --}}
<link rel="stylesheet" href="{{asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
@stop

@section('js')
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
<script>
    $(function () {
    $("#article-table").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    // });
    }).buttons().container().appendTo('#article-table_wrapper .col-md-6:eq(0)');
    // $('#example2').DataTable({
    //   "paging": true,
    //   "lengthChange": false,
    //   "searching": false,
    //   "ordering": true,
    //   "info": true,
    //   "autoWidth": false,
    //   "responsive": true,
    // });
  });
</script>
@stop