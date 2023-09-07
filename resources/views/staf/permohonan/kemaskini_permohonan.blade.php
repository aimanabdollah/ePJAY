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
                    <li class="breadcrumb-item"><a href="{{ url('application-approval') }}">Permohonan</a></li>
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
                        <div class=""> <a href="{{ url('application-approval') }}" class="btn btn-primary">
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
                                                            class="btn-link text-secondary" target="_blank"><i
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
                                                            class="btn-link text-secondary" target="_blank"><i
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

                    <form action="{{ route('application-approval.update', ['application' => $application->id]) }}"
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
                                        <option value="Dalam Proses"
                                            {{ old('status_permohonan') ?? $application->status_permohonan == 'Dalam Proses' ? 'selected' : '' }}>
                                            Dalam Proses
                                        </option>
                                        <option value="Berjaya"
                                            {{ old('status_permohonan') ?? $application->status_permohonan == 'Berjaya' ? 'selected' : '' }}>
                                            Berjaya
                                        </option>
                                        <option value="Tidak Berjaya"
                                            {{ old('status_permohonan') ?? $application->status_permohonan == 'Tidak Berjaya' ? 'selected' : '' }}>
                                            Tidak Berjaya
                                        </option>
                                    </select>
                                    @error('status_permohonan')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-6 dalam_proses status" id="dalam_proses">
                                    <div>

                                    </div>

                                </div>
                                <div class="col-md-6 berjaya status" id="berjaya">
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
                                <div class="col-md-6 tidak_berjaya status" id="tidak_berjaya">
                                    <label for="ulasan">Ulasan </label>
                                    <textarea class="form-control remove-error-on-input @error('ulasan') is-invalid @enderror" id="ulasan"
                                        name="ulasan" rows="4" placeholder="Masukkan sebab permohonan ditolak">{{ old('ulasan') }}</textarea>
                                </div>
                            </div>
                        </div>
                </div>
                <div class="card-footer d-flex justify-content-end">
                    <button type="submit" class="btn btn-success"> <i class="nav-icon fas fa-edit"></i>
                        Kemaksini</button>
                </div>
                </form>
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
        // Get references to the select element and the div elements
        const statusSelect = document.getElementById('status_permohonan');
        const dalamProsesDiv = document.getElementById('dalam_proses');
        const berjayaDiv = document.getElementById('berjaya');
        const tidakBerjayaDiv = document.getElementById('tidak_berjaya');

        // Function to show/hide div elements based on selected value
        function toggleDivs() {
            const selectedValue = statusSelect.value;

            dalamProsesDiv.style.display = 'none';
            berjayaDiv.style.display = 'none';
            tidakBerjayaDiv.style.display = 'none';

            if (selectedValue === 'Dalam Proses') {
                dalamProsesDiv.style.display = 'block';
            } else if (selectedValue === 'Berjaya') {
                berjayaDiv.style.display = 'block';
            } else if (selectedValue === 'Tidak Berjaya') {
                tidakBerjayaDiv.style.display = 'block';
            }
        }

        // Attach an event listener to the select element
        statusSelect.addEventListener('change', toggleDivs);

        // Call the toggleDivs function initially to set the initial state
        toggleDivs();
    </script>
@endpush
