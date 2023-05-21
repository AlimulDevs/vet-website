<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Icons -->
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" /> -->

    <!-- CSS -->
    <link rel="stylesheet" href="{{asset('bootstrap-admin/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('bootstrap-admin/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('bootstrap-admin/datatables/dataTables.bootstrap4.min.css')}}">
    <title>@yield('title', config('app.name', 'Dashboard'))</title>
</head>

<body>
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

    <!-- Sidebar -->
    <div class="sidebar position-fixed top-0 bottom-0 bg-white border-end">

        <div class="d-flex align-items-center p-3">
            <a href="#" class="sidebar-logo">
                <img src="{{asset('bootstrap-admin/images/logo.png')}}" alt="">
            </a>
        </div>

        <ul class="sidebar-menu p-3 m-0 mb-0">
            <li class="sidebar-menu-item {{(request()->is('admin')?'active':'')}}">
                <a href="/admin">
                    <i class="ri-dashboard-line sidebar-menu-item-icon"></i>
                    Dashboard
                </a>
            </li>

            <li class="sidebar-menu-divider mt-4 mb-1 text-uppercase">Appointments</li>

            <li class="sidebar-menu-item {{(request()->is('admin/consultation-payment-index')?'active':'')}} {{(request()->is('admin/consultation-payment/*')?'active':'')}}">
                <a href="/admin/consultation-payment-index">
                    <i class="ri-message-3-line sidebar-menu-item-icon"></i>
                    Pembayaran
                </a>
            </li>
            <li class="sidebar-menu-item {{(request()->is('admin/consultation-index')?'active':'')}} {{(request()->is('admin/consultation/*')?'active':'')}}">
                <a href="/admin/consultation-index">
                    <i class="ri-message-3-line sidebar-menu-item-icon"></i>
                    Konsultasi
                </a>
            </li>

            <li class="sidebar-menu-item {{(request()->is('admin/reservation-index')?'active':'')}} {{(request()->is('admin/reservation/*')?'active':'')}}">
                <a href="/admin/reservation-index">
                    <i class="ri-calendar-line sidebar-menu-item-icon"></i>
                    Reservasi
                </a>
            </li>

            <li class="sidebar-menu-divider mt-4 mb-1 text-uppercase">General</li>

            <li class="sidebar-menu-item {{(request()->is('admin/doctor-index')?'active':'')}} {{(request()->is('admin/doctor/*')?'active':'')}}">
                <a href="/admin/doctor-index">
                    <i class="ri-nurse-line sidebar-menu-item-icon"></i>
                    Dokter
                </a>
            </li>

            <li class="sidebar-menu-item {{(request()->is('admin/patient-index')?'active':'')}} {{(request()->is('admin/patient/*')?'active':'')}}">
                <a href="/admin/patient-index">
                    <i class="ri-dossier-line sidebar-menu-item-icon"></i>
                    Pasien
                </a>
            </li>

            <li class="sidebar-menu-divider mt-4 mb-1 text-uppercase">Update</li>

            <li class="sidebar-menu-item {{(request()->is('admin/article-index')?'active':'')}} {{(request()->is('admin/article/*')?'active':'')}}">
                <a href="/admin/article-index">
                    <i class="ri-article-line sidebar-menu-item-icon"></i>
                    Artikel
                </a>
            </li>
            <li class="sidebar-menu-item {{(request()->is('admin/category-article-index')?'active':'')}} {{(request()->is('admin/category-article/*')?'active':'')}}">
                <a href="/admin/category-article-index">
                    <i class="ri-article-line sidebar-menu-item-icon"></i>
                    Kategori Artikel
                </a>
            </li>
            <li class="sidebar-menu-item {{(request()->is('admin/about-index')?'active':'')}} {{(request()->is('admin/about/*')?'active':'')}}">
                <a href="/admin/about-index">
                    <i class="ri-article-line sidebar-menu-item-icon"></i>
                    Tentang Kami
                </a>
            </li>
            <li class="sidebar-menu-item {{(request()->is('admin/service-index')?'active':'')}} {{(request()->is('admin/service/*')?'active':'')}}">
                <a href="/admin/service-index">
                    <i class="ri-article-line sidebar-menu-item-icon"></i>
                    Layanan
                </a>
            </li>
            <li class="sidebar-menu-item {{(request()->is('admin/facility-index')?'active':'')}} {{(request()->is('admin/facility/*')?'active':'')}}">
                <a href="/admin/facility-index">
                    <i class="ri-article-line sidebar-menu-item-icon"></i>
                    Fasilitas
                </a>
            </li>
        </ul>
    </div>
    <!-- end Sidebar -->

    <!-- Main -->
    <main class="bg-light">
        <div class="p-2">
            <!-- Navbar -->
            <nav class="px-3 py-2 bg-white rounded shadow-sm">
                <i class="ri-menu-line sidebar-toggle me-3 d-block d-md-none"></i>
                <h5 class="mb-0 me-auto">Halo Admin</h5>



                <div class="dropdown">
                    <div class="d-flex align-items-center cursor-pointer dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                        <span class="me-2 d-none d-sm-block">Admin</span>
                        <img class="navbar-profile-image" src="https://images.unsplash.com/flagged/photo-1570612861542-284f4c12e75f?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxzZWFyY2h8M3x8cGVyc29ufGVufDB8fDB8fA%3D%3D&auto=format&fit=crop&w=500&q=60" alt="Image">
                    </div>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                        <li><a class="dropdown-item" href="#">Profil</a></li>
                        <li><a class="dropdown-item" href="/logout">Keluar</a></li>
                    </ul>
                </div>
            </nav>
            <!-- end Navbar -->

            <!-- Content -->
            <div class="py-4">
                @yield('content-admin')
            </div>
            <!-- end Content -->
        </div>
    </main>
    <!-- end Main -->

    @stack('scripts')
    <script src="{{asset('bootstrap-admin/js/jquery.min.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.8.0/chart.min.js" integrity="sha512-sW/w8s4RWTdFFSduOTGtk4isV1+190E/GghVffMA9XczdJ2MDzSzLEubKAs5h0wzgSJOQTRYyaz73L3d6RtJSg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="{{asset('bootstrap-admin/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('bootstrap-admin/js/script.js')}}"></script>
    <script src="{{asset('bootstrap-admin/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('bootstrap-admin/datatables/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('bootstrap-admin/js/datatables-demo.js')}}"></script>

</body>

</html>