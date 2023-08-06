<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laporan</title>

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
            <section class="content-header">
                <div class="container-fluid px-4">
                    @yield('content-header')
                </div>
            </section>

            <!-- Main content -->
            <div class="content">
                <div class="container-fluid px-4">
                    @include('backend.flash-message')

                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-12">
                                <div class="d-flex no-print justify-content-between align-items-center">
                                    <div class="py-2">
                                        <button class="btn btn-success" onclick="window.print();">
                                            <i class="fas fa-print"></i> Cetak
                                        </button>
                                    </div>
                                    <div class="py-2">
                                        <a href="{{ url('admin-income') }}" class="btn btn-primary">
                                            <i class="nav-icon fas fa-arrow-circle-left"></i> Kembali
                                        </a>
                                    </div>
                                </div>

                                <!-- Main content -->
                                <section class="invoice p-4">
                                    <!-- title row -->
                                    <div class="row">
                                        <div class="col-12">

                                            <h4>
                                                {{-- <i class="fas fa-globe"></i> AdminLTE, Inc. --}}
                                                @php
                                                    $logoPath = 'assets/pusat_jagaan/' . $configuration->logo_pusat_jagaan;
                                                    $defaultImagePath = 'assets/no-img.jpg';
                                                    
                                                    if (!file_exists(public_path($logoPath)) || empty($configuration->logo_pusat_jagaan)) {
                                                        $logoPath = $defaultImagePath;
                                                    }
                                                @endphp

                                                <center> <img id="preview-image" src="{{ asset($logoPath) }}"
                                                        alt="" style="height: 140px" alt="">
                                                </center>
                                                <center class="m-2">
                                                    <strong>{{ $configuration->nama_pusat_jagaan }}</strong>
                                                </center>
                                                <center>
                                                    <h6> {{ $configuration->alamat1 }}, {{ $configuration->poskod }}
                                                        {{ $configuration->bandar }}, {{ $configuration->negeri }}
                                                        <br>
                                                        No. Tel: {{ $configuration->no_tel }} | Email:
                                                        {{ $configuration->emel }}
                                                    </h6>
                                                </center>

                                                <center>
                                                    <h2 class="mt-3"><b>Laporan Maklumat Pendapatan</b></h2>
                                                </center>
                                            </h4>

                                        </div>
                                        <!-- /.col -->
                                    </div>
                                    <!-- info row -->

                                    <hr>

                                    <h5><b>A. Jumlah Statistik Pendapatan</b></h5>

                                    <!-- Table row -->
                                    <div class="row">

                                        <div class="col-12 table-responsive">
                                            <table class="table table-striped">
                                                <thead>
                                                    <tr>
                                                        <th>No.</th>
                                                        <th>Kategori</th>
                                                        <th>Jumlah</th>

                                                    </tr>
                                                </thead>
                                                <tbody>

                                                    <tr>
                                                        <td>1.</td>
                                                        <td>Jumlah Keseluruhan Pendapatan</td>
                                                        <td>
                                                            @if ($totalSum > 0)
                                                                RM {{ $totalSum }}
                                                            @endif
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>2.</td>
                                                        <td>Jumlah Pendapatan Mengikut Kategori</td>
                                                        <td>
                                                            @if (count($categoriesWithSum) > 0)
                                                                @foreach ($categoriesWithSum as $index => $category)
                                                                    {{ $category['nama'] }}: RM
                                                                    {{ $category['incomes_sum_jumlah_tpn'] }}
                                                                    @if (!$loop->last)
                                                                        <br>
                                                                    @endif
                                                                @endforeach
                                                            @else
                                                            @endif
                                                        </td>
                                                    </tr>

                                                </tbody>
                                            </table>
                                        </div>
                                        <!-- /.col -->
                                    </div>
                                    <!-- /.row -->

                                    <hr>
                                    <h5><b>B. Senarai Maklumat Pendapatan</b></h5>

                                    <!-- Table row -->
                                    <div class="row">
                                        <div class="col-12 table-responsive">
                                            <table class="table table-striped">
                                                <thead>
                                                    <tr>
                                                        <th>No.</th>
                                                        <th>ID Transaksi</th>
                                                        <th>Kategori</th>
                                                        <th>Jumlah</th>
                                                        <th>Tarikh</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @forelse ($income as $income)
                                                        @php
                                                            $myvalue = $income->tarikh;
                                                            
                                                            $datetime = new DateTime($myvalue);
                                                            $date = $datetime->format('d-m-Y');
                                                            $time = $datetime->format('H:i');
                                                            
                                                        @endphp
                                                        <tr>
                                                            <td>{{ $loop->iteration }}.</td>
                                                            <td>{{ $income->id_trax_pendapatan }}</td>
                                                            <td>{{ $income->category->nama }}</td>
                                                            <td>RM {{ $income->jumlah_tpn }}</td>
                                                            <td>{{ $date }}</td>

                                                        </tr>
                                                    @empty
                                                        <td colspan="5" class="text-center">Tiada rekod
                                                            pendapatan
                                                        </td>
                                                    @endforelse
                                                </tbody>
                                            </table>
                                        </div>
                                        <!-- /.col -->
                                    </div>
                                    <!-- /.row -->


                                </section>
                                <!-- /.invoice -->
                            </div><!-- /.col -->
                        </div><!-- /.row -->
                    </div><!-- /.container-fluid -->

                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

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
        <script>
            $(function() {
                $("#example1").DataTable({
                    "responsive": true,
                    "autoWidth": false,
                });
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
            window.onload = function() {
                window.print();

            };
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
