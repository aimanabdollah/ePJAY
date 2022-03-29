@extends('layouts.staff-main', ['title'=>'Anak Jagaan'])

@section('content-header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Permohonan</h1>
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
                            <h5>Maklumat Permohonan</h5>
                        </div>
                        <div class="p-2"> <a href="{{ url('admin/application') }}" class="btn btn-primary">
                                <i class="nav-icon fas fa-arrow-circle-left"></i> Kembali</a></div>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form>

                        <div class="btn btn-flat col-12" style="background-color: #138496">
                            <div class="mr-auto" style="color: white">
                                <h6><b>Bahagian A: Maklumat Pemohon</b></h6>
                            </div>
                        </div>

                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">


                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">ID Permohonan</label>
                                                <input type="text" class="form-control" id="exampleInputEmail1"
                                                    placeholder="Masukkan No. Kad Pengenalan" disabled>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Tarikh Permohonan</label>
                                                <input type="number" min=1 step="1" class="form-control"
                                                    id="exampleInputPassword1" placeholder="Masukkan No. Telefon" disabled>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Email Pemohon</label>
                                                <input type="text" class="form-control" id="exampleInputEmail1"
                                                    placeholder="Masukkan Pekerjaan" disabled>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Pekerjaan Pemohon</label>
                                                <input type="number" min=1 step="0.01" class="form-control"
                                                    id="exampleInputPassword1" placeholder="Masukkan Pendapatan Bulanan"
                                                    disabled>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Nama Penuh Pemohon</label>
                                        <input type="text" class="form-control" id="exampleInputEmail1"
                                            placeholder="Masukkan Nama Penuh" disabled>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">No. Telefon Pemohon</label>
                                                <input type="text" class="form-control" id="exampleInputEmail1"
                                                    placeholder="Masukkan Tarikh Lahir" disabled>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Hubungan Pemohon dengan
                                                    Kanak-kanak</label>
                                                <input type="text" class="form-control" id="exampleInputPassword1"
                                                    placeholder="Masukkan No. Telefon" disabled>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
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
                                    </div>
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
                                        <label for="exampleInputEmail1">Nama Penuh</label>
                                        <input type="text" class="form-control" id="exampleInputEmail1"
                                            placeholder="Masukkan Nama Penuh" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Nama Sekolah</label>
                                        <input type="text" class="form-control" id="exampleInputPassword1"
                                            placeholder="Masukkan Nama Sekolah" disabled>
                                    </div>

                                    <div class="row">

                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Alamat Tempat Tinggal</label>
                                        <input type="text" class="form-control" id="exampleInputPassword1"
                                            placeholder="Masukkan Alamat" disabled>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input type="text" class="form-control" id="exampleInputEmail1"
                                                    placeholder="Poskod" disabled>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input type="text" class="form-control" id="exampleInputPassword1"
                                                    placeholder="Bandar" disabled>
                                            </div>
                                        </div>
                                        <div class="col-md-6" style="margin-bottom: 12pt">
                                            <select class="form-control" name=state aria-label="Default select example"
                                                disabled>
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
                                                    placeholder="Masukkan No. Kad Pengenalan" disabled>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">No. Telefon</label>
                                                <input type="text" class="form-control" id="exampleInputPassword1"
                                                    placeholder="Masukkan No. Telefon" disabled>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6" style="margin-bottom: 12pt">
                                            <label for="exampleInputEmail1">Jantina</label>
                                            <select class="form-control" name=state aria-label="Default select example"
                                                disabled>
                                                <option selected>Sila Pilih Jantina</option>
                                                <option value="Lelaki">Lelaki</option>
                                                <option value="Perempuan">Perempuan</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6" style="margin-bottom: 12pt">
                                            <label for="exampleInputEmail1">Status</label>
                                            <select class="form-control" name=state aria-label="Default select example"
                                                disabled>
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
                                                <label for="exampleInputEmail1">Tarikh Lahir</label>
                                                <input type="text" class="form-control" id="exampleInputEmail1"
                                                    placeholder="Masukkan Tarikh Lahir" disabled>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Umur</label>
                                                <input type="number" min=1 step="1" class="form-control"
                                                    id="exampleInputPassword1" placeholder="Masukkan Umur" disabled>
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
                                        <label for="exampleInputEmail1">Nama Penuh Ayah</label>
                                        <input type="text" class="form-control" id="exampleInputEmail1"
                                            placeholder="Masukkan Nama Penuh" disabled>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">No. Kad Pengenalan Ayah</label>
                                                <input type="text" class="form-control" id="exampleInputEmail1"
                                                    placeholder="Masukkan No. Kad Pengenalan" disabled>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">No. Tel Ayah</label>
                                                <input type="number" min=1 step="1" class="form-control"
                                                    id="exampleInputPassword1" placeholder="Masukkan No. Telefon" disabled>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Pekerjaan Ayah</label>
                                                <input type="text" class="form-control" id="exampleInputEmail1"
                                                    placeholder="Masukkan Pekerjaan" disabled>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Pendapatan Ayah</label>
                                                <input type="number" min=1 step="0.01" class="form-control"
                                                    id="exampleInputPassword1" placeholder="Masukkan Pendapatan Bulanan"
                                                    disabled>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Nama Penuh Ibu</label>
                                        <input type="text" class="form-control" id="exampleInputEmail1"
                                            placeholder="Masukkan Nama Penuh" disabled>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">No. Kad Pengenalan Ibu</label>
                                                <input type="text" class="form-control" id="exampleInputEmail1"
                                                    placeholder="Masukkan Tarikh Lahir" disabled>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">No. Tel Ibu</label>
                                                <input type="text" class="form-control" id="exampleInputPassword1"
                                                    placeholder="Masukkan No. Telefon" disabled>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Pekerjaan Ibu</label>
                                                <input type="text" class="form-control" id="exampleInputEmail1"
                                                    placeholder="Masukkan Pekerjaan" disabled>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Pendapatan Ibu</label>
                                                <input type="number" min=1 step="0.01" class="form-control"
                                                    id="exampleInputPassword1" placeholder="Masukkan Pendapatan Bulanan"
                                                    disabled>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                            </div>
                        </div>



                        <!-- /.card-body -->

                        <div class="card-footer d-flex justify-content-end">
                            <a href="{{ url('admin/application') }}" class="btn btn-primary p-2 m-2"> <i
                                    class="nav-icon fas fa-times-circle"></i>
                                Batal</a>
                            <button type="submit" class="btn btn-success p-2 m-2"> <i class="nav-icon fas fa-edit"></i>
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
