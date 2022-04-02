@extends('layouts.staff-main', ['title'=>'Anak Jagaan'])

@section('content-header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Anak Jagaan</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ url('admin/home') }}">Halaman Utama</a></li>
                    <li class="breadcrumb-item active">Anak Jagaan</li>
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
                        <div class=""> <a href="{{ url('admin/orphan') }}" class="btn btn-primary">
                                <i class="nav-icon fas fa-arrow-circle-left"></i> Kembali</a></div>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form>
                        <fieldset disabled>
                            <div class="btn btn-flat col-12" style="background-color: #138496">
                                <div class="mr-auto" style="color: white">
                                    <h6><b>Bahagian A: Maklumat Kanak-Kanak</b></h6>
                                </div>
                            </div>


                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="id">Nama Penuh</label>
                                            <div class="form-control">{{ $orphan->nama_penuh }}</div>
                                        </div>

                                        <div class="form-group">
                                            <label for="id">Nama Sekolah</label>
                                            <div class="form-control">{{ $orphan->nama_sekolah }}</div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="id">Tarikh Lahir</label>
                                                    <div class="form-control">{{ $orphan->tarikh_lahir }}</div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="id">Umur</label>
                                                    <div class="form-control">{{ $orphan->umur }}</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="id">Alamat Tempat Tinggal</label>
                                            <div class="form-control">{{ $orphan->alamat }}</div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <div class="form-control">{{ $orphan->poskod }}</div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">

                                                    <div class="form-control">{{ $orphan->bandar }}</div>
                                                </div>
                                            </div>
                                            <div class="col-md-6" style="margin-bottom: 12pt">
                                                <div class="form-group">

                                                    <div class="form-control">{{ $orphan->negeri }}</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="col-md-6">

                                                <div class="form-group">
                                                    <label for="id">No. Kad Pengenalan</label>
                                                    <div class="form-control">{{ $orphan->no_kad_pengenalan }}</div>
                                                </div>

                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="id">No. Telefon</label>
                                                    <div class="form-control">{{ $orphan->no_telefon }}</div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="id">Jantina</label>
                                                    <div class="form-control">{{ $orphan->jantina }}</div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">

                                                <div class="form-group">
                                                    <label for="id">Status</label>
                                                    <div class="form-control">{{ $orphan->status }}</div>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="id">Tarikh Daftar</label>
                                                    <div class="form-control">{{ $orphan->tarikh_daftar }}</div>
                                                </div>

                                            </div>

                                            <div class="col-md-6">

                                                <div class="form-group">
                                                    <label for="id">Tarikh Keluar</label>
                                                    <div class="form-control">{{ $orphan->tarikh_keluar }}</div>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="row">

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="id">Gambar</label>
                                                    <div>
                                                        <img id="preview-image"
                                                            src="{{ asset('assets/orphan-img/' . $orphan->gambar) }}"
                                                            class="img-thumbnail" alt=" image here"
                                                            style="max-height: 250px">

                                                    </div>

                                                </div>

                                            </div>


                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="btn btn-flat col-12" style="background-color: #138496">
                                <div class="mr-auto" style="color: white">
                                    <h6><b>Bahagian B: Maklumat Ibu Bapa</b></h6>
                                </div>
                            </div>


                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">

                                        <div class="form-group">
                                            <label for="id">Nama Penuh Ayah</label>
                                            <div class="form-control">{{ $orphan->nama_penuh_ayah }}</div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="id">No. Kad Pengenalan Ayah</label>
                                                    <div class="form-control">{{ $orphan->no_kad_pengenalan_ayah }}
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="id">No. Telefon Ayah</label>
                                                    <div class="form-control">{{ $orphan->no_telefon_ayah }}</div>
                                                </div>

                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="id">Pekerjaan Ayah</label>
                                                    <div class="form-control">{{ $orphan->pekerjaan_ayah }}</div>
                                                </div>

                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="id">Pendapatan Ayah</label>
                                                    <div class="form-control">{{ $orphan->pendapatan_ayah }}</div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">

                                        <div class="form-group">
                                            <label for="id">Nama Penuh Ibu</label>
                                            <div class="form-control">{{ $orphan->nama_penuh_ibu }}</div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="id">No. Kad Pengenalan Ayah</label>
                                                    <div class="form-control">{{ $orphan->no_kad_pengenalan_ibu }}
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="id">No. Telefon Ibu</label>
                                                    <div class="form-control">{{ $orphan->no_telefon_ibu }}</div>
                                                </div>

                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="id">Pekerjaan Ibu</label>
                                                    <div class="form-control">{{ $orphan->pekerjaan_ibu }}</div>
                                                </div>

                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="id">Pendapatan Ibu</label>
                                                    <div class="form-control">{{ $orphan->pendapatan_ibu }}</div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>



                                </div>
                            </div>

                            <div class="btn btn-flat col-12" style="background-color: #138496">
                                <div class="mr-auto" style="color: white">
                                    <h6><b>Bahagian C: Dokumen Sokongan</b></h6>
                                </div>
                            </div>

                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="col-md-6"></div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="exampleInputFile">Sijil Lahir Anak</label>
                                                    <div id="file_input">
                                                        <a href="{{ asset('assets/sijil_lahir/' . $orphan->sijil_lahir) }}"
                                                            class="btn-link text-secondary"><i
                                                                class="far fa-fw fa-file-pdf"></i>{{ $orphan->sijil_lahir }}</a>
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
                                                        <a href="{{ asset('assets/sijil_kematian/' . $orphan->sijil_kematian) }}"
                                                            class="btn-link text-secondary"><i
                                                                class="far fa-fw fa-file-pdf"></i>{{ $orphan->sijil_kematian }}</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <!-- /.card-body -->

                            <div class="card-footer d-flex justify-content-end">

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
