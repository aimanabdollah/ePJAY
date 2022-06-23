<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laporan Maklumat Anak Jagaan</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    @include('layouts.inc.ext-css')

    <!-- CSS Code: Place this code in the document's head (between the 'head' tags) -->
    <style>
        table.GeneratedTable {
            width: 100%;
            background-color: #ffffff;
            border-collapse: collapse;
            border-width: 2px;
            border-color: #000000;
            border-style: solid;
            color: #000000;
        }

        table.GeneratedTable td,
        table.GeneratedTable th {
            border-width: 2px;
            border-color: #000000;
            border-style: solid;
            padding: 3px;
        }

        table.GeneratedTable thead {
            background-color: #ffcc00;
        }
    </style>

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
                            <h2 class="mt-3"><b>Laporan Maklumat Anak Jagaan</b></h2>
                        </center>
                    </h4>

                </div>
                <!-- /.col -->
            </div>
            <!-- info row -->

            <hr>

            <h5><b>A. Jumlah Statistik Anak Jagaan</b></h5>

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
                                <td>Jumlah Anak Jagaan</td>
                                <td>{{ $jumlahLelaki }} Lelaki, {{ $jumlahPerempuan }} Perempuan (Keseluruhan:
                                    {{ $jumlahKeseluruhan }}
                                    orang)</td>
                            </tr>
                            <tr>
                                <td>2.</td>
                                <td>Kategori Umur Anak Jagaan</td>
                                <td>Kurang dari 7 tahun: {{ $umurBawah7thn }} orang<br>
                                    7 – 12 tahun: {{ $umur7h12 }} orang<br>
                                    13 – 17 tahun: {{ $umur13h17 }} orang<br>
                                    18 tahun dan ke atas:{{ $umur18 }} orang
                                </td>
                            </tr>
                            <tr>
                                <td>3.</td>
                                <td>Status Anak Jagaan</td>
                                <td>{{ $kehilanganAyah }} orang kehilangan Ayah<br>
                                    {{ $kehilanganIbu }} orang kehilangan Ibu<br>
                                    {{ $kehilanganIbuAyah }} orang kehilangan Ayah dan Ibu
                                </td>
                            </tr>

                        </tbody>
                    </table>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->

            <hr>
            <h5><b>B. Senarai Maklumat Anak Jagaan</b></h5>

            <!-- Table row -->
            <div class="row">
                <div class="col-12 table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>ID Anak Jagaan</th>
                                <th>Nama</th>
                                <th>No. K/P</th>
                                <th>Jantina</th>
                                <th>Umur</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($orphan as $orphan)
                                <tr>
                                    <td>{{ $loop->iteration }}.</td>
                                    <td>{{ $orphan->id_anak_jagaan }}</td>
                                    <td>{{ $orphan->nama_penuh }}</td>
                                    <td>{{ $orphan->no_kad_pengenalan }}</td>
                                    <td>{{ $orphan->jantina }}</td>
                                    <td>{{ $orphan->umur }} Tahun</td>
                                    <td>{{ $orphan->status }}</td>
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

            {{-- <div class="row">
                <!-- accepted payments column -->
                <div class="col-6">
                    <p class="lead">Payment Methods:</p>
                    <img src="../../dist/img/credit/visa.png" alt="Visa">
                    <img src="../../dist/img/credit/mastercard.png" alt="Mastercard">
                    <img src="../../dist/img/credit/american-express.png" alt="American Express">
                    <img src="../../dist/img/credit/paypal2.png" alt="Paypal">

                    <p class="text-muted well well-sm shadow-none" style="margin-top: 10px;">
                        Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles, weebly ning heekya handango
                        imeem plugg dopplr
                        jibjab, movity jajah plickers sifteo edmodo ifttt zimbra.
                    </p>
                </div>
                <!-- /.col -->
                <div class="col-6">
                    <p class="lead">Amount Due 2/22/2014</p>

                    <div class="table-responsive">
                        <table class="table">
                            <tr>
                                <th style="width:50%">Subtotal:</th>
                                <td>$250.30</td>
                            </tr>
                            <tr>
                                <th>Tax (9.3%)</th>
                                <td>$10.34</td>
                            </tr>
                            <tr>
                                <th>Shipping:</th>
                                <td>$5.80</td>
                            </tr>
                            <tr>
                                <th>Total:</th>
                                <td>$265.24</td>
                            </tr>
                        </table>
                    </div>
                </div>
                <!-- /.col -->
            </div> --}}
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
