@extends('layouts.staff-main', ['title'=>'Kewangan'])

@section('content-header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Maklumat Kewangan</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item active"><a href="home">Dashboard</a></li>
                    <li class="breadcrumb-item">Kewangan</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
@endsection


@section('content')
    <div class="container-fluid">
        <div class="row">

            <div class="col-12 col-sm-12">
                <div class="card card-primary card-tabs">
                    <div class="card-header p-0 pt-1" style="background-color: #138496">
                        <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="custom-tabs-one-home-tab" data-toggle="pill"
                                    href="#custom-tabs-one-home" role="tab" aria-controls="custom-tabs-one-home"
                                    aria-selected="true">
                                    <h6>Bahagian A: Maklumat Pendapatan</h6>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="custom-tabs-one-profile-tab" data-toggle="pill"
                                    href="#custom-tabs-one-profile" role="tab" aria-controls="custom-tabs-one-profile"
                                    aria-selected="false">
                                    <h6>Bahagian B: Maklumat Perbelanjaan</h6>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="card-body">
                        <div class="tab-content" id="custom-tabs-one-tabContent">
                            <div class="tab-pane fade active show" id="custom-tabs-one-home" role="tabpanel"
                                aria-labelledby="custom-tabs-one-home-tab">

                                <div class="card-header d-flex align-items-center">
                                    <div class="mr-auto">
                                        <h5>Senarai Pendapatan</h5>
                                    </div>
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-success" data-toggle="modal"
                                        data-target="#exampleModal"> <i class="nav-icon fas fa-plus-circle"></i>
                                        Tambah Pendapatan
                                    </button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Tambah Pendapatan</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <form action="">
                                                    <div class=" modal-body">


                                                        <div class="" style="margin-bottom: 12pt">
                                                            <label for="exampleInputEmail1">Kategori</label>
                                                            <select class="form-control" name=state
                                                                aria-label="Default select example">
                                                                <option selected>Sila Pilih Kategori</option>
                                                                <option value="Lelaki">Lelaki</option>
                                                                <option value="Perempuan">Perempuan</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="exampleInputPassword1">Catatan</label>
                                                            <input type="text" class="form-control"
                                                                id="exampleInputEmail1" placeholder="Masukkan Catatan">
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="exampleInputPassword1">Tarikh</label>
                                                            <input type="text" class="form-control"
                                                                id="exampleInputEmail1" placeholder="Masukkan Tarikh">
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="exampleInputPassword1">Jumlah Perbelanjaan</label>
                                                            <input type="number" min="0.00" step="0.01"
                                                                class="form-control" id="exampleInputEmail1"
                                                                placeholder="Masukkan Jumlah Perbelanjaan">
                                                        </div>

                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">Tutup</button>
                                                        <button type="button" class="btn btn-success"> Simpan</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                                <div class="card-body">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>No.</th>
                                                <th>ID Transaksi</th>
                                                <th>Kategori</th>
                                                <th>Catatan</th>
                                                <th>Jumlah Pendapatan</th>
                                                <th>Tarikh</th>
                                                <th>
                                                    <center>Tindakan</center>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>1.</td>
                                                <td>KEP311234
                                                </td>
                                                <td>Utiliti</td>
                                                <td>Derma</td>
                                                <td>RM 1300</td>
                                                <td>23-01-2022</td>
                                                <td>
                                                    <center>
                                                        <a href="{{ url('admin/orphan/view-orphan') }}"
                                                            class="btn-sm btn-primary p-2 m-1"> <i
                                                                class="nav-icon fas fa-eye"></i>
                                                            Papar</a>
                                                        <a href="{{ url('admin/orphan/edit-orphan') }}"
                                                            class="btn-sm btn-warning p-2 m-1"> <i
                                                                class="nav-icon fas fa-edit"></i>
                                                            Edit</a>
                                                        <a href="" class="btn-sm btn-danger p-2 m-1"> <i
                                                                class="nav-icon fas fa-trash"></i>
                                                            Hapus</a>
                                                    </center>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td>1.</td>
                                                <td>KEP311234
                                                </td>
                                                <td>Bank</td>
                                                <td>Derma</td>
                                                <td>RM 1300</td>
                                                <td>23-01-2022</td>
                                                <td>
                                                    <center>
                                                        <a href="{{ url('admin/orphan/view-orphan') }}"
                                                            class="btn-sm btn-primary p-2 m-1"> <i
                                                                class="nav-icon fas fa-eye"></i>
                                                            Papar</a>
                                                        <a href="{{ url('admin/orphan/edit-orphan') }}"
                                                            class="btn-sm btn-warning p-2 m-1"> <i
                                                                class="nav-icon fas fa-edit"></i>
                                                            Edit</a>
                                                        <a href="" class="btn-sm btn-danger p-2 m-1"> <i
                                                                class="nav-icon fas fa-trash"></i>
                                                            Hapus</a>
                                                    </center>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>




                            </div>
                            <div class="tab-pane fade" id="custom-tabs-one-profile" role="tabpanel"
                                aria-labelledby="custom-tabs-one-profile-tab">

                                <div class="card-header d-flex align-items-center">
                                    <div class="mr-auto">
                                        <h5>Senarai Perbelanjaan</h5>
                                    </div>

                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-success" data-toggle="modal"
                                        data-target="#exampleModal"> <i class="nav-icon fas fa-plus-circle"></i>
                                        Tambah Perbelanjaan
                                    </button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel2">Tambah Perbelanjaan
                                                    </h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <form action="">
                                                    <div class=" modal-body">


                                                        <div class="" style="margin-bottom: 12pt">
                                                            <label for="exampleInputEmail1">Kategori</label>
                                                            <select class="form-control" name=state
                                                                aria-label="Default select example">
                                                                <option selected>Sila Pilih Kategori</option>
                                                                <option value="Lelaki">Lelaki</option>
                                                                <option value="Perempuan">Perempuan</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="exampleInputPassword1">Catatan</label>
                                                            <input type="text" class="form-control"
                                                                id="exampleInputEmail1" placeholder="Masukkan Catatan">
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="exampleInputPassword1">Tarikh</label>
                                                            <input type="text" class="form-control"
                                                                id="exampleInputEmail1" placeholder="Masukkan Tarikh">
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="exampleInputPassword1">Jumlah Perbelanjaan</label>
                                                            <input type="number" min="0.00" step="0.01"
                                                                class="form-control" id="exampleInputEmail1"
                                                                placeholder="Masukkan Jumlah Perbelanjaan">
                                                        </div>

                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">Tutup</button>
                                                        <button type="button" class="btn btn-success"> Simpan</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>



                                </div>

                                <div class="card-body">
                                    <table id="example2" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>No.</th>
                                                <th>ID Transaksi</th>
                                                <th>Kategori</th>
                                                <th>Catatan</th>
                                                <th>Jumlah Perbelanjaan</th>
                                                <th>Tarikh</th>
                                                <th>
                                                    <center>Tindakan</center>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>1.</td>
                                                <td>KEB321234
                                                </td>
                                                <td>Utiliti</td>
                                                <td>Sewaan Rumah</td>
                                                <td>RM 2300</td>
                                                <td>23-01-2022</td>
                                                <td>
                                                    <center>


                                                        <a href="{{ url('admin/orphan/edit-orphan') }}"
                                                            class="btn-sm btn-warning p-2 m-1"> <i
                                                                class="nav-icon fas fa-edit"></i>
                                                            Edit</a>
                                                        <a href="" class="btn-sm btn-danger p-2 m-1"> <i
                                                                class="nav-icon fas fa-trash"></i>
                                                            Hapus</a>
                                                    </center>
                                                </td>
                                            </tr>







                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- /.card -->
                </div>
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>





    <!-- /.card -->
@endsection

@push('js')
    <script>
        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "searching": true,
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');

            $("#example2").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "searching": true,
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        });
    </script>
@endpush
