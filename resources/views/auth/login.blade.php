<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ 'backend/plugins/fontawesome-free/css/all.min.css' }}">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="{{ 'backend/plugins/icheck-bootstrap/icheck-bootstrap.min.css' }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ 'backend/dist/css/adminlte.min.css' }}">
</head>

<body class="hold-transition login-page" style=" background-image: url(https://wallpaperaccess.com/full/2314950.jpg);">
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><b>Perhatian!</b></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div style="margin-bottom: 12px">Sistem ini dibangunkan sebagai <b>Kajian Kes Projek Tahun Akhir.
                        </b>
                        Untuk mengakses sistem ini bagi <b>tujuan demo</b>, sila masukkan
                        butiran
                        berikut berdasarkan jenis
                        pengguna untuk melog masuk:</div>

                    <ul><b>1. Waris/Penjaga</b> <br>[<b>Email:</b> penjaga@gmail.com] <br>[<b>Kata Laluan:</b> abc12345]
                    </ul>

                    <ul><b>2. Staf</b> <br>[<b>Email:</b> staf@gmail.com] <br>[<b>Kata Laluan:</b> abc12345]
                    </ul>

                    <ul><b>3. Admin</b> <br>[<b>Email:</b> admin@gmail.com] <br>[<b>Kata Laluan:</b> abc12345]
                    </ul>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>
    <div class="login-box">
        <!-- /.login-logo -->
        <div class="card card-outline card-primary">
            <div class="card-header text-center">
                <div class="d-flex justify-content-center align-items-center">

                    @php
                        $logoPath = 'assets/sistem/' . $configuration->logo_sistem;
                        $defaultImagePath = 'assets/no-img.jpg';
                        
                        if (!file_exists(public_path($logoPath)) || empty($configuration->logo_sistem)) {
                            $logoPath = $defaultImagePath;
                        }
                    @endphp
                    <img id="e" src="{{ asset($logoPath) }}" class="" alt=""
                        style="max-height: 50px">


                    <a href="{{ url('/') }}" style=" margin: 8px;" class="h1"><b>
                            {{ $configuration->singkatan_sistem }}</b></a>



                </div>
                <h6 style="margin-top: 12px">
                    {{ $configuration->nama_sistem }}
                </h6>
            </div>

            <div class="card-body">
                <p class="login-box-msg"><b>Log Masuk</b></p>

                @if (session()->has('success'))
                    <div class="alert alert-success alert-dismissible" style="background-color: #c3e6cb; color:black">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        {{ session()->get('success') }}
                    </div>
                @elseif (session()->has('error'))
                    <div class="alert alert-danger alert-dismissible" style="background-color: #f8d7da; color:black">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        {{ session()->get('error') }}
                    </div>
                @endif

                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="input-group mb-3">
                        {{-- <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                            name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div> --}}
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                        <input name="email" id="email" type="email"
                            class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}"
                            placeholder="Email" required />

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                        <input name="password" type="password"
                            class="form-control @error('password') is-invalid @enderror" placeholder="Kata Laluan"
                            required />

                        {{-- <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-eye-slash" id="togglePassword"></span>
                            </div>
                        </div> --}}




                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="row">
                        {{-- <div class="col-8">
                            <div class="icheck-primary">
                                <input type="checkbox" id="remember">
                                <label for="remember">
                                    Remember Me
                                </label>
                            </div>
                        </div> --}}
                        <!-- /.col -->
                        <div class="col-4 mt-2">
                            <button type="submit" class="btn btn-primary btn-block">Log Masuk</button>
                        </div>

                        {{-- <div class="col-4 mt-2">
                            <button type="button" class="btn btn-secondary" data-toggle="modal"
                                data-target="#exampleModal">
                                Demo
                            </button>
                        </div> --}}
                        <!-- /.col -->
                    </div>
                </form>

                {{-- <div class="social-auth-links text-center mt-2 mb-3">
                    <a href="#" class="btn btn-block btn-primary">
                        <i class="fab fa-facebook mr-2"></i> Sign in using Facebook
                    </a>
                    <a href="#" class="btn btn-block btn-danger">
                        <i class="fab fa-google-plus mr-2"></i> Sign in using Google+
                    </a>
                </div> --}}
                <!-- /.social-auth-links -->

                {{-- <p class="mb-1">
                    <a href="forgot-password.html">I forgot my password</a>
                </p> --}}
                <p class="mt-2">Tiada akaun? Daftar
                    <a href="{{ route('register') }}" class="text-center">di sini</a><br>Sila klik
                    <a data-toggle="modal" data-target="#exampleModal"class="text-center">di sini </a>untuk demo
                </p>


            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <!-- /.login-box -->


    <!-- jQuery -->
    <script src="{{ 'backend/plugins/jquery/jquery.min.js' }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ 'backend/plugins/bootstrap/js/bootstrap.bundle.min.js' }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ 'backend/dist/js/adminlte.min.js' }}"></script>
</body>

</html>
