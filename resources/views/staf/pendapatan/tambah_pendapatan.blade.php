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
                    <li class="breadcrumb-item"><a href="{{ url('admin-income') }}">Pendapatan</a></li>
                    <li class="breadcrumb-item active">Tambah</li>
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
                            <h5>Tambah Maklumat Pendapatan</h5>
                        </div>
                        <div class=""> <a href="{{ url('admin-income') }}" class="btn btn-primary">
                                <i class="nav-icon fas fa-arrow-circle-left"></i> Kembali</a></div>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="{{ route('income.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">

                                    <div class="form-group">
                                        <label for="kategori">Kategori</label>
                                        <select
                                            class="form-control remove-error-on-input @error('kategori') is-invalid @enderror"
                                            name="kategori" id="kategori" aria-label="Default select example">
                                            <option value="" selected>Sila Pilih Kategori</option>
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}"
                                                    {{ old('kategori') == $category->id ? 'selected' : '' }}>
                                                    {{ $category->nama }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="catatan">Catatan</label>
                                        <input type="text"
                                            class="form-control remove-error-on-input @error('catatan') is-invalid @enderror"
                                            id="catatan" name="catatan" value="{{ old('catatan') }}"
                                            placeholder="Masukkan Catatan">
                                    </div>

                                </div>
                                <div class="col-md-6">

                                    <div class="form-group">
                                        <label for="tarikh">Tarikh</label>
                                        <input type="date"
                                            class="form-control remove-error-on-input @error('tarikh') is-invalid @enderror"
                                            id="tarikh" name="tarikh" value="{{ old('tarikh') }}"
                                            placeholder="Masukkan Tarikh">
                                    </div>

                                    <div class="form-group">
                                        <label for="jumlah">Jumlah Pendapatan</label>
                                        <div class="input-group">
                                            <div class="input-group-append">
                                                <div class="input-group-text">
                                                    RM
                                                </div>
                                            </div>
                                            <input type="number"
                                                class="form-control remove-error-on-input @error('jumlah') is-invalid @enderror"
                                                id="jumlah" name="jumlah" step="0.01" value="{{ old('jumlah') }}"
                                                placeholder="Masukkan Jumlah Pendapatan">
                                        </div>
                                    </div>

                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputFile">Resit/Invois/Bukti Pendapatan</label>
                                        <div id="file_input">
                                            <input type="file" name="resit" value="{{ old('resit') }}"
                                                class="form-control remove-error-on-input @error('resit') is-invalid @enderror"
                                                placeholder="Sila Pilih Resit" id="resit">
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
