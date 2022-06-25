@extends('layouts.parent-main', ['title' => 'Permohonan'])

@section('content-header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Permohonan</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ url('home') }}">Halaman Utama</a></li>
                    <li class="breadcrumb-item active">Permohonan</li>
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
                            <h5>Maklumat Permohonan</h5>
                        </div>
                        <div class=""> <a href="{{ url('application') }}" class="btn btn-primary">
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
                                                    Maklumat Pemohon</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="custom-tabs-one-profile-tab" data-toggle="pill"
                                                    href="#custom-tabs-one-profile" role="tab"
                                                    aria-controls="custom-tabs-one-profile" aria-selected="false">Bahagian
                                                    B: Maklumat Anak Yatim</a>
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
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <label for="nama_penuh_pemohon">Nama Penuh
                                                                        Pemohon</label>
                                                                    <div class="form-control">
                                                                        {{ $application->nama_penuh_pemohon }}
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </div>

                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="hubungan_pemohon">Hubungan Anak dengan
                                                                        Pemohon</label>
                                                                    <div class="form-control">
                                                                        {{ $application->hubungan_pemohon }}</div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="pekerjaan_pemohon">Pekerjaan Pemohon</label>
                                                                    <div class="form-control">
                                                                        {{ $application->pekerjaan_pemohon }}
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="email_pemohon">Email</label>
                                                                    <div class="form-control">
                                                                        {{ $application->email_pemohon }}</div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="no_tel_pemohon">No. Telefon</label>
                                                                    <div class="form-control">
                                                                        {{ $application->no_tel_pemohon }}</div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>


                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="custom-tabs-one-profile" role="tabpanel"
                                                aria-labelledby="custom-tabs-one-profile-tab">
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
                                                                        {{ $application->tarikh_lahir }}</div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="id">Umur</label>
                                                                    <div class="form-control">{{ $application->umur }}
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
                                                                        {{ $application->no_kad_pengenalan }}
                                                                    </div>
                                                                </div>

                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="id">No. Telefon</label>
                                                                    <div class="form-control">
                                                                        {{ $application->no_telefon }}</div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="id">Jantina</label>
                                                                    <div class="form-control">
                                                                        {{ $application->jantina }}</div>
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

                                                            </div>

                                                            <div class="col-md-6">

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
                                            <div class="tab-pane fade" id="custom-tabs-one-messages" role="tabpanel"
                                                aria-labelledby="custom-tabs-one-messages-tab">
                                                <div class="row">
                                                    <div class="col-md-6">

                                                        <div class="form-group">
                                                            <label for="id">Nama Penuh Ayah</label>
                                                            <div class="form-control">
                                                                {{ $application->nama_penuh_ayah }}</div>
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
                                                                        {{ $application->no_telefon_ayah }}
                                                                    </div>
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
                                                                        {{ $application->pendapatan_ayah }}
                                                                    </div>
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
                                                                    <label for="id">No. Kad Pengenalan Ayah</label>
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
                                                                            class="btn-link text-secondary"><i
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
                                                                            class="btn-link text-secondary"><i
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
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
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
        $(document).ready(function() {
            $("#status_permohonan").change(function() {
                $(this).find("option:selected").each(function() {
                    var optionValue = $(this).attr("value");
                    if (optionValue) {
                        $(".status").not("." + optionValue).hide();
                        $("." + optionValue).show();
                    } else {
                        $(".status").hide();
                    }
                });
            }).change();
        });
    </script>
@endpush
