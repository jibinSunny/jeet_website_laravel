
<!DOCTYPE html><html class="white-bg-login" lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <title>Reset Student</title>
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
    <div class="header">Reset Student</div>
    <form role="form" method="post" action="javascript:;" id="loginForm">
        <div class="body white-bg">
            <div class="alert alert-danger alert-dismissable" style="display: none">
                <i class="fa fa-ban"></i>
                <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                <div class="msgDiv"></div>
            </div>
            <div class="form-group">
                <input class="form-control" placeholder="Enter Password"id="password" name="password" type="password">
            </div>
            <div class="form-group">
                <input class="form-control" placeholder="Re Enter Password" id="re_password" name="re_password" type="password">
                <input class=""  name="token" type="hidden"value="{{$token}}">
                <input class=""  name="email" type="hidden"value="{{$email}}">
            </div>
            <!-- <div class="checkbox">
                <label>
                    <input type="checkbox" value="Remember Me" name="remember">
                    <span> &nbsp; Remember Me</span>
                </label>
            </div> -->
                <div class="form-group"> </div>
            <input type="submit" class="btn btn-lg btn-success btn-block" value="Submit" />
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
            password: {
            required: true,
            minlength:5,
            },
            re_password: {
             required: true,
            equalTo: '#password'
            }
        },
        messages: {
        password: {
        required: 'Password is required.',
        minlength: 'minimum 5 character required.'
        },
        re_password: {
        required: 'Confirm Password is required.',
        equalTo: 'Confirm Password and Password must not be the same.'
        }
        },
        submitHandler: function(form) {
            var form = document.getElementById('loginForm');
            var data = new FormData(form);
            $('.msgDiv').html(``);
            $.ajax({
                type: "POST",
                url: "{{route('savestudentResetlink')}}",
                data: $(form).serialize(),
                dataType: "json",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(data) {
                    // alert(data);
                    if (data.status == 1) {
                        window.location.href = "{{route('showStudentlogin')}}";
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
