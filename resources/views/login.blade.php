<!DOCTYPE html>
<html lang="en">

<head>
    <title>Login V12</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="icon" type="image/png" href="images/icons/favicon.ico" />

    <link rel="stylesheet" type="text/css" href="{{ asset('login/vendor/bootstrap/css/bootstrap.min.css') }}">

    <link rel="stylesheet" type="text/css"
        href="{{ asset('login/fonts/font-awesome-4.7.0/css/font-awesome.min.css') }}">

    <link rel="stylesheet" type="text/css" href="{{ asset('login/fonts/Linearicons-Free-v1.0.0/icon-font.min.css') }}">

    <link rel="stylesheet" type="text/css" href="{{ asset('login/vendor/animate/animate.css') }}">

    <link rel="stylesheet" type="text/css" href="{{ asset('login/vendor/css-hamburgers/hamburgers.min.css') }}">

    <link rel="stylesheet" type="text/css" href="{{ asset('login/vendor/select2/select2.min.css') }}">

    <link rel="stylesheet" type="text/css" href="{{ asset('login/css/util.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('login/css/main.css') }}">
</head>

<body>
    <div class="limiter">
        <div class="container-login100" style="background-image: url('images/img-01.jpg');">
            <div class="wrap-login100 p-b-30">
                <form class="login100-form validate-form" action="{{ route('storeLogin') }}" method="POST">
                    @csrf
                    <div class="login100-form-avatar">
                        <img src="{{ asset('login/images/reim.png') }}" alt="logo" width="100px" height="140px"> 
					</div>

                    @if (session('gagal'))
                        <div id="sessionAlert" class="alert alert-danger slow-fade-out" style="width: 500px">
                            <b> Oops! </b> {{ session('gagal') }}
                        </div>
                    @endif

                    @if (session('berhasil'))
                        <div id="sessionAlert" class="alert alert-success slow-fade-out" style="width: 500px">
                            <b> Hooray! </b> {{ session('berhasil') }}
                        </div>
                    @endif

                    <div class="wrap-input100 validate-input m-b-10" data-validate="NIP is required">
                        <input class="input100" type="nip" name="NIP" placeholder="NIP">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-user"></i>
                        </span>
                    </div>
                    <div class="wrap-input100 validate-input m-b-10" data-validate="Password is required">
                        <input class="input100" type="password" name="password" placeholder="Password">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-lock"></i>
                        </span>
                    </div>
                    <div class="container-login100-form-btn p-t-10">
                        <button class="login100-form-btn">
                            Login
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="{{ asset('login/vendor/jquery/jquery-3.2.1.min.js') }}">
        < /scrip>

        <
        script src = "{{ asset('login/vendor/bootstrap/js/popper.js') }}" >
    </script>
    <script src="{{ asset('login/vendor/bootstrap/js/bootstrap.min.js') }}"></script>

    <script src="{{ asset('login/vendor/select2/select2.min.js') }}"></script>

    <script src="{{ asset('login/js/main.js') }}"></script>
    {{-- Custom Scripts --}}
    <script src="{{ asset('adminpnl/js/custom.js') }}"></script>

    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-23581568-13');
    </script>
    <script defer src="https://static.cloudflareinsights.com/beacon.min.js/v52afc6f149f6479b8c77fa569edb01181681764108816"
        integrity="sha512-jGCTpDpBAYDGNYR5ztKt4BQPGef1P0giN6ZGVUi835kFF88FOmmn8jBQWNgrNd8g/Yu421NdgWhwQoaOPFflDw=="
        data-cf-beacon='{"rayId":"7e2494190e6335a3","version":"2023.4.0","b":1,"token":"cd0b4b3a733644fc843ef0b185f98241","si":100}'
        crossorigin="anonymous"></script>
</body>

<!-- Mirrored from colorlib.com/etc/lf/Login_v12/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 06 Jul 2023 02:57:11 GMT -->

</html>
