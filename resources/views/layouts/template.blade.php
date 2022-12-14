<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="ltr">

<head>
    <meta charset="utf-8">
    <title>{{ config('app.name', 'Library Management System') }}</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}"> <!-- Bootstrap -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }} "> <!-- Custom stlylesheet -->

    {{-- <link href="{{ asset('css/font-face.css') }} " rel="stylesheet" media="all"> --}}
    <link href="{{ asset('vendor/font-awesome-4.7/css/font-awesome.min.css') }} " rel="stylesheet" media="all">
    <link href="{{ asset('vendor/font-awesome-5/css/fontawesome-all.min.css') }} " rel="stylesheet" media="all">
    <link href="{{ asset('vendor/mdi-font/css/material-design-iconic-font.min.css') }} " rel="stylesheet" media="all">
    {{-- <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" /> --}}
    <!-- Bootstrap CSS-->
    <link href="{{ asset('vendor/bootstrap-4.1/bootstrap.min.css') }} " rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="{{ asset('vendor/animsition/animsition.min.css') }} " rel="stylesheet" media="all">
    <link href="{{ asset('vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css') }} " rel="stylesheet" media="all">
    <link href="{{ asset('vendor/wow/animate.css') }} " rel="stylesheet" media="all">
    <link href="{{ asset('vendor/css-hamburgers/hamburgers.min.css') }} " rel="stylesheet" media="all">
    <link href="{{ asset('vendor/slick/slick.css') }} " rel="stylesheet" media="all">
    <link href="{{ asset('vendor/select2/select2.min.css') }} " rel="stylesheet" media="all">
    <link href="{{ asset('vendor/perfect-scrollbar/perfect-scrollbar.css') }} " rel="stylesheet" media="all">


    <!-- Main CSS-->

    <link href="{{ asset('css/theme.css') }}" rel="stylesheet" media="all">

</head>

<body >
    <div class="page-wrapper" >
        <header class="header-mobile d-block d-lg-none">
            <div class="header-mobile__bar">
                <div class="container-fluid">
                    <div class="header-mobile-inner">
                        <a class="logo" href="index.html">
                            <img src="{{ asset('images/Picture4.png') }}" alt="iLibrary" />
                        </a>
                        <button class="hamburger hamburger--slider" type="button">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
            <nav class="navbar-mobile">
                <div class="container-fluid">
                    <ul class="navbar-mobile__list list-unstyled">
                        <li class="has-sub">
                            <a class="js-arrow" href="{{ route('dashboard') }}">
                                <i class="fas fa-tachometer-alt"></i>Dashboard</a>
                        </li>
                        <li>
                            <a href="{{ route('books') }}"><i class="fas fa-book"></i>Book</a>
                        </li>
                        <li>
                            <a href="{{ route('authors') }}">
                                <i class="fas fa-address-book"></i>Authors</a>
                        </li>
                        <li>
                            <a href="{{ route('publishers') }}"><i class="fas fa-building"></i>Publishers</a>
                        </li>
                        <li>
                            <a href="{{ route('borrow') }}"><i class="fas fa-clipboard"></i>Borrow Book List</a>
                        </li>
                        <li>
                            <a href="{{ route('profile') }}"><i class="fas fa-user"></i>Profile</a>
                        </li>
                        
                    </ul>
                </div>
            </nav>
        </header>
        <!-- END HEADER MOBILE-->

        <!-- MENU SIDEBAR-->
        <aside class="menu-sidebar d-none d-lg-block">
            <div class="logo">
                <a href="#">
                    <img src="{{ asset('images/Picture4.png') }}" alt="Cool Admin" />
                </a>
            </div>
            <div class="menu-sidebar__content js-scrollbar1">
                <nav class="navbar-sidebar">
                    <ul class="list-unstyled navbar__list">
                        <li class="has-sub">
                            <a  href="{{ route('dashboard') }}">
                                <i class="fas fa-tachometer-alt"></i>Dashboard</a>
                        </li>
                        <li>
                            <a href="{{ route('books') }}"><i class="fas fa-book"></i>Book</a>
                        </li>
                        <li>
                            <a href="{{ route('authors') }}">
                                <i class="fas fa-address-book"></i>Authors</a>
                        </li>
                        <li>
                            <a href="{{ route('publishers') }}"><i class="fas fa-building"></i>Publishers</a>
                        </li>
                        <li>
                            <a href="{{ route('borrow') }}"><i class="fas fa-clipboard"></i>Borrow Book List</a>
                        </li>
                        <li>
                            <a href="{{ route('profile') }}"><i class="fas fa-user"></i>Profile</a>
                        </li>
                        
                    </ul>
                </nav>
            </div>
        </aside>
        <!-- END MENU SIDEBAR-->

        <!-- PAGE CONTAINER-->
        <div class="page-container">
            <!-- HEADER DESKTOP-->
            <header class="header-desktop">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="header-wrap justify-content-end">
                            <div class="header-button">
                                <div class="account-wrap">
                                    <div class="account-item clearfix js-item-menu">
                                        <div class="image">
                                            
                                            @if(auth()->user()->image !=null)
                                            <img src="{{ asset('storage/'. auth()->user()->image  ) }}" style="max-height: 300px"  alt="{{ auth()->user()->image }}" />
                                            @else
                                            <img src="{{ asset('images/icon/icon.png') }}" alt="">
                                            @endif
                                        </div>
                                        <div class="content">
                                            <a class="js-acc-btn" href="#">{{ auth()->user()->username }}</a>
                                        </div>
                                        <div class="account-dropdown js-dropdown">
                                            <div class="info clearfix">
                                                <div class="image">
                                                    <a href="#">
                                                        @if(auth()->user()->image !=null)
                                                        <img src="{{ asset('storage/'. auth()->user()->image  ) }}" style="max-height: 300px"  alt="{{ auth()->user()->image }}" />
                                                        @else
                                                        <img src="{{ asset('images/icon/icon.png') }}" alt="">
                                                        @endif
                                                    </a>
                                                </div>
                                                <div class="content">
                                                    <h5 class="name">
                                                        <a href="#">{{ auth()->user()->name }}</a>
                                                    </h5>
                                                    <span class="email">{{ auth()->user()->username }}</span>
                                                </div>
                                            </div>
                                            <div class="account-dropdown__body">
                                                <div class="account-dropdown__item">
                                                    <a href="{{ route('profile') }}">
                                                        <i class="zmdi zmdi-account"></i>Profile</a>
                                                </div>
                                                <div class="account-dropdown__item">
                                                    <a href="{{ route('borrow') }}">
                                                        <i class="fas fa-clipboard"></i>Book Borrow List</a>
                                                </div>
                                            </div>
                                            <div class="account-dropdown__footer">
                                                {{-- <a href="#">
                                                    <i class="zmdi zmdi-power"></i>Logout</a> --}}
                                                    <a class="dropdown-item" href="#" onclick="document.getElementById('logoutForm').submit()">Log Out</a>
                                                <form method="post" id="logoutForm" action="{{ route('logout') }}">
                                                    @csrf
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <!-- HEADER DESKTOP-->
            
    
        <!-- HEADER -->
         <!-- /Menu Bar -->

    @yield('content')

    <!-- FOOTER -->
    
    <!-- /FOOTER -->
    </div>
    <script src="{{ asset('js/custom-file-input.js') }}"></script>
    <script src="{{ asset('js/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
     <!-- Jquery JS-->
     <script src="{{ asset('vendor/jquery-3.2.1.min.js') }}"></script>
     <!-- Bootstrap JS-->
     <script src="{{ asset('vendor/bootstrap-4.1/popper.min.js') }}"></script>
     <script src="{{ asset('vendor/bootstrap-4.1/bootstrap.min.js') }}"></script>
     <!-- Vendor JS       -->
     <script src="{{ asset('vendor/slick/slick.min.js') }}">
     </script>
     <script src="{{ asset('vendor/wow/wow.min.js') }}"></script>
     <script src="{{ asset('vendor/animsition/animsition.min.js') }}"></script>
     <script src="{{ asset('vendor/bootstrap-progressbar/bootstrap-progressbar.min.js') }}">
     </script>
     <script src="{{ asset('vendor/counter-up/jquery.waypoints.min.js') }}"></script>
     <script src="{{ asset('vendor/counter-up/jquery.counterup.min.js') }}">
     </script>
     <script src="{{ asset('vendor/circle-progress/circle-progress.min.js') }}"></script>
     <script src="{{ asset('vendor/perfect-scrollbar/perfect-scrollbar.js') }}"></script>
     <script src="{{ asset('vendor/chartjs/Chart.bundle.min.js') }}"></script>
     <script src="{{ asset('vendor/select2/select2.min.js') }}">
     </script>
 
     <!-- Main JS-->
     <script src="{{ asset('js/main.js') }}"></script>

</body>

</html>
