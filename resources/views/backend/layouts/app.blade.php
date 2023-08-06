<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ $title }}</title>

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />


    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ asset('backend/plugins/fontawesome-free/css/all.min.css') }}">

    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('backend/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('backend/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
    <!-- End Datatables -->
    <!-- Toster and Sweet Alert -->
    <!-- <link rel="stylesheet" type="text/css" href="{{ asset('backend/css/toastr.css') }}"> -->
    <!-- End Toaster and Sweet Alert-->
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('backend/dist/css/adminlte.min.css') }}">
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i
                            class="fas fa-bars"></i></a>
                </li>

                <li class="nav-item d-none d-sm-inline-block">
                    <a class="nav-link" href="">
                        <b>{{ $configuration->nama_sistem }}</b>
                    </a>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                {{-- <li class="nav-item">
                    <a class="nav-link" href="#">
                        <i class="nav-icon fas fa-user-alt "></i>
                        @if (Auth::user()->role == 1)
                            <b>
                                Admin</b>
                        @endif

                        @if (Auth::user()->role == 2)
                            <b>
                                Staf</b>
                        @endif

                        @if (Auth::user()->role == 3)
                            <b>
                                Penjaga / Waris</b>
                        @endif

                    </a>
                </li> --}}



                <!-- Notifications Dropdown Menu -->
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="nav-icon fas fa-user-alt mr-1"></i>
                        @if (Auth::user()->role == 1)
                            <b>
                                Admin</b>
                        @endif

                        @if (Auth::user()->role == 2)
                            <b>
                                Staf</b>
                        @endif

                        @if (Auth::user()->role == 3)
                            <b>
                                Penjaga / Waris</b>
                        @endif
                        <i class='fas fa-angle-down'></i>

                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        {{-- <span class="dropdown-item dropdown-header">15 Notifications</span>
                        <div class="dropdown-divider"></div> --}}
                        <a href="#" class="dropdown-item">
                            {{-- <i class="fas fa-envelope mr-2"></i> --}}
                            Hi, {{ Auth::user()->name }} !
                            {{-- <span class="float-right text-muted text-sm">{{ Auth::user()->name }}</span> --}}
                        </a>

                        <div class="dropdown-divider"></div>
                        <a href="{{ route('profile.edit', ['user' => Auth::user()->id]) }}" class="dropdown-item">
                            <i class="fas fa-user-alt mr-2"></i> Edit Profil
                        </a>

                        <div class="dropdown-divider"></div>
                        <a href="{{ route('password.edit', ['user' => Auth::user()->id]) }}" class="dropdown-item">
                            <i class="fas fa-key mr-2"></i> Tukar Kata Laluan
                        </a>

                        <div class="dropdown-divider"></div>

                        <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault();    document.getElementById('logout-form').submit();">
                            <i class="fas fa-sign-out-alt mr-2"></i> Log Keluar
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>

                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                        <i class="fas fa-expand-arrows-alt"></i>
                    </a>
                </li>




                <li class="nav-item">
                    <a class="nav-link" href="{{ route('logout') }}"
                        onclick="event.preventDefault();    document.getElementById('logout-form').submit();">
                        <i class="nav-icon fas fa-sign-out-alt"></i>
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>

                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        @include('backend.layouts.sidebar')

        <!-- End Main Sidebar Container -->
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <!-- <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Starter Page</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div>
        </div>
      </div>
    </div>  -->
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid px-4">
                    @yield('content-header')
                </div>
            </section>

            <div class="content">
                <div class="container-fluid px-4">
                    {{-- @php
                        $excludeRoutes = ['application.create']; // Add the route names you want to exclude here
                    @endphp

                    @if (!in_array(Route::currentRouteName(), $excludeRoutes)) --}}
                    @include('backend.flash-message')
                    {{-- @endif --}}

                    @yield('content')
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
            <div class="p-3">
                <h5>Title</h5>
                <p>Sidebar content</p>
            </div>
        </aside>
        <!-- /.control-sidebar -->

        <!-- Main Footer -->
        @include('backend.layouts.footer')

        <!-- ./wrapper -->

        {{-- @include('sweetalert::alert') --}}
        @include('sweetalert::alert', ['cdn' => 'https://cdn.jsdelivr.net/npm/sweetalert2@9'])


        <!-- REQUIRED SCRIPTS -->
        <!-- jQuery -->
        <script src="{{ asset('backend/plugins/jquery/jquery.min.js') }}"></script>
        <!-- Bootstrap 4 -->
        <script src="{{ asset('backend/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <!-- AdminLTE App -->
        <script src="{{ asset('backend/dist/js/adminlte.min.js') }}"></script>
        <!-- Datatables -->
        <script src="{{ asset('backend/plugins/datatables/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('backend/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
        <script src="{{ asset('backend/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
        <script src="{{ asset('backend/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
        <script src="{{ asset('backend/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
        <script src="{{ asset('backend/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>

        {{-- <script src="{{ asset('backend/plugins/jszip/jszip.min.js') }}"></script>
        <script src="{{ asset('backend/plugins/pdfmake/pdfmake.min.js') }}"></script>
        <script src="{{ asset('backend/plugins/pdfmake/vfs_fonts.js') }}"></script> --}}


        <script src="https://www.gstatic.com/charts/loader.js"></script>

        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels"></script>
        <script src="https://cdn.jsdelivr.net/npm/chartjs-chart-treemap/dist/chartjs-chart-treemap.min.js"></script>
        {{-- <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script> --}}


        <script>
            $(function() {

                $("#example1").DataTable({
                    "responsive": true,
                    "autoWidth": false,
                })

                $('#example2').DataTable({
                    "paging": true,
                    "lengthChange": false,
                    "searching": false,
                    "ordering": true,
                    "info": true,
                    "autoWidth": false,
                    "responsive": true,
                });
            });
        </script>


        <!-- End Datatables -->




        <script>
            // Function to remove 'is-invalid' class from the input field
            function removeErrorClass(inputElement) {
                inputElement.classList.remove('is-invalid');
            }

            // Get all input fields with class 'remove-error-on-input'
            const inputFields = document.querySelectorAll('.remove-error-on-input');

            // Add event listeners to each input field
            inputFields.forEach(function(inputElement) {
                inputElement.addEventListener('input', function() {
                    removeErrorClass(this);
                });

                inputElement.addEventListener('blur', function() {
                    removeErrorClass(this);
                });
            });

            $(document).ready(function() {
                function setActiveClass(parentClass) {
                    // Get the URL of the current page
                    var currentUrl = window.location.href;

                    // Variable to keep track of whether a match is found
                    var matchFound = false;

                    // Loop through all the sub-menu items under the specified parent class
                    $('.nav-item.' + parentClass + ' .nav-link').each(function() {
                        // Get the URL of the current sub-menu item
                        var subMenuItemUrl = $(this).attr('href');

                        // Check if the current URL contains the URL of the current sub-menu item
                        if (currentUrl.indexOf(subMenuItemUrl) > -1) {
                            // Add the 'active' class to both the sub-menu link and the parent 'nav-item' with the specified class
                            $(this).addClass('active');
                            $('.nav-item.' + parentClass).addClass('active menu-open');
                            matchFound = true;
                            return false; // Exit the loop early since we found a match
                        }
                    });

                    // If no match is found, add the 'active' class to the parent 'nav-item' with the specified class
                    if (!matchFound) {
                        $('.nav-item.' + parentClass).addClass('active');
                    }
                }

                // Call the function for both classes 'application' and 'transaction'
                setActiveClass('application');
                setActiveClass('transaction');
            });
        </script>

        <!-- <script src="{{ asset('backend/js/toastr.min.js') }}"></script> -->

        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="{{ asset('backend/js/sweetalert.min.js') }}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>


        <!-- End  Sweet Alert and Toaster notifications -->

        @stack('js')


</body>

</html>
