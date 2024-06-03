<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sixtysix Journey</title>
    <link rel="shortcut icon" type="image/png" href="{{ asset('img\logodark.png') }}" />
    <link rel="stylesheet" href="{{ asset('modernize\assets\css\styles.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('css\dataTables.bootstrap5.css') }}">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" />
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css" />
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    {{-- BS ICON --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="{{ asset('css/aos.css') }}">
    @stack('css')
</head>

<body style="background-color: #fafafa">
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

    @include('sweetalert::alert')

    <script src="{{ asset('modernize\assets\libs\jquery\dist\jquery.min.js') }}"></script>
    <script src="{{ asset('modernize\assets\libs\bootstrap\dist\js\bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('modernize\assets\js\sidebarmenu.js') }}"></script>
    <script src="{{ asset('modernize\assets\js\app.min.js') }}"></script>
    <script src="{{ asset('modernize\assets\libs\apexcharts\dist\apexcharts.min.js') }}"></script>
    <script src="{{ asset('modernize\assets\libs\simplebar\dist\simplebar.js') }}"></script>
    <script src="{{ asset('modernize\assets\js\dashboard.js') }}"></script>
    <script src="{{ asset('js\datatables.js') }}"></script>
    <script src="{{ asset('js\datatables.bootstrap5.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>


    {{-- <script src="{{ asset('js/script.js') }}"></script> --}}
    {{-- PREVIEW IMAGE --}}
    <script>
        function previewImg() {
            const image = document.querySelector('#image')
            const imgPreview = document.querySelector('.img-preview')

            image.style.display = 'block'
            const oFReader = new FileReader();
            oFReader.readAsDataURL(image.files[0])
            oFReader.onload = function(oFREvent) {
                imgPreview.src = oFREvent.target.result
            }
        }
    </script>
    @stack('script')
</body>

</html>
