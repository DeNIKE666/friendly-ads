<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>@yield('title')</title>
    <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
    <link rel="stylesheet" href="{{ mix('/assets/cabinet/css/atlantis.css') }}">
</head>

<body class="login bg-default">

<div class="wrapper wrapper-login">
    @yield('content')
</div>

<script src="{{ mix('/assets/cabinet/js/vendor_atlantis.js') }}"></script>
<script src="{{ asset('/assets/cabinet/js/atlantis2.js')}}"></script>
</body>
</html>
