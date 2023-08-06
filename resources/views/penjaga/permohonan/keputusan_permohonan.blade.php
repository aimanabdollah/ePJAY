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

    <style>
        @media print {
            @page {
                margin: 60px;
            }
        }
    </style>
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
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-12">
                                <div class="d-flex no-print justify-content-end align-items-center">
                                    <div class="py-2">
                                        <a href="{{ url('application') }}" class="btn btn-primary">
                                            <i class="nav-icon fas fa-arrow-circle-left"></i> Kembali
                                        </a>
                                    </div>
                                </div>
                                <div class="callout callout-info no-print">

                                    @if ($application->status_permohonan == 'Berjaya')
                                        <h5><i class="fas fa-info"></i> Tahniah!</h5>

                                        Permohonan anda sudah diluluskan. <strong>Pastikan anda cetak surat tawaran ini
                                            untuk dibawa
                                            bersama pada hari
                                            pendaftaran.</strong>
                                    @elseif ($application->status_permohonan == 'Tidak Berjaya')
                                        <h5><i class="fas fa-info"></i> Harap Maaf</h5>
                                        Permohonan anda tidak diluluskan. Sila rujuk maklumat seperti berikut.
                                    @else
                                        <script>
                                            window.location.href = '/application';
                                        </script>
                                    @endif
                                </div>


                                @php
                                    $myvalue = $application->created_at;
                                    
                                    $datetime = new DateTime($myvalue);
                                    $date = $datetime->format('d-m-Y');
                                    $time = $datetime->format('H:i');
                                    
                                    $myvalue2 = $application->tarikh_daftar;
                                    
                                    $datetime2 = new DateTime($myvalue2);
                                    $date2 = $datetime2->format('d-m-Y');
                                    
                                    $myvalue3 = $application->tarikh_masuk;
                                    
                                    $datetime3 = new DateTime($myvalue3);
                                    $date3 = $datetime3->format('d-m-Y');
                                    
                                    $currentDate = new DateTime();
                                    $currentYear = $currentDate->format('Y');
                                    
                                @endphp
                                <div class="invoice p-4 mb-4">
                                    <!-- title row -->
                                    <div class="row">
                                        <div class="col-12">
                                            <h4>
                                                @php
                                                    $logoPath = 'assets/pusat_jagaan/' . $configuration->logo_pusat_jagaan;
                                                    $defaultImagePath = 'assets/no-img.jpg';
                                                    
                                                    if (!file_exists(public_path($logoPath)) || empty($configuration->logo_pusat_jagaan)) {
                                                        $logoPath = $defaultImagePath;
                                                    }
                                                @endphp

                                                <img src="{{ asset($logoPath) }}" alt="" style="height: 120px"
                                                    alt="">

                                                <small class="float-right">Tarikh: {{ $date3 }}</small>
                                            </h4>
                                        </div>
                                        <!-- /.col -->
                                    </div>
                                    <!-- info row -->
                                    <div class="row invoice-info">
                                        <div class="col-sm-6 invoice-col">
                                            <b>Daripada:</b>
                                            <address>
                                                {{ $configuration->nama_pusat_jagaan }}<br>
                                                {{ $configuration->alamat1 }}<br>
                                                {{ $configuration->poskod }} {{ $configuration->bandar }},
                                                {{ $configuration->negeri }}<br>
                                                <b>No. Tel:</b> {{ $configuration->no_tel }}<br>
                                                <b>Email:</b> {{ $configuration->emel }}
                                            </address>

                                        </div>
                                        <!-- /.col -->
                                        <div class="col-sm-6 invoice-col">
                                            <b>Kepada:</b>
                                            <address>
                                                {{ $application->nama_penuh_pemohon }}<br>
                                                {{ $application->alamat }}<br>
                                                {{ $application->poskod }}
                                                {{ $application->bandar }},
                                                {{ $application->negeri }}<br>
                                                <b>No. Tel:</b> {{ $application->no_tel_pemohon }}<br>
                                                <b>Email:</b> {{ $application->email_pemohon }}
                                            </address>
                                        </div>

                                    </div>

                                    <hr>


                                    <p style="margin-top: 16px;">Tuan / Puan
                                    </p>
                                    @if ($application->status_permohonan == 'Berjaya')
                                        <p class="text-uppercase"><b>TAWARAN KEMASUKAN KE PUSAT JAGAAN
                                                {{ $configuration->nama_pusat_jagaan }}</b>
                                        </p>

                                        <p>Dengan hormatnya perkara di atas adalah dirujuk
                                        </p>

                                        <p>2. &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Dimaklumkan bahawa permohonan tuan/puan
                                            bernombor
                                            <b>{{ $application->id_permohonan }}</b> pada <b>{{ $date }}</b>
                                            telah
                                            <b>DILULUSKAN</b> oleh Jawatankuasa Pemilihan Kemasukan dan
                                            bersetuju untuk
                                            menawarkan tempat kepada anak/anak jagaan tuan/puan yang bernama
                                            <b>{{ $application->nama_penuh }}
                                                ({{ $application->no_kad_pengenalan }})</b> di Pusat Jagaan
                                            {{ $configuration->nama_pusat_jagaan }}
                                            bagi sesi kemasukan tahun {{ $currentYear }}.
                                        </p>

                                        <p>3. &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Oleh itu, diminta tuan/puan untuk hadir
                                            bersama-sama dengan anak/anak jagaan
                                            untuk hadir pada sesi pendaftaran dan taklimat ringkas seperti butiran yang
                                            berikut:
                                        </p>

                                        <p>
                                        <div class="col-lg-6 sm-12">
                                            <table id="example" class="table table-bordered table-striped">
                                                <thead>
                                                    <tr>
                                                        <th>Tarikh</th>
                                                        <th>Masa</th>
                                                        <th>Tempat</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td class="align-middle">{{ $date2 }}</td>
                                                        <td class="align-middle">10:30 am</td>
                                                        <td class="align-middle">Pejabat Pentadbiran Rumah Bakti Dato'
                                                            Harun</td>
                                                    </tr>

                                                </tbody>
                                            </table>
                                        </div>
                                        </p>

                                        <p>4. &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Kegagalan tuan/puan untuk mendaftarkan
                                            anak/anak jagaan pada
                                            tarikh yang ditetapkan adalah
                                            dianggap tidak berminat dan menolak tawaran ini. Kerjasama dan perhatian
                                            tuan/puan didahului dengan
                                            ucapan terima kasih.
                                        </p>

                                        <p>Sekian.
                                        </p>

                                        <p><b>"BERKHIDMAT UNTUK NEGARA"</b>
                                        </p>
                                    @elseif ($application->status_permohonan == 'Tidak Berjaya')
                                        <p class="text-uppercase"><b>KEPUTUSAN PERMOHONAN KEMASUKAN ANAK/ANAK JAGAAN KE
                                                PUSAT
                                                JAGAAN
                                                {{ $configuration->nama_pusat_jagaan }}</b>
                                        </p>

                                        <p>Dengan hormatnya perkara di atas adalah dirujuk
                                        </p>

                                        <p>2. &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Dimaklumkan bahawa permohonan tuan/puan
                                            bernombor
                                            <b>{{ $application->id_permohonan }}</b> pada <b>{{ $date }}</b>
                                            adalah
                                            <b>TIDAK BERJAYA</b> untuk diterima masuk ke Pusat Jagaan
                                            {{ $configuration->nama_pusat_jagaan }} bagi anak/anak jagaan tuan/puan
                                            yang bernama
                                            <b>{{ $application->nama_penuh }}
                                                ({{ $application->no_kad_pengenalan }}).</b>
                                        </p>

                                        <p>3. &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Berikut merupakan sebab permohonan
                                            tuan/puan tidak dapat
                                            diluluskan oleh Jawatankuasa Pemilihan Kemasukan:
                                            <br>
                                            &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                                            - <b>{{ $application->ulasan }}</b>
                                        </p>

                                        <p>4. &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Segala perhatian dan kerjasama tuan/puan
                                            dalam perkara ini
                                            amatlah dihargai dan kami dahulukan dengan jutaan terima kasih.
                                        </p>

                                        <p>Sekian, harap maklum.
                                        </p>

                                        <p><b>"BERKHIDMAT UNTUK NEGARA"</b>
                                        </p>
                                    @endif

                                    <!-- this row will not appear when printing -->
                                    <div class="row no-print">
                                        <div class="col-12">
                                            <button class="btn btn-default" onclick="window.print();"><i
                                                    class="fas fa-print"></i>
                                                Cetak</button>
                                        </div>
                                    </div>
                                </div>
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
        <!-- Main Footer -->
        @include('backend.layouts.footer')

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
