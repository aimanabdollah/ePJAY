@extends('backend.layouts.app', ['title' => 'Permohonan'])


@section('content-header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Permohonan</h1>
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

                        <div class=""> <a href="{{ url('admin-application/report-application') }}"
                                class="btn btn-info m-2">
                                <i class="nav-icon fas fa-print"></i> Laporan
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
                        <div class="table-responsive">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>ID Permohonan</th>
                                        <th>Nama Pemohon</th>
                                        <th>No. Telefon</th>
                                        {{-- <th>Nama Anak Jagaan</th> --}}
                                        <th>
                                            <center>
                                                Tarikh Permohonan</center>
                                        </th>
                                        <th>
                                            <center>Status Permohonan</center>
                                        </th>
                                        <th>
                                            <center>Tindakan</center>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($applications as $application)
                                        @php
                                            $myvalue = $application->created_at;

                                            $datetime = new DateTime($myvalue);
                                            $date = $datetime->format('d-m-Y');
                                            $time = $datetime->format('H:i');

                                        @endphp
                                        <tr>

                                            <td class="align-middle">{{ $loop->iteration }}</td>
                                            <td class="align-middle">{{ $application->id_permohonan }}</td>
                                            <td class="align-middle">{{ $application->nama_penuh_pemohon }}</td>
                                            <td class="align-middle">{{ $application->no_tel_pemohon }}</td>
                                            {{-- <td class="align-middle">{{ $application->nama_penuh }}</td> --}}
                                            <td class="align-middle">
                                                <div class="d-flex justify-content-center align-items-center">
                                                    {{ $date }}
                                                </div>
                                            </td>
                                            {{-- <td><span
                                                class="badge p-2 badge-pill badge-warning">{{ $application->status_permohonan }}</span>
                                        </td> --}}
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
                                                <div class="d-flex justify-content-center align-items-center">
                                                    {{-- <a href="{{ url('admin/application/' . $application->id) }}"
                                                    class="btn btn-info  m-1"> <i class="nav-icon fas fa-edit"></i>
                                                </a> --}}

                                                    {{-- <a href="{{ route('application.edit', ['application' => $application->id_permohonan]) }}"
                                                        class="btn btn-info  m-1"> <i class="nav-icon fas fa-edit"></i></a> --}}

                                                    <a href="{{ url('application/' . $application->id) }}"
                                                        class="btn-sm btn-primary m-1"><i class="nav-icon fas fa-eye"></i>
                                                    </a>

                                                    {{-- <a href="" class="btn btn-info  m-1"><i
                                                        class="nav-icon fas fa-edit"></i></a> --}}
                                                </div>
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
        //         "buttons": ["copy", "csv", "excel"]
        //     }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        // });
    </script>
@endpush
