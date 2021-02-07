<!-- ============================================================== -->
<!-- Top header  -->
<!-- ============================================================== -->
<!-- Start Navigation -->
<div class="header header-light">
    <div class="container-fluid">
        <nav id="navigation" class="navigation navigation-landscape">
            <div class="nav-header">
                <a class="nav-brand" href="#">
                    <img src="assets/img/logo.png" class="logo" alt="" />
                </a>
                <div class="nav-toggle"></div>
            </div>
            <div class="nav-menus-wrapper" style="transition-property: none;">
                <ul class="nav-menu">
                    <li><a href="{{ route('frontend') }}">ГЛАВНАЯ</a></li>
                    <li><a href="{{ route('frontend.projects') }}">ПРОЕКТЫ</a></li>
                    <li><a href="contact.html">БАЗА ЗНАНИЙ</a></li>
                </ul>

                <ul class="align-to-right">
                    <li class="d-flex justify-content-between">
                        <a href="{{ route('login') }}" class="btn btn-info mt-3 mr-2"><i class="fal fa-sign-in"></i> Войти в аккаунт</a>
                        <a href="{{ route('register') }}" class="btn btn-black black mt-3"><i class="fal fa-user-plus"></i> Регистрация</a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</div>
<!-- End Navigation -->
<div class="clearfix"></div>
<!-- ============================================================== -->
<!-- Top header  -->
<!-- ============================================================== -->