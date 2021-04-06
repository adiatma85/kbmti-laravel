@extends('Admin.base-layout')

@section('content-header')
    @include('include.admin.breadcrumbs', [
        'pageTitle' => 'Article',
        'preBreadcrumbs' => [
        'Home' => route('admin.index'),
        'Articles' => route('admin.articles.index')
        ],
        'activeItem' => 'List Article'
        ])    
@endsection

@section('content')
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
                                                    href="{{route('admin.articles.edit', ['article' => $article->id])}}">
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
@endsection

@section('custom-style')
    
@endsection

@section('custom-scripts')
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
@endsection