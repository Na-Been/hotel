<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport"/>
    <meta name="description" content="Responsive Admin Template"/>
    <meta name="author" content="SmartUniversity"/>
    <title>Log In</title>
    <!-- google font -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet" type="text/css"/>
    <!-- icons -->
    <link href="{{asset('assets/plugins/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="{{asset('assets/plugins/iconic/css/material-design-iconic-font.min.css')}}">
    <!-- bootstrap -->
    <link href="{{asset('assets/plugins/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css"/>
    <!-- style -->
    <link rel="stylesheet" href="{{asset('assets/css/pages/extra_pages.css')}}">
    <!-- favicon -->
    <link rel="shortcut icon" href="{{asset('assets/img/favicon.ico')}}"/>
</head>
<body>
<div class="limiter">
    <div class="container-login100 page-background">
        <div class="wrap-login100">
            <form class="login100-form validate-form" method="POST" action="{{ route('login') }}">
                @csrf
                <span class="login100-form-logo">
						<i class="zmdi zmdi-flower"></i>
					</span>
                <span class="login100-form-title p-b-34 p-t-27">
						{{ __('Log In') }}
                </span>
                <div class="wrap-input100 " data-validate="Enter username">
                    <input class="input100" type="email" name="email"
                           placeholder="Email" value="{{ old('email') }}">
                    @error('email')
                    <div class="text-danger">{{$message}}</div>
                    @enderror
                </div>
                <div class="wrap-input100 validate" data-validate="Enter password">
                    <input class="input100" type="password" name="password"
                           placeholder="Password">
                    @error('password')
                    <div class="text-danger">{{$message}}</div>
                    @enderror
                </div>
                <div class="contact100-form-checkbox">
                    <input class="input-checkbox100" id="ckb1" type="checkbox"
                           name="remember" {{ old('remember') ? 'checked' : '' }}>
                    <label class="label-checkbox100" for="ckb1">
                        {{__('Remember me')}}
                    </label>
                </div>
                <div class="container-login100-form-btn">
                    <button class="login100-form-btn" type="submit">
                        {{ __('Login') }}
                    </button>
                </div>
                <br/>

                @if(Route::has('password.request'))
                    <div class="text-center p-t-10">
                        <a class="txt1" href="{{ route('password.request') }}">
                            {{ __('Forgot Your Password?') }}
                        </a>
                    </div>
                @endif
            </form>
        </div>
    </div>
</div>
<!-- start js include path -->
<script src="{{asset('assets/plugins/jquery/jquery.min.js')}}"></script>
<!-- bootstrap -->
<script src="{{asset('assets/plugins/bootstrap/js/bootstrap.min.js')}}"></script>
<script src="{{asset('assets/js/pages/extra_pages/login.js')}}"></script>
<!-- end js include path -->
</body>
</html>
