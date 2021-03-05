<!-- ============================================================== -->
<!-- Top header  -->
<!-- ============================================================== -->
<!-- Start Navigation -->
<div class="header header-light">
    <div class="container-fluid">
        <nav id="navigation" class="navigation navigation-landscape">
            <div class="nav-header">
                <a class="nav-brand" href="/">
                    <img src="{{ asset('images/frontend/logo.png') }}" class="logo" alt="Размещение ссылки на трастовых сайтах" />
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
                    <li class="">
                        @auth
                            <a href="{{ route('cabinets') }}" class="btn btn-info mt-3 mr-2"><i class="fal fa-user-circle"></i> Мой аккаунт <b>{{ auth()->user()->username }}</b></a>
                        @elseguest
                            <a href="{{ route('login') }}" class="btn btn-info mt-3 mr-2"><i class="fal fa-sign-in"></i> Войти в аккаунт</a>
                            <a href="{{ route('register') }}" class="btn btn-black black mt-3"><i class="fal fa-user-plus"></i> Регистрация</a>
                        @endauth
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