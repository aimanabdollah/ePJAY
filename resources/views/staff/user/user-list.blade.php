@extends('layouts.staff-main', ['title' => 'Pengguna'])

@section('content-header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Pengguna</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ url('admin-home') }}">Halaman Utama</a></li>
                    <li class="breadcrumb-item active">Pengguna</li>
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
                            <h5>Senarai Pengguna</h5>
                        </div>
                        <div class=""> <a href="{{ url('admin-user/add-user') }}" class="btn btn-success">
                                <i class="nav-icon fas fa-plus-circle"></i> Tambah Pengguna
                            </a></div>




                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        @if (session()->has('message'))
                            {{-- <div class="alert alert-success alert-dismissible">
                                {{ session()->get('message') }} <button type="button" class="close"
                                    data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div> --}}


                            <div class="alert alert-success alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                <h5><i class="icon fas fa-check"></i> Mesej!</h5>
                                {{ session()->get('message') }}
                            </div>
                        @endif
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Nama</th>
                                    <th>Emel</th>
                                    <th>No. Telefon</th>
                                    <th>
                                        <center>Kategori</center>
                                    </th>

                                    <th>
                                        <center>Tindakan</center>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($user as $user)
                                    <tr>

                                        <td class="align-middle">{{ $loop->iteration }}.</td>
                                        <td class="align-middle">{{ $user->name }}</td>
                                        <td class="align-middle">{{ $user->email }}</td>
                                        <td class="align-middle">{{ $user->num_phone }}</td>
                                        <td class="align-middle">
                                            <div class="d-flex justify-content-center align-items-center">
                                                @if ($user->is_admin == 1)
                                                    Staff
                                                @elseif ($user->is_admin !== 1)
                                                    Penjaga
                                                @endif
                                            </div>
                                        </td>
                                        <td class="align-middle">
                                            <div class="d-flex justify-content-center align-items-center">


                                                <a href="{{ route('user.edit', ['user' => $user->id]) }}"
                                                    class="btn btn-warning  m-1"> <i class="nav-icon fas fa-edit"></i></a>


                                            </div>
                                        </td>


                                    </tr>
                                @empty
                                    <td colspan="6" class="text-center">Tiada rekod pengguna</td>
                                @endforelse
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
