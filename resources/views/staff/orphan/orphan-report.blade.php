<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Borang Maklumat Diri</title>

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
                            <h2 class="mt-3"><b>Borang Maklumat Diri</b></h2>
                        </center>
                    </h4>

                </div>
                <!-- /.col -->
            </div>
            <!-- info row -->

            <hr>

            <h5><b>A. Maklumat Peribadi</b></h5>

            <!-- Table row -->
            <div class="row mt-3">
                <div class="col-12 table-responsive">
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <td colspan="2">
                                    <center><img id="preview-image"
                                            src="{{ asset('assets/orphan-img/' . $orphan->gambar) }}"
                                            class="img-thumbnail" alt=" image here" width="200" height="280">
                                    </center>


                                </td>
                            </tr>
                            <tr>
                                <td><b>Nama Penuh<b></td>
                                <td>{{ $orphan->nama_penuh }}</td>
                            </tr>
                            <tr>
                                <td><b>No. Kad Pengenalan<b></td>
                                <td>{{ $orphan->no_kad_pengenalan }}</td>
                            </tr>
                            <tr>
                                <td><b>Jantina<b></td>
                                <td>{{ $orphan->jantina }}</td>
                            </tr>
                            <tr>
                                <td><b>Tarikh Lahir<b></td>
                                <td>{{ $orphan->tarikh_lahir }}</td>
                            </tr>
                            <tr>
                                <td><b>Umur<b></td>
                                <td>{{ $orphan->umur }} Tahun</td>
                            </tr>
                            <tr>
                                <td><b>Alamat Tempat Tinggal<b></td>
                                <td>{{ $orphan->alamat }}, {{ $orphan->poskod }}, {{ $orphan->bandar }},
                                    {{ $orphan->negeri }}</td>
                            </tr>
                            <tr>
                                <td><b>Tempat Pengajian<b></td>
                                <td>{{ $orphan->nama_sekolah }}</td>
                            </tr>
                            <tr>
                                <td><b>Status<b></td>
                                <td>{{ $orphan->status }}</td>
                            </tr>
                            <tr>
                                <td><b>Tarikh Daftar<b></td>
                                <td>{{ $orphan->tarikh_daftar }}</td>
                            </tr>
                            <tr>
                                <td><b>Tarikh Keluar<b></td>
                                <td>{{ $orphan->tarikh_keluar }}</td>
                            </tr>

                        </tbody>
                    </table>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->

            <hr>
            <h5><b>B. Maklumat Perkembangan Diri</b></h5>

            <!-- Table row -->
            <div class="row mt-3">

                <div class="col-12 table-responsive">
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <td><b>Kategori<b></td>
                                <td><b>Catatan<b></td>
                                <td><b>Penguasaan<b></td>

                            </tr>
                            <tr>
                                <td>Komunikasi dan Literasi</td>
                                <td>Berkeupayaan untuk berkomunikasi secara lisan dan bukan lisan dengan menggunakan
                                    bahasa yang dapat difahami</td>
                                <td>{{ $orphan->komunikasi }}</td>
                            </tr>
                            <tr>
                                <td> Matematik dan Pemikiran Logik</td>
                                <td>Berkebolehan untuk membina konsep asas matematik melalui proses membanding,
                                    menganggar, menyusun serta mampu untuk menyelesaikan masalah operasi nombor</td>
                                <td>{{ $orphan->matematik }}</td>
                            </tr>
                            <tr>
                                <td>Deria dan Persekitaran</td>
                                <td>Dapat menguasai deria penglihatan, pendengaran, bau, rasa dan sentuh berdasarkan
                                    aktiviti persekitaran</td>
                                <td>{{ $orphan->deria }}</td>
                            </tr>
                            <tr>
                                <td>Fizikal dan Psikomotor</td>
                                <td>Berkebolehan untuk mengkoordinasi leher, kaki, tangan dan badan seperti berjalan,
                                    berlari, merangkak, mengeleng atau melompat</td>
                                <td>{{ $orphan->fizikal }}</td>
                            </tr>
                            <tr>
                                <td>Kreativiti dan Estetika</td>
                                <td>Berkeupayaan untuk mencipta, mewujud atau menghasilkan sesuatu yang baru atau
                                    mengubah suai yang sedia ada untuk dijadikan inovasi</td>
                                <td>{{ $orphan->kreativiti }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
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
                                <td>{{ $orphan->nama_penuh_ayah }}</td>
                            </tr>
                            <tr>
                                <td><b>No. Kad Pengenalan Ayah<b></td>
                                <td>{{ $orphan->no_kad_pengenalan_ayah }}</td>
                            </tr>
                            <tr>
                                <td><b>No. Tel Ayah<b></td>
                                <td>{{ $orphan->no_telefon_ayah }}</td>
                            </tr>
                            <tr>
                                <td><b>Pekerjaan Ayah<b></td>
                                <td>{{ $orphan->pekerjaan_ayah }}</td>
                            </tr>
                            <tr>
                                <td><b>Pendapatan Ayah<b></td>
                                <td>{{ $orphan->pendapatan_ayah }}</td>
                            </tr>
                            <tr>
                                <td><b>Nama Ibu<b></td>
                                <td>{{ $orphan->nama_penuh_ibu }}</td>
                            </tr>
                            <tr>
                                <td><b>No. Kad Pengenalan Ibu<b></td>
                                <td>{{ $orphan->no_kad_pengenalan_ibu }}</td>
                            </tr>
                            <tr>
                                <td><b>No. Tel Ibu<b></td>
                                <td>{{ $orphan->no_telefon_ibu }}</td>
                            </tr>
                            <tr>
                                <td><b>Pekerjaan Ibu<b></td>
                                <td>{{ $orphan->pekerjaan_ibu }}</td>
                            </tr>
                            <tr>
                                <td><b>Pendapatan Ibu<b></td>
                                <td>{{ $orphan->pendapatan_ibu }}</td>
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
