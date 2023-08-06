@extends('backend.layouts.app', ['title' => 'Kewangan'])

{{-- @section('content-header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Tawaran Permohonan</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ url('home') }}">Halaman Utama</a></li>
                    <li class="breadcrumb-item active">Tawaran Permohonan</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
@endsection --}}


@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">

                <!-- Main content -->
                <div class="invoice p-3 mb-3">
                    <!-- title row -->
                    <div class="row">
                        <div class="col-12">
                            <h4>
                                {{-- <i class="fas fa-globe"></i> AdminLTE, Inc. --}}
                                <small class="float-right">Tarikh: 2/10/2014</small>
                            </h4>
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- info row -->
                    <div class="row invoice-info">
                        <div class="col-sm-6 invoice-col">
                            Daripada:
                            <address>
                                <strong>Rumah Bakti Dato' Harun</strong><br>
                                795 Folsom Ave, Suite 600<br>
                                San Francisco, CA 94107<br>
                                Phone: (60) 123-5432<br>
                                Email: rumahbaktidatoharun@gmail.com
                            </address>
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-6 invoice-col">
                            Kepada:
                            <address>
                                <strong>John Doe</strong><br>
                                795 Folsom Ave, Suite 600<br>
                                San Francisco, CA 94107<br>
                                Phone: (555) 539-1037<br>
                                Email: john.doe@example.com
                            </address>
                        </div>
                    </div>
                    <!-- /.row -->
                    <hr>


                    <p style="margin-top: 16px;">Tuan / Puan
                    </p>

                    <p><b>TAWARAN KEMASUKAN KE PUSAT JAGAAN RUMAH BAKTI DATO' HARUN</b>
                    </p>

                    <p>Dengan hormatnya perkara di atas adalah dirujuk
                    </p>


                    <p>2. &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Dimaklumkan bahawa permohonan tuan/puan bernombor
                        <b>PMH2121212</b> pada <b>23/03/2020</b>
                        telah
                        <b>DILULUSKAN</b> oleh Jawatankuasa Pemilihan Kemasukan dan
                        bersetuju untuk
                        menawarkan tempat kepada anak tuan/puan yang bernama <b>MUHAMMAD DANIAL BIN SUHAIMI
                            (No. MyKID: 001112112121)</b> di Pusat Jagaan Rumah Bakti Dato Harun bagi sesi 2022.
                    </p>

                    <p>3. &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Oleh itu, diminta tuan/puan untuk hadir
                        bersama-sama dengan anak
                        untuk sesi pendaftaran dan taklimat seperti butiran yang berikut:
                    </p>

                    <p>
                    <div class="col-lg-6 sm-12">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Tarikh</th>
                                    <th>Masa</th>
                                    <th>Tempat</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="align-middle">23 April 2022</td>
                                    <td class="align-middle">10:30 am</td>
                                    <td class="align-middle">Dewan Utama Rumah Pejabat</td>
                                </tr>

                            </tbody>
                        </table>
                    </div>

                    </p>

                    <p>4. &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Kegagalan tuan/puan untuk mendaftarkan anak/anak jagaan pada
                        tarikh yang ditetapkan adalah
                        dianggap tidak berminat dan menolak tawaran ini. Kerjasama dan perhatian tuan/puan didahului dengan
                        ucapan terima kasih.
                    </p>

                    <p>Sekian,
                    </p>

                    <p><b>"BERKHIDMAT UNTUK NEGARA"</b>
                    </p>







                    <!-- this row will not appear when printing -->
                    <div class="row no-print">
                        <div class="col-12"> <button class="btn btn-default" onclick="window.print();"><i
                                    class="fas fa-print"></i>
                                Cetak</button>


                            {{-- <button type="button" class="btn btn-success float-right"><i class="far fa-credit-card"></i>
                                Submit
                                Payment
                            </button>
                            <button type="button" class="btn btn-primary float-right" style="margin-right: 5px;">
                                <i class="fas fa-download"></i> Generate PDF
                            </button> --}}
                        </div>
                    </div>
                </div>
                <!-- /.invoice -->
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
@endsection
