<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Meta -->
    <meta name="description" content="Admin Templates - Dashboard Templates">
    <meta name="author" content="Bootstrap Gallery" />
    <link rel="canonical" href="https://www.bootstrap.gallery/">
    <meta property="og:url" content="https://www.bootstrap.gallery">
    <meta property="og:title" content="Admin Templates - Dashboard Templates | Bootstrap Gallery">
    <meta property="og:description" content="Marketplace for Bootstrap Admin Dashboards">
    <meta property="og:type" content="Website">
    <meta property="og:site_name" content="Bootstrap Gallery">
    <link rel="shortcut icon" href="{{ asset('assets/img/logo_sulbar.png') }}" />

    <!-- Title -->
    <title>APP Formulir | Login</title>

    <!-- *************
			************ Common Css Files *************
		************ -->
    <!-- Bootstrap css -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <!-- Icomoon Font Icons css -->
    <link rel="stylesheet" href="{{ asset('assets/fonts/style.css') }}">

    <!-- Master CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}" />

</head>

<body class="authentication" style="background-image: url('{{ asset('assets/img/bg.jpg') }}'); background-size: cover;">

    <!-- Container start -->
    <div class="container">
        <form action="{{ route('login') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row justify-content-md-center">
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                    <div class="login-screen">
                        <div class="login-box">
                            <a href="https://csirt.sulbarprov.go.id/" class="login-logo">
                                <img class="rounded mx-auto d-block" src="{{ asset('assets/img/logo_sulbar.png') }}"
                                    alt="Best Admin Template" width="60" />
                            </a>
                            <div class="mb-4">
                                <h4 class="text-center">Silahkan Login</h4>
                                <p class="text-center">APP Formulir Permohonan Pendaftaran Sertifikat Elektronik</p>
                            </div>
                            @if(session('error'))
                            <div class="alert alert-warning text-center">
                                {{ session('error') }}
                            </div>
                            @endif
                            <div class="form-group">
                                <label for="">Nama Pengguna</label>
                                <input type="text" class="form-control" placeholder="Username" name="name" />
                                @error('name')
                                <div class="alert alert-warning text-center">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="">Password</label>
                                <input type="password" class="form-control" placeholder="Password" name="password" />
                                @error('password')
                                <div class="alert alert-warning text-center">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group mt-4 mb-4">
                                <div class="captcha">
                                    <label for="">Kode Captcha</label>
                                    <span>{!! captcha_img('math') !!}</span>
                                    <button type="button" class="btn btn-danger" class="reload" id="reload">
                                        &#x21bb;
                                    </button>
                                </div>
                            </div>
                            <div class="form-group mt-4 mb-4">
                                <input id="captcha" type="text" class="form-control" placeholder="masukan Captcha"
                                    name="captcha">
                                @error('captcha')
                                <div class="alert alert-warning text-center">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="actions mb-4">
                                <button type="submit" class="btn btn-primary"><i class="icon-login"></i> Masuk</button>
                            </div>
                            <hr>
                            <div class="actions align-left">
                                <span class="additional-link">Belum Punya Akun ?</span>
                                <a href="signup.html" class="btn btn-dark">Register Akun</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>

    </div>
    <!-- Container end -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript">
        $('#reload').click(function () {
        $.ajax({
            type: 'GET',
            url: 'reload-captcha',
            success: function (data) {
                $(".captcha span").html(data.captcha);
            }
        });
    });
    </script>
</body>

</html>