@extends('layouts.staff-main', ['title' => 'Anak Jagaan'])

@section('content-header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Kewangan</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ url('admin-home') }}">Halaman Utama</a></li>
                    <li class="breadcrumb-item active">Pendapatan</li>
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
                            <h5>Senarai Pendapatan</h5>
                        </div>

                        <div class=""> <a href="{{ url('print-income') }}" class="btn btn-info m-2">
                                <i class="nav-icon fas fa-print"></i> Laporan
                            </a></div>

                        <div class=""> <a href="{{ url('admin-income/add-income') }}" class="btn btn-success">
                                <i class="nav-icon fas fa-plus-circle"></i> Tambah Pendapatan
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
                                    <th>ID Transaksi</th>
                                    <th>Kategori</th>
                                    <th>Catatan</th>
                                    <th>Jumlah Pendapatan</th>
                                    <th>Tarikh</th>
                                    <th>
                                        <center>Tindakan</center>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($income as $income)
                                    @php
                                        $myvalue = $income->tarikh;
                                        
                                        $datetime = new DateTime($myvalue);
                                        $date = $datetime->format('d-m-Y');
                                        $time = $datetime->format('H:i');
                                        
                                    @endphp
                                    <tr>

                                        <td class="align-middle">{{ $loop->iteration }}</td>
                                        <td class="align-middle">{{ $income->id_trans_tpn }}</td>
                                        <td class="align-middle">{{ $income->kategori }}</td>
                                        <td class="align-middle">{{ $income->catatan }}</td>
                                        <td class="align-middle">RM {{ $income->jumlah_tpn }}</td>
                                        <td class="align-middle">{{ $date }}</td>
                                        <td>
                                            <div class="d-flex justify-content-center align-items-center">
                                                <a href="{{ url('admin-income/' . $income->id) }}"
                                                    class="btn btn-primary  m-1"> <i class="nav-icon fas fa-eye"></i>
                                                </a>

                                                <a href="{{ route('income.edit', ['income' => $income->id]) }}"
                                                    class="btn btn-warning  m-1"> <i class="nav-icon fas fa-edit"></i></a>

                                                <form action="{{ route('income.destroy', ['income' => $income->id]) }}"
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
                                    <td colspan="7" class="text-center">Tiada rekod pendapatan</td>
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
                "buttons": ["copy", "csv", "excel"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        });
    </script>
@endpush
