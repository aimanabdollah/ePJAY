@extends('backend.layouts.app', ['title' => 'Anak Jagaan'])
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

                        <div class=""> <a href="{{ url('admin-orphan/orphan/report-orphan') }}"
                                class="btn btn-info m-2">
                                <i class="nav-icon fas fa-print"></i> Laporan
                            </a></div>

                        <div class=""> <a href="{{ url('admin-orphan/orphan/add-orphan') }}" class="btn btn-success">
                                <i class="nav-icon fas fa-plus-circle"></i> Tambah Anak Jagaan
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
                                        <th>ID Anak Jagaan</th>
                                        <th>Nama</th>
                                        {{-- <th>No. K/P</th> --}}
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
                                            {{-- <td class="align-middle">{{ $orphan->no_kad_pengenalan }}</td> --}}
                                            <td class="align-middle">{{ $orphan->jantina }}</td>
                                            @php
                                                // Assuming you have the following variables
                                                $currentYear = date('Y'); // Get the current year
                                                $tarikh_lahir = $orphan->tarikh_lahir; // Replace this with the birth date in 'YYYY-MM-DD' format
                                                
                                                // Calculate the age
                                                $yearOfBirth = (int) substr($tarikh_lahir, 0, 4);
                                                $age = $currentYear - $yearOfBirth;
                                            @endphp
                                            <td class="align-middle">{{ $age }} Tahun</td>
                                            {{-- <td class="align-middle">{{ $orphan->tarikh_daftar }}</td> --}}
                                            <td>
                                                <div class="d-flex justify-content-center align-items-center">
                                                    <a href="{{ url('admin-orphan/' . $orphan->id_anak_jagaan) }}"
                                                        class="btn btn-primary  m-1"> <i class="nav-icon fas fa-eye"></i>
                                                    </a>

                                                    <a href="{{ route('orphan.edit', ['orphan' => $orphan->id_anak_jagaan]) }}"
                                                        class="btn btn-warning  m-1"> <i
                                                            class="nav-icon fas fa-edit"></i></a>

                                                    <form action="{{ route('orphan.destroy', ['orphan' => $orphan->id]) }}"
                                                        method="POST" class="delete-form">
                                                        @method('DELETE')
                                                        @csrf
                                                        <button type="button" class="btn btn-danger ml-1"
                                                            onclick="confirmDelete(this)">
                                                            <i class="nav-icon fas fa-trash"></i>
                                                        </button>
                                                    </form>

                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                        <td colspan="6" class="text-center">Tiada rekod anak jagaan</td>
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
        function confirmDelete(deleteButton) {
            const form = deleteButton.closest('form.delete-form');
            if (form) {
                Swal.fire({
                    title: 'Hapus?',
                    html: 'Adakah anda pasti untuk menghapus rekod ini?', // Add your small text here
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'Ya',
                    cancelButtonText: 'Tidak',
                }).then((result) => {
                    if (result.isConfirmed) {
                        // If the user clicks "Yes," submit the form
                        form.submit();
                    }
                });
            } else {
                console.error('Delete form not found.');
            }
        }
    </script>
@endpush
