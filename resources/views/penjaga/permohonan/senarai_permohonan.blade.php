@extends('backend.layouts.app', ['title' => 'Permohonan'])

@section('content-header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Permohonan</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ url('user-home') }}">Halaman Utama</a></li>
                    <li class="breadcrumb-item active">Permohonan</li>
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

                        @if (session()->has('message'))
                            <div class="alert alert-success alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                <h5><i class="icon fas fa-check"></i> Berjaya!</h5>
                                {{ session()->get('message') }}
                            </div>
                        @endif

                        <div class="table-responsive">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>ID Permohonan</th>
                                        <th>Nama Anak Jagaan</th>
                                        <th>No. Kad Pengenalan</th>
                                        <th>Tarikh Permohonan</th>
                                        <th>Status</th>
                                        <th>
                                            <center>Tindakan</center>
                                        </th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($application as $application)
                                        @php
                                            $myvalue = $application->created_at;
                                            
                                            $datetime = new DateTime($myvalue);
                                            $date = $datetime->format('d-m-Y');
                                            $time = $datetime->format('H:i');
                                            
                                        @endphp
                                        <tr>
                                            <td class="align-middle">{{ $loop->iteration }}</td>
                                            <td class="align-middle"> <a
                                                    href="{{ url('application/' . $application->id) }}">{{ $application->id_permohonan }}</a>
                                            </td>
                                            <td class="align-middle">{{ $application->nama_penuh }}</td>
                                            <td class="align-middle">{{ $application->no_kad_pengenalan }}</td>
                                            <td class="align-middle">{{ $date }}</td>
                                            <td class="align-middle">
                                                <div class="d-flex justify-content-center align-items-center">
                                                    @if ($application->status_permohonan == 'Dalam Proses')
                                                        <span class="badge p-2 badge-pill badge-warning">Dalam Proses</span>
                                                    @elseif ($application->status_permohonan == 'Berjaya')
                                                        <span class="badge p-2 badge-pill badge-success">Berjaya</span>
                                                    @elseif ($application->status_permohonan == 'Tidak Berjaya')
                                                        <span class="badge p-2 badge-pill badge-danger">Tidak Berjaya</span>
                                                    @endif
                                                </div>
                                            </td>

                                            <td>
                                                <center>

                                                    <div class="d-flex justify-content-center align-items-center">
                                                        @if ($application->status_permohonan == 'Dalam Proses')
                                                            <a href="{{ url('application/' . $application->id) }}"
                                                                class="btn-sm btn-primary m-1"><i
                                                                    class="nav-icon fas fa-eye"></i>
                                                            </a>
                                                        @elseif ($application->status_permohonan == 'Berjaya')
                                                            <a href="{{ url('application/result/' . $application->id) }}"
                                                                class="btn-sm btn-primary m-1"><i class="fas fa-print"></i>
                                                            </a>
                                                        @elseif ($application->status_permohonan == 'Tidak Berjaya')
                                                            <a href="{{ url('application/result/' . $application->id) }}"
                                                                class="btn-sm btn-primary m-1"><i class="fas fa-print"></i>
                                                            </a>
                                                        @endif
                                                    </div>
                                                </center>
                                            </td>
                                        </tr>
                                    @empty
                                        <td colspan="7" class="text-center">Tiada rekod permohonan</td>
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
        //         "buttons": ["copy", "csv", "excel", "pdf", "print"]
        //     }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        // });
    </script>
@endpush
