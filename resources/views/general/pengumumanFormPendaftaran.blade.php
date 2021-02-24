<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    {{-- <link rel="stylesheet" href="home/assets/w3.css"> --}}
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
    <title>Pengumuman Staff Ahli</title>
</head>

<body>
    @include('include.general.mega-drop-down')

    <section id="title">
        <div class="osi-cpw__title">Pengumuman Pendaftaran Staff Ahli</div>
    </section>
    <div class="content" style="margin-left: 50px;margin-right: 50px">
        <div class="row">
            <div class="col-lg-12">
                <div class="card card-chart">
                    <div class="card-header">
                        <h5 class="card-category"></h5>
                        <h4 class="card-title">Form Pengumuman Staff Ahli</h4>
                    </div>
                    <div class="card-body">


                        <form method="post" action="{{route('pengumuman.postPengumumanForm')}}" id="formPengumuman">
                            @csrf
                            <div class="col-md-12">
                                <div class="form-row mt-4">
                                    <div class="form-group col-md-12">
                                        <label for="field_kode">Kode Unik</label>
                                        <input type="text" name="unique_code" class="form-control" id="field_kode"
                                            value="{{old('unique_code') ?? ''}}">
                                    </div>
                                    <div>
                                        <small>* Kode Unik didapatkan dari kombinasi antara id-line dan nomor telepon
                                            Anda. </small>
                                    </div>
                                    <div>
                                        <small>Contoh: 124gui321 - 081217131455</small>
                                    </div>
                                </div>
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



    {{-- Footer Partials --}}
    @include('include.general.footer')

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    {{-- Jquery --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
    <script type="text/javascript">
        $('#formPengumuman').on('submit',function(event){
            event.preventDefault();
    
            let unique_code = $('#field_kode').val();
    
            $.ajax({
              url: '{{route('pengumuman.postPengumumanForm')}}',
              type:"POST",
              data:{
                "_token": "{{ csrf_token() }}",
                unique_code
              },
              success:function(response){
                swal({
                    title: response.title,
                    text: (response.success ? response.msg : response.err),
                    icon: response.icon,
                });
              },
             });
            });
    </script>
</body>

</html>