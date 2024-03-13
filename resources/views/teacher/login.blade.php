
<!DOCTYPE html><html class="white-bg-login" lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <title>Teacher Sign in</title>
        <link rel="SHORTCUT ICON" href="{{ asset('uploads/images/site.png') }}" />
        <!-- bootstrap 3.0.2 -->
        <link href="{{ asset('backend/bootstrap/bootstrap.min.css') }}" rel="stylesheet"  type="text/css">
        <!-- font Awesome -->
        <link href="{{ asset('backend/fonts/font-awesome.css') }}" rel="stylesheet"  type="text/css">
        <!-- Style -->
        <link href="{{ asset('backend/common/themes/default/style.css') }}" rel="stylesheet"  type="text/css">
        <!-- iNilabs css -->
        <link href="{{ asset('backend/common/themes/default/common.css') }}" rel="stylesheet"  type="text/css">
        <link href="{{ asset('backend/common/responsive.css') }}" rel="stylesheet"  type="text/css">
    </head>

    <body class="white-bg-login">

        <div class="col-md-4 col-md-offset-4 marg" style="margin-top:30px;">
            <center><img width='50' height='50' src={{ asset('uploads/images/site.png')}} /></center>        <center><h4>Dummy</h4></center>
        </div>
<div class="form-box" id="login-box">
    <div class="header">Teacher</div>
    <form role="form" method="post" action="javascript:;" id="loginForm">
        <div class="body white-bg">
            <div class="alert alert-danger alert-dismissable" style="display: none">
                <i class="fa fa-ban"></i>
                <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                <div class="msgDiv"></div>
            </div>
            <div class="form-group">
                <input class="form-control" placeholder="Email" name="email" type="text" autofocus value="">
            </div>
            <div class="form-group">
                <input class="form-control" placeholder="Password" name="password" type="password">
            </div>
            <div class="checkbox">
                <label>
                    <input type="checkbox" value="Remember Me" name="remember">
                    <span> &nbsp; Remember Me</span>
                </label>
                <span class="pull-right">
                    <label>
                        <a href=""> Forgot Password?</a>
                    </label>
                </span>
            </div>
                <div class="form-group"> </div>
            <input type="submit" class="btn btn-lg btn-success btn-block" value="SIGN IN" />
        </div>
    </form>
</div>

<script type="text/javascript" src="{{ asset('backend/common/jquery.js')}}"></script>
<script type="text/javascript" src="{{ asset('backend/bootstrap/bootstrap.min.js')}}"></script>
<script src="{{asset('backend/validator/jquery.validate.js')}}"></script>
<script>
    $("#loginForm").validate({
        normalizer: function(value) {
            return $.trim(value);
        },
        rules: {
            email: {
            required: true,
            email: true
            },
            password: {
            required: true
            }
        },
        messages: {
            email: {
            required  : 'Email is  required',
            email : 'Email is invalid'
            },
            password: {
            required: 'Password is required'
            }
        },
        submitHandler: function(form) {
            var form = document.getElementById('loginForm');
            var data = new FormData(form);
            $('.msgDiv').html(``);
            $.ajax({
                type: "POST",
                url: "{{route('Teacherlogin')}}",
                data: $(form).serialize(),
                dataType: "json",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(data) {
                    if (data.status == 1) {
                        window.location.href = "{{route('teacherhsowDashboard')}}";
                    } else {
                        var html = "";
                        $.each(data.errors, function(key, value) {
                            html += value + "<br/>";
                        });
                        $('.alert-danger').show();
                        $('.msgDiv').html(` <div class="dispError">` + html + `</div> `);
                        setTimeout(function() {
                            $('.msgDiv').html(``);
                        }, 6000);
                    }
                }
            });
            return false;
        }
    });
</script>
</body>
</html>
