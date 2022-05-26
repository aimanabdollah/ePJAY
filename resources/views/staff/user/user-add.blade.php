@extends('layouts.staff-main', ['title' => 'Pengguna'])

@section('content-header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Pengguna</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ url('admin/home') }}">Halaman Utama</a></li>
                    <li class="breadcrumb-item active">Pengguna</li>
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
                            <h5>Tambah Maklumat Pengguna</h5>
                        </div>
                        <div class=""> <a href="{{ url('admin/user') }}" class="btn btn-primary">
                                <i class="nav-icon fas fa-arrow-circle-left"></i> Kembali</a></div>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="{{ route('user.store') }}" method="POST">
                        @csrf


                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">

                                    <div class="form-group">
                                        <label for="kategori">Kategori</label>
                                        <select class="form-control" name="kategori" id="kategori"
                                            aria-label="Default select example">
                                            <option selected>Sila Pilih Kategori</option>
                                            <option value='1' {{ old('kategori') == '1' ? 'selected' : '' }}>
                                                Staff
                                            </option>
                                            <option value='0' {{ old('kategori') == '0' ? 'selected' : '' }}>
                                                Penjaga
                                            </option>

                                        </select>
                                        @error('kategori')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="text" class="form-control @error('email') is-invalid @enderror"
                                            id="email" name="email" value="{{ old('email') }}"
                                            placeholder="Masukkan Email">
                                        @error('email')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>


                                    <div class="form-group">
                                        <label for="num_phone">No. Telefon</label>
                                        <input type="text" class="form-control @error('num_phone') is-invalid @enderror"
                                            id="num_phone" name="num_phone" value="{{ old('num_phone') }}"
                                            placeholder="Masukkan No. Telefon">
                                        @error('num_phone')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                </div>
                                <div class="col-md-6">


                                    <div class="form-group">
                                        <label for="name">Nama</label>
                                        <input type="text" class="form-control @error('name') is-invalid @enderror"
                                            id="name" name="name" value="{{ old('name') }}" placeholder="Masukkan Nama">
                                        @error('name')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="num_phone">Kata Laluan</label>
                                        <input type="text" class="form-control @error('password') is-invalid @enderror"
                                            id="password" name="password" value="{{ old('password') }}"
                                            placeholder="Masukkan No. Telefon">
                                        @error('password')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
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
