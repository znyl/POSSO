<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Possobelenzo | Back Admin Login Page</title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <!-- Bootstrap 3.3.5 -->
        <link rel="stylesheet" href="{{URL::asset('admin/bootstrap/css/bootstrap.min.css')}}">
         <link rel="stylesheet" href="{{URL::asset('admin/font-awesome-4.6.1/css/font-awesome.min.css')}}"> 
        <!-- Theme style -->
        <link rel="stylesheet" href="{{URL::asset('admin/dist/css/AdminLTE.min.css')}}">
        <link rel="stylesheet" href="{{URL::asset('admin/dist/css/skins/skin-blue.css')}}">
    </head>
<body class="hold-transition login-page">
<div class="login-box">
    <div class="login-logo" style="background-color: #092a7a; color: #ffffff;">Login
    </div>
    <div class="login-box-body">
        <form role="form" method="POST" action="{{ url('/login') }}">
            {{csrf_field()}}
            <div class="form-group has-feedback {{ $errors->has('email') ? ' has-error' : '' }}">
                
                    <input placeholder="Email" type="email" class="form-control" name="email" value="{{ old('email') }}">
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
            </div>

            <div class="form-group has-feedback {{ $errors->has('password') ? ' has-error' : '' }}">
                    <input type="password" class="form-control" name="password" placeholder="Password">
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                    @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <p><button type="submit" class="btn btn-primary btn-block btn-flat">
                        Sign In
                    </button></p>
                </div>
            
                <div class="col-xs-12">
                    <a href="{{url('/')}}"><button type="button" class="btn btn-flat btn-danger col-xs-12">Back</button></a>
                </div>
            </div> 
        </form>
    </div>
</div>
 <script src="{{URL::asset('admin/plugins/jQuery/jQuery-2.2.3.min.js')}}"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="{{URL::asset('admin/bootstrap/js/bootstrap.min.js')}}"></script>
    <!-- iCheck -->
    <script type="text/javascript" src="{{URL::asset('dist/js/jquery.backstretch.min.js')}}"></script>
    <script>
        $.backstretch("{{URL::asset('dist/img/loginbg.jpg')}}", {speed: 500});
    </script>
</body>
</html>