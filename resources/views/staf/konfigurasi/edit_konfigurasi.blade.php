@extends('backend.layouts.app', ['title' => 'Kewangan'])

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
                            <h5>Tambah Maklumat Perbelanjaan</h5>
                        </div>
                        <div class=""> <a href="{{ url('admin-expense') }}" class="btn btn-primary">
                                <i class="nav-icon fas fa-arrow-circle-left"></i> Kembali</a></div>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="{{ route('expense.store') }}" method="POST">
                        @csrf

                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">

                                    <div class="form-group">
                                        <label for="kategori">Kategori</label>
                                        <select class="form-control" name="kategori" id="kategori"
                                            aria-label="Default select example">
                                            <option selected>Sila Pilih Kategori</option>
                                            <option value="Sewaan Kediaman"
                                                {{ old('kategori') == 'Sewaan Kediaman' ? 'selected' : '' }}>
                                                Sewaan Kediaman
                                            </option>
                                            <option value="Pengangkutan"
                                                {{ old('kategori') == 'Pengangkutan' ? 'selected' : '' }}>
                                                Pengangkutan
                                            </option>
                                            <option value="Kesihatan"
                                                {{ old('kategori') == 'Kesihatan' ? 'selected' : '' }}>
                                                Kesihatan
                                            </option>
                                            <option value="Makanan dan minuman"
                                                {{ old('kategori') == 'Makanan dan minuman' ? 'selected' : '' }}>
                                                Makanan dan minuman
                                            </option>
                                            <option value="Utiliti" {{ old('kategori') == 'Utiliti' ? 'selected' : '' }}>
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
                                            id="catatan" name="catatan" value="{{ old('catatan') }}"
                                            placeholder="Masukkan Catatan">
                                        @error('catatan')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                </div>
                                <div class="col-md-6">


                                    <div class="form-group">
                                        <label for="tarikh">Tarikh</label>
                                        <input type="date" class="form-control @error('tarikh') is-invalid @enderror"
                                            id="tarikh" name="tarikh" value="{{ old('tarikh') }}"
                                            placeholder="Masukkan Tarikh">
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
                                            <input type="number" class="form-control @error('jumlah') is-invalid @enderror"
                                                id="jumlah" name="jumlah" step=0.01 value="{{ old('jumlah') }}"
                                                placeholder="Masukkan Jumlah Perbelanjaan">
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
                            <button type="submit" class="btn btn-success"> <i class="nav-icon fas fa-plus-circle"></i>
                                Tambah</button>
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
