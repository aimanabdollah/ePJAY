@extends('backend.layouts.app', ['title' => 'Anak Jagaan'])

@section('content-header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Anak Jagaan</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ url('user-home') }}">Halaman Utama</a></li>
                    <li class="breadcrumb-item"><a href="{{ url('list-orphan') }}">Anak Jagaan</a></li>
                    <li class="breadcrumb-item active">{{ $application->id_anak_jagaan }}</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
@endsection


@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">

                <!-- /.card-header -->
                <div class="card">
                    <div class="card-header d-flex align-items-center">
                        <div class="mr-auto">
                            <h5>Maklumat Anak Jagaan</h5>
                        </div>

                        <div class=""> <a href="{{ url('report-orphan/' . $application->id_anak_jagaan) }}"
                                class="btn btn-info m-2">
                                <i class="nav-icon fas fa-print"></i> Cetak
                            </a></div>

                        <div class=""> <a href="{{ url('list-orphan') }}" class="btn btn-primary">
                                <i class="nav-icon fas fa-arrow-circle-left"></i> Kembali</a></div>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form>
                        <fieldset disabled>
                            <div class="col-12 mt-3">
                                <div class="card-primary card-tabs">
                                    <div class="card-header p-0 pt-1" style="background-color: #138496">
                                        <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
                                            <li class="nav-item">
                                                <a class="nav-link active" id="custom-tabs-one-home-tab" data-toggle="pill"
                                                    href="#custom-tabs-one-home" role="tab"
                                                    aria-controls="custom-tabs-one-home" aria-selected="true">Bahagian A:
                                                    Maklumat Anak Yatim</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="custom-tabs-one-profile-tab" data-toggle="pill"
                                                    href="#custom-tabs-one-profile" role="tab"
                                                    aria-controls="custom-tabs-one-profile" aria-selected="false">Bahagian
                                                    B: Maklumat Perkembangan Diri</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="custom-tabs-one-messages-tab" data-toggle="pill"
                                                    href="#custom-tabs-one-messages" role="tab"
                                                    aria-controls="custom-tabs-one-messages" aria-selected="false">Bahagian
                                                    C: Maklumat Ibu Bapa</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="custom-tabs-one-settings-tab" data-toggle="pill"
                                                    href="#custom-tabs-one-settings" role="tab"
                                                    aria-controls="custom-tabs-one-settings" aria-selected="false">Bahagian
                                                    D: Dokumen Sokongan</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="card-body">
                                        <div class="tab-content" id="custom-tabs-one-tabContent">
                                            <div class="tab-pane fade active show" id="custom-tabs-one-home" role="tabpanel"
                                                aria-labelledby="custom-tabs-one-home-tab">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="id">Nama Penuh</label>
                                                            <div class="form-control">{{ $application->nama_penuh }}</div>
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="id">Nama Sekolah</label>
                                                            <div class="form-control">{{ $application->nama_sekolah }}
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="id">Tarikh Lahir</label>
                                                                    <div class="form-control">
                                                                        {{ $application->tarikh_lahir }}
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="id">Umur</label>
                                                                    @php
                                                                        // Assuming you have the following variables
                                                                        $currentYear = date('Y'); // Get the current year
                                                                        $tarikh_lahir = $orphan->tarikh_lahir; // Replace this with the birth date in 'YYYY-MM-DD' format
                                                                        
                                                                        // Calculate the age
                                                                        $yearOfBirth = (int) substr($tarikh_lahir, 0, 4);
                                                                        $age = $currentYear - $yearOfBirth;
                                                                    @endphp
                                                                    <div class="form-control">{{ $age }}
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="id">Alamat Tempat Tinggal</label>
                                                            <div class="form-control">{{ $application->alamat }}</div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <div class="form-control">{{ $application->poskod }}
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">

                                                                    <div class="form-control">{{ $application->bandar }}
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6" style="margin-bottom: 12pt">
                                                                <div class="form-group">

                                                                    <div class="form-control">{{ $application->negeri }}
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>


                                                    <div class="col-md-6">
                                                        <div class="row">
                                                            <div class="col-md-6">

                                                                <div class="form-group">
                                                                    <label for="id">No. Kad Pengenalan</label>
                                                                    <div class="form-control">
                                                                        {{ $application->no_kad_pengenalan }}</div>
                                                                </div>

                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="id">No. Telefon</label>
                                                                    <div class="form-control">
                                                                        {{ $application->no_telefon }}
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="id">Jantina</label>
                                                                    <div class="form-control">
                                                                        {{ $application->jantina }}
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">

                                                                <div class="form-group">
                                                                    <label for="id">Status</label>
                                                                    <div class="form-control">{{ $application->status }}
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>


                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="id">Tarikh Daftar</label>
                                                                    <div class="form-control">
                                                                        {{ $application->tarikh_daftar }}</div>
                                                                </div>

                                                            </div>

                                                            <div class="col-md-6">

                                                                <div class="form-group">
                                                                    <label for="id">Tarikh Keluar</label>
                                                                    <div class="form-control">
                                                                        {{ $application->tarikh_keluar }}</div>
                                                                </div>

                                                            </div>
                                                        </div>
                                                        <div class="row">

                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="id">Gambar</label>
                                                                    <div>
                                                                        <img id="preview-image"
                                                                            src="{{ asset('assets/orphan-img/' . $application->gambar) }}"
                                                                            class="img-thumbnail" alt=" image here"
                                                                            style="max-height: 250px">

                                                                    </div>

                                                                </div>

                                                            </div>


                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="custom-tabs-one-profile" role="tabpanel"
                                                aria-labelledby="custom-tabs-one-profile-tab">
                                                <div class="table-responsive">
                                                    <table class="table table-bordered table-striped">
                                                        <thead>
                                                            <tr>
                                                                <th>No.</th>
                                                                <th>Kategori</th>
                                                                <th>Catatan</th>
                                                                <th>Penguasaan</th>

                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td class="align-middle">1.</td>
                                                                <td class="align-middle">Komunikasi dan Literasi</td>
                                                                <td class="align-middle">Berkeupayaan untuk berkomunikasi
                                                                    secara lisan dan
                                                                    bukan lisan dengan menggunakan bahasa yang dapat
                                                                    difahami</td>
                                                                <td class="align-middle">
                                                                    {{ $application->komunikasi }}
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="align-middle">2.</td>
                                                                <td class="align-middle">Matematik dan Pemikiran Logik</td>
                                                                <td class="align-middle">Berkebolehan untuk membina konsep
                                                                    asas matematik
                                                                    melalui proses membanding, menganggar, menyusun serta
                                                                    mampu untuk
                                                                    menyelesaikan
                                                                    masalah operasi nombor</td>
                                                                <td class="align-middle">
                                                                    {{ $application->matematik }}
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="align-middle">3.</td>
                                                                <td class="align-middle">Deria dan Persekitaran</td>
                                                                <td class="align-middle">Dapat menguasai deria penglihatan,
                                                                    pendengaran,
                                                                    bau,
                                                                    rasa dan sentuh berdasarkan aktiviti persekitaran</td>
                                                                <td class="align-middle">
                                                                    {{ $application->deria }}
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="align-middle">4.</td>
                                                                <td class="align-middle">Fizikal dan Psikomotor</td>
                                                                <td class="align-middle">Berkebolehan untuk mengkoordinasi
                                                                    leher, kaki,
                                                                    tangan
                                                                    dan badan seperti berjalan, berlari, merangkak,
                                                                    mengeleng atau melompat
                                                                </td>
                                                                <td class="align-middle">
                                                                    {{ $application->fizikal }}
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="align-middle">5.</td>
                                                                <td class="align-middle">Kreativiti dan Estetika</td>
                                                                <td class="align-middle">Berkeupayaan untuk mencipta,
                                                                    mewujud atau
                                                                    menghasilkan
                                                                    sesuatu yang baru atau mengubah suai yang sedia ada
                                                                    untuk dijadikan
                                                                    inovasi
                                                                </td>
                                                                <td class="align-middle">
                                                                    {{ $application->kreativiti }}
                                                                </td>
                                                            </tr>

                                                        </tbody>
                                                    </table>







                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="custom-tabs-one-messages" role="tabpanel"
                                                aria-labelledby="custom-tabs-one-messages-tab">
                                                <div class="row">
                                                    <div class="col-md-6">

                                                        <div class="form-group">
                                                            <label for="id">Nama Penuh Ayah</label>
                                                            <div class="form-control">
                                                                {{ $application->nama_penuh_ayah }}
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="id">No. Kad Pengenalan Ayah</label>
                                                                    <div class="form-control">
                                                                        {{ $application->no_kad_pengenalan_ayah }}
                                                                    </div>
                                                                </div>

                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="id">No. Telefon Ayah</label>
                                                                    <div class="form-control">
                                                                        {{ $application->no_telefon_ayah }}</div>
                                                                </div>

                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="id">Pekerjaan Ayah</label>
                                                                    <div class="form-control">
                                                                        {{ $application->pekerjaan_ayah }}</div>
                                                                </div>

                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="id">Pendapatan Ayah</label>
                                                                    <div class="form-control">
                                                                        {{ $application->pendapatan_ayah }}</div>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">

                                                        <div class="form-group">
                                                            <label for="id">Nama Penuh Ibu</label>
                                                            <div class="form-control">{{ $application->nama_penuh_ibu }}
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="id">No. Kad Pengenalan Ibu</label>
                                                                    <div class="form-control">
                                                                        {{ $application->no_kad_pengenalan_ibu }}
                                                                    </div>
                                                                </div>

                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="id">No. Telefon Ibu</label>
                                                                    <div class="form-control">
                                                                        {{ $application->no_telefon_ibu }}</div>
                                                                </div>

                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="id">Pekerjaan Ibu</label>
                                                                    <div class="form-control">
                                                                        {{ $application->pekerjaan_ibu }}</div>
                                                                </div>

                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="id">Pendapatan Ibu</label>
                                                                    <div class="form-control">
                                                                        {{ $application->pendapatan_ibu }}</div>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>



                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="custom-tabs-one-settings" role="tabpanel"
                                                aria-labelledby="custom-tabs-one-settings-tab">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="row">
                                                            <div class="col-md-6"></div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="exampleInputFile">Sijil Lahir Anak</label>
                                                                    <div id="file_input">
                                                                        <a href="{{ asset('assets/sijil_lahir/' . $application->sijil_lahir) }}"
                                                                            class="btn-link text-secondary"
                                                                            target="_blank"><i
                                                                                class="far fa-fw fa-file-pdf"></i>{{ $application->sijil_lahir }}</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="exampleInputFile">Sijil Kematian</label>
                                                                    <div id="file_input">
                                                                        <a href="{{ asset('assets/sijil_kematian/' . $application->sijil_kematian) }}"
                                                                            class="btn-link text-secondary"
                                                                            target="_blank"><i
                                                                                class="far fa-fw fa-file-pdf"></i>{{ $application->sijil_kematian }}</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                    </form>
                </div>
            </div>
            <!-- /.card-body -->

            <!-- /.card -->
        </div>


        <!-- /.col -->
    </div>



    <!-- /.card -->
@endsection


@push('css')
    <style>
        .btn-red {
            background-color: blue;
            color: white;
        }
    </style>
@endpush


@push('js')
    <script>
        $(function() {
            bsCustomFileInput.init();
        });
    </script>
@endpush
