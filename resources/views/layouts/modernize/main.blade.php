<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sixtysix Journey</title>
    <link rel="shortcut icon" type="image/png" href="{{ asset('img\logo.png') }}" />
    <link rel="stylesheet" href="{{ asset('modernize\assets\css\styles.min.css') }}" />
    @stack('css')
</head>

<body>
    <!--  Body Wrapper -->
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed">
        @include('layouts.modernize.sidebar')
        <!--  Main wrapper -->
        <div class="body-wrapper">
            @include('layouts.modernize.header')
            <div class="container-fluid">
                @yield('konten')
            </div>
        </div>
    </div>

    <script src="{{ asset('modernize\assets\libs\jquery\dist\jquery.min.js') }}"></script>
    <script src="{{ asset('modernize\assets\libs\bootstrap\dist\js\bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('modernize\assets\js\sidebarmenu.js') }}"></script>
    <script src="{{ asset('modernize\assets\js\app.min.js') }}"></script>
    <script src="{{ asset('modernize\assets\libs\apexcharts\dist\apexcharts.min.js') }}"></script>
    <script src="{{ asset('modernize\assets\libs\simplebar\dist\simplebar.js') }}"></script>
    <script src="{{ asset('modernize\assets\js\dashboard.js') }}"></script>

    @stack('script')
</body>

</html>
