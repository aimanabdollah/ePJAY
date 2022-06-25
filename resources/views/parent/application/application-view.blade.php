<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Borang Permohonan Kemasukan</title>

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
                            <h2 class="mt-3"><b>Borang Permohonan Kemasukan</b></h2>
                        </center>
                    </h4>

                </div>
                <!-- /.col -->
            </div>
            <!-- info row -->

            <hr>

            <h5><b>A. Maklumat Pemohon</b></h5>

            <!-- Table row -->
            <div class="row mt-3">
                <div class="col-12 table-responsive">
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <td><b>Nama Penuh<b></td>
                                <td>{{ $application->nama_penuh_pemohon }}</td>
                            </tr>
                            <tr>
                                <td><b>No. Telefon<b></td>
                                <td>{{ $application->no_tel_pemohon }}</td>
                            </tr>
                            <tr>
                                <td><b>Email<b></td>
                                <td>{{ $application->email_pemohon }}</td>
                            </tr>
                            <tr>
                                <td><b>Hubungan Pemohon dengan Anak Jagaan<b></td>
                                <td>{{ $application->hubungan_pemohon }}</td>
                            </tr>
                            <tr>
                                <td><b>Pekerjaan Pemohon<b></td>
                                <td>{{ $application->pekerjaan }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->

            <hr>
            <h5><b>B. Maklumat Anak Jagaan</b></h5>
            <div class="row mt-3">
                <div class="col-12 table-responsive">
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <td colspan="2">
                                    <center><img id="preview-image"
                                            src="{{ asset('assets/orphan-img/' . $application->gambar) }}"
                                            class="img-thumbnail" alt=" image here" width="200" height="280">
                                    </center>


                                </td>
                            </tr>
                            <tr>
                                <td><b>Nama Penuh<b></td>
                                <td>{{ $application->nama_penuh }}</td>
                            </tr>
                            <tr>
                                <td><b>No. Kad Pengenalan<b></td>
                                <td>{{ $application->no_kad_pengenalan }}</td>
                            </tr>
                            <tr>
                                <td><b>Jantina<b></td>
                                <td>{{ $application->jantina }}</td>
                            </tr>
                            <tr>
                                <td><b>Tarikh Lahir<b></td>
                                <td>{{ $application->tarikh_lahir }}</td>
                            </tr>
                            <tr>
                                <td><b>Umur<b></td>
                                <td>{{ $application->umur }} Tahun</td>
                            </tr>
                            <tr>
                                <td><b>Alamat Tempat Tinggal<b></td>
                                <td>{{ $application->alamat }}, {{ $application->poskod }},
                                    {{ $application->bandar }},
                                    {{ $application->negeri }}</td>
                            </tr>
                            <tr>
                                <td><b>Tempat Pengajian<b></td>
                                <td>{{ $application->nama_sekolah }}</td>
                            </tr>
                            <tr>
                                <td><b>Status<b></td>
                                <td>{{ $application->status }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <!-- /.col -->
            </div>


            <hr>
            <br>

            <h5 class><b>C. Maklumat Ibu Bapa</b></h5>

            <!-- Table row -->
            <div class="row mt-3">

                <div class="col-12 table-responsive">
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <td><b>Nama Ayah<b></td>
                                <td>{{ $application->nama_penuh_ayah }}</td>
                            </tr>
                            <tr>
                                <td><b>No. Kad Pengenalan Ayah<b></td>
                                <td>{{ $application->no_kad_pengenalan_ayah }}</td>
                            </tr>
                            <tr>
                                <td><b>No. Tel Ayah<b></td>
                                <td>{{ $application->no_telefon_ayah }}</td>
                            </tr>
                            <tr>
                                <td><b>Pekerjaan Ayah<b></td>
                                <td>{{ $application->pekerjaan_ayah }}</td>
                            </tr>
                            <tr>
                                <td><b>Pendapatan Ayah<b></td>
                                <td>{{ $application->pendapatan_ayah }}</td>
                            </tr>
                            <tr>
                                <td><b>Nama Ibu<b></td>
                                <td>{{ $application->nama_penuh_ibu }}</td>
                            </tr>
                            <tr>
                                <td><b>No. Kad Pengenalan Ibu<b></td>
                                <td>{{ $application->no_kad_pengenalan_ibu }}</td>
                            </tr>
                            <tr>
                                <td><b>No. Tel Ibu<b></td>
                                <td>{{ $application->no_telefon_ibu }}</td>
                            </tr>
                            <tr>
                                <td><b>Pekerjaan Ibu<b></td>
                                <td>{{ $application->pekerjaan_ibu }}</td>
                            </tr>
                            <tr>
                                <td><b>Pendapatan Ibu<b></td>
                                <td>{{ $application->pendapatan_ibu }}</td>
                            </tr>

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
