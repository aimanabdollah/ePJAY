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
                            <h5>Edit Perbelanjaan</h5>
                        </div>
                        <div class=""> <a href="{{ url('admin-expense') }}" class="btn btn-primary">
                                <i class="nav-icon fas fa-arrow-circle-left"></i> Kembali</a></div>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="{{ route('expense.update', ['expense' => $expense->id]) }}" method="POST">
                        @method('PATCH')
                        @csrf


                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">

                                    <div class="form-group">
                                        <label for="id">ID Transaksi</label>
                                        <div class="form-control">{{ $expense->id_trans_tbj }}</div>
                                    </div>

                                    {{-- <div class="form-group">
                                        <label for="kategori">Kategori</label>
                                        <div class="form-control">{{ $expense->category_tbj }}</div>
                                    </div> --}}

                                    <div class="form-group">
                                        <label for="kategori">Kategori</label>
                                        <select class="form-control" name="kategori" id="kategori">
                                            <option>Sila Pilih Kategori</option>
                                            <option value="Sewaan Kediaman"
                                                {{ (old('kategori') ?? $expense->kategori) == 'Sewaan Kediaman' ? 'selected' : '' }}>
                                                Sewaan Kediaman
                                            </option>
                                            <option value="Pengangkutan"
                                                {{ (old('kategori') ?? $expense->kategori) == 'Pengangkutan' ? 'selected' : '' }}>
                                                Pengangkutan
                                            </option>
                                            <option value="Kesihatan"
                                                {{ (old('kategori') ?? $expense->kategori) == 'Kesihatan' ? 'selected' : '' }}>
                                                Kesihatan
                                            </option>
                                            <option value="Makanan dan minuman"
                                                {{ (old('kategori') ?? $expense->kategori) == 'Makanan dan minuman' ? 'selected' : '' }}>
                                                Makanan dan minuman
                                            </option>
                                            <option value="Utiliti"
                                                {{ (old('kategori') ?? $expense->kategori) == 'Utiliti' ? 'selected' : '' }}>
                                                Utiliti
                                            </option>
                                        </select>
                                        @error('kategori')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>




                                    <div class="form-group">
                                        <label for="catatan">Catatan</label>
                                        <input type="text" class="form-control @error('catatan') is-invalid @enderror"
                                            id="catatan" name="catatan"
                                            value="{{ old('catatan') ?? $expense->catatan }}">
                                        @error('catatan')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                </div>
                                <div class="col-md-6">


                                    <div class="form-group">
                                        <label for="tarikh">Tarikh</label>
                                        <input type="date" class="form-control @error('tarikh') is-invalid @enderror"
                                            id="tarikh" name="tarikh" value="{{ old('tarikh') ?? $expense->tarikh }}">
                                        @error('tarikh')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="jumlah">Jumlah Perbelanjaan</label>
                                        <div class="input-group">
                                            <div class="input-group-append">
                                                <div class="input-group-text">
                                                    RM
                                                </div>
                                            </div>
                                            <input type="number" step=0.01
                                                class="form-control @error('jumlah') is-invalid @enderror" id="jumlah"
                                                name="jumlah" value="{{ old('jumlah') ?? $expense->jumlah_tbj }}">
                                            @error('jumlah')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                </div>

                            </div>


                        </div>

                        <!-- /.card-body -->

                        <div class="card-footer d-flex justify-content-end">
                            <button type="submit" class="btn btn-success"> <i class="nav-icon fas fa-edit"></i>
                                Kemaksini</button>
                        </div>
                    </form>

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
