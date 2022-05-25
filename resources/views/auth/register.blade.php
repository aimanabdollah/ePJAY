<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ePJAY</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ url('/adminlte/plugins/fontawesome-free/css/all.min.css') }}">

    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="{{ url('/adminlte/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">

    <!-- Theme style -->
    <link rel="stylesheet" href="{{ url('/adminlte/dist/css/adminlte.min.css') }}">

    <link href="" rel="icon">
    <link href="" rel="apple-touch-icon">

    <link rel="icon" href="{{ url('/landing/assets/img/logo-rbdh.png') }}">
    <link rel="apple-touch-icon" href="{{ url('/landing/assets/img/logo-rbdh.png') }}">
</head>

<body class="hold-transition login-page" style=" background-image: url(https://wallpaperaccess.com/full/2314950.jpg);">

    <div class="register-box">
        <div class="card card-outline card-primary">
            <div class="card-header text-center">
                <div class="d-flex justify-content-center align-items-center">
                    <img id="" src="/landing/assets/img/logo-rbdh.png" alt="preview image" class=""
                        style="max-height: 50px;">
                    <a href="#" style=" margin: 8px;" class="h1"><b>ePJAY</b></a>
                </div>
                <h6 style="margin-top: 12px">
                    Sistem Pengurusan Pusat Jagaan Anak Yatim
                </h6>
            </div>
            <div class="card-body">
                <p class="login-box-msg">Pendaftaran Akaun</p>

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
                            name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Email">

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
    <script src="../../plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../../dist/js/adminlte.min.js"></script>
</body>

</html>
