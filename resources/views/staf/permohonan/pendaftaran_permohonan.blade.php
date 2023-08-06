@extends('backend.layouts.app', ['title' => 'Permohonan'])


@section('content-header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Permohonan</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item">
                        <a
                            href="{{ Auth::user()->role == 1
                                ? url('admin-home')
                                : (Auth::user()->role == 2
                                    ? url('staf-home')
                                    : url('user-home')) }}">Halaman
                            Utama</a>
                    </li>
                    <li class="breadcrumb-item"><a href="{{ url('application-registration') }}">Permohonan</a></li>
                    <li class="breadcrumb-item active">{{ $application->id_permohonan }}</li>
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
                        <div class=""> <a href="{{ url('application-registration') }}" class="btn btn-primary">
                                <i class="nav-icon fas fa-arrow-circle-left"></i> Kembali</a></div>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form>
                        <fieldset disabled>

                            <div class="btn btn-flat col-12" style="background-color: #138496">
                                <div class="mr-auto" style="color: white">
                                    <h6><b>Bahagian A: Maklumat Pemohon</b></h6>
                                </div>
                            </div>

                            <div class="card-body">
                                <div class="row mt-3">
                                    <div class="col-12 table-responsive">
                                        <table class="table table-bordered">
                                            <tbody>
                                                <tr>
                                                    <td><b>Nama Penuh Pemohon<b></td>
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
                                                    <td>{{ $application->pekerjaan_pemohon }}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- /.col -->
                                </div>
                            </div>

                            <div class="btn btn-flat col-12" style="background-color: #138496">
                                <div class="mr-auto" style="color: white">
                                    <h6><b>Bahagian B: Maklumat Anak Yatim</b></h6>
                                </div>
                            </div>

                            <div class="card-body">
                                <div class="row mt-3">
                                    <div class="col-12 table-responsive">
                                        <table class="table table-bordered">
                                            <tbody>
                                                <tr>
                                                    <td colspan="2">
                                                        @php
                                                            $logoPath = 'assets/orphan-img/' . $application->gambar;
                                                            $defaultImagePath = 'assets/no-img.jpg';
                                                            
                                                            if (!file_exists(public_path($logoPath)) || empty($application->gambar)) {
                                                                $logoPath = $defaultImagePath;
                                                            }
                                                        @endphp

                                                        <center> <img id="preview-image" src="{{ asset($logoPath) }}"
                                                                alt="" style="height: 280px" alt="">
                                                        </center>

                                                        {{-- <center><img id="preview-image"
                                                                    src="{{ asset('assets/orphan-img/' . $application->gambar) }}"
                                                                    class="img-thumbnail" alt=" image here"
                                                                    width="200" height="280">
                                                            </center> --}}


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
                                                    @php
                                                        // Assuming you have the following variables
                                                        $currentYear = date('Y'); // Get the current year
                                                        $tarikh_lahir = $application->tarikh_lahir; // Replace this with the birth date in 'YYYY-MM-DD' format
                                                        
                                                        // Calculate the age
                                                        $yearOfBirth = (int) substr($tarikh_lahir, 0, 4);
                                                        $age = $currentYear - $yearOfBirth;
                                                    @endphp

                                                    <td>{{ $age }} Tahun</td>
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
                            </div>

                            <div class="btn btn-flat col-12" style="background-color: #138496">
                                <div class="mr-auto" style="color: white">
                                    <h6><b>Bahagian C: Maklumat Ibu Bapa</b></h6>
                                </div>
                            </div>

                            <div class="card-body">
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

                    <form action="{{ route('application-registration.update', ['application' => $application->id]) }}"
                        enctype="multipart/form-data" method="POST">
                        @method('PATCH')
                        @csrf
                        <div class="btn btn-flat col-12" style="background-color: #138496">
                            <div class="mr-auto" style="color: white">
                                <h6><b>Bahagian D: Pengesahan Pendaftaran</b></h6>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="exampleInputEmail1">Status Pendaftaran</label>
                                    <select class="form-control" name="status_pendaftaran" id="status_pendaftaran"
                                        aria-label="Default select example">
                                        <option selected value="">Sila Pilih Status Pendaftaran</option>
                                        <option value="Dalam Proses"
                                            {{ old('status_pendaftaran') ?? $application->status_pendaftaran == 'Dalam Proses' ? 'selected' : '' }}>
                                            Dalam Proses
                                        </option>
                                        <option value="Telah Berdaftar"
                                            {{ old('status_pendaftaran') ?? $application->status_pendaftaran == 'Telah Berdaftar' ? 'selected' : '' }}>
                                            Telah Berdaftar
                                        </option>
                                        <option value="Tidak Berdaftar"
                                            {{ old('status_pendaftaran') ?? $application->status_pendaftaran == 'Tidak Berdaftar' ? 'selected' : '' }}>
                                            Tidak Berdaftar
                                        </option>
                                    </select>
                                    @error('status_pendaftaran')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                {{-- <div class="col-md-6 Dalam_Proses status" id="dalam_proses">
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
                                        id="ulasan" name="ulasan"
                                        value="{{ old('ulasan') ?? $application->ulasan }}" placeholder="">
                                    @error('ulasan')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror


                                </div> --}}

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
