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
                            <h5>Tambah Permohonan</h5>
                            <em>
                                <h6>Maklumat bertanda <i style="color: red">(*)</i> wajib dimasukkan</h6>
                            </em>
                        </div>
                        <div class=""> <a href="{{ url('home') }}" class="btn btn-primary">
                                <i class="nav-icon fas fa-arrow-circle-left"></i> Kembali</a></div>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->

                    <form action="{{ route('application.store') }}" method="POST" enctype="multipart/form-data">
                        {{-- <form action="" method="POST" enctype="multipart/form-data"> --}}

                        @csrf

                        <div class="btn btn-flat col-12" style="background-color: #138496">
                            <div class="mr-auto" style="color: white">
                                <h6><b>Bahagian A: Maklumat Pemohon</b></h6>
                            </div>
                        </div>

                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">


                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="nama_penuh_pemohon">Nama Penuh Pemohon<i
                                                        style="color: red">*</i></label>
                                                <input type="text"
                                                    class="form-control @error('nama_penuh_pemohon') is-invalid @enderror"
                                                    id="nama_penuh_pemohon" name="nama_penuh_pemohon"
                                                    value="{{ old('nama_penuh_pemohon') }}"
                                                    placeholder="Masukkan Nama Penuh">
                                                @error('nama_penuh_pemohon')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="hubungan_pemohon">Hubungan Anak dengan Pemohon<i
                                                        style="color: red">*</i></label>
                                                <input type="text"
                                                    class="form-control @error('hubungan_pemohon') is-invalid @enderror"
                                                    id="hubungan_pemohon" name="hubungan_pemohon"
                                                    value="{{ old('hubungan_pemohon') }}"
                                                    placeholder="Masukkan Hubungan Anak">
                                                @error('hubungan_pemohon')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="pekerjaan_pemohon">Pekerjaan Pemohon<i
                                                        style="color: red">*</i></label>
                                                <input type="text"
                                                    class="form-control @error('pekerjaan_pemohon') is-invalid @enderror"
                                                    id="pekerjaan_pemohon" name="pekerjaan_pemohon"
                                                    value="{{ old('pekerjaan_pemohon') }}"
                                                    placeholder="Masukkan Pekerjaan">
                                                @error('pekerjaan_pemohon')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="email_pemohon">Email<i style="color: red">*</i></label>
                                                <input type="email"
                                                    class="form-control @error('email_pemohon') is-invalid @enderror"
                                                    id="email_pemohon" name="email_pemohon"
                                                    value="{{ old('email_pemohon') }}" placeholder="Masukkan Email">
                                                @error('email_pemohon')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="no_tel_pemohon">No. Telefon<i style="color: red">*</i></label>
                                                <input type="number"
                                                    class="form-control @error('no_tel_pemohon') is-invalid @enderror"
                                                    id="no_tel_pemohon" name="no_tel_pemohon"
                                                    value="{{ old('no_tel_pemohon') }}"
                                                    placeholder="Masukkan No Telefon">
                                                @error('no_tel_pemohon')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
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
                                <h6><b>Bahagian B: Maklumat Kanak-Kanak</b></h6>
                            </div>
                        </div>


                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">

                                    <div class="form-group">
                                        <label for="nama_penuh">Nama Penuh<i style="color: red">*</i></label>
                                        <input type="text" class="form-control @error('nama_penuh') is-invalid @enderror"
                                            id="nama_penuh" name="nama_penuh" value="{{ old('nama_penuh') }}"
                                            placeholder="Masukkan Nama Penuh">
                                        @error('nama_penuh')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="nama_sekolah">Nama Sekolah<i style="color: red">*</i></label>
                                        <input type="text" class="form-control @error('nama_sekolah') is-invalid @enderror"
                                            id="nama_sekolah" name="nama_sekolah" value="{{ old('nama_sekolah') }}"
                                            placeholder="Masukkan Nama Sekolah">
                                        @error('nama_sekolah')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">

                                            <div class="form-group">
                                                <label for="tarikh_lahir">Tarikh Lahir<i style="color: red">*</i></label>
                                                <input type="date"
                                                    class="form-control @error('tarikh_lahir') is-invalid @enderror"
                                                    id="tarikh_lahir" name="tarikh_lahir"
                                                    value="{{ old('tarikh_lahir') }}"
                                                    placeholder="Masukkan Tarikh Lahir">
                                                @error('tarikh_lahir')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>


                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="umur">Umur<i style="color: red">*</i></label>
                                                <input type="number" step="1" min=1
                                                    class="form-control @error('umur') is-invalid @enderror" id="umur"
                                                    name="umur" value="{{ old('umur') }}" placeholder="Masukkan Umur">
                                                @error('umur')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                    </div>

                                    <div class="form-group">
                                        <label for="alamat">Alamat Tempat Tinggal<i style="color: red">*</i></label>
                                        <input type="text" class="form-control @error('alamat') is-invalid @enderror"
                                            id="alamat" name="alamat" value="{{ old('alamat') }}"
                                            placeholder="Masukkan Alamat">
                                        @error('alamat')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">

                                            <div class="form-group">
                                                <input type="text"
                                                    class="form-control @error('poskod') is-invalid @enderror" id="poskod"
                                                    name="poskod" value="{{ old('poskod') }}" placeholder="Poskod">
                                                @error('poskod')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>

                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input type="text"
                                                    class="form-control @error('bandar') is-invalid @enderror" id="bandar"
                                                    name="bandar" value="{{ old('bandar') }}" placeholder="Bandar">
                                                @error('bandar')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>


                                        <div class="col-md-6" style="margin-bottom: 12pt">
                                            <select class="form-control" name="negeri" id="negeri"
                                                aria-label="Default select example">
                                                <option selected>Sila Pilih Negeri</option>

                                                <option value="W.P Kuala Lumpur"
                                                    {{ old('negeri') == 'W.P Kuala Lumpur' ? 'selected' : '' }}>
                                                    W.P Kuala Lumpur</option>
                                                <option value="W.P Labuan"
                                                    {{ old('negeri') == 'W.P Labuan' ? 'selected' : '' }}>
                                                    W.P Labuan</option>
                                                <option value="W.P Putrajaya"
                                                    {{ old('negeri') == 'W.P Putrajaya' ? 'selected' : '' }}>
                                                    W.P Putrajaya</option>

                                                <option value="Johor" {{ old('negeri') == 'Johor' ? 'selected' : '' }}>
                                                    Johor</option>
                                                <option value="Kedah" {{ old('negeri') == 'Kedah' ? 'selected' : '' }}>
                                                    Kedah</option>
                                                <option value="Kelantan"
                                                    {{ old('negeri') == 'Kelantan' ? 'selected' : '' }}>
                                                    Kelantan</option>
                                                <option value="Melaka" {{ old('negeri') == 'Melaka' ? 'selected' : '' }}>
                                                    Melaka</option>

                                                <option value="Negeri Sembilan"
                                                    {{ old('negeri') == 'Negeri Sembilan' ? 'selected' : '' }}>
                                                    Negeri Sembilan</option>
                                                <option value="Pahang" {{ old('negeri') == 'Pahang' ? 'selected' : '' }}>
                                                    Pahang</option>
                                                <option value="Perak" {{ old('negeri') == 'Perak' ? 'selected' : '' }}>
                                                    Perak</option>
                                                <option value="Perlis" {{ old('negeri') == 'Perlis' ? 'selected' : '' }}>
                                                    Perlis</option>

                                                <option value="Pulau Pinang"
                                                    {{ old('negeri') == 'Pulau Pinang' ? 'selected' : '' }}>
                                                    Pulau Pinang</option>
                                                <option value="Sabah" {{ old('negeri') == 'Sabah' ? 'selected' : '' }}>
                                                    Sabah</option>
                                                <option value="Sarawak"
                                                    {{ old('negeri') == 'Sarawak' ? 'selected' : '' }}>
                                                    Sarawak</option>
                                                <option value="Selangor"
                                                    {{ old('negeri') == 'Selangor' ? 'selected' : '' }}>
                                                    Selangor</option>
                                                <option value="Terengganu"
                                                    {{ old('negeri') == 'Terengganu' ? 'selected' : '' }}>
                                                    Terengganu</option>

                                            </select>
                                            @error('negeri')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>


                                    </div>
                                </div>


                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-6">

                                            <div class="form-group">
                                                <label for="no_kad_pengenalan">No. Kad Pengenalan <i
                                                        style="color: red">*</i></label>
                                                <input type="text"
                                                    class="form-control @error('no_kad_pengenalan') is-invalid @enderror"
                                                    id="no_kad_pengenalan" name="no_kad_pengenalan"
                                                    value="{{ old('no_kad_pengenalan') }}"
                                                    placeholder="Masukkan No Kad Pengenalan">
                                                @error('no_kad_pengenalan')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="no_telefon">No. Telefon</label>
                                                <input type="text"
                                                    class="form-control @error('no_telefon') is-invalid @enderror"
                                                    id="no_telefon" name="no_telefon" value="{{ old('no_telefon') }}"
                                                    placeholder="Masukkan No Telefon">
                                                @error('no_telefon')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">


                                        <div class="col-md-6" style="margin-bottom: 12pt">
                                            <label for="exampleInputEmail1">Jantina<i style="color: red">*</i></label>
                                            <select class="form-control" name="jantina" id="jantina"
                                                aria-label="Default select example">
                                                <option selected>Sila Pilih Jantina</option>
                                                <option value="Lelaki"
                                                    {{ old('jantina') == 'Lelaki' ? 'selected' : '' }}>
                                                    Lelaki
                                                </option>
                                                <option value="Perempuan"
                                                    {{ old('jantina') == 'Perempuan' ? 'selected' : '' }}>
                                                    Perempuan
                                                </option>
                                            </select>
                                            @error('jantina')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>


                                        <div class="col-md-6" style="margin-bottom: 12pt">
                                            <label for="exampleInputEmail1">Status<i style="color: red">*</i></label>
                                            <select class="form-control" name="status" id="status"
                                                aria-label="Default select example">
                                                <option selected>Sila Pilih Status</option>
                                                <option value="Kehilangan Ibu"
                                                    {{ old('status') == 'Kehilangan Ibu' ? 'selected' : '' }}>
                                                    Kehilangan Ibu
                                                </option>
                                                <option value="Kehilangan Ayah"
                                                    {{ old('status') == 'Kehilangan Ayah' ? 'selected' : '' }}>
                                                    Kehilangan Ayah
                                                </option>
                                                <option value="Kehilangan Ibu dan Ayah"
                                                    {{ old('status') == 'Kehilangan Ibu dan Ayah' ? 'selected' : '' }}>
                                                    Kehilangan Ibu dan Ayah
                                                </option>
                                            </select>
                                            @error('status')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                    </div>


                                    <div class="row">
                                        <div class="col-md-6">
                                            {{-- <div class="form-group">
                                                <label for="tarikh_daftar">Tarikh Daftar</label>
                                                <input type="date"
                                                    class="form-control @error('tarikh_daftar') is-invalid @enderror"
                                                    id="tarikh_daftar" name="tarikh_daftar"
                                                    value="{{ old('tarikh_daftar') }}"
                                                    placeholder="Masukkan Tarikh Daftar">
                                                @error('tarikh_daftar')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div> --}}

                                        </div>
                                        <div class="col-md-6">

                                            <div class="form-group">
                                                <label for="exampleInputFile">Gambar<i style="color: red">*</i></label>
                                                <div id="file_input">
                                                    <input type="file" name="gambar" value="{{ old('gambar') }}"
                                                        class="form-control" placeholder="Sila Pilih Gambar" id="gambar">
                                                </div>
                                                @error('gambar')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror

                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                        </div>
                                        <div class="col-md-6" style="margin-bottom: 12px">
                                            <img id="preview-image" src="{{ asset('assets/orphan-img/no-image.png') }}"
                                                alt="preview image" class="img-thumbnail" style="max-height: 150px;">

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
                                        <label for="nama_penuh_ayah">Nama Penuh Ayah<i style="color: red">*</i></label>
                                        <input type="text"
                                            class="form-control @error('nama_penuh_ayah') is-invalid @enderror"
                                            id="nama_penuh_ayah" name="nama_penuh_ayah"
                                            value="{{ old('nama_penuh_ayah') }}" placeholder="Masukkan Nama Penuh">
                                        @error('nama_penuh_ayah')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">

                                            <div class="form-group">
                                                <label for="no_kad_pengenalan_ayah">No. Kad Pengenalan Ayah<i
                                                        style="color: red">*</i></label>
                                                <input type="text"
                                                    class="form-control @error('no_kad_pengenalan_ayah') is-invalid @enderror"
                                                    id="no_kad_pengenalan_ayah" name="no_kad_pengenalan_ayah"
                                                    value="{{ old('no_kad_pengenalan_ayah') }}"
                                                    placeholder="Masukkan No Kad Pengenalan">
                                                @error('no_kad_pengenalan_ayah')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">

                                            <div class="form-group">
                                                <label for="no_telefon_ayah">No. Telefon Ayah</label>
                                                <input type="text"
                                                    class="form-control @error('no_telefon_ayah') is-invalid @enderror"
                                                    id="no_telefon_ayah" name="no_telefon_ayah"
                                                    value="{{ old('no_telefon_ayah') }}"
                                                    placeholder="Masukkan No Telefon">
                                                @error('no_telefon_ayah')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>

                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">

                                            <div class="form-group">
                                                <label for="pekerjaan_ayah">Pekerjaan Ayah</label>
                                                <input type="text"
                                                    class="form-control @error('pekerjaan_ayah') is-invalid @enderror"
                                                    id="pekerjaan_ayah" name="pekerjaan_ayah"
                                                    value="{{ old('pekerjaan_ayah') }}" placeholder="Masukkan Pekerjaan">
                                                @error('pekerjaan_ayah')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>


                                        </div>
                                        <div class="col-md-6">

                                            <div class="form-group">
                                                <label for="pendapatan_ayah">Pendapatan Ayah</label>
                                                <input type="number" step=0.01 min=0
                                                    class="form-control @error('pendapatan_ayah') is-invalid @enderror"
                                                    id="pendapatan_ayah" name="pendapatan_ayah"
                                                    value="{{ old('pendapatan_ayah') }}"
                                                    placeholder="Masukkan Pendapatan Bulanan">
                                                @error('pendapatan_ayah')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>

                                        </div>


                                    </div>
                                </div>


                                <div class="col-md-6">


                                    <div class="form-group">
                                        <label for="nama_penuh_ibu">Nama Penuh Ibu<i style="color: red">*</i></label>
                                        <input type="text"
                                            class="form-control @error('nama_penuh_ibu') is-invalid @enderror"
                                            id="nama_penuh_ibu" name="nama_penuh_ibu" value="{{ old('nama_penuh_ibu') }}"
                                            placeholder="Masukkan Nama Penuh">
                                        @error('nama_penuh_ibu')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">

                                            <div class="form-group">
                                                <label for="no_kad_pengenalan_ibu">No. Kad Pengenalan Ibu<i
                                                        style="color: red">*</i></label>
                                                <input type="text"
                                                    class="form-control @error('no_kad_pengenalan_ibu') is-invalid @enderror"
                                                    id="no_kad_pengenalan_ibu" name="no_kad_pengenalan_ibu"
                                                    value="{{ old('no_kad_pengenalan_ibu') }}"
                                                    placeholder="Masukkan No Kad Pengenalan">
                                                @error('no_kad_pengenalan_ibu')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">

                                            <div class="form-group">
                                                <label for="no_telefon_ibu">No. Telefon Ibu</label>
                                                <input type="text"
                                                    class="form-control @error('no_telefon_ibu') is-invalid @enderror"
                                                    id="no_telefon_ibu" name="no_telefon_ibu"
                                                    value="{{ old('no_telefon_ibu') }}"
                                                    placeholder="Masukkan No Telefon">
                                                @error('no_telefon_ibu')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>

                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">

                                            <div class="form-group">
                                                <label for="pekerjaan_ibu">Pekerjaan Ibu</label>
                                                <input type="text"
                                                    class="form-control @error('pekerjaan_ibu') is-invalid @enderror"
                                                    id="pekerjaan_ibu" name="pekerjaan_ibu"
                                                    value="{{ old('pekerjaan_ibu') }}" placeholder="Masukkan Pekerjaan">
                                                @error('pekerjaan_ibu')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>


                                        </div>
                                        <div class="col-md-6">

                                            <div class="form-group">
                                                <label for="pendapatan_ibu">Pendapatan Ibu</label>
                                                <input type="number" step=0.01 min=0
                                                    class="form-control @error('pendapatan_ibu') is-invalid @enderror"
                                                    id="pendapatan_ibu" name="pendapatan_ibu"
                                                    value="{{ old('pendapatan_ibu') }}"
                                                    placeholder="Masukkan Pendapatan Bulanan">
                                                @error('pendapatan_ibu')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->


                        <div class="btn btn-flat col-12" style="background-color: #138496">
                            <div class="mr-auto" style="color: white">
                                <h6><b>Bahagian C: Dokumen Sokongan</b></h6>
                            </div>
                        </div>

                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">

                                    <div class="form-group">
                                        <label for="exampleInputFile">Sijil Lahir Anak<i style="color: red">*</i></label>
                                        <div id="file_input">
                                            <input type="file" name="sijil_lahir" value="{{ old('sijil_lahir') }}"
                                                class="form-control" placeholder="Sila Pilih Sijil Lahir"
                                                id="sijil_lahir">
                                        </div>
                                        @error('sijil_lahir')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror

                                    </div>
                                </div>


                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputFile">Sijil Kematian<i style="color: red">*</i></label>
                                        <div id="file_input">
                                            <input type="file" name="sijil_kematian" value="{{ old('sijil_kematian') }}"
                                                class="form-control" placeholder="Sila Pilih Sijil Kematian"
                                                id="sijil_kematian">
                                        </div>
                                        @error('sijil_kematian')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card-footer d-flex justify-content-end">
                            <button type="submit" class="btn btn-success"> <i class="nav-icon fas fa-plus-circle"></i>
                                Hantar</button>
                        </div>

                    </form>
                </div>


            </div>
        </div>
        <!-- /.card-body -->

        <!-- /.card -->
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
        $('#gambar').change(function() {

            let reader = new FileReader();
            reader.onload = (e) => {
                $('#preview-image').attr('src', e.target.result);
            }
            reader.readAsDataURL(this.files[0]);

        });
    </script>
@endpush
