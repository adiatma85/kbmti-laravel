@extends('Admin.base-layout')

@section('content-header')
    @include('include.admin.breadcrumbs', [
        'pageTitle' => 'Article',
        'preBreadcrumbs' => [
            'Home' => route('admin.index'),
            'Articles' => route('admin.events.index')
        ],
        'activeItem' => 'Create Event'
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
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Form Menambah Pendaftaran Event</h3>
            </div>
            <form method="POST" action="{{route('admin.events.store')}}">
                @csrf
                <div class="card-body">
                    {{-- Name of the Event --}}
                    <div class="form-group">
                        <label for="title-events">Nama Event Pendaftaran</label>
                        <input type="text" class="form-control" id="title-events" placeholder="Nama Event Pendaftaran" name="name"
                            value="{{old('name') ?? ''}}" required>
                    </div>
                    {{-- Description Event --}}
                    <div class="form-group">
                        <label for="descripiton-events">Description Event</label>
                        <textarea id="descripiton-events" class="form-control" rows="3" placeholder="Description"
                            name="description" required>{{old('description') ?? ''}}</textarea>
                    </div>
                    {{-- Jenis Event --}}
                    <div class="form-group">
                        <label for="option-event">Jenis Agenda Event</label>
                        <select class="custom-select" id="option-event" name="event_type" required>
                          <option value="NORMAL-EVENT">Normal Event</option>
                          <option value="OPEN-TENDER">Open Tender</option>
                          <option value="KEPANITIAAN">Pendaftaran Kepanitiaan</option>
                        </select>
                    </div>
                    {{-- Body Text for Email Responses --}}
                    <div class="form-group">
                        <label for="body-response-email">Body Response Email</label>
                        <textarea id="body-response-email" class="form-control" rows="3" placeholder="Konten Email yang akan dikirim"
                            name="bodyText">{{old('bodyText') ?? ''}}</textarea>
                    </div>
                    {{-- Link for Email Responses (Optional) --}}
                    <div class="form-group">
                        <label for="link-response-email">Link Tautan Berkas yang Disertakan</label>
                        <input type="text" class="form-control" id="link-response-email" placeholder="Nama Event Pendaftaran" name="link"
                            value="{{old('link') ?? ''}}">
                    </div>
                    {{-- Field yang diiperlukan --}}
                    <label>Daftar-Daftar Field yang Diperlukan</label>
                    <label>Default:</label>
                    <div class="row">
                        <div class="col-6" id="fieldsSlider">
                            {{-- Row 1 --}}
                            <div class="row">
                                <div class="col-md-6">
                                    {{-- FIELD NIM --}}
                                    <div class="form-group">
                                        <div class="custom-control custom-switch">
                                            <input type="checkbox" class="custom-control-input onChangeDisabled" id="pesertaNim" value="NIM" name="field[]" checked >
                                            <label class="custom-control-label" for="pesertaNim">NIM Peserta</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    {{-- FIELD NAMA --}}
                                    <div class="form-group">
                                        <div class="custom-control custom-switch">
                                            <input type="checkbox" class="custom-control-input onChangeDisabled" id="pesertaName" value="Nama" name="field[]" checked >
                                            <label class="custom-control-label" for="pesertaName">Nama Lengkap Peserta</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{-- Row 2 --}}
                            <div class="row">
                                <div class="col-md-6">
                                    {{-- FIELD EMAIL --}}
                                    <div class="form-group">
                                        <div class="custom-control custom-switch">
                                            <input type="checkbox" class="custom-control-input onChangeDisabled" id="pesertaEmail" value="Email" name="field[]" checked >
                                            <label class="custom-control-label" for="pesertaEmail">Email Peserta</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    {{-- FIELD ID LINE --}}
                                    <div class="form-group">
                                        <div class="custom-control custom-switch">
                                            <input type="checkbox" class="custom-control-input onChangeDisabled" id="pesertaLineId" value="Id Line" name="field[]" checked >
                                            <label class="custom-control-label" for="pesertaLineId">ID Line Peserta</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{-- Row 3 --}}
                            <div class="row">
                                <div class="col-md-6">
                                    {{-- FIELD NOMOR TELEPON --}}
                                    <div class="form-group">
                                        <div class="custom-control custom-switch">
                                            <input type="checkbox" class="custom-control-input onChangeDisabled" id="pesertaPhone" value="Nomor Telepon" name="field[]" checked >
                                            <label class="custom-control-label" for="pesertaPhone">No. Telepon Peserta</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    {{-- FIELD Email --}}
                                    <div class="form-group">
                                        <div class="custom-control custom-switch">
                                            <input type="checkbox" class="custom-control-input onChangeDisabled" id="pesertaAngkatan" value="Angkatan" name="field[]" checked >
                                            <label class="custom-control-label" for="pesertaAngkatan">Angkatan Peserta</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <label>Tambahan</label>
                            <div class="row" id="addFieldAppend">

                            </div>
                            <div class="d-flex justify-content-center">
                                <button class="btn btn-info btn-block" id="addFieldButton">
                                    Tambahkan Field Lainnya
                                    <i class="fa fa-plus-circle ml-2"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>                    
                </div>
            </form>
        </div>
    </div>
@endsection

@section('custom-style')
    
@endsection

@section('custom-scripts')
    {{-- bs-custom-file-input --}}
    <script src="{{asset('plugins/bs-custom-file-input/bs-custom-file-input.min.js')}}"></script>
    {{-- init bs-custom-file --}}
    <script>
        $(function () {
        bsCustomFileInput.init();
        });
    </script>

    {{-- Custom Script for Add New Field --}}
    <script>
        let index = 0;
        $(document).ready(function() {
                // Listener for Addfieldbutton
                $("#addFieldButton").click(function(event) {
                    event.preventDefault();
                    $("#addFieldAppend").append(appendElement(index));
                    document.getElementById(`removeSign-${index}`).addEventListener('click', removeFunction);
                    index++;
                });

                // option-event handler
                $("#option-event").change(function(event) {
                    let value = this.value
                    if (value == 'OPEN-TENDER') {
                        $append = "<div class='row' id='appendOpenTender'>" +
                                "<div class='col-md-6'>" +
                                    "<div class='form-group'>" +
                                        "<div class='custom-control custom-switch'>" +
                                            "<input type='checkbox' class='custom-control-input' id='pesertaOrganisasi' value='Organisasi' name='field[]' checked disabled>" +
                                            "<label class='custom-control-label' for='pesertaOrganisasi'>Pengalaman Keorganisasian</label>" +
                                        "</div>" +
                                    "</div>" +
                                "</div>" +
                                "<div class='col-md-6'>" +
                                    "<div class='form-group'>" +
                                        "<div class='custom-control custom-switch' disabled>" +
                                            "<input type='checkbox' class='custom-control-input' id='pesertaKepanitiaan' value='Kepanitiaan' name='field[]' checked disabled>" +
                                            "<label class='custom-control-label' for='pesertaKepanitiaan'>Pengalaman Kepanitiaan</label>" +
                                        "</div>" +
                                    "</div>" +
                                "</div>" +
                                "<div class='col-md-6'>" +
                                    "<div class='form-group'>" +
                                        "<div class='custom-control custom-switch' disabled>" +
                                            "<input type='checkbox' class='custom-control-input' id='pesertaInovasi' value='Inovasi' name='field[]' checked disabled>" +
                                            "<label class='custom-control-label' for='pesertaInovasi'>Inovasi</label>" +
                                        "</div>" +
                                    "</div>" +
                                "</div>" +
                            "</div>";
                        $("#fieldsSlider").append($append);
                        $(".onChangeDisabled").prop('disabled', true)
                    } else {
                        let element = document.getElementById(`appendOpenTender`);
                        element.remove();
                        $(".onChangeDisabled").prop('disabled', false)
                    }
                });

                function appendElement(numerical){
                    $org = `<div class='form-group col-md-12' id='field-${numerical}'>` +
                    "<div class='row'>" +
                    "<div class='col-md-6'>" +
                    "<input type='text' name='fieldNames[]' class='form-control' placeholder='Nama Field' required>" +
                    "</div>" +
                    "<div class='col-md-5'>" +
                    "<select class='custom-select' name='fieldTypes[]' required>" +
                    "<option selected>Open this select menu</option>" +
                    "<option value='text'>Text</option>" +
                    "<option value='number'>Number</option>" +
                    "<option value='email'>Email</option>" +
                    "<option value='password'>Password</option>" +
                    "<option value='date'>Date</option>" +
                    "<option value='textarea'>Textarea</option>" +
                    "</select>" +
                    "</div>" +
                    "<div class='col-md-1'>" +
                    `<button class='btn btn-warning btn-block' id='removeSign-${numerical}'>` +
                        "<i class='fas fa-times-circle'></i>" +
                    "</button>" +
                    "</div>" +
                    "</div>" +
                    "</div>";
                    return $org;
                }

                function removeFunction(event){
                    event.preventDefault();
                    if (event.target !== this) {
                        return;
                    }
                    let removeSignId = event.target.id
                    let number = removeSignId.split("-")[1];
                    let element = document.getElementById(`field-${number}`);
                    element.remove();
                    index--;
                }
            });
    </script>
@endsection