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
                    <li class="breadcrumb-item"><a href="{{ url('admin-category') }}">Kategori</a></li>
                    <li class="breadcrumb-item active">{{ $category->nama }}</li>
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
                            <h5>Edit Kategori</h5>
                        </div>
                        <div class=""> <a href="{{ url('admin-category') }}" class="btn btn-primary">
                                <i class="nav-icon fas fa-arrow-circle-left"></i> Kembali</a></div>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="{{ route('category.update', ['category' => $category->id]) }}" method="POST">
                        @method('PATCH')
                        @csrf


                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">

                                    <div class="form-group">
                                        <label for="jenis">Jenis</label>
                                        <select
                                            class="form-control remove-error-on-input @error('jenis') is-invalid @enderror"
                                            name="jenis" id="jenis" aria-label="Default select example">
                                            <option selected value="">Sila Pilih Jenis Transaksi</option>
                                            @foreach (json_decode(file_get_contents(public_path('assets/dropdown_type.json')))->transactions as $transaction)
                                                <option value="{{ $transaction }}"
                                                    {{ old('jenis') ?? $category->jenis == $transaction ? 'selected' : '' }}>
                                                    {{ $transaction }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="nama">Nama</label>
                                        <input type="text"
                                            class="form-control remove-error-on-input @error('nama') is-invalid @enderror"
                                            id="nama" name="nama" value="{{ old('nama') ?? $category->nama }}">
                                    </div>

                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="catatan">Catatan</label>
                                        <input type="text"
                                            class="form-control remove-error-on-input @error('catatan') is-invalid @enderror"
                                            id="catatan" name="catatan"
                                            value="{{ old('catatan') ?? $category->catatan }}">
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
