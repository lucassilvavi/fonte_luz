<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Login | Fonte de Luz</title>
    <!-- Favicon-->
    <link rel="icon" href="../../favicon.ico" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap -->
    <link href="{{asset('assets/vendor/bootstrap/dist/css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="{{asset('assets/vendor/node-waves/waves.css')}}" rel="stylesheet">

    {{--<!-- Animate CSS -->--}}
    <link href="{{asset('assets/vendor/animate.css/animate.min.css')}}" rel="stylesheet">

    <!-- Custom Css -->
    <link href="{{asset('assets/css/style.css')}}" rel="stylesheet">

</head>

<body class="login-page">
<div class="login-box">
    <div class="logo">
        <a href="javascript:void(0);"><b>Fonte de Luz</b></a>

    </div>
    <div class="card">
        <div class="body">
            @yield('content-form')
        </div>
    </div>
</div>

<!-- Jquery Core Js -->
<script src="{{asset('assets/vendor/jquery/dist/jquery.min.js')}}"></script>

<!-- Waves Effect Plugin Js -->
<script src="{{asset('assets/vendor/node-waves/waves.js')}}"></script>

<!-- Validation Plugin Js -->
<script src="{{asset('assets/vendor/jquery-validation/jquery.validate.js')}}"></script>
<!-- Bootstrap Datepicker -->
<script src="{{asset('assets/vendor/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')}}"></script>
<script src="{{asset('assets/js/datepickerDefaults.js')}}"></script>

<!-- jQuery Mask Plugin -->
<script src="{{asset('assets/vendor/jquery-mask-plugin/dist/jquery.mask.min.js')}}"></script>
<!-- Custom Js -->
<script src="{{asset('assets/js/admin.js')}}"></script>
<script src="{{asset('assets/js/sign-in.js')}}"></script>
<script src="{{asset('assets/js/mascaras/mascaras.js')}}"></script>
<script src="{{asset('assets/js/perfil/pessoal/getCidadeByUf.js')}}"></script>
</body>
<script>
    $('#money').mask('000.000.000.000.000,00', {reverse: true, placeholder: "00,00"});
</script>
</html>