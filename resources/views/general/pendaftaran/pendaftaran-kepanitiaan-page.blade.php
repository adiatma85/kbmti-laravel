@extends('layouts.app')

@section('custom-style')
{{-- SweetAlert2 CSS --}}
@include('include.plugins.load-swal2-guest-css')
{{-- This Page / Temporary --}}
<link href="{{asset('css/news-page.css')}}" rel="stylesheet">
<link href="{{asset('css/osi-cpw.css')}}" rel="stylesheet">
@endsection

@section('content')
<section id="form">
    <div class="flex-container">
        <div class="flex-15">
            <p></p>
        </div>
        <div class="flex-70">
            <div class='card card-small mb-3' style="padding-bottom: 0px;">
                <div class="card-header border-bottom">
                    <h6 class="m-0">Download Berkas</h6>
                </div>
                <div class='card-body p-0 text-center'>
                    {{-- Berkas --}}
                    <a href="{{$event->link}}"
                        download target="_blank">
                        <button class="btn"><i class="fa fa-download"></i>Tautan Download Berkas</button></a><br>
                </div>
                <div class="flex-15">
                    <img src="{{asset('images/Siperat/siperat-big.svg')}}" alt="" srcset="" data-aos="fade-left"
                        data-aos-anchor-placement="center-bottom">
                </div>
            </div>
        </div>
</section>
<div class="content" style="margin-left: 50px;margin-right: 50px">
    <div class="row">
        <div class="col-lg-12">
                    <div class="card card-chart">
                            <div class="card-header">
                                <h5 class="card-category"></h5>
                                <h4 class="card-title">Form Pendaftaran {{$labelName}} {{$event->name}}</h4>
                            </div>

                            <div class="card-body">
                                <form method="post" action="{{route('guest.pendaftaran-kepanitiaan-dan-open-tender.storePendaftaran', [ 'allowed_prefixes' => explode('/', url()->current())[3]  ,'eventName' => str_replace(' ', '-', $event->name)])}}" enctype="multipart/form-data" onsubmit="return checkFile();">
                                    @csrf
                                    <div class="col-md-12">
                                        <div class="form-row mt-4">
                                            <div class="form-group col-md-6">
                                                <label for="nama">Nama</label>
                                                <input type="text" name="nama" class="form-control" id="nama" value="">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="nim">NIM</label>
                                                <input type="text" name="nim" class="form-control" id="nim" value="">
                                            </div>
                                        </div>
                                        <div class="form-row mt-4">
                                            <div class="form-group col-md-6">
                                                <label for="prodi">Program Studi</label>
                                                <input type="text" name="prodi" class="form-control" id="prodi"
                                                    value="Teknologi Informasi" readonly>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="angkatan">Angkatan</label>
                                                <input type="text" name="angkatan" class="form-control" id="angkatan">
                                            </div>
                                        </div>
                                        <div class="form-row mt-4">
                                            <div class="form-group col-md-6">
                                                <label for="idLine">ID Line</label>
                                                <input type="text" name="id_line" class="form-control" id="diLine"
                                                    placeholder="ID LINE">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="noHp">No. Handphone / WA</label>
                                                <input type="telp" class="form-control" name="nomor_telepon" id="noHp"
                                                    placeholder="No Handphone / WA" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group col-md-12 mt-4">
                                        <label for="email">Email</label>
                                        <input type="email" class="form-control" name="email" id="email" placeholder="Email"
                                            required>
                                    </div>

                                    <div class="form-group col-md-12 mt-4">
                                        <label for="inovasi">Inovasi untuk {{$event->name}} </label>
                                        <textarea name="inovasi" id="inovasi" class="form-control" rows="3" placeholder="Inovasi..."></textarea>
                                    </div>

                                    <div class="form-group col-md-12 mt-4">
                                        <label for="swot">Analisis SWOT <small><b>(Singkat)</b></small> </label>
                                        <textarea name="swot" id="swot" class="form-control" rows="3" placeholder="Analisis SWOT"></textarea>
                                    </div>

                                    {{-- For Better Approcahment, need an array! --}}
                                    {{-- Tahun Organisasi --}}
                                    <div class="form-group col-md-12 mt-4">
                                        <label for="">Pengalaman Organisasi</label>
                                        <div class="form-row" id="organisasi">
                                            <div class="form-group col-md-6">
                                                <div class="row">
                                                    <div class="col-md-9">
                                                        <input type="text" name="organisasi[]" class="form-control"
                                                            placeholder="Nama Organisasi" required>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <input type="number" name="tahun_organisasi[]" class="form-control"
                                                            placeholder="Tahun" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <div class="row">
                                                    <div class="col-md-9">
                                                        <input type="text" name="organisasi[]" class="form-control"
                                                            placeholder="Nama Organisasi" required>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <input type="number" name="tahun_organisasi[]" class="form-control"
                                                            placeholder="Tahun" required>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <button type="button" id="tambahOrg" class="btn btn-primary btn-block"
                                                style="background: #8265A7; border: black;">
                                                <i class="now-ui-icons ui-1_simple-add"></i> Tambah Pengalaman Organisasi
                                            </button>
                                        </div>
                                    </div>

                                    <div class="form-group col-md-12 mt-4">
                                        <label for="">Pengalaman Kepanitiaan</label>
                                        <div class="form-row" id="kepanitiaan">
                                            <div class="form-group col-md-6">
                                                <div class="row">
                                                    <div class="col-md-9">
                                                        <input type="text" name="kepanitiaan[]" class="form-control"
                                                            placeholder="Nama Kepanitiaan" required>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <input type="number" name="tahun_kepanitiaan[]" class="form-control"
                                                            placeholder="Tahun" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <div class="row">
                                                    <div class="col-md-9">
                                                        <input type="text" name="kepanitiaan[]" class="form-control"
                                                            placeholder="Nama Kepanitiaan" required>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <input type="number" name="tahun_kepanitiaan[]" class="form-control"
                                                            placeholder="Tahun" required>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <button type="button" id="tambahPanitia" class="btn btn-primary btn-block"
                                                style="background: #8265A7; border: black;">
                                                <i class="now-ui-icons ui-1_simple-add"></i> Tambah Pengalaman Kepanitiaan
                                            </button>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        {{-- Need Progress Bar to see --}}
                                        <br>
                                        <label for="ukuran">Upload Berkas ZIP/RAR</label><br>
                                        <small>* Berisi Berkas - Berkas Penting</small>
                                        <br>
                                        <small>* Harap Menyiapkan Presentasi untuk Screening</small>
                                        <div class="form-group col-md-12">
                                            <input type="file" name="pemberkasan" class="form-control" id="pemberkasan">
                                        </div>
                                    </div>

                                <div class="form-group col-md-12">
                                    <div class="row">
                                        <div class="col-md-2 offset-md-10 ">
                                            <button type="submit" id="submit" class="btn btn-primary btn-block"
                                                style="background: #8265A7; border: black;">
                                                <i class="now-ui-icons ui-1_simple-add"></i> Submit
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('custom-script')
<script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
{{-- SweetAlert2 JS --}}
@include('include.plugins.load-swal2-guest-js')

{{-- Logic and Custom Scripts --}}
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


<script>
    $(document).ready(function() {
            // organisasi
            $org = "<div class='form-group col-md-6'>" +
                "<div class='row'>" +
                "<div class='col-md-9'>" +
                "<input type='text' name='organisasi[]' class='form-control' placeholder='Nama Organisasi' required>" +
                "</div>" +
                "<div class='col-md-3'>" +
                "<input type='number' name='tahun_organisasi[]' class='form-control' placeholder='Tahun' required>" +
                "</div>" +
                "</div>" +
                "</div>";
            $("#tambahOrg").click(function() {
                $("#organisasi").append($org);
            });

            // kepanitiaan
            $panitia = "<div class='form-group col-md-6'>" +
                "<div class='row'>" +
                "<div class='col-md-9'>" +
                "<input type='text' name='kepanitiaan[]' class='form-control' placeholder='Nama Kepanitiaan' required>" +
                "</div>" +
                "<div class='col-md-3'>" +
                "<input type='number' name='tahun_kepanitiaan[]' class='form-control' placeholder='Tahun' required>" +
                "</div>" +
                "</div>" +
                "</div>";
            $("#tambahPanitia").click(function() {
                $("#kepanitiaan").append($panitia);
            });

        });
</script>

@endsection