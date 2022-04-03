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
                            <h5>Edit Anak Jagaan</h5>
                        </div>
                        <div class=""> <a href="{{ url('admin/orphan') }}" class="btn btn-primary">
                                <i class="nav-icon fas fa-arrow-circle-left"></i> Kembali</a></div>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->

                    <form action="{{ route('orphan.update', ['orphan' => $orphan->id]) }}" enctype="multipart/form-data"
                        method="POST">
                        @method('PATCH')
                        @csrf

                        <div class="btn btn-flat col-12" style="background-color: #138496">
                            <div class="mr-auto" style="color: white">
                                <h6><b>Bahagian A: Maklumat Kanak-Kanak</b></h6>
                            </div>
                        </div>

                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">

                                    <div class="form-group">
                                        <label for="nama_penuh">Nama Penuh</label>
                                        <input type="text" class="form-control @error('nama_penuh') is-invalid @enderror"
                                            id="nama_penuh" name="nama_penuh"
                                            value="{{ old('nama_penuh') ?? $orphan->nama_penuh }}"
                                            placeholder="Masukkan Nama Penuh">
                                        @error('nama_penuh')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="nama_sekolah">Nama Sekolah</label>
                                        <input type="text" class="form-control @error('nama_sekolah') is-invalid @enderror"
                                            id="nama_sekolah" name="nama_sekolah"
                                            value="{{ old('nama_sekolah') ?? $orphan->nama_sekolah }}"
                                            placeholder="Masukkan Nama Sekolah">
                                        @error('nama_sekolah')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">

                                            <div class="form-group">
                                                <label for="tarikh_lahir">Tarikh Lahir</label>
                                                <input type="date"
                                                    class="form-control @error('tarikh_lahir') is-invalid @enderror"
                                                    id="tarikh_lahir" name="tarikh_lahir"
                                                    value="{{ old('tarikh_lahir') ?? $orphan->tarikh_lahir }}"
                                                    placeholder="Masukkan Tarikh Lahir">
                                                @error('tarikh_lahir')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="umur">Umur</label>
                                                <input type="number" step="1"
                                                    class="form-control @error('umur') is-invalid @enderror" id="umur"
                                                    name="umur" value="{{ old('umur') ?? $orphan->umur }}"
                                                    placeholder="Masukkan Umur">
                                                @error('umur')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                    </div>

                                    <div class="form-group">
                                        <label for="alamat">Alamat Tempat Tinggal</label>
                                        <input type="text" class="form-control @error('alamat') is-invalid @enderror"
                                            id="alamat" name="alamat" value="{{ old('alamat') ?? $orphan->alamat }}"
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
                                                    name="poskod" value="{{ old('poskod') ?? $orphan->poskod }}"
                                                    placeholder="Poskod">
                                                @error('poskod')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>

                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input type="text"
                                                    class="form-control @error('bandar') is-invalid @enderror" id="bandar"
                                                    name="bandar" value="{{ old('bandar') ?? $orphan->bandar }}"
                                                    placeholder="Bandar">
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
                                                    {{ old('negeri') ?? $orphan->negeri == 'W.P Kuala Lumpur' ? 'selected' : '' }}>
                                                    W.P Kuala Lumpur</option>
                                                <option value="W.P Labuan"
                                                    {{ old('negeri') ?? $orphan->negeri == 'W.P Labuan' ? 'selected' : '' }}>
                                                    W.P Labuan</option>
                                                <option value="W.P Putrajaya"
                                                    {{ old('negeri') ?? $orphan->negeri == 'W.P Putrajaya' ? 'selected' : '' }}>
                                                    W.P Putrajaya</option>

                                                {{-- <option value="Johor">Johor</option>
                                                <option value="Kedah">Kedah</option>
                                                <option value="Kelantan">Kelantan</option>
                                                <option value="Melaka">Melaka</option>

                                                <option value="Negeri Sembilan">Negeri Sembilan</option>
                                                <option value="Pahang">Pahang</option>
                                                <option value="Perak">Perak</option>
                                                <option value="Perlis">Perlis</option>

                                                <option value="Pulau Pinang">Pulau Pinang</option>
                                                <option value="Sabah">Sabah</option>
                                                <option value="Sarawak">Sarawak</option>
                                                <option value="Selangor">Selangor</option> --}}


                                                <option value="Terengganu"
                                                    {{ old('negeri') ?? $orphan->negeri == 'Terengganu' ? 'selected' : '' }}>
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
                                                <label for="no_kad_pengenalan">No. Kad Pengenalan</label>
                                                <input type="text"
                                                    class="form-control @error('no_kad_pengenalan') is-invalid @enderror"
                                                    id="no_kad_pengenalan" name="no_kad_pengenalan"
                                                    value="{{ old('no_kad_pengenalan') ?? $orphan->no_kad_pengenalan }}"
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
                                                    id="no_telefon" name="no_telefon"
                                                    value="{{ old('no_telefon') ?? $orphan->no_telefon }}"
                                                    placeholder="Masukkan No Telefon">
                                                @error('no_telefon')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">


                                        <div class="col-md-6" style="margin-bottom: 12pt">
                                            <label for="exampleInputEmail1">Jantina</label>
                                            <select class="form-control" name="jantina" id="jantina"
                                                aria-label="Default select example">
                                                <option selected>Sila Pilih Jantina</option>
                                                <option value="Lelaki"
                                                    {{ old('jantina') ?? $orphan->jantina == 'Lelaki' ? 'selected' : '' }}>
                                                    Lelaki
                                                </option>
                                                <option value="Perempuan"
                                                    {{ old('jantina') ?? $orphan->jantina == 'Perempuan' ? 'selected' : '' }}>
                                                    Perempuan
                                                </option>
                                            </select>
                                            @error('jantina')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>


                                        <div class="col-md-6" style="margin-bottom: 12pt">
                                            <label for="exampleInputEmail1">Status</label>
                                            <select class="form-control" name="status" id="status"
                                                aria-label="Default select example">
                                                <option selected>Sila Pilih Status</option>
                                                <option value="Kehilangan Ibu"
                                                    {{ old('status') ?? $orphan->status == 'Kehilangan Ibu' ? 'selected' : '' }}>
                                                    Kehilangan Ibu
                                                </option>
                                                <option value="Kehilangan Ayah"
                                                    {{ old('status') ?? $orphan->status == 'Kehilangan Ayah' ? 'selected' : '' }}>
                                                    Kehilangan Ayah
                                                </option>
                                                <option value="Kehilangan Ibu dan Ayah"
                                                    {{ old('status') ?? $orphan->status == 'Kehilangan Ibu dan Ayah' ? 'selected' : '' }}>
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
                                            <div class="form-group">
                                                <label for="tarikh_daftar">Tarikh Daftar</label>
                                                <input type="date"
                                                    class="form-control @error('tarikh_daftar') is-invalid @enderror"
                                                    id="tarikh_daftar" name="tarikh_daftar"
                                                    value="{{ old('tarikh_daftar') ?? $orphan->tarikh_daftar }}"
                                                    placeholder="Masukkan Tarikh Daftar">
                                                @error('tarikh_daftar')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>

                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="tarikh_keluar">Tarikh Keluar</label>
                                                <input type="date"
                                                    class="form-control @error('tarikh_keluar') is-invalid @enderror"
                                                    id="tarikh_keluar" name="tarikh_keluar"
                                                    value="{{ old('tarikh_keluar') ?? $orphan->tarikh_keluar }}"
                                                    placeholder="Masukkan Tarikh Keluar">
                                                @error('tarikh_keluar')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>

                                        </div>


                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="gambar">Gambar</label>
                                                <div>
                                                    <img id="preview-image"
                                                        src="{{ asset('assets/orphan-img/' . $orphan->gambar) }}"
                                                        class="img-thumbnail" alt="" style="max-height: 250px">
                                                </div>

                                            </div>

                                        </div>

                                        <div class="col-md-6">

                                            <div class="form-group">
                                                <label for="gambar" style="color: white">Gambar</label>
                                                <input type="file" name="gambar" id="gambar" class="form-control"
                                                    placeholder="Sila Pilih Gambar">
                                                @error('gambar')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
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
                                        <label for="nama_penuh_ayah">Nama Penuh Ayah</label>
                                        <input type="text"
                                            class="form-control @error('nama_penuh_ayah') is-invalid @enderror"
                                            id="nama_penuh_ayah" name="nama_penuh_ayah"
                                            value="{{ old('nama_penuh_ayah') ?? $orphan->nama_penuh_ayah }}">
                                        @error('nama_penuh_ayah')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">

                                            <div class="form-group">
                                                <label for="no_kad_pengenalan_ayah">No. Kad Pengenalan Ayah</label>
                                                <input type="text"
                                                    class="form-control @error('no_kad_pengenalan_ayah') is-invalid @enderror"
                                                    id="no_kad_pengenalan_ayah" name="no_kad_pengenalan_ayah"
                                                    value="{{ old('no_kad_pengenalan_ayah') ?? $orphan->no_kad_pengenalan_ayah }}">
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
                                                    value="{{ old('no_telefon_ayah') ?? $orphan->no_telefon_ayah }}">
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
                                                    value="{{ old('pekerjaan_ayah') ?? $orphan->pekerjaan_ayah }}">
                                                @error('pekerjaan_ayah')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>


                                        </div>
                                        <div class="col-md-6">

                                            <div class="form-group">
                                                <label for="pendapatan_ayah">Pendapatan Ayah</label>
                                                <input type="number" step="0.01"
                                                    class="form-control @error('pendapatan_ayah') is-invalid @enderror"
                                                    id="pendapatan_ayah" name="pendapatan_ayah"
                                                    value="{{ old('pendapatan_ayah') ?? $orphan->pendapatan_ayah }}">
                                                @error('pendapatan_ayah')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>

                                        </div>


                                    </div>
                                </div>

                                <div class="col-md-6">

                                    <div class="form-group">
                                        <label for="nama_penuh_ayah">Nama Penuh Ibu</label>
                                        <input type="text"
                                            class="form-control @error('nama_penuh_ibu') is-invalid @enderror"
                                            id="nama_penuh_ibu" name="nama_penuh_ibu"
                                            value="{{ old('nama_penuh_ibu') ?? $orphan->nama_penuh_ibu }}">
                                        @error('nama_penuh_ibu')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">

                                            <div class="form-group">
                                                <label for="no_kad_pengenalan_ibu">No. Kad Pengenalan Ibu</label>
                                                <input type="text"
                                                    class="form-control @error('no_kad_pengenalan_ibu') is-invalid @enderror"
                                                    id="no_kad_pengenalan_ibu" name="no_kad_pengenalan_ibu"
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
                                                    class="form-control @error('no_telefon_ibu') is-invalid @enderror"
                                                    id="no_telefon_ibu" name="no_telefon_ibu"
                                                    value="{{ old('no_telefon_ibu') ?? $orphan->no_telefon_ibu }}">
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
                                                    value="{{ old('pekerjaan_ibu') ?? $orphan->pekerjaan_ibu }}">
                                                @error('pekerjaan_ibu')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>


                                        </div>
                                        <div class="col-md-6">

                                            <div class="form-group">
                                                <label for="pendapatan_ayah">Pendapatan Ibu</label>
                                                <input type="number" step="0.01"
                                                    class="form-control @error('pendapatan_ibu') is-invalid @enderror"
                                                    id="pendapatan_ibu" name="pendapatan_ibu"
                                                    value="{{ old('pendapatan_ibu') ?? $orphan->pendapatan_ibu }}">
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
                                        <label for="exampleInputFile">Sijil Lahir Anak</label>
                                        <div id="file_input">
                                            <a href="{{ asset('assets/sijil_lahir/' . $orphan->sijil_lahir) }}"
                                                class="btn-link text-secondary"><i
                                                    class="far fa-fw fa-file-pdf"></i>{{ $orphan->sijil_lahir }}</a>
                                        </div>
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
                                        <label for="exampleInputFile">Sijil Kematian</label>
                                        <div id="file_input">
                                            <a href="{{ asset('assets/sijil_kematian/' . $orphan->sijil_kematian) }}"
                                                class="btn-link text-secondary"><i
                                                    class="far fa-fw fa-file-pdf"></i>{{ $orphan->sijil_kematian }}</a>
                                        </div>
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
