@extends('layouts.parent-main', ['title'=>'Tawaran Permohonan'])

@section('content-header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Keputusan Permohonan</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ url('home') }}">Halaman Utama</a></li>
                    <li class="breadcrumb-item active">Keputusan Permohonan</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
@endsection


@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
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
                    
                @endphp
                {{-- <div class="callout callout-info">
                    <h5><i class="fas fa-info"></i> Tahniah!</h5>

                    Permohonan anda sudah diluluskan. Pastikan anda cetak tawaran ini untuk dibawa bersama pada hari
                    pendaftaran.
                </div> --}}


                <!-- Main content -->
                <div class="invoice p-3 mb-3">
                    <!-- title row -->
                    <div class="row">
                        <div class="col-12">
                            <h4>
                                {{-- <i class="fas fa-globe"></i> AdminLTE, Inc. --}}
                                <small class="float-right">Tarikh: {{ $date3 }}</small>
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
                                KM 11, Jln, Ulu Kelang<br>
                                68000 Ampang Jaya, Selangor<br>
                                Phone: 0342568880<br>
                                Email: rumahbaktidatoharun@gmail.com
                            </address>

                        </div>
                        <!-- /.col -->
                        <div class="col-sm-6 invoice-col">
                            Kepada:
                            <address>
                                <strong>{{ $application->nama_penuh_pemohon }}</strong><br>
                                {{ $application->alamat }}<br>
                                {{ $application->poskod }},
                                {{ $application->bandar }},
                                {{ $application->negeri }}<br>
                                Phone: {{ $application->no_tel_pemohon }}<br>
                                Email: {{ $application->email_pemohon }}
                            </address>
                        </div>
                        <!-- /.col -->
                        {{-- <div class="col-sm-4 invoice-col">
                            <b>Invoice #007612</b><br>
                            <br>
                            <b>Order ID:</b> 4F3S8J<br>
                            <b>Payment Due:</b> 2/22/2014<br>
                            <b>Account:</b> 968-34567
                        </div> --}}
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                    <hr>


                    <p style="margin-top: 16px;">Tuan / Puan
                    </p>

                    <p><b>KEPUTUSAN PERMOHONAN KEMASUKAN ANAK/ANAK JAGAAN KE PUSAT JAGAAN RUMAH BAKTI DATO'
                            HARUN</b>
                    </p>

                    <p>Dengan hormatnya perkara di atas adalah dirujuk
                    </p>

                    <p>2. &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Dimaklumkan bahawa permohonan tuan/puan bernombor
                        <b>{{ $application->id_permohonan }}</b> pada <b>{{ $date }}</b>
                        adalah
                        <b>TIDAK BERJAYA</b> untuk diterima masuk ke Pusat Jagaan Rumah Bakti Dato
                        Harun bagi anak/anak jagaan tuan/puan yang bernama
                        <b>{{ $application->nama_penuh }}
                            ({{ $application->no_kad_pengenalan }}).</b>
                    </p>

                    <p>3. &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Berikut merupakan sebab permohonan tuan/puan tidak dapat
                        diluluskan oleh Jawatankuasa Pemilihan Kemasukan:
                        <br>
                        &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                        - <b>{{ $application->ulasan }}</b>
                    </p>

                    <p>4. &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Segala perhatian dan kerjasama tuan/puan dalam perkara ini
                        amatlah dihargai dan kami dahulukan dengan jutaan terima kasih.
                    </p>

                    <p>Sekian,
                    </p>

                    <p><b>"BERKHIDMAT UNTUK NEGARA"</b>
                    </p>







                    <!-- this row will not appear when printing -->
                    <div class="row no-print">
                        <div class="col-12">
                            <button class="btn btn-default" onclick=" window.print()"><i class="fas fa-print"></i>
                                Cetak</button>

                            {{-- <a href="{{ 'tawaran-print' }}" rel="noopener" target="_blank" class="btn btn-default"><i
                                    class="fas fa-print"></i> Print</a> --}}
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
