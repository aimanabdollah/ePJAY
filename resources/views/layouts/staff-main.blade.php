<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ePJAY{{ isset($title) ? ' | ' . $title : '' }}</title>

    @include('layouts.inc.ext-css')
    @stack('css')


</head>

<body class="hold-transition sidebar-mini">
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

    @include('layouts.inc.ext-js')
    @stack('js')

</body>

</html>
