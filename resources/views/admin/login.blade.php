<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Login - srtdash</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/png" href="assets/images/icon/favicon.ico">
    <link rel="stylesheet" href="{{ asset("assets/admin/css/bootstrap.min.css") }}">
    <link rel="stylesheet" href="{{ asset("assets/admin/css/font-awesome.min.css") }}">
    <link rel="stylesheet" href="{{ asset("assets/admin/css/themify-icons.css") }}">
    <link rel="stylesheet" href="{{ asset("assets/admin/css/metisMenu.css") }}">
    <link rel="stylesheet" href="{{ asset("assets/admin/css/owl.carousel.min.css") }}">
    <link rel="stylesheet" href="{{ asset("assets/admin/css/slicknav.min.css") }}">
    <!-- amchart css -->
    <link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />
    <!-- others css -->
    <link rel="stylesheet" href="{{ asset("assets/admin/css/typography.css") }}">
    <link rel="stylesheet" href="{{ asset("assets/admin/css/default-css.css") }}">
    <link rel="stylesheet" href="{{ asset("assets/admin/css/styles.css") }}">
    <link rel="stylesheet" href="{{ asset("assets/admin/css/responsive.css") }}">
    <!-- modernizr css -->
    <script src="{{ asset('assets/admin/js/vendor/modernizr-2.8.3.min.js') }}"></script>
</head>

<body>
<!--[if lt IE 8]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
<![endif]-->
<!-- preloader area start -->
<div id="preloader">
    <div class="loader"></div>
</div>
<!-- preloader area end -->
<!-- login area start -->
<div class="login-area">
    <div class="container">
        <div class="login-box ptb--100">
            <form method="POST" action="{{ route('login-auth') }}">
                @csrf
                <div class="login-form-head">
                    <h4>Sign In</h4>
                    <p>Hello there, Sign in and start managing your Admin Template</p>
                </div>
                <div class="login-form-body">
                    <div class="form-gp">
                        <label for="exampleInputEmail1">Email address</label>
                        <input type="email" id="exampleInputEmail1" name="email">
                        <i class="ti-email"></i>
                        <div class="text-danger"></div>
                    </div>
                    <div class="form-gp">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" id="exampleInputPassword1" name="password">
                        <i class="ti-lock"></i>
                        <div class="text-danger"></div>
                    </div>
                    @if (session('login-fail'))
                        <div class="contact-message mb-3 text-danger">{{ session('login-fail') }}</div>
                    @endif
                    <div class="submit-btn-area">
                        <button id="form_submit" >Submit <i class="ti-arrow-right"></i></button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- login area end -->

<!-- jquery latest version -->
<script src="{{ asset('assets/admin/js/vendor/jquery-2.2.4.min.js') }}"></script>
<!-- bootstrap 4 js -->
<script src="{{ asset('assets/admin/js/popper.min.js') }}"></script>
<script src="{{ asset('assets/admin/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/admin/js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('assets/admin/js/metisMenu.min.js') }}"></script>
<script src="{{ asset('assets/admin/js/jquery.slimscroll.min.js') }}"></script>
<script src="{{ asset('assets/admin/js/jquery.slicknav.min.js') }}"></script>

<!-- others plugins -->
<script src="{{ asset('assets/admin/js/plugins.js') }}"></script>
<script src="{{ asset('assets/admin/js/scripts.js') }}"></script>
</body>

</html>
