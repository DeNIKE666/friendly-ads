
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', config('ads_friendly.meta.title'))</title>

    <meta name="description" content="@yield('description' , config('ads_friendly.meta.description'))">

    <!-- All Plugins Css -->
    <link href="{{ mix('/assets/frontend/css/main.css') }}" rel="stylesheet">

    @stack('styles')
</head>

<body class="green-skin bg-light">
<!-- ============================================================== -->
<!-- Preloader - style you can find in spinners.css -->
<!-- ============================================================== -->
<div class="Loader"></div>

<!-- ============================================================== -->
<!-- Main wrapper - style you can find in pages.scss -->
<!-- ============================================================== -->
<div id="main-wrapper">

    @include('__shared.frontend.header')

    @if(request()->routeIs('frontend'))
        <!-- ============================ Hero Banner  Start================================== -->
            <div class="hero-header jumbo-banner text-center"
                 style="background: url({{ asset('images/frontend/bg_header.png') }});" data-overlay="6">
                <div class="container">
                    <h2>FUC - сервис по продвижению контента и заработка на своих сайтах</h2>
                    <p class="lead">Продвигайте любой контент за счёт цепей исполнителей</p>
                    <form action="{{ route('frontend.setFindCategory') }}" class="search-big-form no-border search-shadow" method="POST">
                        @csrf
                        <div class="row m-0">
                            <div class="col-lg-10 col-md-10 col-sm-10 p-0">
                                <div class="form-group">
                                    <select id="category" class="js-states form-control" name="category">
                                        <option value="" selected>&nbsp;</option>
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            <option value="5">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                    <i class="ti-layers"></i>
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-2 col-sm-12 p-0">
                                <button type="submit" class="btn btn-primary full-width selection_of_tasks">подобрать задания</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
    @endif

    <!-- ============================ Hero Banner End ================================== -->

    @yield('content')

    <!-- ============================ Footer Start ================================== -->

    <footer class="dark-footer skin-dark-footer">
        <div>
            <div class="container">
                <div class="row">

                    <div class="col-lg-3 col-md-3">
                        <div class="footer-widget">
                            <img src="assets/img/logo-light.png" class="img-footer" alt="" />
                            <div class="footer-add">
                                <p>Collins Street West, Victoria,</br> Australia (AU4578).</p>
                                <p><strong>Email:</strong></br><a href="#">hello@workstock.com</a></p>
                                <p><strong>Call:</strong></br>91 855 742 62548</p>
                            </div>

                        </div>
                    </div>
                    <div class="col-lg-2 col-md-2">
                        <div class="footer-widget">
                            <h4 class="widget-title">Navigations</h4>
                            <ul class="footer-menu">
                                <li><a href="#">New Home Design</a></li>
                                <li><a href="#">Browse Candidates</a></li>
                                <li><a href="#">Browse Employers</a></li>
                                <li><a href="#">Advance Search</a></li>
                                <li><a href="#">Job With Map</a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-lg-2 col-md-2">
                        <div class="footer-widget">
                            <h4 class="widget-title">The Highlights</h4>
                            <ul class="footer-menu">
                                <li><a href="#">Home Page 2</a></li>
                                <li><a href="#">Home Page 3</a></li>
                                <li><a href="#">Home Page 4</a></li>
                                <li><a href="#">Home Page 5</a></li>
                                <li><a href="#">LogIn</a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-lg-2 col-md-2">
                        <div class="footer-widget">
                            <h4 class="widget-title">My Account</h4>
                            <ul class="footer-menu">
                                <li><a href="#">Dashboard</a></li>
                                <li><a href="#">Applications</a></li>
                                <li><a href="#">Packages</a></li>
                                <li><a href="#">resume.html</a></li>
                                <li><a href="#">SignUp Page</a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-3">
                        <div class="footer-widget">
                            <h4 class="widget-title">Download Apps</h4>
                            <a href="#" class="other-store-link">
                                <div class="other-store-app">
                                    <div class="os-app-icon">
                                        <i class="ti-android theme-cl"></i>
                                    </div>
                                    <div class="os-app-caps">
                                        Google Play
                                        <span>Get It Now</span>
                                    </div>
                                </div>
                            </a>
                            <a href="#" class="other-store-link">
                                <div class="other-store-app">
                                    <div class="os-app-icon">
                                        <i class="ti-apple theme-cl"></i>
                                    </div>
                                    <div class="os-app-caps">
                                        App Store
                                        <span>Now it Available</span>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="footer-bottom">
            <div class="container">
                <div class="row align-items-center">

                    <div class="col-lg-6 col-md-6">
                        <p class="mb-0">© 2020 Work Stocks. Designd By PixelExperts All Rights Reserved</p>
                    </div>

                    <div class="col-lg-6 col-md-6 text-right">
                        <ul class="footer-bottom-social">
                            <li><a href="#"><i class="ti-facebook"></i></a></li>
                            <li><a href="#"><i class="ti-twitter"></i></a></li>
                            <li><a href="#"><i class="ti-instagram"></i></a></li>
                            <li><a href="#"><i class="ti-linkedin"></i></a></li>
                        </ul>
                    </div>

                </div>
            </div>
        </div>
    </footer>
    <!-- ============================ Footer End ================================== -->

    <!-- Log In Modal -->
    <div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="registermodal" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered login-pop-form" role="document">
            <div class="modal-content" id="registermodal">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="ti-close"></i></span>
                    </button>
                </div>
                <div class="modal-body">
                    <h4 class="modal-header-title">SignIn</h4>
                    <div class="social-login">
                        <ul>
                            <li><a href="#" class="btn connect-fb"><i class="ti-facebook"></i>Login with Facebook</a></li>
                            <li><a href="#" class="btn connect-gplus"><i class="ti-google"></i>Login with Gmail</a></li>
                        </ul>
                    </div>

                    <div class="devide-wrap"><span>OR</span></div>

                    <div class="login-form">
                        <form>

                            <div class="form-group">
                                <label>User Name</label>
                                <div class="input-with-gray">
                                    <input type="text" class="form-control" placeholder="Username">
                                    <i class="ti-user theme-cl"></i>
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Password</label>
                                <div class="input-with-gray">
                                    <input type="password" class="form-control" placeholder="*******">
                                    <i class="ti-unlock theme-cl"></i>
                                </div>
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-md full-width pop-login">Login</button>
                            </div>

                        </form>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="mf-link"><i class="ti-user"></i>Haven't An Account?<a href="javascript:void(0)" data-toggle="modal" data-target="#signup" data-dismiss="modal"> Sign Up</a></div>
                    <div class="mf-forget"><a href="#"><i class="ti-help"></i>Forget Password</a></div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Modal -->

    <!-- Sign Up Modal -->
    <div class="modal fade" id="signup" tabindex="-1" role="dialog" aria-labelledby="sign-up" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered login-pop-form" role="document">
            <div class="modal-content" id="sign-up">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="ti-close"></i></span>
                    </button>
                </div>
                <div class="modal-body">
                    <h4 class="modal-header-title">Sign Up</h4>
                    <div class="social-login">
                        <ul>
                            <li><a href="#" class="btn connect-fb"><i class="ti-facebook"></i>Login with Facebook</a></li>
                            <li><a href="#" class="btn connect-gplus"><i class="ti-google"></i>Login with Gmail</a></li>
                        </ul>
                    </div>

                    <div class="devide-wrap"><span>OR</span></div>

                    <div class="login-form">
                        <form>
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="form-group">
                                        <label>Full Name</label>
                                        <div class="input-with-gray">
                                            <input type="text" class="form-control" placeholder="Your Name">
                                            <i class="ti-user theme-cl"></i>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="form-group">
                                        <label>Email</label>
                                        <div class="input-with-gray">
                                            <input type="email" class="form-control" placeholder="Email ID">
                                            <i class="ti-user theme-cl"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="form-group">
                                        <label>User Name</label>
                                        <div class="input-with-gray">
                                            <input type="text" class="form-control" placeholder="Username">
                                            <i class="ti-user theme-cl"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="form-group">
                                        <label>Password</label>
                                        <div class="input-with-gray">
                                            <input type="password" class="form-control" placeholder="*******">
                                            <i class="ti-unlock theme-cl"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary btn-md full-width pop-login">Login</button>
                                    </div>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="mf-link"><i class="ti-user"></i>Already Have Account? Sign In</a></div>
                    <div class="mf-forget"><a href="#"><i class="ti-help"></i>Need Help</a></div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Modal -->

</div>
<!-- ============================================================== -->
<!-- End Wrapper -->
<!-- ============================================================== -->

<!-- ============================================================== -->
<!-- All Jquery -->
<!-- ============================================================== -->

<script src="{{ mix('/assets/frontend/js/vendor.js') }}"></script>

<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>


@stack('scripts')
<!-- ============================================================== -->
<!-- This page plugins -->
<!-- ============================================================== -->


</body>
</html>