<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Installer</title>
    <link href="{{ asset('backend/bootstrap/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('common/install.css') }}" rel="stylesheet">
    <link href="{{ asset('common/fonts/font-swesome.css') }}" rel="stylesheet">
    <style type="text/css">
        .text-aqua {
            color:#00C7C7 !important;
        }

        .text-red {
            color:red !important;
        }
    </style>
</head>

<body class="bg-color">

    <div class="login-box">
        <div class="login">
            <!-- <div class="row"> -->
                <div class="col-sm-8 col-sm-offset-2 ins-marg">
                    <center><img width="100" height="100" src="{{ asset('img/admin.svg') }}" /></center>
                    <center><h4><strong style="color:red">Jeet</strong><strong> School </strong></h4></center>
                </div>
                <div class="col-sm-8 col-sm-offset-2 ins-marg">
                    @yield('content')
                </div>
            <!-- </div> -->
        </div>
    </div>
<script type="text/javascript" src="{{ asset('common/jquery.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('backend/bootstrap/bootstrap.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('common/common.js') }}"></script>

</body>
</html>

