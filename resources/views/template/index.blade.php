<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>@yield('title', config('app.name', 'Dashboard'))</title>
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">

    <!-- Styles -->
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,400;0,600;0,700;1,400&display=swap" rel="stylesheet">
    <link href="{{asset('bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('bootstrap/css/fontawesome-all.min.css')}}" rel="stylesheet">
    <link href="{{asset('bootstrap/css/swiper.css')}}" rel="stylesheet">
    <link href="{{asset('bootstrap/css/styles.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

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
            <a class="navbar-brand" href="/"><img src="{{asset('bootstrap/images/logo.png')}}" alt="alternative"></a>

            <button class="navbar-toggler p-0 border-0" type="button" id="navbarSideCollapse" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="navbar-collapse offcanvas-collapse" id="navbarsExampleDefault">
                <ul class="navbar-nav ms-auto navbar-nav-scroll">
                    <li class="nav-item">
                        <a class="nav-link {{(request()->is('user/about-index')?'text-primary':'')}}" href="/user/about-index">Tentang Kami</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{(request()->is('user/consultation-index')?'text-primary':'')}}" href="/user/consultation-index">Konsultasi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{(request()->is('user/reservation-index')?'text-primary':'')}}" href="/user/reservation-index">Reservasi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{(request()->is('user/article-index')?'text-primary':'')}}" href="/user/article-index">Artikel</a>
                    </li>
                </ul>

                <ul class="navbar-nav ms-auto navbar-nav-scroll">
                    @if (session()->get("role") == "patient")
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-bs-toggle="dropdown" aria-expanded="false">
                            <img class="rounded-circle" width="35" height="35" src="{{session()->get('photo_url')}}" alt="">
                        </a>

                        <ul class="dropdown-menu" aria-labelledby="dropdown01">
                            <li><a class="dropdown-item {{(request()->is('user/profile-index')?'text-primary':'')}}" href="/user/profile-index">Profil</a></li>
                            <li>
                                <div class="dropdown-divider"></div>
                            </li>
                            <li><a class="dropdown-item {{(request()->is('user/pet-index')?'text-primary':'')}}" href="/user/pet-index">Hewan Saya</a></li>
                            <li>
                                <div class="dropdown-divider"></div>
                            </li>
                            <li><a class="dropdown-item {{(request()->is('user/history-index')?'text-primary':'')}}" href="/user/history-index">Riwayat</a></li>
                            <li>
                                <div class="dropdown-divider"></div>
                            </li>
                            <li><a class="dropdown-item" href="/logout">Keluar</a></li>
                        </ul>
                    </li>
                    @endif
                </ul>

                @if (session()->get("role") != "patient")
                <span class="nav-item">
                    <a class="btn-solid-sm" href="/login-index">Masuk</a>
                </span>
                @endif
            </div>
        </div>
    </nav>
    <!-- end of navigation -->


    <!-- Content -->
    @yield('content')

    <!-- End Content -->



    <!-- Footer -->
    <div class="footer bg-gray">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="footer-col first">
                        <h6>Jose Vet Clinic</h6>
                        <p class="p-small">JL. Mayor Tni AD Ismail Saili, Jl. Sungai Ampal, <br> RT.57 No 9, Sumber Rejo, Kec. Balikpapan Tengah, <br> Kota Balikpapan, Kalimantan Timur 76114</p>
                    </div>
                    <div class="footer-col second">
                        <h6>Operasional</h6>
                        <ul class="list-unstyled li-space-lg p-small">
                            <li>Senin - Sabtu : 08.00 s.d 21.00 WITA</li>
                            <li>Minggu : 09.00 s.d 17.00 WITA</li>
                        </ul>
                    </div>
                    <div class="footer-col third">
                        <span class="fa-stack">
                            <a href="#">
                                <i class="fas fa-circle fa-stack-2x"></i>
                                <i class="fab fa-facebook-f fa-stack-1x"></i>
                            </a>
                        </span>
                        <span class="fa-stack">
                            <a href="#">
                                <i class="fas fa-circle fa-stack-2x"></i>
                                <i class="fab fa-instagram fa-stack-1x"></i>
                            </a>
                        </span>
                        <p class="p-small">Hubungi Kami <a href="mailto:arifinstyawan89@gmail.com"><strong>contact@gmail.com</strong></a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end of footer -->


    <!-- Copyright -->
    <div class="copyright bg-gray">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <ul class="list-unstyled li-space-lg p-small">
                        <li><a href="terms.html">Terms & Conditions</a></li>
                        <li><a href="privacy.html">Privacy Policy</a></li>
                    </ul>
                </div>
                <div class="col-lg-6">
                    <p class="p-small statement">Copyright © Jose Vet Clinic</p>
                </div>
            </div>
        </div>
    </div>
    <!-- end of copyright -->


    <!-- Scripts -->
    <script src="{{asset('bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('bootstrap/js/swiper.min.js')}}"></script>
    <script src="{{asset('bootstrap/js/isotope.pkgd.min.js')}}"></script>
    <script src="{{asset('bootstrap/js/scripts.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

    <script>
        config = {
            enableTime: true,
            dateFormat: "D, d M Y (H:i)",
            minDate: "today",
            disableMobile: "true",
            time_24hr: true,
            position: "auto",
            maxTime: "20:00"
        }
        flatpickr("input[type=datetime-local]", config);
    </script>
    @stack('scripts')
</body>

</html>