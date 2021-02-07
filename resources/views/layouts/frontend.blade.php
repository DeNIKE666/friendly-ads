
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
                    <div class="search-big-form no-border search-shadow">
                        <div class="row m-0">
                            <div class="col-lg-10 col-md-10 col-sm-10 p-0">
                                <div class="form-group">
                                    <select id="category" class="js-states form-control" name="category">
                                        <option value="" selected>&nbsp;</option>
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                    <i class="ti-layers"></i>
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-2 col-sm-12 p-0">
                                <button type="submit" class="btn btn-primary full-width selection_of_tasks"><i class="fal fa-paper-plane"></i> подобрать</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    @endif

    <!-- ============================ Hero Banner End ================================== -->

    <div id="app">
        @yield('content')
    </div>

    @include('__shared.frontend.footer')

</div>

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

<script>
    $('.selection_of_tasks').click(function () {
        let category = $('#category').val();

        if (category) {
            window.location.href = '/projects/?category_id=' + category
        }
    })
</script>

@stack('scripts')

<!-- ============================================================== -->
<!-- This page plugins -->
<!-- ============================================================== -->

</body>
</html>