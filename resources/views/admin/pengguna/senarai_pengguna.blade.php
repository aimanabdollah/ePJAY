@extends('backend.layouts.app', ['title' => 'Pengguna'])

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
    {{-- <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                <h3>Konfigurasi</h3>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ url('admin-home') }}">Halaman Utama</a></li>
                    <li class="breadcrumb-item active">Konfigurasi</li>
                </ol>
            </div>
        </div>
    </div> --}}
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">

                <div class="card">
                    <div class="card-header d-flex align-items-center">
                        <div class="mr-auto">
                            <h5>Senarai Pengguna</h5>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Emel</th>
                                        <th>No Tel</th>
                                        {{-- <th>Gambar</th> --}}
                                        <th>Jenis Pengguna</th>
                                        <th>
                                            <center>Tindakan</center>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($user as $user)
                                        <tr>
                                            <td class="align-middle">{{ $loop->iteration }}</td>
                                            <td class="align-middle">{{ $user->name }}</td>
                                            <td class="align-middle">{{ $user->email }}</td>
                                            <td class="align-middle">{{ $user->no_tel }}</td>
                                            {{-- @php
                                            $logoPath = 'assets/profile-img/' . $user->gambar;
                                            $defaultImagePath = 'assets/no-img.jpg';

                                            if (!file_exists(public_path($logoPath)) || empty($user->gambar)) {
                                                $logoPath = $defaultImagePath;
                                            }
                                        @endphp
                                        <td> <img src="{{ asset($logoPath) }}" class="img-thumbnail" alt=""
                                                style="height: 140px"></td> --}}

                                            <td class="align-middle">
                                                @if ($user->role == 1)
                                                    Admin
                                                @elseif ($user->role == 2)
                                                    Staf
                                                @elseif ($user->role == 3)
                                                    Penjaga / Waris
                                                @endif
                                            </td>
                                            {{-- <td class="align-middle"> <img id="preview-image"
                                                src="{{ asset('assets/sistem/' . $user->logo_sistem) }}"
                                                class="img-thumbnail" alt="" style="height: 50px"></td> --}}
                                            <td>
                                                <center> <a href="{{ route('user.edit', ['user' => $user->id]) }}"
                                                        class="btn btn-warning  m-1"> <i class="nav-icon fas fa-edit"></i>
                                                    </a></center>
                                            </td>
                                        </tr>
                                    @empty
                                        <td colspan="7" class="text-center">Tiada rekod pengguna</td>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>



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
        // $(function() {
        //     $("#example1").DataTable({
        //         "responsive": true,
        //         "lengthChange": false,
        //         "autoWidth": false,
        //         "searching": true,
        //         "buttons": ["copy", "csv", "excel"]
        //     }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        // });
    </script>
@endpush
