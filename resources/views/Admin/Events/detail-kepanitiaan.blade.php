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
    $specialFields = [
        'Organisasi',
        'Kepanitiaan',
        'Tahun_Organisasi',
        'Tahun_Kepanitiaan',
        'Pemberkasan'
    ];
    @endphp

    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">List Pendaftar</h3>
                    </div>
                    <div class="card-body">
                        <table id="main-table" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    @foreach ($event->eventFields as $field)
                                        @if ( in_array($field->name, $specialFields) )
                                            @continue
                                        @endif
                                        <th>{{$field->name}}</th>
                                    @endforeach
                                    {{-- Pemberkasan --}}
                                    <th>Pemberkasan</th>
                                    {{-- Organisasi --}}
                                    <th>Organisasi</th>
                                    {{-- Kepanitiaan --}}
                                    <th>Kepanitiaan</th>
                                    {{-- <th>Action</th> --}}
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($event->eventRegistration as $item)
                                <tr>
                                    <td>{{$item->id}}</td>
                                    @foreach ($item->fieldResponses as $response)
                                        @if ( in_array($response->toEventField->name, $specialFields) )
                                                @continue
                                        @endif
                                        <td>{{$response->response}}</td>
                                    @endforeach
                                    {{-- Pemberkasan --}}
                                    <td>
                                        {{-- {{$item->getPemberkasanAttribute($item->id)}} --}}
                                        <a href="{{route('guest.open-tender.downloadBerkas', [ 'stringName' => $item->getPemberkasanAttribute($item->id)->response ])}}" target="blank">
                                            <div class="col-md-6">
                                                <button class="btn btn-success" onclick="clickedPemberkasan($item->getPemberkasanAttribute($item->id)->response)">
                                                    <i class="fa fa-download"></i>
                                                </button>
                                            </div>
                                        </a>
                                    </td>
                                    {{-- Organisasi --}}
                                    <td>
                                        <ul>
                                            @for ($i = 0; $i < count($item->getOrganisasiArrayAttribute($item->id)) / 2; $i++)
                                                @php
                                                    $gap = count($item->getOrganisasiArrayAttribute($item->id)) / 2;
                                                @endphp
                                                <li>   
                                                     {{ $item->getOrganisasiArrayAttribute($item->id)[$i]->response }} 
                                                     :
                                                     {{ $item->getOrganisasiArrayAttribute($item->id)[$i+$gap]->response }} 
                                                    </li>
                                            @endfor
                                        </ul>
                                    </td>
                                    {{-- Kepanitiaan --}}
                                    <td>
                                        <ul>
                                            @for ($i = 0; $i < count($item->getKepanitiaanArrayAttribute($item->id)) / 2; $i++)
                                                @php
                                                    $gap = count($item->getKepanitiaanArrayAttribute($item->id)) / 2;
                                                @endphp
                                                <li>
                                                     {{ $item->getKepanitiaanArrayAttribute($item->id)[$i]->response }} 
                                                     :
                                                     {{ $item->getKepanitiaanArrayAttribute($item->id)[$i+$gap]->response }} 
                                                    </li>
                                            @endfor
                                        </ul>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <th>No</th>
                                @foreach ($event->eventFields as $field)
                                    @if ( in_array($field->name, $specialFields) )
                                        @continue
                                    @endif
                                    <th>{{$field->name}}</th>
                                @endforeach
                                {{-- Pemberkasan --}}
                                <th>Pemberkasan</th>
                                {{-- Organisasi --}}
                                <th>Organisasi</th>
                                {{-- Kepanitiaan --}}
                                <th>Kepanitiaan</th>
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
        // Append
        let index = 0;
        $(document).ready(function() {
                // option-event handler
                function appendElement(numerical){
                    return $org;
                }
            });
    </script>
@endsection