@extends('backend.layouts.app', ['title' => 'Profil'])

@section('content-header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Profil</h1>
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
                    <li class="breadcrumb-item active">Edit Profil</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
@endsection


@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">

                <div class="container-fluid">
                    <!-- form start -->
                    <form action="{{ route('profile.update', ['user' => $user->id]) }}" enctype="multipart/form-data"
                        method="POST">
                        @method('PATCH')
                        @csrf
                        <div class="row">
                            <div class="col-md-3">

                                <div class="card card-primary card-outline">
                                    <div class="card-body box-profile">
                                        <div class="text-center">
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
                                                <input type="file" name="gambar" id="gambar" class="form-control"
                                                    placeholder="Sila Pilih Gambar">
                                                @error('gambar')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>



                                        {{-- <h3 class="profile-username text-center">{{ $user->name }}</h3> --}}
                                        <p class="text-bold text-center mt-2">{{ $user->name }}</p>
                                        <ul class="list-group list-group-unbordered mb-3">
                                            <li class="list-group-item">
                                                Tarikh Daftar Akaun <a
                                                    class="float-right">{{ $user->created_at->format('d-M-Y') }}</a>
                                            </li>
                                            <li class="list-group-item">
                                                Jenis Pengguna<a class="float-right">
                                                    @if ($user->role == 1)
                                                        Admin
                                                    @elseif ($user->role == 2)
                                                        Staf
                                                    @elseif ($user->role == 3)
                                                        Penjaga / Waris
                                                    @endif
                                                </a>
                                            </li>
                                            <li class="list-group-item">
                                                Status<a class="float-right">Aktif</a>
                                            </li>
                                        </ul>
                                        <a href="{{ route('password.edit', ['user' => Auth::user()->id]) }}"
                                            class="btn btn-primary btn-block"><b>Tukar Kata Laluan</b></a>
                                    </div>

                                </div>
                            </div>

                            <div class="col-md-9">
                                <div class="card">

                                    <div class="card-header d-flex align-items-center">
                                        <div class="mr-auto">
                                            <h5>Edit Profil</h5>
                                        </div>

                                    </div>
                                    <div class="card-body">
                                        <div class="tab-content">
                                            <div class="active tab-pane" id="settings">


                                                <div class="form-group">
                                                    <label for="name">Nama<i style="color: red">*</i></label>
                                                    <input type="text"
                                                        class="form-control remove-error-on-input @error('name') is-invalid @enderror"
                                                        id="name" name="name"
                                                        value="{{ old('name') ?? $user->name }}">
                                                </div>

                                                <div class="form-group">
                                                    <label for="email">Emel<i style="color: red">*</i></label>
                                                    <input type="text"
                                                        class="form-control remove-error-on-input @error('email') is-invalid @enderror"
                                                        id="email" name="email"
                                                        value="{{ old('email') ?? $user->email }}">
                                                </div>

                                                <div class="form-group">
                                                    <label for="no_tel">No Telefon<i style="color: red">*</i></label>
                                                    <input type="text"
                                                        class="form-control remove-error-on-input @error('no_tel') is-invalid @enderror"
                                                        id="no_tel" name="no_tel"
                                                        value="{{ old('no_tel') ?? $user->no_tel }}">
                                                </div>

                                                <div class="form-group row">
                                                    <div
                                                        class="mt-2 col-md-10 offset-sm-0 col-sm-12  d-flex justify-content-start">
                                                        <button type="submit" class="btn btn-success"> <i
                                                                class="nav-icon fas fa-edit"></i> Kemaksini</button>
                                                    </div>
                                                </div>
                    </form>


                </div>
            </div>
        </div>
    </div>
    </div>
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
        // Function to remove 'is-invalid' class from the input field
        function removeErrorClass(inputElement) {
            inputElement.classList.remove('is-invalid');
        }

        // Get all input fields with class 'remove-error-on-input'
        const inputFields = document.querySelectorAll('.remove-error-on-input');

        // Add event listeners to each input field
        inputFields.forEach(function(inputElement) {
            inputElement.addEventListener('input', function() {
                removeErrorClass(this);
            });

            inputElement.addEventListener('blur', function() {
                removeErrorClass(this);
            });
        });

        $('#gambar').change(function() {

            let reader = new FileReader();
            reader.onload = (e) => {
                $('#preview-image').attr('src', e.target.result);
            }
            reader.readAsDataURL(this.files[0]);

        });
    </script>
@endpush
