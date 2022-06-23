<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laporan Maklumat Perbelanjaan</title>

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
                            <h2 class="mt-3"><b>Laporan Maklumat Perbelanjaan</b></h2>
                        </center>
                    </h4>

                </div>
                <!-- /.col -->
            </div>
            <!-- info row -->

            <hr>

            <h5><b>A. Jumlah Statistik Perbelanjaan</b></h5>

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
                                <td>Jumlah Keseluruhan Perbelanjaan</td>
                                <td>RM {{ $jumlah }}</td>
                            </tr>
                            <tr>
                                <td>2.</td>
                                <td>Jumlah Perbelanjaan Mengikut Kategori</td>
                                <td>Sewaan Kediaman: RM{{ $kediaman }}<br>
                                    Pengangkutan: RM{{ $pengangkutan }}<br>
                                    Kesihatan: RM{{ $kesihatan }}<br>
                                    Utiliti: RM{{ $utiliti }}<br>
                                    Makanan dan minuman: RM{{ $mknminum }}
                                </td>
                            </tr>

                        </tbody>
                    </table>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->

            <hr>
            <h5><b>B. Senarai Maklumat Perbelanjaan</b></h5>

            <!-- Table row -->
            <div class="row">
                <div class="col-12 table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>ID Transaksi</th>
                                <th>Kategori</th>
                                <th>Catatan</th>
                                <th>Jumlah</th>
                                <th>Tarikh</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($expense as $expense)
                                @php
                                    $myvalue = $expense->tarikh;
                                    
                                    $datetime = new DateTime($myvalue);
                                    $date = $datetime->format('d-m-Y');
                                    $time = $datetime->format('H:i');
                                    
                                @endphp
                                <tr>
                                    <td>{{ $loop->iteration }}.</td>
                                    <td>{{ $expense->id_trans_tbj }}</td>
                                    <td>{{ $expense->kategori }}</td>
                                    <td>{{ $expense->catatan }}</td>
                                    <td>RM {{ $expense->jumlah_tbj }}</td>
                                    <td>{{ $date }}</td>

                                </tr>
                            @empty
                                <td colspan="6" class="text-center">Tiada rekod perbelanjaan</td>
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
