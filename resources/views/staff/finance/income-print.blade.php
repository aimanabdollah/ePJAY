<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laporan Maklumat Permohonan</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    @include('layouts.inc.ext-css')

</head>

<body>
    <div class="wrapper">
        <!-- Main content -->
        <section class="invoice">
            <!-- title row -->
            <div class="row">
                <div class="col-12">

                    <h4>
                        {{-- <i class="fas fa-globe"></i> AdminLTE, Inc. --}}
                        <center><img src="/landing/assets/img/logo-rbdh.png" alt=""></center>
                        <center class="m-2"><strong>Rumah Bakti Dato' Harun</strong></center>
                        {{-- <small class="float-right">Tarikh: {{ $date3 }}</small> --}}
                        <center>
                            <h6> KM 11, Jln, Ulu Kelang, 68000 Ampang Jaya, Selangor <br>
                                No. Tel: 03-42568880 | Email: rumahbaktidatoharun@gmail.com</h6>
                        </center>

                        <center>
                            <h2 class="mt-3"><b>Laporan Maklumat Permohonan</b></h2>
                        </center>
                    </h4>

                </div>
                <!-- /.col -->
            </div>
            <!-- info row -->

            <hr>

            <h5><b>A. Jumlah Statistik Permohonan</b></h5>

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
                                <td>Jumlah Keseluruhan Permohonan</td>
                                <td>13 permohonan</td>
                            </tr>
                            <tr>
                                <td>2.</td>
                                <td>Jumlah Permohonan Dalam Proses</td>
                                <td>4 permohonan
                                </td>
                            </tr>
                            <tr>
                                <td>3.</td>
                                <td>Jumlah Permohonan Berjaya</td>
                                <td>4 permohonan<br>

                                </td>
                            </tr>

                            <tr>
                                <td>3.</td>
                                <td>Jumlah Permohonan Tidak Berjaya</td>
                                <td>4 permohonan<br>

                                </td>
                            </tr>

                        </tbody>
                    </table>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->

            <hr>
            <h5><b>B. Senarai Maklumat Permohonan</b></h5>

            <!-- Table row -->
            <div class="row">
                <div class="col-12 table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>ID Permohonan</th>
                                <th>Nama Pemohon</th>
                                <th>No. Telefon</th>
                                <th>Tarikh Permohonan</th>
                                <th>Status Permohonan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($application as $application)
                                @php
                                    $myvalue = $application->created_at;
                                    
                                    $datetime = new DateTime($myvalue);
                                    $date = $datetime->format('d-m-Y');
                                    $time = $datetime->format('H:i');
                                    
                                @endphp
                                <tr>
                                    <td>{{ $loop->iteration }}.</td>
                                    <td>{{ $application->id_permohonan }}</td>
                                    <td>{{ $application->nama_penuh_pemohon }}</td>
                                    <td>{{ $application->no_tel_pemohon }}</td>
                                    <td>{{ $date }}</td>
                                    <td>
                                        @if ($application->status_permohonan == 'Dalam_Proses')
                                            Dalam Proses
                                        @elseif ($application->status_permohonan == 'Berjaya')
                                            Berjaya
                                        @elseif ($application->status_permohonan == 'Tidak_Berjaya')
                                            Tidak Berjaya
                                        @endif
                                    </td>

                                </tr>
                            @empty
                                <td colspan="6" class="text-center">Tiada rekod anak jagaan</td>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->


        </section>
        <!-- /.content -->
    </div>
    <!-- ./wrapper -->
    <!-- Page specific script -->
    <script>
        window.addEventListener("load", window.print());
    </script>
</body>

</html>
