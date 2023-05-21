<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Login</title>

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
    <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
        <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
        </symbol>
        <symbol id="info-fill" fill="currentColor" viewBox="0 0 16 16">
            <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z" />
        </symbol>
        <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
            <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
        </symbol>
    </svg>
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


                        @if (session("failed_login"))
                        <div class="alert alert-danger d-flex align-items-center" role="alert">
                            <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:">
                                <use xlink:href="#exclamation-triangle-fill" />
                            </svg>
                            <div>
                                Email atau password salah
                            </div>
                        </div>
                        @endif

                        <h5 class="text-center mb-4">Masuk</h5>

                        <form action="/login" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-4 form-group">

                                @if ($message = session("failed_password"))
                                <input type="email" name="email" value="{{$message}}" class="form-control-input" placeholder="Email Anda">
                                @else
                                <input type="email" name="email" class="form-control-input" placeholder="Email Anda">
                                @endif

                            </div>
                            <div class="mb-4 form-group">
                                <input type="password" name="password" class="form-control-input" placeholder="Password">
                            </div>
                            <div class="mb-4 form-group">
                                <button type="submit" class="form-control-submit-button">Masuk</button>
                            </div>
                        </form>

                        <div class="text-center">
                            <a class="small" href="/forgot-password-index">Lupa password</a>
                        </div>

                        <div class="text-center">
                            <a class="small" href="/register-index">Buat akun!</a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end of form -->


    <!-- Scripts -->
    <script src="{{asset('bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('bootstrap/js/swiper.min.js')}}"></script>
    <script src="{{asset('bootstrap/js/isotope.pkgd.min.js')}}"></script>
    <script src="{{asset('bootstrap/js/scripts.js')}}"></script>

</body>

</html>