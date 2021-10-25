<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Responsive Admin &amp; Dashboard Template based on Bootstrap 5">
    <meta name="author" content="AdminKit">
    <meta name="keywords"
        content="adminkit, bootstrap, bootstrap 5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="shortcut icon" href="{{ asset('assets/admin-kit/img/icons/icon-48x48.png') }}" />

    <title>Amikom Center</title>

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">

    <!-- CSS -->
    @include('includes.css')

</head>

<body>
    <div class="wrapper">
        <nav id="sidebar" class="sidebar js-sidebar">
            <div class="sidebar-content js-simplebar">
                <a class="sidebar-brand" href="index.html">
                    <span class="align-middle">Amikom Center</span>
                </a>

                <!-- SIDEBAR -->
                @include('layouts.apps.sidebar')

            </div>
        </nav>

        <div class="main">
            <!-- NAVBAR -->
            @include('layouts.apps.navbar')

            <!-- CONTENT -->
            @yield('contents')
            coba content

            <!-- FOOTER -->
            @include('layouts.apps.footer')
        </div>
    </div>

    <!-- JS -->
    @include('includes.js')

</body>

</html>
