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
    {{-- Variables goes here --}}
    @php
        $arrayOfFieldResponses = [
            // 
            [
                "label" => "NIM Pendaftar",
                "value" => "NIM",
                "htmlId" => "pendaftarNim",
            ],
            [
                "label" => "Nama Pendaftar",
                "value" => "Nama",
                "htmlId" => "pendaftarNama",
            ],
            [
                "label" => "Email Peserta",
                "value" => "Email",
                "htmlId" => "pendaftarEmail",
            ],
            [
                "label" => "Id Line Pendaftar",
                "value" => "Id Line",
                "htmlId" => "pendaftarLineId",
            ],
            [
                "label" => "No. Telpon Peserta",
                "value" => "Nomor Telepon",
                "htmlId" => "pendaftarPhone",
            ],
            [
                "label" => "Angkatan Pendaftar",
                "value" => "Angkatan",
                "htmlId" => "pesertaAngkatan",
            ],
        ];
    @endphp

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
                    {{-- Name of the Event Nanti akan digunakan menjadi Link --}}
                    <div class="form-group">
                        <label for="title-events">Nama Event Pendaftaran</label>
                        <input type="text" class="form-control" id="title-events" placeholder="Nama Event Pendaftaran" name="name"
                            value="{{old('name') ?? ''}}" required>
                    </div>
                    {{-- Label dari Event Pendaftaran --}}
                    <div class="form-group">
                        <label for="label-events">Label Event Pendaftaran</label>
                        <input type="text" class="form-control" id="label-events" placeholder="Label Event Pendaftaran" name="label"
                            value="{{old('label') ?? ''}}" required>
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
                    {{-- Link Untuk Item yang akan Ditambahkan (Optional) --}}
                    <div class="form-group">
                        <label for="link-berkas">Link Tautan Berkas yang Disertakan</label>
                        <input type="text" class="form-control" id="link-berkas" placeholder="misalkan: https://drive.google.com" name="link"
                            value="{{old('link') ?? ''}}">
                    </div>
                    <div class="form-group">
                        <label for="expiration_date">Tanggal Expired Pendaftaran:</label>
                          <div class="input-group date" id="expired_date" data-target-input="nearest">
                              <input type="text" class="form-control datetimepicker-input" data-target="#expired_date" id="expiration_date" name="expired_date"/>
                              <div class="input-group-append" data-target="#expired_date" data-toggle="datetimepicker">
                                  <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                              </div>
                          </div>
                      </div>
                    {{-- Field yang diiperlukan --}}
                    <label>Daftar-Daftar Field yang Diperlukan</label>
                    <label>Default:</label>
                    <div class="row">
                        {{-- For better approachment, using Array --}}
                        <div class="col-6" id="fieldsSlider">
                            {{-- Row 1 --}}
                            <div class="row">
                                @foreach ($arrayOfFieldResponses as $fieldResponse)
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="custom-control custom-switch">
                                                <input type="checkbox" class="custom-control-input" id="{{ $fieldResponse["htmlId"] }}" value="{{ $fieldResponse["value"] }}" name="field[]" checked >
                                                <label class="custom-control-label" for="{{ $fieldResponse["htmlId"] }}">{{ $fieldResponse["label"] }}</label>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="col-12">
                            <label>Tambahan</label>
                            {{-- Append Field --}}
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
{{-- Temposdominus Bootstrap --}}
    <link rel="stylesheet" href="{{  asset('plugins/temposdominus-bootstrap/css/tempusdominus-bootstrap-4.min.css') }}">
@endsection

@section('custom-scripts')
    {{-- Moment --}}
    <script src="{{ asset('plugins/moment/moment.min.js') }}"></script>
    {{-- Temposdominus Bootstrap --}}
    <script src="{{ asset('plugins/temposdominus-bootstrap/js/tempusdominus-bootstrap-4.min.js') }}"></script>
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
                    let element = document.getElementById(`appendKepanitiaan`);
                    if ((value == 'OPEN-TENDER' || value == 'KEPANITIAAN')) {
                        // Refresh
                        if (element) {
                            element.remove();
                        }
                        let arrayAppendElement = [
                            {
                                label: "Pengalaman Keogranisasian",
                                value: "Organisasi",
                                htmlId: "pendaftarOrganisasi"
                            },
                            {
                                label: "Pengalaman Kepanitiaan",
                                value: "Kepanitiaan",
                                htmlId: "pendaftarKepanitiaan"
                            },
                            {
                                label: "Inovasi",
                                value: "Inovasi",
                                htmlId: "pendaftarInovasi"
                            }
                        ];

                        if (value == 'KEPANITIAAN') {
                            arrayAppendElement.push({
                                label: "Analisis SWOT",
                                value: "Swot",
                                htmlId: "pendaftarSwot"
                            });
                        }
                        $append = "<div id='appendKepanitiaan' class='row'>";
                        arrayAppendElement.forEach(element => {
                            $append += appendOptionEvent(element);
                        });
                        $append += "</div>"
                        $("#fieldsSlider").append($append);
                    } else {
                        element.remove();
                    }
                });

                // Helper dari #option-event on change
                function appendOptionEvent({ label, value, htmlId }) {
                    let returnValue = "<div class='col-md-6'>" +
                                    "<div class='form-group'>" +
                                        "<div class='custom-control custom-switch'>" +
                                            `<input type='checkbox' class='custom-control-input' id='peserta${htmlId}' value='${value}' name='field[]' checked>` +
                                            `<label class='custom-control-label' for='peserta${htmlId}'>${label}</label>` +
                                        "</div>" +
                                    "</div>" +
                                "</div>";
                    return returnValue;
                }

                // Helper dari #addFieldButton onClick (adder)
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

                // listener dari remover fieldbutton
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
                // Date range picker
                $('#expired_date').datetimepicker({
                    format: 'L'
                });
            });
    </script>
@endsection