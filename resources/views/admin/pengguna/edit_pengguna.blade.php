@extends('backend.layouts.app', ['title' => 'Pengguna'])

@section('content-header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Pengguna</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ url('admin-home') }}">Halaman Utama</a></li>
                    <li class="breadcrumb-item active">Edit Pengguna</li>
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
                            <h5>Edit Pengguna</h5>
                        </div>
                        <div class=""> <a href="{{ url('admin-user') }}" class="btn btn-primary">
                                <i class="nav-icon fas fa-arrow-circle-left"></i> Kembali</a></div>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="{{ route('user.update', ['user' => $user->id]) }}" enctype="multipart/form-data"
                        method="POST">
                        @method('PATCH')
                        @csrf

                        <div class="card-body">
                            <div class="row">

                                <div class="col-md-4">

                                    <div class="form-group text-center">
                                        <label for="gambar">Gambar<i style="color: red">*</i></label>
                                        <div>
                                            @php
                                                $logoPath = 'assets/profile-img/' . $user->gambar;
                                                $defaultImagePath = 'assets/no-img.jpg';
                                                
                                                if (!file_exists(public_path($logoPath)) || empty($user->gambar)) {
                                                    $logoPath = $defaultImagePath;
                                                }
                                            @endphp
                                            <img id="preview-image" src="{{ asset($logoPath) }}" class="img-thumbnail"
                                                alt="" style="height: 140px">

                                            <div class="form-group">
                                                <label for="gambar" style="color: white">Gambar
                                                </label>
                                                <input type="file" name="gambar" id="gambar" class="form-control"
                                                    placeholder="Sila Pilih Gambar">
                                                @error('gambar')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label for="name">Nama<i style="color: red">*</i></label>
                                        <input type="text"
                                            class="form-control remove-error-on-input @error('name') is-invalid @enderror"
                                            id="name" name="name" value="{{ old('name') ?? $user->name }}">
                                    </div>

                                    <div class="form-group">
                                        <label for="email">Emel<i style="color: red">*</i></label>
                                        <input type="text"
                                            class="form-control remove-error-on-input @error('email') is-invalid @enderror"
                                            id="email" name="email" value="{{ old('email') ?? $user->email }}">
                                    </div>

                                    <div class="form-group">
                                        <label for="no_tel">No Telefon<i style="color: red">*</i></label>
                                        <input type="text"
                                            class="form-control remove-error-on-input @error('no_tel') is-invalid @enderror"
                                            id="no_tel" name="no_tel" value="{{ old('no_tel') ?? $user->no_tel }}">
                                    </div>

                                    <div class="form-group">
                                        <label for="role">Jenis Pengguna<i style="color: red">*</i></label>
                                        <select
                                            class="form-control remove-error-on-input @error('role') is-invalid @enderror"
                                            name="role" id="role" aria-label="Default select example">
                                            <option selected value="">Sila Pilih Jenis Pengguna</option>
                                            @foreach ($roles as $value => $label)
                                                <option value="{{ $value }}"
                                                    {{ (old('role') ?? $user->role) == $value ? 'selected' : '' }}>
                                                    {{ $label }}
                                                </option>
                                            @endforeach
                                        </select>
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
        $('#gambar').change(function() {

            let reader = new FileReader();
            reader.onload = (e) => {
                $('#preview-image').attr('src', e.target.result);
            }
            reader.readAsDataURL(this.files[0]);

        });
    </script>
@endpush
