@extends('layouts.staff-main', ['title' => 'Kewangan'])

@section('content-header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Kewangan</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ url('admin-home') }}">Halaman Utama</a></li>
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

                <!-- /.card-header -->
                <div class="card">
                    <div class="card-header d-flex align-items-center">
                        <div class="mr-auto">
                            <h5>Maklumat Perbelanjaan</h5>
                        </div>
                        <div class=""> <a href="{{ url('admin-expense') }}" class="btn btn-primary">
                                <i class="nav-icon fas fa-arrow-circle-left"></i> Kembali</a></div>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->


                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">

                                <div class="form-group">
                                    <label for="id">ID Transaksi</label>
                                    <div class="form-control">{{ $expense->id_trans_tbj }}</div>
                                </div>

                                <div class="form-group">
                                    <label for="kategori">Kategori</label>
                                    <div class="form-control">{{ $expense->kategori }}</div>
                                </div>

                                <div class="form-group">
                                    <label for="catatan">Catatan</label>
                                    <div class="form-control">{{ $expense->catatan }}</div>
                                </div>

                            </div>
                            <div class="col-md-6">


                                <div class="form-group">
                                    <label for="tarikh">Tarikh</label>
                                    <div class="form-control">{{ $expense->tarikh }}</div>
                                </div>

                                <div class="form-group">
                                    <label for="jumlah">Jumlah Perbelanjaan</label>
                                    <div class="input-group">
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                                RM
                                            </div>
                                        </div>
                                        <div class="form-control">{{ $expense->jumlah_tbj }}</div>
                                    </div>
                                </div>

                            </div>

                        </div>


                    </div>

                    <!-- /.card-body -->

                    {{-- <div class="card-footer d-flex justify-content-end">
                            <button type="submit" class="btn btn-success"> <i class="nav-icon fas fa-plus-circle"></i>
                                Tambah</button>
                        </div> --}}

                </div>
            </div>
            <!-- /.card-body -->

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
            bsCustomFileInput.init();
        });
    </script>
@endpush
