@extends('backend.layouts.app', ['title' => 'Konfigurasi'])

@section('content-header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Konfigurasi</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ url('admin-home') }}">Halaman Utama</a></li>
                    <li class="breadcrumb-item"><a href="{{ url('admin-configuration') }}">Konfigurasi</a></li>
                    <li class="breadcrumb-item active">Sistem</li>
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
                            <h5>Edit Konfigurasi Sistem</h5>
                        </div>
                        <div class=""> <a href="{{ url('admin-configuration') }}" class="btn btn-primary">
                                <i class="nav-icon fas fa-arrow-circle-left"></i> Kembali</a></div>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="{{ route('configuration.updateSys', ['configuration' => $configuration->id]) }}"
                        enctype="multipart/form-data" method="POST">
                        @method('PATCH')
                        @csrf

                        <div class="card-body">
                            <div class="row">

                                <div class="col-md-4">

                                    <div class="form-group text-center">
                                        <label for="logo_sistem">Logo Sistem<i style="color: red">*</i></label>
                                        <div>
                                            @php
                                                $logoPath = 'assets/sistem/' . $configuration->logo_sistem;
                                                $defaultImagePath = 'assets/no-img.jpg';
                                                
                                                if (!file_exists(public_path($logoPath)) || empty($configuration->logo_sistem)) {
                                                    $logoPath = $defaultImagePath;
                                                }
                                            @endphp
                                            <img id="preview-image" src="{{ asset($logoPath) }}" class="img-thumbnail"
                                                alt="" style="height: 140px">

                                            <div class="form-group">
                                                <label for="logo_sistem" style="color: white">Gambar
                                                </label>
                                                <input type="file" for="logo_sistem" name="logo_sistem" id="logo_sistem"
                                                    class="form-control" placeholder="Sila Pilih Gambar">
                                                @error('logo_sistem')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label for="nama_sistem">Nama Sistem<i style="color: red">*</i></label>
                                        <input type="text"
                                            class="form-control remove-error-on-input  @error('nama_sistem') is-invalid @enderror"
                                            id="nama_sistem" name="nama_sistem"
                                            value="{{ old('nama_sistem') ?? $configuration->nama_sistem }}">
                                    </div>

                                    <div class="form-group">
                                        <label for="singkatan_sistem">Singkatan Sistem<i style="color: red">*</i></label>
                                        <input type="text"
                                            class="form-control remove-error-on-input @error('singkatan_sistem') is-invalid @enderror"
                                            id="singkatan_sistem" name="singkatan_sistem"
                                            value="{{ old('singkatan_sistem') ?? $configuration->singkatan_sistem }}">
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
        $('#logo_sistem').change(function() {

            let reader = new FileReader();
            reader.onload = (e) => {
                $('#preview-image').attr('src', e.target.result);
            }
            reader.readAsDataURL(this.files[0]);

        });
    </script>
@endpush
