<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
    {{-- <script src="{{ asset('js/app.js') }}" defer></script>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet"> --}}
    <link rel="shortcut icon" href="{{ asset('assets/backend/images/favicon.ico') }}">
    <!-- Bootstrap -->
    <link href="{{ asset('assets/backend/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- simplebar -->
    <link href="{{ asset('assets/backend/css/simplebar.css') }}" rel="stylesheet" type="text/css" />
    
    <!-- Icons -->
    <link href="{{ asset('assets/backend/css/materialdesignicons.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/backend/css/tabler-icons.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/backend/css/line.css') }}"  rel="stylesheet">
    <!-- Css -->
    <link href="{{ asset('assets/backend/css/style.min.css') }}" rel="stylesheet" type="text/css" id="theme-opt" />
    @livewireStyles
    </head>

    <body>
        <!-- Loader -->
        <!-- <div id="preloader">
            <div id="status">
                <div class="spinner">
                    <div class="double-bounce1"></div>
                    <div class="double-bounce2"></div>
                </div>
            </div>
        </div> -->
        <!-- Loader -->

        <div class="page-wrapper landrick-theme toggled">
            <nav id="sidebar" class="sidebar-wrapper sidebar-dark">
                <div class="sidebar-content" data-simplebar style="height: calc(100% - 60px);">
                    <div class="sidebar-brand">
                        <a href="index.html">
                            <img src="assets/images/logo-dark.png" height="24" class="logo-light-mode" alt="">
                            <img src="assets/images/logo-light.png" height="24" class="logo-dark-mode" alt="">
                            <span class="sidebar-colored">
                                <img src="assets/images/logo-light.png" height="24" alt="">
                            </span>
                        </a>
                    </div>
                    @if (Auth::user()->role=="Super")
                        <ul class="sidebar-menu">
                            <li><a href="index.html"><i class="ti ti-home me-2"></i>Dashboard</a></li>
                            <li class="sidebar-dropdown">
                                <a href="javascript:void(0)"><i class="ti ti-license me-2"></i>Hospitals</a>
                                <div class="sidebar-submenu">
                                    <ul>
                                        <li><a href="comingsoon.html">Hospitals</a></li>
                                        <li><a href="{{route('admin.admins')}}">Admins</a></li>
                                        <li><a href="error.html">Doctors</a></li>
                                    </ul>
                                </div>
                            </li>
                            <li><a href="index.html"><i class="ti ti-home me-2"></i>Patients</a></li>
                            <li><a href="index.html"><i class="ti ti-indent-increase me-2"></i>Enquiries</a></li>
                            <li><a href="index.html"><i class="ti ti-plug me-2"></i>Knowledge Base</a></li>
                        </ul>
                    @endif
                    @if (Auth::user()->role=="Hospital")
                        <ul class="sidebar-menu">
                            <li><a href="index.html"><i class="ti ti-home me-2"></i>Dashboard</a></li>
                            <li><a href="{{ route('hospital.doctors') }}"><i class="ti ti-watch me-2"></i>Doctors</a></li>
                            <li><a href="index.html"><i class="ti ti-indent-increase me-2"></i>Patients</a></li>
                            <li><a href="index.html"><i class="ti ti-doctor me-2"></i>Prescriprions</a></li>
                            <li><a href="index.html"><i class="ti ti-plug me-2"></i>Enquiry</a></li>
                        </ul>
                    @endif
                    @if (Auth::user()->role=="Doctor")
                        <ul class="sidebar-menu">
                            <li><a href="index.html"><i class="ti ti-home me-2"></i>Dashboard</a></li>
                            <li><a href="{{ route('doctor.patients') }}"><i class="ti ti-watch me-2"></i>Patients</a></li>
                            <li><a href="index.html"><i class="ti ti-indent-increase me-2"></i>Appointment</a></li>
                            <li><a href="index.html"><i class="ti ti-calendar me-2"></i>Schedule/Calendar</a></li>
                        </ul>
                    @endif

                </div>
            </nav>
            <main class="page-content bg-light">
                <div class="top-header">
                    <div class="header-bar d-flex justify-content-between border-bottom">
                        <div class="d-flex align-items-center">
                            <a href="#" class="logo-icon me-3">
                                <img src="assets/images/logo-icon.png" height="30" class="small" alt="">
                                <span class="big">
                                    <img src="assets/images/logo-dark.png" height="24" class="logo-light-mode" alt="">
                                    <img src="assets/images/logo-light.png" height="24" class="logo-dark-mode" alt="">
                                </span>
                            </a>
                            <a id="close-sidebar" class="btn btn-icon btn-soft-light" href="javascript:void(0)">
                                <i class="ti ti-menu-2"></i>
                            </a>
                            <div class="search-bar p-0 d-none d-md-block ms-2">
                                <div id="search" class="menu-search mb-0">
                                    <form role="search" method="get" id="searchform" class="searchform">
                                        <div>
                                            <input type="text" class="form-control border rounded" name="s" id="s" placeholder="Search Keywords...">
                                            <input type="submit" id="searchsubmit" value="Search">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
        
                        <ul class="list-unstyled mb-0">
                            <li class="list-inline-item mb-0 ms-1">
                                <div class="dropdown dropdown-primary">
                                    <button type="button" class="btn btn-icon btn-soft-light dropdown-toggle p-0" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="ti ti-bell"></i></button>
                                    <span class="position-absolute top-0 start-100 translate-middle p-1 bg-danger border border-light rounded-circle">
                                        <span class="visually-hidden">New alerts</span>
                                    </span>
                                    
                                    <div class="dropdown-menu dd-menu bg-white shadow rounded border-0 mt-3 p-0" data-simplebar style="height: 320px; width: 290px;">
                                        <div class="d-flex align-items-center justify-content-between p-3 border-bottom">
                                            <h6 class="mb-0 text-dark">Notifications</h6>
                                            <span class="badge bg-soft-danger rounded-pill">3</span>
                                        </div>
                                        <div class="p-3">
                                            <a href="#!" class="dropdown-item features feature-primary key-feature p-0">
                                                <div class="d-flex align-items-center">
                                                    <div class="icon text-center rounded-circle me-2">
                                                        <i class="ti ti-shopping-cart"></i>
                                                    </div>
                                                    <div class="flex-1">
                                                        <h6 class="mb-0 text-dark title">Order Complete</h6>
                                                        <small class="text-muted">15 min ago</small>
                                                    </div>
                                                </div>
                                            </a>
                                            
                                            <a href="#!" class="dropdown-item features feature-primary key-feature p-0 mt-3">
                                                <div class="d-flex align-items-center">
                                                    <img src="assets/images/client/04.jpg" class="avatar avatar-md-sm rounded-circle border shadow me-2" alt="">
                                                    <div class="flex-1">
                                                        <h6 class="mb-0 text-dark title"><span class="fw-bold">Message</span> from Luis</h6>
                                                        <small class="text-muted">1 hour ago</small>
                                                    </div>
                                                </div>
                                            </a>
                                            
                                            <a href="#!" class="dropdown-item features feature-primary key-feature p-0 mt-3">
                                                <div class="d-flex align-items-center">
                                                    <div class="icon text-center rounded-circle me-2">
                                                        <i class="ti ti-currency-dollar"></i>
                                                    </div>
                                                    <div class="flex-1">
                                                        <h6 class="mb-0 text-dark title"><span class="fw-bold">One Refund Request</span></h6>
                                                        <small class="text-muted">2 hour ago</small>
                                                    </div>
                                                </div>
                                            </a>

                                            <a href="#!" class="dropdown-item features feature-primary key-feature p-0 mt-3">
                                                <div class="d-flex align-items-center">
                                                    <div class="icon text-center rounded-circle me-2">
                                                        <i class="ti ti-truck-delivery"></i>
                                                    </div>
                                                    <div class="flex-1">
                                                        <h6 class="mb-0 text-dark title">Deliverd your Order</h6>
                                                        <small class="text-muted">Yesterday</small>
                                                    </div>
                                                </div>
                                            </a>
                                            
                                            <a href="#!" class="dropdown-item features feature-primary key-feature p-0 mt-3">
                                                <div class="d-flex align-items-center">
                                                    <img src="assets/images/client/15.jpg" class="avatar avatar-md-sm rounded-circle border shadow me-2" alt="">
                                                    <div class="flex-1">
                                                        <h6 class="mb-0 text-dark title"><span class="fw-bold">Cally</span> started following you</h6>
                                                        <small class="text-muted">2 days ago</small>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </li>

                            <li class="list-inline-item mb-0 ms-1">
                                <div class="dropdown dropdown-primary">
                                    <button type="button" class="btn btn-soft-light dropdown-toggle p-0" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="assets/images/client/05.jpg" class="avatar avatar-ex-small rounded" alt=""></button>
                                    <div class="dropdown-menu dd-menu dropdown-menu-end bg-white shadow border-0 mt-3 py-3" style="min-width: 200px;">
                                        <a class="dropdown-item d-flex align-items-center text-dark pb-3" href="profile.html">
                                            <img src="assets/images/client/05.jpg" class="avatar avatar-md-sm rounded-circle border shadow" alt="">
                                            <div class="flex-1 ms-2">
                                                <span class="d-block">{{Auth::user()->name}}</span>
                                                <small class="text-muted">{{Auth::user()->role}}
                                                    @if (Auth::user()->role=="Patient" || Auth::user()->role=="Doctor")
                                                        At HopitalName 
                                                    @endif
                                                </small>
                                            </div>
                                        </a>
                                        <a class="dropdown-item text-dark" href="index.html"><span class="mb-0 d-inline-block me-1"><i class="ti ti-home"></i></span> Dashboard</a>
                                        <a class="dropdown-item text-dark" href="profile.html"><span class="mb-0 d-inline-block me-1"><i class="ti ti-settings"></i></span> Profile</a>
                                        <a class="dropdown-item text-dark" href="email.html"><span class="mb-0 d-inline-block me-1"><i class="ti ti-mail"></i></span> Email</a>
                                        <div class="dropdown-divider border-top"></div>
                                        <a class="dropdown-item text-dark" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                        <span class="mb-0 d-inline-block me-1"><i class="ti ti-logout"></i></span>{{ __('Logout') }}
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="container-fluid">
                    <div class="layout-specing">
                        @yield('content')
                    </div>
                </div><!--end container-->

                <!-- Footer Start -->
                <footer class="bg-white shadow py-3">
                    <div class="container-fluid">
                        <div class="row align-items-center">
                            <div class="col">
                                <div class="text-sm-start text-center">
                                    <p class="mb-0 text-muted">© <script>document.write(new Date().getFullYear())</script> {{config('app.name')}}.</p>
                                </div>
                            </div><!--end col-->
                        </div><!--end row-->
                    </div><!--end container-->
                </footer><!--end footer-->
                <!-- End -->
            </main>
            <!--End page-content" -->
        </div>
        <!-- page-wrapper -->
        
        <!-- javascript -->
        @livewireScripts
        <script src="{{ asset('assets/backend/js/bootstrap.bundle.min.js') }}"></script>
        <!-- simplebar -->
        <script src="{{ asset('assets/backend/js/simplebar.min.js') }}"></script>
        <!-- Icons -->
        <script src="{{ asset('assets/backend/js/feather.min.js') }}"></script>
        <!-- Chart -->
        <script src="{{ asset('assets/backend/js/apexcharts.min.js') }}"></script>
        <!-- Main Js -->
        <script src="{{ asset('assets/backend/js/plugins.init.js') }}"></script>
        <script src="{{ asset('assets/backend/js/app.js') }}"></script> 
    </body>
</html>
