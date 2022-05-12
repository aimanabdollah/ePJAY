@extends('layouts.staff-main', ['title'=>'Permohonan'])

@section('content-header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Permohonan</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ url('admin/home') }}">Halaman Utama</a></li>
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
                        <div class=""> <a href="{{ url('admin/application') }}" class="btn btn-primary">
                                <i class="nav-icon fas fa-arrow-circle-left"></i> Kembali</a></div>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form>
                        <fieldset disabled>

                            <div class="btn btn-flat col-12" style="background-color: #138496">
                                <div class="mr-auto" style="color: white">
                                    <h6><b>Bahagian A: Maklumat Permohonan</b></h6>
                                </div>
                            </div>

                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">


                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="nama_penuh_pemohon">Nama Penuh Pemohon</label>
                                                    <div class="form-control">{{ $application->nama_penuh_pemohon }}
                                                    </div>
                                                </div>
                                            </div>

                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="hubungan_pemohon">Hubungan Anak dengan Pemohon</label>
                                                    <div class="form-control">{{ $application->hubungan_pemohon }}</div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="pekerjaan_pemohon">Pekerjaan Pemohon</label>
                                                    <div class="form-control">{{ $application->pekerjaan_pemohon }}
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
                                                    <div class="form-control">{{ $application->email_pemohon }}</div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="no_tel_pemohon">No. Telefon</label>
                                                    <div class="form-control">{{ $application->no_tel_pemohon }}</div>
                                                </div>
                                            </div>
                                        </div>

                                        {{-- <div class="row">
                                        <div class="col-md-6">

                                        </div>
                                        <div class="col-md-6" style="margin-bottom: 12pt">
                                            <label for="exampleInputEmail1">Status</label>
                                            <select class="form-control" name=state aria-label="Default select example">
                                                <option selected>Sila Pilih Status Permohonan</option>
                                                <option value="Kehilangan Ibu">Lulus</option>
                                                <option value="Kehilangan Bapa">Tidak Berjaya</option>
                                            </select>
                                        </div>
                                    </div> --}}
                                    </div>


                                </div>
                            </div>

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
                                            <div class="form-control">{{ $application->nama_penuh }}</div>
                                        </div>

                                        <div class="form-group">
                                            <label for="id">Nama Sekolah</label>
                                            <div class="form-control">{{ $application->nama_sekolah }}</div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="id">Tarikh Lahir</label>
                                                    <div class="form-control">{{ $application->tarikh_lahir }}</div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="id">Umur</label>
                                                    <div class="form-control">{{ $application->umur }}</div>
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
                                                    <div class="form-control">{{ $application->poskod }}</div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">

                                                    <div class="form-control">{{ $application->bandar }}</div>
                                                </div>
                                            </div>
                                            <div class="col-md-6" style="margin-bottom: 12pt">
                                                <div class="form-group">

                                                    <div class="form-control">{{ $application->negeri }}</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="col-md-6">

                                                <div class="form-group">
                                                    <label for="id">No. Kad Pengenalan</label>
                                                    <div class="form-control">{{ $application->no_kad_pengenalan }}
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="id">No. Telefon</label>
                                                    <div class="form-control">{{ $application->no_telefon }}</div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="id">Jantina</label>
                                                    <div class="form-control">{{ $application->jantina }}</div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">

                                                <div class="form-group">
                                                    <label for="id">Status</label>
                                                    <div class="form-control">{{ $application->status }}</div>
                                                </div>
                                            </div>
                                        </div>


                                        {{-- <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="id">Tarikh Daftar</label>
                                                    <div class="form-control">{{ $application->tarikh_daftar }}</div>
                                                </div>

                                            </div>

                                            <div class="col-md-6">

                                                <div class="form-group">
                                                    <label for="id">Tarikh Keluar</label>
                                                    <div class="form-control">{{ $application->tarikh_keluar }}</div>
                                                </div>

                                            </div>
                                        </div> --}}

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

                            <div class="btn btn-flat col-12" style="background-color: #138496">
                                <div class="mr-auto" style="color: white">
                                    <h6><b>Bahagian C: Maklumat Ibu Bapa</b></h6>
                                </div>
                            </div>


                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">

                                        <div class="form-group">
                                            <label for="id">Nama Penuh Ayah</label>
                                            <div class="form-control">{{ $application->nama_penuh_ayah }}</div>
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
                                                    <div class="form-control">{{ $application->no_telefon_ayah }}
                                                    </div>
                                                </div>

                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="id">Pekerjaan Ayah</label>
                                                    <div class="form-control">{{ $application->pekerjaan_ayah }}</div>
                                                </div>

                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="id">Pendapatan Ayah</label>
                                                    <div class="form-control">{{ $application->pendapatan_ayah }}
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">

                                        <div class="form-group">
                                            <label for="id">Nama Penuh Ibu</label>
                                            <div class="form-control">{{ $application->nama_penuh_ibu }}</div>
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
                                                    <div class="form-control">{{ $application->no_telefon_ibu }}</div>
                                                </div>

                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="id">Pekerjaan Ibu</label>
                                                    <div class="form-control">{{ $application->pekerjaan_ibu }}</div>
                                                </div>

                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="id">Pendapatan Ibu</label>
                                                    <div class="form-control">{{ $application->pendapatan_ibu }}</div>
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

                        </fieldset>
                    </form>

                    <form action="{{ route('application.update', ['application' => $application->id]) }}"
                        enctype="multipart/form-data" method="POST">
                        @method('PATCH')
                        @csrf
                        <div class="btn btn-flat col-12" style="background-color: #138496">
                            <div class="mr-auto" style="color: white">
                                <h6><b>Bahagian D: Pengesahan Permohonan</b></h6>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="exampleInputEmail1">Status Permohonan</label>
                                    <select class="form-control" name="status_permohonan" id="status_permohonan"
                                        aria-label="Default select example">
                                        <option selected>Sila Pilih Status Permohonan</option>
                                        <option value="Dalam_Proses"
                                            {{ old('status_permohonan') ?? $application->status_permohonan == 'Dalam_Proses' ? 'selected' : '' }}>
                                            Dalam Proses
                                        </option>
                                        <option value="Berjaya"
                                            {{ old('status_permohonan') ?? $application->status_permohonan == 'Berjaya' ? 'selected' : '' }}>
                                            Berjaya
                                        </option>
                                        <option value="Tidak_Berjaya"
                                            {{ old('status_permohonan') ?? $application->status_permohonan == 'Tidak_Berjaya' ? 'selected' : '' }}>
                                            Tidak Berjaya
                                        </option>
                                    </select>
                                    @error('status_permohonan')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-6 Dalam_Proses status" id="dalam_proses">
                                    <div>

                                    </div>

                                </div>
                                <div class="col-md-6 Berjaya status" id="berjaya">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Tarikh Daftar</label>
                                        <input type="date"
                                            class="form-control @error('tarikh_daftar') is-invalid @enderror"
                                            id="tarikh_daftar" name="tarikh_daftar"
                                            value="{{ old('tarikh_daftar') ?? $application->tarikh_daftar }}"
                                            placeholder="">
                                        @error('tarikh_daftar')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6 Tidak_Berjaya status" id="tidak_berjaya">
                                    <label for="exampleInputEmail1">Ulasan</label>

                                    <input type="text" class="form-control @error('ulasan') is-invalid @enderror"
                                        id="ulasan" name="ulasan" value="{{ old('ulasan') ?? $application->ulasan }}"
                                        placeholder="">
                                    @error('ulasan')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror


                                </div>

                            </div>
                        </div>
                        <div class="card-footer d-flex justify-content-end">
                            <button type="submit" class="btn btn-success"> <i class="nav-icon fas fa-edit"></i>
                                Kemaksini</button>
                        </div>
                    </form>



                </div>


                <!-- /.card-body -->





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
