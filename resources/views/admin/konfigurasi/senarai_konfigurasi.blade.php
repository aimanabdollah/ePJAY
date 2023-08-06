@extends('backend.layouts.app', ['title' => 'Konfigurasi'])

@section('content-header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Konfigurasi</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ url('admin-home') }}">Halaman Utama</a></li>
                    <li class="breadcrumb-item active">Konfigurasi</li>
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
                            <h5>Konfigurasi Sistem</h5>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Nama Sistem</th>
                                        <th>Singkatan Sistem</th>
                                        <th>Logo Sistem</th>
                                        <th>
                                            <center>Tindakan</center>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($configuration as $config)
                                        <tr>
                                            <td class="align-middle">{{ $config->nama_sistem }}</td>
                                            <td class="align-middle">{{ $config->singkatan_sistem }}</td>
                                            @php
                                                $logoPath = 'assets/sistem/' . $config->logo_sistem;
                                                $defaultImagePath = 'assets/no-img.jpg';
                                                
                                                if (!file_exists(public_path($logoPath)) || empty($config->logo_sistem)) {
                                                    $logoPath = $defaultImagePath;
                                                }
                                            @endphp
                                            <td> <img src="{{ asset($logoPath) }}" class="img-thumbnail" alt=""
                                                    style="height: 50px"></td>
                                            <td>
                                                <center>
                                                    <a href="{{ route('configuration.editSys', ['configuration' => $config->id]) }}"
                                                        class="btn btn-warning  m-1">
                                                        <i class="nav-icon fas fa-edit"></i>
                                                    </a>
                                                </center>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="4" class="text-center">Tiada rekod konfigurasi</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>



                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->

                <div class="card">
                    <div class="card-header d-flex align-items-center">
                        <div class="mr-auto">
                            <h5>Konfigurasi Pusat Jagaan</h5>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">

                        <div class="table-responsive">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>

                                        <th>Nama Pusat Jagaan</th>
                                        <th>No Tel</th>
                                        <th>Emel</th>

                                        <th>
                                            <center>Tindakan</center>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($configuration as $configuration)
                                        <tr>
                                            <td class="align-middle">{{ $configuration->nama_pusat_jagaan }}</td>
                                            <td class="align-middle">{{ $configuration->no_tel }}</td>
                                            <td class="align-middle">{{ $configuration->emel }}</td>

                                            <td>
                                                <center> <a
                                                        href="{{ route('configuration.editOrg', ['configuration' => $configuration->id]) }}"
                                                        class="btn btn-warning  m-1"> <i class="nav-icon fas fa-edit"></i>
                                                    </a></center>
                                            </td>
                                        </tr>
                                    @empty
                                        <td colspan="7" class="text-center">Tiada rekod konfigurasi</td>
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
