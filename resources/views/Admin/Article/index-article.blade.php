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


                    {{-- Back up old --}}
                    <table id="main-table" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
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
                                <td>{{$article->id}}</td>
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
                            <th>No</th>
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

@stop


{{-- Experiment View --}}
                    {{-- <section id="indexes">
                        <div class="container">
                            <div class="row">
                                @foreach ($articles as $article)
                                <div class="col-lg-4 mb-2">
                                    <div class="card">
                                        <img src="https://images.unsplash.com/photo-1477862096227-3a1bb3b08330?ixlib=rb-1.2.1&auto=format&fit=crop&w=700&q=60"
                                            alt="" class="card-img-top">
                                        <div class="card-body">
                                            <h5 class="card-title">{{$article->name}}</h5>
                    <p class="card-text">@php
                        echo substr($article->content, 0, 40).(strlen($article->content) > 40 ?
                        '...' : '');
                        @endphp
                    </p>
                    <a href="" class="btn btn-outline-success btn-sm">Edit</a>
                    <a href="" class="btn btn-outline-danger btn-sm"><i class="far fa-heart"></i></a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
</section> --}}