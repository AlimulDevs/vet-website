<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Ubah Password</title>

    <!-- Styles -->
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,400;0,600;0,700;1,400&display=swap" rel="stylesheet">
    <link href="{{asset('bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('bootstrap/css/fontawesome-all.min.css')}}" rel="stylesheet">
    <link href="{{asset('bootstrap/css/swiper.css')}}" rel="stylesheet">
    <link href="{{asset('bootstrap/css/styles.css')}}" rel="stylesheet">

    <!-- Icon Website  -->
    <link rel="icon" href="{{asset('bootstrap/images/icon.png')}}">
</head>

<body data-bs-spy="scroll" data-bs-target="#navbarExample">
    @foreach ($data_user as $dtu)


    <!-- Navigation -->
    <nav id="navbarExample" class="navbar navbar-expand-lg fixed-top navbar-light" aria-label="Main navigation">
        <div class="container">
            <!-- Logo -->
            <a class="navbar-brand" href="index.html"><img src="{{asset('bootstrap/images/logo.png')}}" alt="alternative"></a>
        </div>
    </nav>
    <!-- end of navigation -->


    <!-- Form -->
    <div class="form">

        <div class="container">
            <div class="row">
                <div class="col-xl-6 offset-xl-3">
                    <div class="card shadow border-0 py-5 px-5">

                        <h5 class="text-center mb-4">Reset Password</h5>

                        <form action="/change-password" method="post" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id" value="{{$dtu->id}}">
                            <div class="mb-4 form-group">
                                <input type="password" name="password1" class="form-control-input" placeholder="Password Baru">
                            </div>
                            <div class="mb-4 form-group">
                                <input type="password" name="password2" class="form-control-input" placeholder="Ulangi Password">
                            </div>
                            <div class="mb-4 form-group">
                                <button type="submit" class="form-control-submit-button">Ubah password</button>
                            </div>
                        </form>

                        <div class="text-center">
                            <a class="small" href="/register-index">Buat akun!</a>
                        </div>
                        <div class="text-center">
                            <a class="small" href="/login-index">Sudah punya akun? Masuk!</a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end of form -->
    @endforeach

    <!-- Scripts -->
    <script src="{{asset('bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('bootstrap/js/swiper.min.js')}}"></script>
    <script src="{{asset('bootstrap/js/isotope.pkgd.min.js')}}"></script>
    <script src="{{asset('bootstrap/js/scripts.js')}}"></script>

</body>

</html>