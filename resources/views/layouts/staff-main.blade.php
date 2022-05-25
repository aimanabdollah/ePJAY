<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ePJAY{{ isset($title) ? ' | ' . $title : '' }}</title>

    @include('layouts.inc.ext-css')
    @stack('css')

    <link href="" rel="icon">
    <link href="" rel="apple-touch-icon">

    <link rel="icon" href="{{ url('/landing/assets/img/logo-rbdh.png') }}">
    <link rel="apple-touch-icon" href="{{ url('/landing/assets/img/logo-rbdh.png') }}">


</head>

<body class="hold-transition sidebar-mini">
    @include('sweetalert::alert')
    <!-- Site wrapper -->
    <div class="wrapper">
        <!-- Navbar -->
        @include('layouts.inc.navbar')

        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        @include('layouts.inc.staff-sidebar')

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                @yield('content-header')
            </section>

            <!-- Main content -->
            <section class="content">

                @yield('content')


            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        @include('layouts.inc.footer')



    </div>
    <!-- ./wrapper -->
    {{-- <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    @if (session('status'))
        <script>
            swal("{{ session('status') }}");
        </script>
    @endif --}}

    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
    @include('layouts.inc.ext-js')
    @stack('js')

</body>

</html>
