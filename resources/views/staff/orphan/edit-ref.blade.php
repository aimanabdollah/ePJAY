@extends('layouts.staff-main', ['title'=>'Anak Jagaan'])

@section('content-header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Anak Jagaan</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Blank Page</li>
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
                        <div class="p-2"> <a href="{{ url('admin/orphan') }}" class="btn btn-primary">
                                <i class="nav-icon fas fa-arrow-circle-left"></i> Kembali</a></div>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->

                    <form action="{{ route('orphan.update', ['orphan' => $orphan->id]) }}" method="POST">
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
                                        <label for="exampleInputEmail1">Nama Penuh</label>
                                        <input type="text" class="form-control" id="exampleInputEmail1"
                                            placeholder="Masukkan Nama Penuh">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Nama Sekolah</label>
                                        <input type="text" class="form-control" id="exampleInputPassword1"
                                            placeholder="Masukkan Nama Sekolah">
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Tarikh Lahir</label>
                                                <input type="text" class="form-control" id="exampleInputEmail1"
                                                    placeholder="Masukkan Tarikh Lahir">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Umur</label>
                                                <input type="number" min=1 step="1" class="form-control"
                                                    id="exampleInputPassword1" placeholder="Masukkan Umur">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Alamat Tempat Tinggal</label>
                                        <input type="text" class="form-control" id="exampleInputPassword1"
                                            placeholder="Masukkan Alamat">
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input type="text" class="form-control" id="exampleInputEmail1"
                                                    placeholder="Poskod">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input type="text" class="form-control" id="exampleInputPassword1"
                                                    placeholder="Bandar">
                                            </div>
                                        </div>
                                        <div class="col-md-6" style="margin-bottom: 12pt">
                                            <select class="form-control" name=state aria-label="Default select example">
                                                <option selected>Sila Pilih Negeri</option>
                                                <option value="W.P Kuala Lumpur">W.P Kuala Lumpur</option>
                                                <option value="W.P Labuan">W.P Labuan</option>
                                                <option value="W.P Putrajaya">W.P Putrajaya</option>
                                                <option value="Johor">Johor</option>
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
                                                <option value="Selangor">Selangor</option>
                                                <option value="Terengganu">Terengganu</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>


                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">No. Kad Pengenalan</label>
                                                <input type="text" class="form-control" id="exampleInputEmail1"
                                                    placeholder="Masukkan No. Kad Pengenalan">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">No. Telefon</label>
                                                <input type="text" class="form-control" id="exampleInputPassword1"
                                                    placeholder="Masukkan No. Telefon">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6" style="margin-bottom: 12pt">
                                            <label for="exampleInputEmail1">Jantina</label>
                                            <select class="form-control" name=state aria-label="Default select example">
                                                <option selected>Sila Pilih Jantina</option>
                                                <option value="Lelaki">Lelaki</option>
                                                <option value="Perempuan">Perempuan</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6" style="margin-bottom: 12pt">
                                            <label for="exampleInputEmail1">Status</label>
                                            <select class="form-control" name=state aria-label="Default select example">
                                                <option selected>Sila Pilih Status Anak Jagaan</option>
                                                <option value="Kehilangan Ibu">Kehilangan Ibu</option>
                                                <option value="Kehilangan Bapa">Kehilangan Ayah</option>
                                                <option value="Kehilangan Ibu dan Bapa">Kehilangan Ibu dan Ayah</option>
                                            </select>
                                        </div>
                                    </div>


                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Tarikh Daftar</label>
                                                <input type="text" class="form-control" id="exampleInputPassword1"
                                                    placeholder="Masukkan Tarikh Daftar">
                                            </div>

                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputFile">Gambar</label>
                                                <div class="input-group">
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input" id="exampleInputFile">
                                                        <label class="custom-file-label" for="exampleInputFile">Sila
                                                            Pilih
                                                            Gambar</label>
                                                    </div>
                                                    <div class="input-group-append">
                                                        <span class="input-group-text">Upload</span>
                                                    </div>
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

                        <div class="card-footer d-flex justify-content-end">
                            <button type="submit" class="btn btn-success"> <i class="nav-icon fas fa-edit"></i>
                                Kemaskini</button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- /.card-body -->

            <!-- /.card -->
        </div>


        <!-- /.col -->
    </div>
    <!-- /.row -->
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
