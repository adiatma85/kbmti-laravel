@extends('layouts.app')

@section('custom-style')
{{-- SweetAlert2 CSS --}}
@include('include.plugins.load-swal2-guest-css')
{{-- This Page / Temporary --}}
<link href="{{asset('css/news-page.css')}}" rel="stylesheet">
<link href="{{asset('css/osi-cpw.css')}}" rel="stylesheet">
@endsection

@section('content')
<div class="content" style="margin-left: 50px;margin-right: 50px">
    <div class="row">
        <div class="col-lg-12">
                    <div class="card card-chart">
                            <div class="card-header">
                                <h5 class="card-category"></h5>
                                <h4 class="card-title">Form Pendaftaran</h4>
                            </div>

                            <div class="card-body">
                                <form method="post" action="" enctype="multipart/form-data" onsubmit="return checkFile();">
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
                                                <input type="text" name="idLine" class="form-control" name="idLine" id="diLine"
                                                    placeholder="ID LINE">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="noHp">No. Handphone / WA</label>
                                                <input type="telp" class="form-control" name="noHp" id="noHp"
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
                                        <label for="">Pengalaman Organisasi</label>
                                        <div class="form-row" id="organisasi">
                                            <div class="form-group col-md-6">
                                                <div class="row">
                                                    <div class="col-md-9">
                                                        <input type="text" name="organisasi[]" class="form-control"
                                                            placeholder="Nama Organisasi">
                                                    </div>
                                                    <div class="col-md-3">
                                                        <input type="number" name="tahunOrganisasi[]" class="form-control"
                                                            placeholder="Tahun">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <div class="row">
                                                    <div class="col-md-9">
                                                        <input type="text" name="organisasi[]" class="form-control"
                                                            placeholder="Nama Organisasi">
                                                    </div>
                                                    <div class="col-md-3">
                                                        <input type="number" name="tahunOrganisasi[]" class="form-control"
                                                            placeholder="Tahun">
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
                                                            placeholder="Nama Kepanitiaan">
                                                    </div>
                                                    <div class="col-md-3">
                                                        <input type="number" name="tahunKepanitiaan[]" class="form-control"
                                                            placeholder="Tahun">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <div class="row">
                                                    <div class="col-md-9">
                                                        <input type="text" name="kepanitiaan[]" class="form-control"
                                                            placeholder="Nama Kepanitiaan">
                                                    </div>
                                                    <div class="col-md-3">
                                                        <input type="number" name="tahunKepanitiaan[]" class="form-control"
                                                            placeholder="Tahun">
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
                                        <br>
                                        <label for="ukuran">Upload Berkas ZIP/RAR</label><br>
                                        <small>* Berisi Berkas Surat Pernyataan Komitmen dan Foto 3x4</small>
                                        <input type="file" accept=".zip,.rar" class="form-control-file mr-1" id="komitmen"
                                            style="margin: 10px;background-color: white;" name="komitmen" required><br>
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
                "<input type='text' name='organisasi[]' class='form-control' placeholder='Nama Organisasi'>" +
                "</div>" +
                "<div class='col-md-3'>" +
                "<input type='number' name='tahunOrganisasi[]' class='form-control' placeholder='Tahun'>" +
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
                "<input type='text' name='kepanitiaan[]' class='form-control' placeholder='Nama Kepanitiaan'>" +
                "</div>" +
                "<div class='col-md-3'>" +
                "<input type='number' name='tahunKepanitiaan[]' class='form-control' placeholder='Tahun'>" +
                "</div>" +
                "</div>" +
                "</div>";
            $("#tambahPanitia").click(function() {
                $("#kepanitiaan").append($panitia);
            });

            $("#uploadPortfolio").click(function() {
                $("#portfolio").click();
            });
        });
</script>

<script type="text/javascript">
    function checkFile() {
            var fileElement = document.getElementById("komitmen");
            var fileExtension = "";
            if (fileElement.value.lastIndexOf(".") > 0) {
                fileExtension = fileElement.value.substring(fileElement.value.lastIndexOf(".") + 1, fileElement.value.length);
            }
            if (fileExtension.toLowerCase() == "zip" || fileExtension.toLowerCase() == "rar") {
                return true;
            } else {
                alert("Upload menggunakan ZIP/RAR");
                return false;
            }
        }
</script>

@endsection