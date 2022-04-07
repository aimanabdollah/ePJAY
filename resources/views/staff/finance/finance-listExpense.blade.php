@extends('layouts.staff-main', ['title'=>'Anak Jagaan'])

@section('content-header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Kewangan</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ url('admin/home') }}">Halaman Utama</a></li>
                    <li class="breadcrumb-item active">Perbelanjaan</li>
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
                            <h5>Senarai Perbelanjaan</h5>
                        </div>
                        <div class=""> <a href="{{ url('admin/expense/add-expense') }}"
                                class="btn btn-success">
                                <i class="nav-icon fas fa-plus-circle"></i> Tambah Perbelanjaan
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
                                @forelse ($expense as $expense)
                                    <tr>

                                        <td class="align-middle">{{ $loop->iteration }}</td>
                                        <td class="align-middle">{{ $expense->id_trans_tbj }}</td>
                                        <td class="align-middle">{{ $expense->kategori }}</td>
                                        <td class="align-middle">{{ $expense->catatan }}</td>
                                        <td class="align-middle">RM {{ $expense->jumlah_tbj }}</td>
                                        <td class="align-middle">{{ $expense->tarikh }}</td>
                                        <td>
                                            <div class="d-flex justify-content-center align-items-center">
                                                <a href="{{ url('admin/expense/' . $expense->id) }}"
                                                    class="btn btn-primary  m-1"> <i class="nav-icon fas fa-eye"></i>
                                                </a>

                                                <a href="{{ route('expense.edit', ['expense' => $expense->id]) }}"
                                                    class="btn btn-warning  m-1"> <i class="nav-icon fas fa-edit"></i></a>

                                                <form
                                                    action="{{ route('expense.destroy', ['expense' => $expense->id]) }}"
                                                    method="POST">
                                                    @method('DELETE')
                                                    @csrf
                                                    <button type="submit" class="btn btn-danger ml-1"
                                                        onclick="return confirm('Are you sure to delete this?')"><i
                                                            class="nav-icon fas fa-trash"></i></button>
                                                </form>

                                            </div>




                                        </td>
                                    </tr>
                                @empty
                                    <td colspan="7" class="text-center">Tiada rekod perbelanjaan</td>
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
