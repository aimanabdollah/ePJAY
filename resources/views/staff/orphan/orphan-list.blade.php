@extends('layouts.staff-main', ['title' => 'Anak Jagaan'])

@section('content-header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Anak Jagaan</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ url('admin-home') }}">Halaman Utama</a></li>
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

                <div class="card">
                    <div class="card-header d-flex align-items-center">
                        <div class="mr-auto">
                            <h5>Senarai Anak Jagaan</h5>
                        </div>
                        <div class=""> <a href="{{ url('admin-orphan/add-orphan') }}"
                                class="btn btn-success">
                                <i class="nav-icon fas fa-plus-circle"></i> Tambah Anak Jagaan
                            </a></div>
                        {{-- <div class=""> <a href="" class="btn btn-success">
                                <i class="nav-icon fas fa-plus-circle"></i> Tambah Anak Jagaan
                            </a></div> --}}

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
                                <button type="button" class="close" data-dismiss="alert"
                                    aria-hidden="true">×</button>
                                <h5><i class="icon fas fa-check"></i> Mesej!</h5>
                                {{ session()->get('message') }}
                            </div>
                        @endif
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>ID Anak Jagaan</th>
                                    <th>Nama</th>
                                    <th>No. K/P</th>
                                    <th>Jantina</th>
                                    <th>Umur</th>
                                    {{-- <th>Tarikh Daftar</th> --}}
                                    <th>
                                        <center>Tindakan</center>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($orphan as $orphan)
                                    <tr>

                                        <td class="align-middle">{{ $loop->iteration }}</td>
                                        <td class="align-middle">{{ $orphan->id_anak_jagaan }}</td>
                                        <td class="align-middle">{{ $orphan->nama_penuh }}</td>
                                        <td class="align-middle">{{ $orphan->no_kad_pengenalan }}</td>
                                        <td class="align-middle">{{ $orphan->jantina }}</td>
                                        <td class="align-middle">{{ $orphan->umur }} Tahun</td>
                                        {{-- <td class="align-middle">{{ $orphan->tarikh_daftar }}</td> --}}
                                        <td>
                                            <div class="d-flex justify-content-center align-items-center">
                                                <a href="{{ url('admin-orphan/' . $orphan->id) }}"
                                                    class="btn btn-primary  m-1"> <i class="nav-icon fas fa-eye"></i>
                                                </a>

                                                <a href="{{ route('orphan.edit', ['orphan' => $orphan->id]) }}"
                                                    class="btn btn-warning  m-1"> <i class="nav-icon fas fa-edit"></i></a>

                                                <form action="{{ route('orphan.destroy', ['orphan' => $orphan->id]) }}"
                                                    method="POST">
                                                    @method('DELETE')
                                                    @csrf
                                                    <button type="submit" class="btn btn-danger ml-1"
                                                        onclick="return confirm('Adakah anda pasti untuk menghapus rekod ini?')"><i
                                                            class="nav-icon fas fa-trash"></i></button>
                                                </form>

                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <td colspan="8" class="text-center">Tiada rekod anak jagaan</td>
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
