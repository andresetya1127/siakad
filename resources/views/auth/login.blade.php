<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8" />
    <title>SIAKAD</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Themesbrand" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">
    {{ css_(['bootstrap', 'app', 'icons', 'animate']) }}

</head>

<body class="auth-body-bg">

    <div class="container-fluid">
        <!-- Log In page -->
        <div class="row">
            <div class="col-lg-4 pe-0">
                <div class="card mb-0 shadow-none">
                    <div class="card-body">
                        <h3 class="text-center m-0">
                            <a href="index-2.html" class="logo logo-admin">
                                <img src="{{ asset('assets/images/stmik-logo.png') }}" height="60" alt="logo"
                                    class="my-3">
                            </a>
                        </h3>
                        <div class="px-2 mt-2">
                            <h4 class="font-size-18 mb-2 text-center">SIAKAD</h4>

                            <!-- Form Login -->
                            <form class="form-horizontal my-4" action="{{ route('auth.login') }}" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <label class="form-label" for="username">Email</label>
                                    <div class="input-group">
                                        <span class="input-group-text" id="basic-addon1">
                                            <span class="mdi mdi-account"></span>
                                        </span>
                                        <input type="text" class="form-control" name="email"
                                            placeholder="Masukkan email">
                                    </div>
                                </div>

                                <div id="html_element"></div>

                                <div class="mb-3">
                                    <label class="form-label" for="password">Password</label>
                                    <div class="input-group">
                                        <span class="input-group-text" id="basic-addon2">
                                            <span class="mdi mdi-key-variant"></span></span>
                                        <input type="password" class="form-control" name="password"
                                            placeholder="Masukkan Password">
                                    </div>
                                </div>

                                <div class="mb-3 d-flex gap-2">
                                    <span id="target_captcha"> {!! captcha_img() !!}</span>

                                    <div class="input-group">
                                        <input type="number" class="form-control" name="captcha" placeholder="Captcha">
                                    </div>

                                    <button class="btn btn-warning" type="button" id="reloadCaptcha">
                                        <span class="mdi mdi-reload"></span>
                                    </button>
                                </div>
                                <!-- end row -->
                                <div class="mb-3 mb-0 row">
                                    <div class="col-12 mt-2">
                                        <button class="btn btn-primary w-100 waves-effect waves-light"
                                            type="submit">Log In <i class="fas fa-sign-in-alt ms-1"></i></button>
                                    </div>
                                    <!-- end col -->
                                </div>
                                <!-- end row -->
                            </form>
                            <!-- end form -->

                        </div>
                    </div>
                </div>
            </div>

            <div id="login-bg" class="col-lg-8 p-0 vh-100 d-flex justify-content-center bg-primary">
                <img src="{{ asset('assets/images/meeting.svg') }}" alt="">
            </div>
            <!-- end col -->
        </div>
        <!-- End Log In page -->
    </div>


    <!-- JAVASCRIPT -->
    {{ js_(['jquery', 'bootstrap-bundle', 'metis-menu', 'simplebar', 'waves', 'app']) }}

    <script>
        $('#reloadCaptcha').on('click', function() {
            $.ajax({
                url: '{{ route('reloadCaptcha') }}',
                type: 'GET',
                success: function(response) {
                    $('#target_captcha').html(response.captcha);
                }
            })
        })
    </script>

</body>


</html>
