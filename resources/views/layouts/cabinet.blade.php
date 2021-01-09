
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>@yield('title')</title>
    <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ mix('/assets/cabinet/css/atlantis.css') }}">
</head>
<body>
<div class="wrapper">
    <div class="main-header">
        <!-- Logo Header -->
        <div class="logo-header d-flex justify-content-start" data-background-color="white">
            <a href="/" class="logo">
                <span>КАБИНЕТ</span>
            </a>
            <button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse" data-target="collapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon">
                    <i class="icon-menu"></i>
                </span>
            </button>
            <button class="topbar-toggler more"><i class="icon-options-vertical"></i></button>
            <div class="nav-toggle">
                <button class="btn btn-toggle toggle-sidebar">
                    <i class="icon-menu"></i>
                </button>
            </div>
        </div>
        <!-- End Logo Header -->

        <!-- Navbar Header -->
        <nav class="navbar navbar-header navbar-expand-lg" data-background-color="white">
            <div class="container-fluid">
                <ul class="navbar-nav topbar-nav ml-md-auto align-items-center">
                    <li class="nav-item dropdown hidden-caret">
                        <a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#" aria-expanded="false">
                            <div class="avatar-sm">
                                <img src="https://image.flaticon.com/icons/svg/727/727399.svg" alt="..." class="avatar-img rounded-circle">
                            </div>
                        </a>
                        <ul class="dropdown-menu dropdown-user animated fadeIn">
                            <div class="dropdown-user-scroll scrollbar-outer">
                                <li>
                                    <div class="user-box">
                                        <div class="avatar-lg"><img src="https://image.flaticon.com/icons/svg/727/727399.svg" alt="image profile" class="avatar-img rounded"></div>
                                        <div class="u-text">
                                            <h4>ИМЯ</h4>
                                            <p class="text-muted">ЮЗЕРНЕЙМ</p>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="">Выйти</a>
                                </li>
                            </div>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
        <!-- End Navbar -->
    </div>


    @include('__shared.cabinet.menu_sidebar')

    <div class="main-panel">
        <div class="content">
            @yield('content')
        </div>
        <footer class="footer">
            <div class="container-fluid">
                <div class="copyright">
                    developed <i class="fa fa-heart heart text-danger"></i> by <a href="https://t.me/AppEXEdev">DevPlus</a>
                </div>
            </div>
        </footer>
    </div>
</div>
<script src="{{ mix('/assets/cabinet/js/vendor_atlantis.js') }}"></script>
<script src="{{ asset('/assets/cabinet/js/atlantis2.js')}}"></script>
@stack('scripts')
</body>
</html>
