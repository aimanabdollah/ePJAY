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
                    <li class="breadcrumb-item active">{{ $orphan->id_anak_jagaan }}</li>
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
                            <h5>Edit Anak Jagaan</h5>
                            <em>
                                <h6>Maklumat bertanda <i style="color: red">(*)</i> wajib dimasukkan</h6>
                            </em>
                        </div>
                        <div class=""> <a href="{{ url('admin-orphan') }}" class="btn btn-primary">
                                <i class="nav-icon fas fa-arrow-circle-left"></i> Kembali</a></div>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->

                    <form action="{{ route('orphan.update', ['orphan' => $orphan->id]) }}" enctype="multipart/form-data"
                        method="POST">
                        @method('PATCH')
                        @csrf


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
                                                        <label for="nama_penuh">Nama Penuh<i
                                                                style="color: red">*</i></label>
                                                        <input type="text"
                                                            class="form-control remove-error-on-input @error('nama_penuh') is-invalid @enderror"
                                                            id="nama_penuh" name="nama_penuh"
                                                            value="{{ old('nama_penuh') ?? $orphan->nama_penuh }}"
                                                            placeholder="Masukkan Nama Penuh">
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="nama_sekolah">Nama Sekolah</label>
                                                        <input type="text"
                                                            class="form-control remove-error-on-input @error('nama_sekolah') is-invalid @enderror"
                                                            id="nama_sekolah" name="nama_sekolah"
                                                            value="{{ old('nama_sekolah') ?? $orphan->nama_sekolah }}"
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
                                                                    value="{{ old('tarikh_lahir') ?? $orphan->tarikh_lahir }}"
                                                                    placeholder="Masukkan Tarikh Lahir">
                                                            </div>
                                                        </div>

                                                    </div>

                                                    <div class="form-group">
                                                        <label for="alamat">Alamat Tempat Tinggal<i
                                                                style="color: red">*</i></label>
                                                        <input type="text"
                                                            class="form-control remove-error-on-input @error('alamat') is-invalid @enderror"
                                                            id="alamat" name="alamat"
                                                            value="{{ old('alamat') ?? $orphan->alamat }}"
                                                            placeholder="Masukkan Alamat">
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-md-6">

                                                            <div class="form-group">
                                                                <input type="text"
                                                                    class="form-control remove-error-on-input @error('poskod') is-invalid @enderror"
                                                                    id="poskod" name="poskod"
                                                                    value="{{ old('poskod') ?? $orphan->poskod }}"
                                                                    placeholder="Poskod">
                                                            </div>

                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <input type="text"
                                                                    class="form-control remove-error-on-input @error('bandar') is-invalid @enderror"
                                                                    id="bandar" name="bandar"
                                                                    value="{{ old('bandar') ?? $orphan->bandar }}"
                                                                    placeholder="Bandar">
                                                            </div>
                                                        </div>


                                                        <div class="col-md-6" style="margin-bottom: 12pt">
                                                            <select
                                                                class="form-control remove-error-on-input @error('negeri') is-invalid @enderror"
                                                                name="negeri" id="negeri"
                                                                aria-label="Default select example">
                                                                <option selected value="">Sila Pilih Negeri</option>

                                                                <option value="W.P Kuala Lumpur"
                                                                    {{ old('negeri') ?? $orphan->negeri == 'W.P Kuala Lumpur' ? 'selected' : '' }}>
                                                                    W.P Kuala Lumpur</option>
                                                                <option value="W.P Labuan"
                                                                    {{ old('negeri') ?? $orphan->negeri == 'W.P Labuan' ? 'selected' : '' }}>
                                                                    W.P Labuan</option>
                                                                <option value="W.P Putrajaya"
                                                                    {{ old('negeri') ?? $orphan->negeri == 'W.P Putrajaya' ? 'selected' : '' }}>
                                                                    W.P Putrajaya</option>

                                                                <option value="Johor"
                                                                    {{ old('negeri') ?? $orphan->negeri == 'Johor' ? 'selected' : '' }}>
                                                                    Johor</option>
                                                                <option value="Kedah"
                                                                    {{ old('negeri') ?? $orphan->negeri == 'Kedah' ? 'selected' : '' }}>
                                                                    Kedah</option>
                                                                <option value="Kelantan"
                                                                    {{ old('negeri') ?? $orphan->negeri == 'Kelantan' ? 'selected' : '' }}>
                                                                    Kelantan</option>
                                                                <option value="Melaka"
                                                                    {{ old('negeri') ?? $orphan->negeri == 'Melaka' ? 'selected' : '' }}>
                                                                    Melaka</option>

                                                                <option value="Negeri Sembilan"
                                                                    {{ old('negeri') ?? $orphan->negeri == 'Negeri Sembilan' ? 'selected' : '' }}>
                                                                    Negeri Sembilan</option>
                                                                <option value="Pahang"
                                                                    {{ old('negeri') ?? $orphan->negeri == 'Pahang' ? 'selected' : '' }}>
                                                                    Pahang</option>
                                                                <option value="Perak"
                                                                    {{ old('negeri') ?? $orphan->negeri == 'Perak' ? 'selected' : '' }}>
                                                                    Perak</option>
                                                                <option value="Perlis"
                                                                    {{ old('negeri') ?? $orphan->negeri == 'Perlis' ? 'selected' : '' }}>
                                                                    Perlis</option>

                                                                <option value="Pulau Pinang"
                                                                    {{ old('negeri') ?? $orphan->negeri == 'Pulau Pinang' ? 'selected' : '' }}>
                                                                    Pulau Pinang</option>
                                                                <option value="Sabah"
                                                                    {{ old('negeri') ?? $orphan->negeri == 'Sabah' ? 'selected' : '' }}>
                                                                    Sabah</option>
                                                                <option value="Sarawak"
                                                                    {{ old('negeri') ?? $orphan->negeri == 'Sarawak' ? 'selected' : '' }}>
                                                                    Sarawak</option>
                                                                <option value="Selangor"
                                                                    {{ old('negeri') ?? $orphan->negeri == 'Selangor' ? 'selected' : '' }}>
                                                                    Selangor</option>
                                                                <option value="Terengganu"
                                                                    {{ old('negeri') ?? $orphan->negeri == 'Terengganu' ? 'selected' : '' }}>
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
                                                                    value="{{ old('no_kad_pengenalan') ?? $orphan->no_kad_pengenalan }}"
                                                                    placeholder="Masukkan No Kad Pengenalan">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="no_telefon">No. Telefon</label>
                                                                <input type="text"
                                                                    class="form-control remove-error-on-input @error('no_telefon') is-invalid @enderror"
                                                                    id="no_telefon" name="no_telefon"
                                                                    value="{{ old('no_telefon') ?? $orphan->no_telefon }}"
                                                                    placeholder="Masukkan No Telefon">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row">


                                                        <div class="col-md-6" style="margin-bottom: 12pt">
                                                            <label for="exampleInputEmail1">Jantina<i
                                                                    style="color: red">*</i></label>
                                                            <select
                                                                class="form-control remove-error-on-input @error('jantina') is-invalid @enderror"
                                                                name="jantina" id="jantina"
                                                                aria-label="Default select example" required>
                                                                <option selected value="">Sila Pilih Jantina</option>
                                                                <option value="Lelaki"
                                                                    {{ old('jantina') ?? $orphan->jantina == 'Lelaki' ? 'selected' : '' }}>
                                                                    Lelaki
                                                                </option>
                                                                <option value="Perempuan"
                                                                    {{ old('jantina') ?? $orphan->jantina == 'Perempuan' ? 'selected' : '' }}>
                                                                    Perempuan
                                                                </option>
                                                            </select>
                                                        </div>


                                                        <div class="col-md-6" style="margin-bottom: 12pt">
                                                            <label for="exampleInputEmail1">Status<i
                                                                    style="color: red">*</i></label>
                                                            <select
                                                                class="form-control remove-error-on-input @error('status') is-invalid @enderror"
                                                                name="status" id="status"
                                                                aria-label="Default select example">
                                                                <option selected value="">Sila Pilih Status</option>
                                                                <option value="Kehilangan Ibu"
                                                                    {{ old('status') ?? $orphan->status == 'Kehilangan Ibu' ? 'selected' : '' }}>
                                                                    Kehilangan Ibu
                                                                </option>
                                                                <option value="Kehilangan Ayah"
                                                                    {{ old('status') ?? $orphan->status == 'Kehilangan Ayah' ? 'selected' : '' }}>
                                                                    Kehilangan Ayah
                                                                </option>
                                                                <option value="Kehilangan Ayah dan Ibu"
                                                                    {{ old('status') ?? $orphan->status == 'Kehilangan Ayah dan Ibu' ? 'selected' : '' }}>
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
                                                                    value="{{ old('tarikh_daftar') ?? $orphan->tarikh_daftar }}"
                                                                    placeholder="Masukkan Tarikh Daftar">
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="tarikh_keluar">Tarikh Keluar</label>
                                                                <input type="date"
                                                                    class="form-control remove-error-on-input @error('tarikh_keluar') is-invalid @enderror"
                                                                    id="tarikh_keluar" name="tarikh_keluar"
                                                                    value="{{ old('tarikh_keluar') ?? $orphan->tarikh_keluar }}"
                                                                    placeholder="Masukkan Tarikh Keluar">
                                                            </div>

                                                        </div>


                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="gambar">Gambar</label>
                                                                <div>
                                                                    @php
                                                                        $logoPath = 'assets/orphan-img/' . $orphan->gambar;
                                                                        $defaultImagePath = 'assets/no-img.jpg';
                                                                        
                                                                        if (!file_exists(public_path($logoPath)) || empty($orphan->gambar)) {
                                                                            $logoPath = $defaultImagePath;
                                                                        }
                                                                    @endphp
                                                                    <img id="preview-image" src="{{ asset($logoPath) }}"
                                                                        class="img-thumbnail" alt=""
                                                                        style="height: 150px">
                                                                </div>

                                                            </div>

                                                        </div>

                                                        <div class="col-md-6">

                                                            <div class="form-group">
                                                                <label for="gambar" style="color: white">Gambar
                                                                </label>
                                                                <input type="file" name="gambar" id="gambar"
                                                                    class="form-control remove-error-on-input"
                                                                    placeholder="Sila Pilih Gambar">
                                                            </div>
                                                        </div>

                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="custom-tabs-one-profile" role="tabpanel"
                                            aria-labelledby="custom-tabs-one-profile-tab">
                                            <div class="row">
                                                <div class="table-responsive">
                                                    <table id="" class="table table-bordered table-striped">
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
                                                                    difahami
                                                                </td>
                                                                <td class="align-middle">
                                                                    <select class="form-control remove-error-on-input"
                                                                        name="komunikasi" id="komunikasi"
                                                                        aria-label="Default select example">
                                                                        <option selected value="">Sila Pilih Tahap
                                                                            Penguasaan</option>
                                                                        <option value="5-Cemerlang"
                                                                            {{ old('komunikasi') ?? $orphan->komunikasi == '5-Cemerlang' ? 'selected' : '' }}>
                                                                            5-Cemerlang
                                                                        </option>
                                                                        <option value="4-Baik"
                                                                            {{ old('komunikasi') ?? $orphan->komunikasi == '4-Baik' ? 'selected' : '' }}>
                                                                            4-Baik
                                                                        </option>
                                                                        <option value="3-Sederhana"
                                                                            {{ old('komunikasi') ?? $orphan->komunikasi == '3-Sederhana' ? 'selected' : '' }}>
                                                                            3-Sederhana
                                                                        </option>
                                                                        <option value="2-Memuaskan"
                                                                            {{ old('komunikasi') ?? $orphan->komunikasi == '2-Memuaskan' ? 'selected' : '' }}>
                                                                            2-Memuaskan
                                                                        </option>
                                                                        <option value="1-Lemah"
                                                                            {{ old('komunikasi') ?? $orphan->komunikasi == '1-Lemah' ? 'selected' : '' }}>
                                                                            1-Lemah
                                                                        </option>
                                                                        <option value="Tiada"
                                                                            {{ old('komunikasi') ?? $orphan->komunikasi == 'Tiada' ? 'selected' : '' }}>
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
                                                                <td class="align-middle">Berkebolehan untuk membina konsep
                                                                    asas
                                                                    matematik
                                                                    melalui proses membanding, menganggar, menyusun serta
                                                                    mampu
                                                                    untuk
                                                                    menyelesaikan
                                                                    masalah operasi nombor</td>
                                                                <td class="align-middle">
                                                                    <select class="form-control remove-error-on-input"
                                                                        name="matematik" id="matematik"
                                                                        aria-label="Default select example">
                                                                        <option selected value="">Sila Pilih Tahap
                                                                            Penguasaan</option>
                                                                        <option value="5-Cemerlang"
                                                                            {{ old('matematik') ?? $orphan->matematik == '5-Cemerlang' ? 'selected' : '' }}>
                                                                            5-Cemerlang
                                                                        </option>
                                                                        <option value="4-Baik"
                                                                            {{ old('matematik') ?? $orphan->matematik == '4-Baik' ? 'selected' : '' }}>
                                                                            4-Baik
                                                                        </option>
                                                                        <option value="3-Sederhana"
                                                                            {{ old('matematik') ?? $orphan->matematik == '3-Sederhana' ? 'selected' : '' }}>
                                                                            3-Sederhana
                                                                        </option>
                                                                        <option value="2-Memuaskan"
                                                                            {{ old('matematik') ?? $orphan->matematik == '2-Memuaskan' ? 'selected' : '' }}>
                                                                            2-Memuaskan
                                                                        </option>
                                                                        <option value="1-Lemah"
                                                                            {{ old('matematik') ?? $orphan->matematik == '1-Lemah' ? 'selected' : '' }}>
                                                                            1-Lemah
                                                                        </option>
                                                                        <option value="Tiada"
                                                                            {{ old('matematik') ?? $orphan->matematik == 'Tiada' ? 'selected' : '' }}>
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
                                                                    pendengaran, bau,
                                                                    rasa dan sentuh berdasarkan aktiviti persekitaran</td>
                                                                <td class="align-middle">
                                                                    <select class="form-control remove-error-on-input"
                                                                        name="deria" id="deria"
                                                                        aria-label="Default select example">
                                                                        <option selected value="">Sila Pilih Tahap
                                                                            Penguasaan</option>
                                                                        <option value="5-Cemerlang"
                                                                            {{ old('deria') ?? $orphan->deria == '5-Cemerlang' ? 'selected' : '' }}>
                                                                            5-Cemerlang
                                                                        </option>
                                                                        <option value="4-Baik"
                                                                            {{ old('deria') ?? $orphan->deria == '4-Baik' ? 'selected' : '' }}>
                                                                            4-Baik
                                                                        </option>
                                                                        <option value="3-Sederhana"
                                                                            {{ old('deria') ?? $orphan->deria == '3-Sederhana' ? 'selected' : '' }}>
                                                                            3-Sederhana
                                                                        </option>
                                                                        <option value="2-Memuaskan"
                                                                            {{ old('deria') ?? $orphan->deria == '2-Memuaskan' ? 'selected' : '' }}>
                                                                            2-Memuaskan
                                                                        </option>
                                                                        <option value="1-Lemah"
                                                                            {{ old('deria') ?? $orphan->deria == '1-Lemah' ? 'selected' : '' }}>
                                                                            1-Lemah
                                                                        </option>
                                                                        <option value="Tiada"
                                                                            {{ old('deria') ?? $orphan->deria == 'Tiada' ? 'selected' : '' }}>
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
                                                                <td class="align-middle">Berkebolehan untuk mengkoordinasi
                                                                    leher, kaki, tangan
                                                                    dan badan seperti berjalan, berlari, merangkak,
                                                                    mengeleng
                                                                    atau melompat</td>
                                                                <td class="align-middle">
                                                                    <select class="form-control remove-error-on-input"
                                                                        name="fizikal" id="fizikal"
                                                                        aria-label="Default select example">
                                                                        <option selected value="">Sila Pilih Tahap
                                                                            Penguasaan</option>
                                                                        <option value="5-Cemerlang"
                                                                            {{ old('fizikal') ?? $orphan->fizikal == '5-Cemerlang' ? 'selected' : '' }}>
                                                                            5-Cemerlang
                                                                        </option>
                                                                        <option value="4-Baik"
                                                                            {{ old('fizikal') ?? $orphan->fizikal == '4-Baik' ? 'selected' : '' }}>
                                                                            4-Baik
                                                                        </option>
                                                                        <option value="3-Sederhana"
                                                                            {{ old('fizikal') ?? $orphan->fizikal == '3-Sederhana' ? 'selected' : '' }}>
                                                                            3-Sederhana
                                                                        </option>
                                                                        <option value="2-Memuaskan"
                                                                            {{ old('fizikal') ?? $orphan->fizikal == '2-Memuaskan' ? 'selected' : '' }}>
                                                                            2-Memuaskan
                                                                        </option>
                                                                        <option value="1-Lemah"
                                                                            {{ old('fizikal') ?? $orphan->fizikal == '1-Lemah' ? 'selected' : '' }}>
                                                                            1-Lemah
                                                                        </option>
                                                                        <option value="Tiada"
                                                                            {{ old('fizikal') ?? $orphan->fizikal == 'Tiada' ? 'selected' : '' }}>
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
                                                                <td class="align-middle">Berkeupayaan untuk mencipta,
                                                                    mewujud
                                                                    atau menghasilkan
                                                                    sesuatu yang baru atau mengubah suai yang sedia ada
                                                                    untuk
                                                                    dijadikan inovasi
                                                                </td>
                                                                <td class="align-middle">
                                                                    <select class="form-control remove-error-on-input"
                                                                        name="kreativiti" id="kreativiti"
                                                                        aria-label="Default select example">
                                                                        <option selected value="">Sila Pilih Tahap
                                                                            Penguasaan</option>
                                                                        <option value="5-Cemerlang"
                                                                            {{ old('kreativiti') ?? $orphan->kreativiti == '5-Cemerlang' ? 'selected' : '' }}>
                                                                            5-Cemerlang
                                                                        </option>
                                                                        <option value="4-Baik"
                                                                            {{ old('kreativiti') ?? $orphan->kreativiti == '4-Baik' ? 'selected' : '' }}>
                                                                            4-Baik
                                                                        </option>
                                                                        <option value="3-Sederhana"
                                                                            {{ old('kreativiti') ?? $orphan->kreativiti == '3-Sederhana' ? 'selected' : '' }}>
                                                                            3-Sederhana
                                                                        </option>
                                                                        <option value="2-Memuaskan"
                                                                            {{ old('kreativiti') ?? $orphan->kreativiti == '2-Memuaskan' ? 'selected' : '' }}>
                                                                            2-Memuaskan
                                                                        </option>
                                                                        <option value="1-Lemah"
                                                                            {{ old('kreativiti') ?? $orphan->kreativiti == '1-Lemah' ? 'selected' : '' }}>
                                                                            1-Lemah
                                                                        </option>
                                                                        <option value="Tiada"
                                                                            {{ old('kreativiti') ?? $orphan->kreativiti == 'Tiada' ? 'selected' : '' }}>
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
                                        <div class="tab-pane fade" id="custom-tabs-one-messages" role="tabpanel"
                                            aria-labelledby="custom-tabs-one-messages-tab">
                                            <div class="row">
                                                <div class="col-md-6">

                                                    <div class="form-group">
                                                        <label for="nama_penuh_ayah">Nama Penuh Ayah<i
                                                                style="color: red">*</i></label>
                                                        <input type="text"
                                                            class="form-control remove-error-on-input @error('nama_penuh_ayah') is-invalid @enderror"
                                                            id="nama_penuh_ayah" name="nama_penuh_ayah"
                                                            value="{{ old('nama_penuh_ayah') ?? $orphan->nama_penuh_ayah }}">
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-md-6">

                                                            <div class="form-group">
                                                                <label for="no_kad_pengenalan_ayah">No. Kad Pengenalan
                                                                    Ayah<i style="color: red">*</i></label>
                                                                <input type="text"
                                                                    class="form-control remove-error-on-input @error('no_kad_pengenalan_ayah') is-invalid @enderror"
                                                                    id="no_kad_pengenalan_ayah"
                                                                    name="no_kad_pengenalan_ayah"
                                                                    value="{{ old('no_kad_pengenalan_ayah') ?? $orphan->no_kad_pengenalan_ayah }}">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">

                                                            <div class="form-group">
                                                                <label for="no_telefon_ayah">No. Telefon Ayah</label>
                                                                <input type="text"
                                                                    class="form-control remove-error-on-input @error('no_telefon_ayah') is-invalid @enderror"
                                                                    id="no_telefon_ayah" name="no_telefon_ayah"
                                                                    value="{{ old('no_telefon_ayah') ?? $orphan->no_telefon_ayah }}">
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
                                                                    value="{{ old('pekerjaan_ayah') ?? $orphan->pekerjaan_ayah }}">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">

                                                            <div class="form-group">
                                                                <label for="pendapatan_ayah">Pendapatan Ayah</label>
                                                                <input type="number" step="0.01"
                                                                    class="form-control remove-error-on-input @error('pendapatan_ayah') is-invalid @enderror"
                                                                    id="pendapatan_ayah" name="pendapatan_ayah"
                                                                    value="{{ old('pendapatan_ayah') ?? $orphan->pendapatan_ayah }}">
                                                            </div>

                                                        </div>


                                                    </div>
                                                </div>

                                                <div class="col-md-6">

                                                    <div class="form-group">
                                                        <label for="nama_penuh_ayah">Nama Penuh Ibu<i
                                                                style="color: red">*</i></label>
                                                        <input type="text"
                                                            class="form-control remove-error-on-input @error('nama_penuh_ibu') is-invalid @enderror"
                                                            id="nama_penuh_ibu" name="nama_penuh_ibu"
                                                            value="{{ old('nama_penuh_ibu') ?? $orphan->nama_penuh_ibu }}">
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-md-6">

                                                            <div class="form-group">
                                                                <label for="no_kad_pengenalan_ibu">No. Kad Pengenalan Ibu<i
                                                                        style="color: red">*</i></label>
                                                                <input type="text"
                                                                    class="form-control remove-error-on-input @error('no_kad_pengenalan_ibu') is-invalid @enderror"
                                                                    id="no_kad_pengenalan_ibu"
                                                                    name="no_kad_pengenalan_ibu"
                                                                    value="{{ old('no_kad_pengenalan_ibu') ?? $orphan->no_kad_pengenalan_ibu }}">
                                                                @error('no_kad_pengenalan_ibu')
                                                                    <div class="text-danger">{{ $message }}</div>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">

                                                            <div class="form-group">
                                                                <label for="no_telefon_ibu">No. Telefon Ibu</label>
                                                                <input type="text"
                                                                    class="form-control remove-error-on-input @error('no_telefon_ibu') is-invalid @enderror"
                                                                    id="no_telefon_ibu" name="no_telefon_ibu"
                                                                    value="{{ old('no_telefon_ibu') ?? $orphan->no_telefon_ibu }}">
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
                                                                    value="{{ old('pekerjaan_ibu') ?? $orphan->pekerjaan_ibu }}">
                                                            </div>


                                                        </div>
                                                        <div class="col-md-6">

                                                            <div class="form-group">
                                                                <label for="pendapatan_ayah">Pendapatan Ibu</label>
                                                                <input type="number" step="0.01"
                                                                    class="form-control remove-error-on-input @error('pendapatan_ibu') is-invalid @enderror"
                                                                    id="pendapatan_ibu" name="pendapatan_ibu"
                                                                    value="{{ old('pendapatan_ibu') ?? $orphan->pendapatan_ibu }}">
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

                                                    <div class="form-group">
                                                        <label for="exampleInputFile">Sijil Lahir Anak<i
                                                                style="color: red">*</i></label>
                                                        <div id="file_input">
                                                            <a href="{{ asset('assets/sijil_lahir/' . $orphan->sijil_lahir) }}"
                                                                class="btn-link text-secondary" target="_blank"><i
                                                                    class="far fa-fw fa-file-pdf"></i>{{ $orphan->sijil_lahir }}</a>
                                                        </div>
                                                        <div id="file_input">
                                                            <input type="file" name="sijil_lahir"
                                                                value="{{ old('sijil_lahir') }}"
                                                                class="form-control remove-error-on-input"
                                                                placeholder="Sila Pilih Sijil Lahir" id="sijil_lahir">
                                                        </div>

                                                    </div>
                                                </div>


                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="exampleInputFile">Sijil Kematian<i
                                                                style="color: red">*</i></label>
                                                        <div id="file_input">
                                                            <a href="{{ asset('assets/sijil_kematian/' . $orphan->sijil_kematian) }}"
                                                                class="btn-link text-secondary" target="_blank"><i
                                                                    class="far fa-fw fa-file-pdf"></i>{{ $orphan->sijil_kematian }}</a>
                                                        </div>
                                                        <div id="file_input">
                                                            <input type="file" name="sijil_kematian"
                                                                value="{{ old('sijil_kematian') }}"
                                                                class="form-control remove-error-on-input"
                                                                placeholder="Sila Pilih Sijil Kematian"
                                                                id="sijil_kematian">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
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
