@extends('Admin.base-layout')

@section('content-header')
    @include('include.admin.breadcrumbs', [
        'pageTitle' => 'Hasil Pendaftaran Event',
        'preBreadcrumbs' => [
        'Home' => route('admin.index'),
        'Events' => route('admin.events.index'),
        ],
        'activeItem' => 'Detail Event'
        ])
@endsection

@section('content')
    @php
    // Localization Indonesia
    setLocale(LC_TIME, 'id_ID.utf8');
    // Sett for modal
    $topic = 'Pendaftaran Event';
    $domFormId = 'eventRegistration-form';
    $itemName = 'title-eventRegistration';
    @endphp

    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">List Artikel</h3>
                    </div>
                    <div class="card-body">
                        <table id="main-table" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    @foreach ($event->eventFields as $field)
                                        <th class="is-using-setup">{{$field->name}}</th>
                                    @endforeach
                                    {{-- <th>Action</th> --}}
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($event->eventRegistration as $item)
                                <tr>
                                    <td>{{$item->id}}</td>
                                    @foreach ($item->fieldResponses as $response)
                                        <td>{{$response->response}}</td>
                                    @endforeach
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <th>No</th>
                                    @foreach ($event->eventFields as $field)
                                        <th>{{$field->name}}</th>
                                    @endforeach
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
    
@endsection