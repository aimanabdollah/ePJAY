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
                    <li class="breadcrumb-item active">Pusat Jagaan</li>
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
                            <h5>Edit Konfigurasi Pusat Jagaan</h5>
                        </div>
                        <div class=""> <a href="{{ url('admin-configuration') }}" class="btn btn-primary">
                                <i class="nav-icon fas fa-arrow-circle-left"></i> Kembali</a></div>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="{{ route('configuration.updateOrg', ['configuration' => $configuration->id]) }}"
                        enctype="multipart/form-data" method="POST">
                        @method('PATCH')
                        @csrf

                        <div class="card-body">
                            <div class="row">

                                <div class="col-md-4">

                                    <div class="form-group text-center">
                                        <label for="logo_pusat_jagaan">Logo Pusat Jagaan<i style="color: red">*</i></label>
                                        <div>
                                            @php
                                                $logoPath = 'assets/pusat_jagaan/' . $configuration->logo_pusat_jagaan;
                                                $defaultImagePath = 'assets/no-img.jpg';
                                                
                                                if (!file_exists(public_path($logoPath)) || empty($configuration->logo_pusat_jagaan)) {
                                                    $logoPath = $defaultImagePath;
                                                }
                                            @endphp
                                            <img id="preview-image" src="{{ asset($logoPath) }}" class="img-thumbnail"
                                                alt="" style="height: 140px">

                                            <div class="form-group">
                                                <label for="logo_pusat_jagaan" style="color: white">Gambar
                                                </label>
                                                <input type="file" name="logo_pusat_jagaan" id="logo_pusat_jagaan"
                                                    class="form-control remove-error-on-input @error('logo_pusat_jagaan') is-invalid @enderror"
                                                    placeholder="Sila Pilih Gambar">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label for="nama_pusat_jagaan">Nama Pusat Jagaan<i style="color: red">*</i></label>
                                        <input type="text"
                                            class="form-control remove-error-on-input @error('nama_pusat_jagaan') is-invalid @enderror"
                                            id="nama_pusat_jagaan" name="nama_pusat_jagaan"
                                            value="{{ old('nama_pusat_jagaan') ?? $configuration->nama_pusat_jagaan }}">
                                    </div>

                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label for="singkatan_pusat_jagaan">Singkatan Pusat Jagaan</label>
                                            <input type="text"
                                                class="form-control remove-error-on-input @error('singkatan_pusat_jagaan') is-invalid @enderror"
                                                id="singkatan_pusat_jagaan" name="singkatan_pusat_jagaan"
                                                value="{{ old('singkatan_pusat_jagaan') ?? $configuration->signkatan_pusat_jagaan }}">
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label for="emel">Emel<i style="color: red">*</i></label>
                                            <input type="text"
                                                class="form-control remove-error-on-input @error('emel') is-invalid @enderror"
                                                id="emel" name="emel"
                                                value="{{ old('emel') ?? $configuration->emel }}">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label for="no_fax">No Fax</label>
                                            <input type="text"
                                                class="form-control remove-error-on-input @error('no_fax') is-invalid @enderror"
                                                id="no_fax" name="no_fax"
                                                value="{{ old('no_fax') ?? $configuration->no_fax }}">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="no_tel">No Tel<i style="color: red">*</i></label>
                                            <input type="text"
                                                class="form-control remove-error-on-input @error('no_tel') is-invalid @enderror"
                                                id="no_tel" name="no_tel"
                                                value="{{ old('no_tel') ?? $configuration->no_tel }}">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group col-md-12">
                                            <label for="alamat1">Alamat<i style="color: red">*</i></label>
                                            <input type="text"
                                                class="form-control remove-error-on-input @error('alamat1') is-invalid @enderror"
                                                id="alamat1" name="alamat1"
                                                value="{{ old('alamat1') ?? $configuration->alamat1 }}">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group col-md-4">
                                            <label for="poskod">Poskod<i style="color: red">*</i></label>
                                            <input type="text"
                                                class="form-control remove-error-on-input @error('poskod') is-invalid @enderror"
                                                id="poskod" name="poskod"
                                                value="{{ old('poskod') ?? $configuration->poskod }}">
                                        </div>

                                        <div class="form-group col-md-4">
                                            <label for="bandar">Bandar<i style="color: red">*</i></label>
                                            <input type="text"
                                                class="form-control remove-error-on-input @error('bandar') is-invalid @enderror"
                                                id="bandar" name="bandar"
                                                value="{{ old('bandar') ?? $configuration->bandar }}">
                                        </div>

                                        <div class="form-group col-md-4">
                                            <label for="negeri">Negeri<i style="color: red">*</i></label>
                                            <select
                                                class="form-control remove-error-on-input @error('negeri') is-invalid @enderror"
                                                name="negeri" id="negeri" aria-label="Default select example">
                                                <option value="">Sila Pilih Negeri</option>
                                                @foreach (json_decode(file_get_contents(public_path('assets/dropdown_type.json')))->states as $state)
                                                    <option value="{{ $state }}"
                                                        {{ (old('negeri') ?? $configuration->negeri) == $state ? 'selected' : '' }}>
                                                        {{ $state }}
                                                    </option>
                                                @endforeach
                                            </select>
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
        $('.select2').select2({
            allowClear: true,
            placeholder: 'Sila Pilih Negeri'

        });

        $('#logo_pusat_jagaan').change(function() {

            let reader = new FileReader();
            reader.onload = (e) => {
                $('#preview-image').attr('src', e.target.result);
            }
            reader.readAsDataURL(this.files[0]);

        });
    </script>
@endpush
