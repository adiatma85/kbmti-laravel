<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="home/assets/w3.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.9.0/css/all.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.9.0/css/v4-shims.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link href="{{asset('css/news-page.css')}}" rel="stylesheet">
    <link href="{{asset('css/osi-cpw.css')}}" rel="stylesheet">
    <link rel="shortcut icon" href="{{asset('images/favicon/kbmti-ungu.png')}}" type="image/x-icon">
    <!-- Footer -->
    <link href="{{asset('css/footer.css')}}" rel="stylesheet">
    <title>Business Idea and Motivation Class</title>
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
        <div class="osi-cpw__title">Business Idea and Motivation Class</div>
        <div class="image-title">
        </div>

    </section>
    <section id="form">
        <div class="flex-container">
            <div class="flex-15">
                <p></p>
            </div>
            <div class="flex-70">
                <form action="" method="post">
                    <div class="form-group row">
                        <label for="inputNama">Nama</label>
                        <input type="text" name="nama" id="namaForm" class="form-control" placeholder="Nama" required>
                    </div>
                    <div class="form-group row">
                        <label for="inputEmail">Email</label>
                        <input type="text" name="email" id="emailForm" class="form-control" placeholder="Email" required>
                    </div>
                    <div class="form-group row">
                        <label for="inputNoHP">No. HP</label>
                        <input type="number" name="nohp" id="noHPForm" class="form-control" placeholder="No. HP" required>
                    </div>
                     <div class="form-group row">
                        <label for="inputNama">Domisili</label>
                        <input type="text" name="domisili" id="namaForm" class="form-control" placeholder="Domisili" required>
                    </div>
                    
                  
                    <div class="button-place">
                        <button type="submit">Submit</button>
                    </div>
                </form>
            </div>
            <div class="flex-15">
                <img src="../home/assets/image/Siperat/siperat-big.svg" alt="" srcset="" data-aos="fade-left" data-aos-anchor-placement="center-bottom">
            </div>
        </div>
    </section>
    

    {{-- Footer Partials --}}
    @include('include.general.footer')

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
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
    {{-- Modal swal alert in here --}}


</body>

</html>