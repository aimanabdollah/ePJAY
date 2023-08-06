<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register</title>

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

<body class="hold-transition register-page"
    style=" background-image: url(https://wallpaperaccess.com/full/2314950.jpg);">
    <div class="register-box">
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
                    <img id="" src="{{ asset($logoPath) }}" class="" alt=""
                        style="max-height: 50px">


                    <a href="{{ url('/') }}" style=" margin: 8px;" class="h1"><b>
                            {{ $configuration->singkatan_sistem }}</b></a>

                </div>
                <h6 style="margin-top: 12px">
                    {{ $configuration->nama_sistem }}
                </h6>
            </div>
            <div class="card-body">
                <p class="login-box-msg"><b>Pendaftaran Akaun</b></p>

                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <div class="input-group mb-3">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                            name="name" value="{{ old('name') }}" required autocomplete="name" autofocus
                            placeholder="Nama Penuh">

                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                            name="email" value="{{ old('email') }}" required autocomplete="email"
                            placeholder="Email">

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
                        <input id="password" type="password"
                            class="form-control @error('password') is-invalid @enderror" name="password" required
                            autocomplete="new-password" placeholder="Kata Laluan">

                        @error('password')
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
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation"
                            required autocomplete="new-password" placeholder="Konfirmasi Kata Laluan">

                    </div>
                    <div class="row">
                        {{-- <div class="col-8">
                            <div class="icheck-primary">
                                <input type="checkbox" id="agreeTerms" name="terms" value="agree">
                                <label for="agreeTerms">
                                    I agree to the <a href="#">terms</a>
                                </label>
                            </div>
                        </div> --}}
                        <!-- /.col -->
                        <div class="col-4">
                            <button type="submit" class="btn btn-primary btn-block">Daftar</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>

                {{-- <div class="social-auth-links text-center">
                    <a href="#" class="btn btn-block btn-primary">
                        <i class="fab fa-facebook mr-2"></i>
                        Sign up using Facebook
                    </a>
                    <a href="#" class="btn btn-block btn-danger">
                        <i class="fab fa-google-plus mr-2"></i>
                        Sign up using Google+
                    </a>
                </div> --}}

                <p class="mt-2">Ada akaun? Log Masuk
                    <a href="{{ route('login') }}" class="text-center">di sini</a>
                </p>
            </div>
            <!-- /.form-box -->
        </div><!-- /.card -->
    </div>
    <!-- /.register-box -->

    <!-- jQuery -->
    <script src="{{ 'backend/plugins/jquery/jquery.min.js' }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ 'backend/plugins/bootstrap/js/bootstrap.bundle.min.js' }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ 'backend/dist/js/adminlte.min.js' }}"></script>
</body>

</html>
