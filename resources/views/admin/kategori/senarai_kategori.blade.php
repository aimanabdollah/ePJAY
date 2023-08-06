@extends('backend.layouts.app', ['title' => 'Kewangan'])

@section('content-header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Kewangan</h1>
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
                    <li class="breadcrumb-item active">Kategori</li>
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
                            <h5>Senarai Kategori</h5>
                        </div>

                        {{-- <div class=""> <a href="{{ url('admin-category/category/preview') }}" id="previewIncome"
                                class="btn btn-info m-2">
                                <i class="nav-icon fas fa-print"></i> Laporan
                            </a></div> --}}

                        <div class=""> <a href="{{ url('admin-category/add-category') }}" class="btn btn-success">
                                <i class="nav-icon fas fa-plus-circle"></i> Tambah Kategori
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
                                        <th>Nama</th>
                                        <th>Jenis</th>
                                        <th>
                                            <center>Tindakan</center>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($category as $category)
                                        <tr>

                                            <td class="align-middle">{{ $loop->iteration }}</td>
                                            <td class="align-middle">{{ $category->nama }}</td>
                                            <td class="align-middle">{{ $category->jenis }}</td>
                                            <td>
                                                <div class="d-flex justify-content-center align-items-center">
                                                    {{-- <a href="{{ url('admin-category/' . $category->id) }}"
                                                        class="btn btn-primary  m-1"> <i class="nav-icon fas fa-eye"></i>
                                                    </a> --}}

                                                    <a href="{{ route('category.edit', ['category' => $category->id]) }}"
                                                        class="btn btn-warning  m-1"> <i
                                                            class="nav-icon fas fa-edit"></i></a>

                                                    <form
                                                        action="{{ route('category.destroy', ['category' => $category->id]) }}"
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
                                        <td colspan="5" class="text-center">Tiada rekod pendapatan</td>
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
