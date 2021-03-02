<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="home/assets/w3.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.9.0/css/all.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.9.0/css/v4-shims.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link href="{{asset('css/news-page.css')}}" rel="stylesheet">
    <link href="{{asset('css/osi-cpw.css')}}" rel="stylesheet">
    <link rel="shortcut icon" href="{{asset('images/favicon/kbmti-ungu.png')}}" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Footer -->
    <link href="{{asset('css/footer.css')}}" rel="stylesheet">
    <title>Staf Ahli</title>
</head>

<body>
    @include('include.general.mega-drop-down')
    {{-- Validation Error --}}
    {{-- Need to be separated module --}}
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <section id="title">
        <div class="osi-cpw__title">Pendaftaran Staff Ahli</div>
        <div class="image-title">
        </div>

    </section>
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
                        <!-- Berkas belum diganti, ini masih yang lama -->
                        <a href="https://drive.google.com/file/d/17oQgvUh2VJPlaIOX6ANvCTZMk_Skc1wo/view?usp=sharing"
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
                        <h4 class="card-title">Form Pendaftaran</h4>
                    </div>
                    <div class="card-body">


                        <form method="post" action="{{route('staf_Ahli.store')}}" enctype="multipart/form-data">
                            @csrf
                            <div class="col-md-12">
                                <div class="form-row mt-4">
                                    <div class="form-group col-md-6">
                                        <label for="nama">Nama</label>
                                        <input type="text" name="name" class="form-control" id="nama"
                                            value="{{old('name') ?? ''}}" placeholder="Nama">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="nim">NIM</label>
                                        <input type="text" name="nim" class="form-control" id="nim"
                                            value="{{old('nim') ?? ''}}" placeholder="NIM">
                                    </div>
                                </div>
                                <div class="form-row mt-4">
                                    <div class="form-group col-md-6">
                                        <label for="idLine">ID Line</label>
                                        <input type="text" name="id_line" class="form-control" name="idLine" id="diLine"
                                            placeholder="ID LINE" value="{{old('id_line') ?? ''}}">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="noHp">No. Handphone / WA</label>
                                        <input type="telp" class="form-control" name="no_wa" id="noHp"
                                            placeholder="No Handphone / WA" value="{{old('id_line') ?? ''}}" required>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group col-md-12 mt-4">
                                <label for="">Pilihan Biro / Department / BPM</label>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <select name="dept[]" id="dept1" class="form-control">
                                            <option value="" selected>Pilihan Departemen ke-1</option>
                                            <option value="Dept. Advocacy">Dept. Advocacy</option>
                                            <option value="Dept. Research and Development">Dept. Research and
                                                Development</option>
                                            <option value="Dept. Human Resource Development">Dept. Human Resource
                                                Development</option>
                                            <option value="Dept. Social Environment">Dept. Social Environment</option>
                                            <option value="Biro Entrepeneur">Biro Entrepeneur</option>
                                            <option value="Biro Relation and Creative">Biro Relation and Creative
                                            </option>
                                            <option value="Biro Administrative">Biro Administrative</option>
                                            <option value="BPM">BPM</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <select name="dept[]" id="dept2" class="form-control">
                                            <option value="" selected>Pilihan Departemen ke-2</option>
                                            <option value="Dept. Advocacy">Dept. Advocacy</option>
                                            <option value="Dept. Research and Development">Dept. Research and
                                                Development</option>
                                            <option value="Dept. Human Resource Development">Dept. Human Resource
                                                Development</option>
                                            <option value="Dept. Social Environment">Dept. Social Environment</option>
                                            <option value="Biro Entrepeneur">Biro Entrepeneur</option>
                                            <option value="Biro Relation and Creative">Biro Relation and Creative
                                            </option>
                                            <option value="Biro Administrative">Biro Administrative</option>
                                            <option value="BPM">BPM</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-md-12 mt-4">
                                <label for="">Pilihan Jadwal Interview</label>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <select name="time[]" id="time1" class="form-control">
                                            <option value="" selected>Pilihan Jadwal Interview ke-1</option>
                                            @foreach ($allocatedTimes as $time)
                                            <option value="{{$time->id}}">{{$time->tanggal . ' ' . $time->jam}} (Stock
                                                {{$time->stock}})</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <select name="time[]" id="time2" class="form-control">
                                            <option value="" selected>Pilihan Jadwal Interview ke-2</option>
                                            @foreach ($allocatedTimes as $time)
                                            <option value="{{$time->id}}">{{$time->tanggal . ' ' . $time->jam}} (Stock
                                                {{$time->stock}})</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-md-12 mt-4">
                                <div class="form-row row">
                                    <label for="portofolio">Link Portofolio (Drive / Github)</label>
                                    <input type="text" name="portofolio" class="form-control"
                                        placeholder="Link Portfolio" id="portofolio">
                                </div>
                                <small>* Untuk yang mendaftar Dept. RND dan/atau Biro RNC</small>
                                <br><small>* Portfolio bersifat optional</small><br><br>
                            </div>
                            {{-- <div class="form-group col-md-12 mt-4">
                                <div class="form-row row">
                                    <label for="komitmen_text">Link Komitmen</label>
                                    <input type="text" name="komitmen" class="form-control" placeholder="Link Komitmen"
                                        id="komitmen_text">
                                </div>
                            </div> --}}
                            <div class="form-group col-md-6">
                                <br>
                                <label for="ukuran">Upload Berkas ZIP/RAR</label><br>
                                <small>* Berisi Berkas Surat Pernyataan Komitmen yang dikompress menjadi ZIP/RAR</small>
                                <input type="file" accept=".zip, .rar" class="form-control-file mr-1" id="komitmen"
                                    style="margin: 10px;background-color: white;" name="komitmen" required><br>
                            </div>
                            <div class="form-group col-md-12">
                                <div class="row">
                                    <div class="col-md-2 offset-md-10 ">
                                        <button type="submit" class="btn btn-primary text-center"
                                            style="/* color: 8265A7; */background: #44318D;border: black;">
                                            <h3>Submit</h3>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>


        </div>
    </div>
    </div>
    </div>

    <div class="modal fade" id="registerModal" tabindex="-1" role="dialog" aria-labelledby="registerModalCenterTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="registerModalLongTitle">Staf Ahli EMTI</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div>Registrasi berhasil</div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    {{-- Footer Partials --}}
    @include('include.general.footer')

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
        $("#imgInp").change(function() {
        readURL(this);
        });
        AOS.init();
        let isEmpty;
        const showModal = () => {
            const namaElem = document.getElementById("namaForm").value == "";
            const emailElem = document.getElementById("emailForm").value == "";
            const noHPElem = document.getElementById("noHPForm").value == "";
            const domisiliElem = document.getElementById("domisiliForm").value == "";
            isEmpty = namaElem || emailElem || noHPElem || domisiliElem;
            console.log(isEmpty);
            if (!isEmpty) {
                $('#registerModal').modal('show')
            }
        }
    </script>
    @if (\Session::has('msg'))
    <script>
        swal({
                title: "Registrasi Berhasil",
                text: '{{\Session::get('msg')}}',
                icon: "success",
            });
    </script>
    @endif

    @if (\Session::has('err'))
    <script>
        swal({
                title: "Registrasi Gagal",
                text: '{{\Session::get('err')}}',
                icon: "error",
            });
    </script>
    @endif

    <script type="text/javascript">
        function checkFile() {
        var fileElement = document.getElementById("komitmen");
        var fileExtension = "";
        if (fileElement.value.lastIndexOf(".") > 0) {
            fileExtension = fileElement.value.substring(fileElement.value.lastIndexOf(".") + 1, fileElement.value.length);
        }
        if (fileExtension.toLowerCase() == "zip" || fileExtension.toLowerCase() == "rar") {
            return true;
        }
        else {
            alert("Upload menggunakan ZIP/RAR");
            return false;
        }
    }
    </script>

</body>

</html>