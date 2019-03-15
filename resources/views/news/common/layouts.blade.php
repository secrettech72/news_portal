<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title -->
    <title>The News Paper - News &amp; Lifestyle Magazine Template</title>

    <!-- Favicon -->
    <link rel="icon" href="{{ asset('newspaper/img/core-img/favicon.ico') }}">

    <!-- Core Stylesheet -->
    <link rel="stylesheet" href="{{ asset('newspaper/style.css') }}">

</head>

<body>
<!-- ##### Header Area Start ##### -->
<header class="header-area">
    <!-- Navbar Area -->
@include('news.common.nav')
</header>
<!-- ##### Header Area End ##### -->

<!-- ##### Hero Area Start ##### -->
{{--@include('news.common.breakingnews')--}}
<!-- ##### Hero Area End ##### -->

<!-- ##### Featured Post Area Start ##### -->
@yield('content')
<!-- ##### Featured Post Area End ##### -->
@include('news.common.footer')

<!-- ##### All Javascript Files ##### -->
<!-- jQuery-2.2.4 js -->
<script src="{{ asset('newspaper/js/jquery/jquery-2.2.4.min.js') }}"></script>
<!-- Popper js -->
<script src="{{ asset('newspaper/js/bootstrap/popper.min.js') }}"></script>
<!-- Bootstrap js -->
<script src="{{ asset('newspaper/js/bootstrap/bootstrap.min.js') }}"></script>
<!-- All Plugins js -->
<script src="{{ asset('newspaper/js/plugins/plugins.js') }}"></script>
<!-- Active js -->
<script src="{{ asset('newspaper/js/active.js') }}"></script>
@yield('js')
</body>

</html>