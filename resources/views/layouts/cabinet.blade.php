
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>@yield('title')</title>
    <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ mix('/assets/cabinet/css/atlantis.css') }}">
    @stack('styles')
</head>
<body>
<div class="wrapper" id="app">

    @include('__shared.cabinets.header')

    @can('customer')
        @include('__shared.cabinets.menu_customer_sidebar')
    @elsecan('executor')
        @include('__shared.cabinets.menu_executor_sidebar')
    @endcan

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
<script src="{{ mix('/assets/cabinet/js/app.js') }}"></script>
<script src="{{ mix('/assets/cabinet/js/vendor_atlantis.js') }}"></script>
<script src="{{ asset('/assets/cabinet/js/atlantis2.js')}}"></script>
<script src="{{ asset('assets/plugins/ckeditor/build/ckeditor.js')}}"></script>
<script src="https://ckeditor.com/apps/ckfinder/3.5.0/ckfinder.js"></script>
@stack('scripts')
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>

<script>
    @if(session()->has('error'))
        swal({
            icon: 'error',
            text: '{{ session()->get('error') }}'
        })
    @endif

</script>
</body>
</html>
