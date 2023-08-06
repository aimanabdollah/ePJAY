@extends('backend.layouts.app', ['title' => 'Anak Jagaan'])
@section('content-header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Anak Jagaan</h1>
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
                    <li class="breadcrumb-item"><a href="{{ url('admin-orphan') }}">Anak Jagaan</a></li>
                    <li class="breadcrumb-item active">Tambah</li>
                </ol>
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
                                <h5>Tambah Anak Jagaan <br>
                                    <em>
                                        <h6>Maklumat bertanda <i style="color: red">(*)</i> wajib dimasukkan</h6>
                                    </em>
                                </h5>
                            </div>
                            <div class=""> <a href="{{ url('admin-orphan') }}" class="btn btn-primary">
                                    <i class="nav-icon fas fa-arrow-circle-left"></i> Kembali</a></div>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->

                        <form action="{{ route('orphan.store') }}" method="POST" enctype="multipart/form-data">

                            @csrf
                            <div class="btn btn-flat col-12" style="background-color: #138496">
                                <div class="mr-auto" style="color: white">
                                    <h6><b>Bahagian A: Maklumat Anak Yatim</b></h6>
                                </div>
                            </div>


                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">

                                        <div class="form-group">
                                            <label for="nama_penuh">Nama Penuh<i style="color: red">*</i>
                                            </label>
                                            <input type="text"
                                                class="form-control remove-error-on-input @error('nama_penuh') is-invalid @enderror"
                                                id="nama_penuh" name="nama_penuh" value="{{ old('nama_penuh') }}"
                                                placeholder="Masukkan Nama Penuh">
                                        </div>

                                        <div class="form-group">
                                            <label for="nama_sekolah">Nama Sekolah</label>
                                            <input type="text"
                                                class="form-control remove-error-on-input @error('nama_sekolah') is-invalid @enderror"
                                                id="nama_sekolah" name="nama_sekolah" value="{{ old('nama_sekolah') }}"
                                                placeholder="Masukkan Nama Sekolah">
                                        </div>

                                        <div class="row">
                                            <div class="col-md-12">

                                                <div class="form-group">
                                                    <label for="tarikh_lahir">Tarikh Lahir<i
                                                            style="color: red">*</i></label>
                                                    <input type="date"
                                                        class="form-control remove-error-on-input @error('tarikh_lahir') is-invalid @enderror"
                                                        id="tarikh_lahir" name="tarikh_lahir"
                                                        value="{{ old('tarikh_lahir') }}"
                                                        placeholder="Masukkan Tarikh Lahir">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="alamat">Alamat Tempat Tinggal<i style="color: red">*</i></label>
                                            <input type="text"
                                                class="form-control remove-error-on-input @error('alamat') is-invalid @enderror"
                                                id="alamat" name="alamat" value="{{ old('alamat') }}"
                                                placeholder="Masukkan Alamat">
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">

                                                <div class="form-group">
                                                    <input type="text"
                                                        class="form-control remove-error-on-input @error('poskod') is-invalid @enderror"
                                                        id="poskod" name="poskod" value="{{ old('poskod') }}"
                                                        placeholder="Poskod">
                                                </div>

                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <input type="text"
                                                        class="form-control remove-error-on-input @error('bandar') is-invalid @enderror"
                                                        id="bandar" name="bandar" value="{{ old('bandar') }}"
                                                        placeholder="Bandar">
                                                </div>
                                            </div>


                                            <div class="col-md-6" style="margin-bottom: 12pt">
                                                <select
                                                    class="form-control remove-error-on-input @error('negeri') is-invalid @enderror"
                                                    name="negeri" id="negeri" aria-label="Default select example">
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

                                                    <option value="Johor"
                                                        {{ old('negeri') == 'Johor' ? 'selected' : '' }}>
                                                        Johor</option>
                                                    <option value="Kedah"
                                                        {{ old('negeri') == 'Kedah' ? 'selected' : '' }}>
                                                        Kedah</option>
                                                    <option value="Kelantan"
                                                        {{ old('negeri') == 'Kelantan' ? 'selected' : '' }}>
                                                        Kelantan</option>
                                                    <option value="Melaka"
                                                        {{ old('negeri') == 'Melaka' ? 'selected' : '' }}>
                                                        Melaka</option>

                                                    <option value="Negeri Sembilan"
                                                        {{ old('negeri') == 'Negeri Sembilan' ? 'selected' : '' }}>
                                                        Negeri Sembilan</option>
                                                    <option value="Pahang"
                                                        {{ old('negeri') == 'Pahang' ? 'selected' : '' }}>
                                                        Pahang</option>
                                                    <option value="Perak"
                                                        {{ old('negeri') == 'Perak' ? 'selected' : '' }}>
                                                        Perak</option>
                                                    <option value="Perlis"
                                                        {{ old('negeri') == 'Perlis' ? 'selected' : '' }}>
                                                        Perlis</option>

                                                    <option value="Pulau Pinang"
                                                        {{ old('negeri') == 'Pulau Pinang' ? 'selected' : '' }}>
                                                        Pulau Pinang</option>
                                                    <option value="Sabah"
                                                        {{ old('negeri') == 'Sabah' ? 'selected' : '' }}>
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
                                            </div>


                                        </div>
                                    </div>


                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="col-md-6">

                                                <div class="form-group">
                                                    <label for="no_kad_pengenalan">No. Kad Pengenalan<i
                                                            style="color: red">*</i></label>
                                                    <input type="text"
                                                        class="form-control remove-error-on-input @error('no_kad_pengenalan') is-invalid @enderror"
                                                        id="no_kad_pengenalan" name="no_kad_pengenalan"
                                                        value="{{ old('no_kad_pengenalan') }}"
                                                        placeholder="Masukkan No Kad Pengenalan">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="no_telefon">No. Telefon</label>
                                                    <input type="text"
                                                        class="form-control remove-error-on-input @error('no_telefon') is-invalid @enderror"
                                                        id="no_telefon" name="no_telefon"
                                                        value="{{ old('no_telefon') }}"
                                                        placeholder="Masukkan No Telefon">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">


                                            <div class="col-md-6" style="margin-bottom: 12pt">
                                                <label for="exampleInputEmail1">Jantina<i style="color: red">*</i></label>
                                                <select
                                                    class="form-control remove-error-on-input @error('jantina') is-invalid @enderror"
                                                    name="jantina" id="jantina" aria-label="Default select example">
                                                    <option selected value="">Sila Pilih Jantina</option>
                                                    <option value="Lelaki"
                                                        {{ old('jantina') == 'Lelaki' ? 'selected' : '' }}>
                                                        Lelaki
                                                    </option>
                                                    <option value="Perempuan"
                                                        {{ old('jantina') == 'Perempuan' ? 'selected' : '' }}>
                                                        Perempuan
                                                    </option>
                                                </select>
                                            </div>


                                            <div class="col-md-6" style="margin-bottom: 12pt">
                                                <label for="exampleInputEmail1">Status<i style="color: red">*</i></label>
                                                <select
                                                    class="form-control remove-error-on-input  @error('status') is-invalid @enderror"
                                                    name="status" id="status" aria-label="Default select example">
                                                    <option selected value="">Sila Pilih Status</option>
                                                    <option value="Kehilangan Ibu"
                                                        {{ old('status') == 'Kehilangan Ibu' ? 'selected' : '' }}>
                                                        Kehilangan Ibu
                                                    </option>
                                                    <option value="Kehilangan Ayah"
                                                        {{ old('status') == 'Kehilangan Ayah' ? 'selected' : '' }}>
                                                        Kehilangan Ayah
                                                    </option>
                                                    <option value="Kehilangan Ayah dan Ibu"
                                                        {{ old('status') == 'Kehilangan Ayah dan Ibu' ? 'selected' : '' }}>
                                                        Kehilangan Ayah dan Ibu
                                                    </option>
                                                </select>
                                            </div>

                                        </div>


                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="tarikh_daftar">Tarikh Daftar<i
                                                            style="color: red">*</i></label>
                                                    <input type="date"
                                                        class="form-control remove-error-on-input @error('tarikh_daftar') is-invalid @enderror"
                                                        id="tarikh_daftar" name="tarikh_daftar"
                                                        value="{{ old('tarikh_daftar') }}"
                                                        placeholder="Masukkan Tarikh Daftar">
                                                </div>

                                            </div>
                                            <div class="col-md-6">

                                                <div class="form-group">
                                                    <label for="exampleInputFile">Gambar<i
                                                            style="color: red">*</i></label>
                                                    <div id="file_input">
                                                        <input type="file" name="gambar" value="{{ old('gambar') }}"
                                                            class="form-control remove-error-on-input @error('gambar') is-invalid @enderror"
                                                            placeholder="Sila Pilih Gambar" id="gambar">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                            </div>
                                            <div class="col-md-6" style="margin-bottom: 12px">
                                                <img id="preview-image" src="{{ asset('assets/no-img.jpg') }}"
                                                    alt="preview image" class="img-thumbnail" style="max-height: 150px;">

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="btn btn-flat col-12" style="background-color: #138496">
                                <div class="mr-auto" style="color: white">
                                    <h6><b>Bahagian B: Maklumat Perkembangan Diri</b></h6>
                                </div>
                            </div>

                            <div class="card-body">
                                <div class="row">
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
                                                    <td class="align-middle">Berkeupayaan untuk berkomunikasi secara lisan
                                                        dan
                                                        bukan lisan dengan menggunakan bahasa yang dapat difahami</td>
                                                    <td class="align-middle">
                                                        <select class="form-control remove-error-on-input"
                                                            name="komunikasi" id="komunikasi"
                                                            aria-label="Default select example">
                                                            <option selected value="">Sila Pilih Tahap Penguasaan
                                                            </option>
                                                            <option value="5-Cemerlang"
                                                                {{ old('komunikasi') == '5-Cemerlang' ? 'selected' : '' }}>
                                                                5-Cemerlang
                                                            </option>
                                                            <option value="4-Baik"
                                                                {{ old('komunikasi') == '4-Baik' ? 'selected' : '' }}>
                                                                4-Baik
                                                            </option>
                                                            <option value="3-Sederhana"
                                                                {{ old('komunikasi') == '3-Sederhana' ? 'selected' : '' }}>
                                                                3-Sederhana
                                                            </option>
                                                            <option value="2-Memuaskan"
                                                                {{ old('komunikasi') == '2-Memuaskan"' ? 'selected' : '' }}>
                                                                2-Memuaskan
                                                            </option>
                                                            <option value="1-Lemah"
                                                                {{ old('komunikasi') == '1-Lemah' ? 'selected' : '' }}>
                                                                1-Lemah
                                                            </option>
                                                            <option value="Tiada"
                                                                {{ old('komunikasi') == 'Tiada' ? 'selected' : '' }}>
                                                                Tiada
                                                            </option>
                                                        </select>
                                                        @error('komunikasi')
                                                            <div class="text-danger">{{ $message }}</div>
                                                        @enderror
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="align-middle">2.</td>
                                                    <td class="align-middle">Matematik dan Pemikiran Logik</td>
                                                    <td class="align-middle">Berkebolehan untuk membina konsep asas
                                                        matematik
                                                        melalui proses membanding, menganggar, menyusun serta mampu untuk
                                                        menyelesaikan
                                                        masalah operasi nombor</td>
                                                    <td class="align-middle">
                                                        <select class="form-control remove-error-on-input"
                                                            name="matematik" id="matematik"
                                                            aria-label="Default select example">
                                                            <option selected value="">Sila Pilih Tahap Penguasaan
                                                            </option>
                                                            <option value="5-Cemerlang"
                                                                {{ old('matematik') == '5-Cemerlang' ? 'selected' : '' }}>
                                                                5-Cemerlang
                                                            </option>
                                                            <option value="4-Baik"
                                                                {{ old('matematik') == '4-Baik' ? 'selected' : '' }}>
                                                                4-Baik
                                                            </option>
                                                            <option value="3-Sederhana"
                                                                {{ old('matematik') == '3-Sederhana' ? 'selected' : '' }}>
                                                                3-Sederhana
                                                            </option>
                                                            <option value="2-Memuaskan"
                                                                {{ old('matematik') == '2-Memuaskan"' ? 'selected' : '' }}>
                                                                2-Memuaskan
                                                            </option>
                                                            <option value="1-Lemah"
                                                                {{ old('matematik') == '1-Lemah' ? 'selected' : '' }}>
                                                                1-Lemah
                                                            </option>
                                                            <option value="Tiada"
                                                                {{ old('matematik') == 'Tiada' ? 'selected' : '' }}>
                                                                Tiada
                                                            </option>
                                                        </select>
                                                        @error('matematik')
                                                            <div class="text-danger">{{ $message }}</div>
                                                        @enderror
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
                                                        <select class="form-control remove-error-on-input" name="deria"
                                                            id="deria" aria-label="Default select example">
                                                            <option selected value="">Sila Pilih Tahap Penguasaan
                                                            </option>
                                                            <option value="5-Cemerlang"
                                                                {{ old('deria') == '5-Cemerlang' ? 'selected' : '' }}>
                                                                5-Cemerlang
                                                            </option>
                                                            <option value="4-Baik"
                                                                {{ old('deria') == '4-Baik' ? 'selected' : '' }}>
                                                                4-Baik
                                                            </option>
                                                            <option value="3-Sederhana"
                                                                {{ old('deria') == '3-Sederhana' ? 'selected' : '' }}>
                                                                3-Sederhana
                                                            </option>
                                                            <option value="2-Memuaskan"
                                                                {{ old('deria') == '2-Memuaskan"' ? 'selected' : '' }}>
                                                                2-Memuaskan
                                                            </option>
                                                            <option value="1-Lemah"
                                                                {{ old('deria') == '1-Lemah' ? 'selected' : '' }}>
                                                                1-Lemah
                                                            </option>
                                                            <option value="Tiada"
                                                                {{ old('deria') == 'Tiada' ? 'selected' : '' }}>
                                                                Tiada
                                                            </option>
                                                        </select>
                                                        @error('deria')
                                                            <div class="text-danger">{{ $message }}</div>
                                                        @enderror
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="align-middle">4.</td>
                                                    <td class="align-middle">Fizikal dan Psikomotor</td>
                                                    <td class="align-middle">Berkebolehan untuk mengkoordinasi leher, kaki,
                                                        tangan
                                                        dan badan seperti berjalan, berlari, merangkak, mengeleng atau
                                                        melompat
                                                    </td>
                                                    <td class="align-middle">
                                                        <select class="form-control remove-error-on-input" name="fizikal"
                                                            id="fizikal" aria-label="Default select example">
                                                            <option selected value="">Sila Pilih Tahap Penguasaan
                                                            </option>
                                                            <option value="5-Cemerlang"
                                                                {{ old('fizikal') == '5-Cemerlang' ? 'selected' : '' }}>
                                                                5-Cemerlang
                                                            </option>
                                                            <option value="4-Baik"
                                                                {{ old('fizikal') == '4-Baik' ? 'selected' : '' }}>
                                                                4-Baik
                                                            </option>
                                                            <option value="3-Sederhana"
                                                                {{ old('fizikal') == '3-Sederhana' ? 'selected' : '' }}>
                                                                3-Sederhana
                                                            </option>
                                                            <option value="2-Memuaskan"
                                                                {{ old('fizikal') == '2-Memuaskan"' ? 'selected' : '' }}>
                                                                2-Memuaskan
                                                            </option>
                                                            <option value="1-Lemah"
                                                                {{ old('fizikal') == '1-Lemah' ? 'selected' : '' }}>
                                                                1-Lemah
                                                            </option>
                                                            <option value="Tiada"
                                                                {{ old('fizikal') == 'Tiada' ? 'selected' : '' }}>
                                                                Tiada
                                                            </option>
                                                        </select>
                                                        @error('fizikal')
                                                            <div class="text-danger">{{ $message }}</div>
                                                        @enderror
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="align-middle">5.</td>
                                                    <td class="align-middle">Kreativiti dan Estetika</td>
                                                    <td class="align-middle">Berkeupayaan untuk mencipta, mewujud atau
                                                        menghasilkan
                                                        sesuatu yang baru atau mengubah suai yang sedia ada untuk dijadikan
                                                        inovasi
                                                    </td>
                                                    <td class="align-middle">
                                                        <select class="form-control remove-error-on-input"
                                                            name="kreativiti" id="kreativiti"
                                                            aria-label="Default select example">
                                                            <option selected value="">Sila Pilih Tahap Penguasaan
                                                            </option>
                                                            <option value="5-Cemerlang"
                                                                {{ old('kreativiti') == '5-Cemerlang' ? 'selected' : '' }}>
                                                                5-Cemerlang
                                                            </option>
                                                            <option value="4-Baik"
                                                                {{ old('kreativiti') == '4-Baik' ? 'selected' : '' }}>
                                                                4-Baik
                                                            </option>
                                                            <option value="3-Sederhana"
                                                                {{ old('kreativiti') == '3-Sederhana' ? 'selected' : '' }}>
                                                                3-Sederhana
                                                            </option>
                                                            <option value="2-Memuaskan"
                                                                {{ old('kreativiti') == '2-Memuaskan"' ? 'selected' : '' }}>
                                                                2-Memuaskan
                                                            </option>
                                                            <option value="1-Lemah"
                                                                {{ old('kreativiti') == '1-Lemah' ? 'selected' : '' }}>
                                                                1-Lemah
                                                            </option>
                                                            <option value="Tiada"
                                                                {{ old('kreativiti') == 'Tiada' ? 'selected' : '' }}>
                                                                Tiada
                                                            </option>
                                                        </select>
                                                        @error('kreativiti')
                                                            <div class="text-danger">{{ $message }}</div>
                                                        @enderror
                                                    </td>
                                                </tr>

                                            </tbody>
                                        </table>
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
                                            <label for="nama_penuh_ayah">Nama Penuh Ayah<i
                                                    style="color: red">*</i></label>
                                            <input type="text"
                                                class="form-control remove-error-on-input @error('nama_penuh_ayah') is-invalid @enderror"
                                                id="nama_penuh_ayah" name="nama_penuh_ayah"
                                                value="{{ old('nama_penuh_ayah') }}" placeholder="Masukkan Nama Penuh">
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">

                                                <div class="form-group">
                                                    <label for="no_kad_pengenalan_ayah">No. Kad Pengenalan Ayah<i
                                                            style="color: red">*</i></label>
                                                    <input type="text"
                                                        class="form-control remove-error-on-input @error('no_kad_pengenalan_ayah') is-invalid @enderror"
                                                        id="no_kad_pengenalan_ayah" name="no_kad_pengenalan_ayah"
                                                        value="{{ old('no_kad_pengenalan_ayah') }}"
                                                        placeholder="Masukkan No Kad Pengenalan">
                                                </div>
                                            </div>
                                            <div class="col-md-6">

                                                <div class="form-group">
                                                    <label for="no_telefon_ayah">No. Telefon Ayah</label>
                                                    <input type="text"
                                                        class="form-control remove-error-on-input @error('no_telefon_ayah') is-invalid @enderror"
                                                        id="no_telefon_ayah" name="no_telefon_ayah"
                                                        value="{{ old('no_telefon_ayah') }}"
                                                        placeholder="Masukkan No Telefon">
                                                </div>

                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">

                                                <div class="form-group">
                                                    <label for="pekerjaan_ayah">Pekerjaan Ayah</label>
                                                    <input type="text"
                                                        class="form-control remove-error-on-input @error('pekerjaan_ayah') is-invalid @enderror"
                                                        id="pekerjaan_ayah" name="pekerjaan_ayah"
                                                        value="{{ old('pekerjaan_ayah') }}"
                                                        placeholder="Masukkan Pekerjaan">
                                                </div>


                                            </div>
                                            <div class="col-md-6">

                                                <div class="form-group">
                                                    <label for="pendapatan_ayah">Pendapatan Ayah</label>
                                                    <input type="number" step=0.01 min=0
                                                        class="form-control remove-error-on-input @error('pendapatan_ayah') is-invalid @enderror"
                                                        id="pendapatan_ayah" name="pendapatan_ayah"
                                                        value="{{ old('pendapatan_ayah') }}"
                                                        placeholder="Masukkan Pendapatan Bulanan">
                                                </div>

                                            </div>


                                        </div>
                                    </div>


                                    <div class="col-md-6">


                                        <div class="form-group">
                                            <label for="nama_penuh_ibu">Nama Penuh Ibu<i style="color: red">*</i></label>
                                            <input type="text"
                                                class="form-control remove-error-on-input @error('nama_penuh_ibu') is-invalid @enderror"
                                                id="nama_penuh_ibu" name="nama_penuh_ibu"
                                                value="{{ old('nama_penuh_ibu') }}" placeholder="Masukkan Nama Penuh">
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">

                                                <div class="form-group">
                                                    <label for="no_kad_pengenalan_ibu">No. Kad Pengenalan Ibu<i
                                                            style="color: red">*</i></label>
                                                    <input type="text"
                                                        class="form-control remove-error-on-input @error('no_kad_pengenalan_ibu') is-invalid @enderror"
                                                        id="no_kad_pengenalan_ibu" name="no_kad_pengenalan_ibu"
                                                        value="{{ old('no_kad_pengenalan_ibu') }}"
                                                        placeholder="Masukkan No Kad Pengenalan">
                                                </div>
                                            </div>
                                            <div class="col-md-6">

                                                <div class="form-group">
                                                    <label for="no_telefon_ibu">No. Telefon Ibu</label>
                                                    <input type="text"
                                                        class="form-control remove-error-on-input @error('no_telefon_ibu') is-invalid @enderror"
                                                        id="no_telefon_ibu" name="no_telefon_ibu"
                                                        value="{{ old('no_telefon_ibu') }}"
                                                        placeholder="Masukkan No Telefon">
                                                </div>

                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">

                                                <div class="form-group">
                                                    <label for="pekerjaan_ibu">Pekerjaan Ibu</label>
                                                    <input type="text"
                                                        class="form-control remove-error-on-input @error('pekerjaan_ibu') is-invalid @enderror"
                                                        id="pekerjaan_ibu" name="pekerjaan_ibu"
                                                        value="{{ old('pekerjaan_ibu') }}"
                                                        placeholder="Masukkan Pekerjaan">
                                                </div>


                                            </div>
                                            <div class="col-md-6">

                                                <div class="form-group">
                                                    <label for="pendapatan_ibu">Pendapatan Ibu</label>
                                                    <input type="number" step=0.01 min=0
                                                        class="form-control remove-error-on-input @error('pendapatan_ibu') is-invalid @enderror"
                                                        id="pendapatan_ibu" name="pendapatan_ibu"
                                                        value="{{ old('pendapatan_ibu') }}"
                                                        placeholder="Masukkan Pendapatan Bulanan">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->

                            <div class="btn btn-flat col-12" style="background-color: #138496">
                                <div class="mr-auto" style="color: white">
                                    <h6><b>Bahagian D: Dokumen Sokongan</b></h6>
                                </div>
                            </div>

                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">

                                        <div class="form-group">
                                            <label for="exampleInputFile">Sijil Lahir Anak<i
                                                    style="color: red">*</i></label>
                                            <div id="file_input">
                                                <input type="file" name="sijil_lahir"
                                                    value="{{ old('sijil_lahir') }}"
                                                    class="form-control remove-error-on-input @error('sijil_lahir') is-invalid @enderror"
                                                    placeholder="Sila Pilih Sijil Lahir" id="sijil_lahir">
                                            </div>
                                        </div>
                                    </div>


                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputFile">Sijil Kematian<i
                                                    style="color: red">*</i></label>
                                            <div id="file_input">
                                                <input type="file" name="sijil_kematian"
                                                    value="{{ old('sijil_kematian') }}"
                                                    class="form-control remove-error-on-input @error('sijil_kematian') is-invalid @enderror"
                                                    placeholder="Sila Pilih Sijil Kematian" id="sijil_kematian">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card-footer d-flex justify-content-end">
                                <button type="submit" class="btn btn-success"> <i
                                        class="nav-icon fas fa-plus-circle"></i>
                                    Tambah</button>
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
            .card {
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
