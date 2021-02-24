@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
@include('include.admin.breadcrumbs', [
'pageTitle' => 'Article',
'preBreadcrumbs' => [
'Home' => route('admin.index'),
'Articles' => route('admin.articles.index')
],
'activeItem' => 'List Article'
])
@stop

@section('content')
{{-- @section('plugins.Datatables', true) --}}

@php
// Localization Indonesia
setLocale(LC_TIME, 'id_ID.utf8');
// Sett for modal
$domFormId = 'article-form';
$topic = 'Artikel';
$itemName = 'title-article';
@endphp
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">List Artikel</h3>
                </div>
                <div class="card-body">
                    <div class="row mb-2">
                        <div class="col-12">
                            <a href="{{route('admin.articles.create')}}">
                                <button type="button" class="btn btn-primary">
                                    Create new Article
                                </button>
                            </a>
                        </div>
                    </div>
                    <table id="main-table" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th class="is-using-setup">Nama Artikel</th>
                                <th class="is-using-setup">Konten Artikel</th>
                                <th class="is-using-setup">Last updated</th>
                                <th class="is-using-setup">Total dikunjungi</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($articles as $article)
                            <tr>
                                <td>{{$article->name}}</td>
                                <td>
                                    @php
                                    echo substr($article->content, 0, 40).(strlen($article->content) > 40 ? '...' : '');
                                    @endphp
                                </td>
                                <td>{{Carbon::parse($article->created_at)->formatLocalized('%A %d %B %Y')}}</td>
                                <td>{{$article->counter}}</td>
                                <td>
                                    <div class="row">
                                        <div class="col">
                                            <a
                                                href="{{route('admin.articles.edit', ['article' => str_replace(' ', '-', $article->name)])}}">
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

{{-- Datatable setup --}}
@include('include.admin.datatable-setup')

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

@stop
