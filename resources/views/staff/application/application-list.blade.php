@extends('layouts.staff-main', ['title'=>'Permohonan'])

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

                <div class="card">
                    <div class="card-header d-flex align-items-center">
                        <div class="mr-auto">
                            <h5>Senarai Permohonan</h5>
                        </div>
                        {{-- <div class="p-2"> <a href="{{ url('admin/orphan/add-orphan') }}"
                                class="btn btn-success">
                                <i class="nav-icon fas fa-plus-circle"></i> Tambah Anak
                                Jagaan</a></div> --}}
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>ID Permohonan</th>
                                    <th>Nama Pemohon</th>
                                    <th>No. Telefon</th>
                                    <th>Nama Anak Jagaan</th>
                                    <th>Tarikh Permohonan</th>
                                    <th>Status</th>
                                    <th>
                                        <center>Tindakan</center>
                                    </th>

                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1.</td>
                                    <td>PMH032134</td>
                                    <td>Muhammad Amri bin Yahya
                                    </td>
                                    <td>011-11111123
                                    </td>
                                    <td>Muhammad Akif Juhairi bin Amri
                                    </td>
                                    <td>28-02-2022</td>
                                    <td><span class="badge p-2 badge-pill badge-warning">Dalam Proses</span></td>
                                    <td>
                                        <center>
                                            <a href=" {{ url('admin/application/view-application') }}"
                                                class="btn-sm btn-primary p-2 m-1"> <i class="nav-icon fas fa-eye"></i>
                                                Papar</a>
                                        </center>
                                    </td>
                                </tr>




                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
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
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "searching": true,
                "buttons": ["copy", "csv", "excel", "pdf", "print"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        });
    </script>
@endpush
