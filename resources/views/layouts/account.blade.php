<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>@yield('title')</title>
    <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
    <link rel="stylesheet" href="{{ mix('/assets/cabinets/css/atlantis.css') }}">
</head>

<body class="login bg-default">

<div class="wrapper wrapper-login">
    @yield('content')
</div>

<script src="{{ mix('/assets/cabinets/js/vendor_atlantis.js') }}"></script>
<script src="{{ asset('/assets/cabinets/js/atlantis2.js')}}"></script>
</body>
</html>
