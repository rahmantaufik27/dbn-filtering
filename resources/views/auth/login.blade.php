<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login ITSAESW</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="https://res.cloudinary.com/dz5qeqamw/image/upload/v1567668658/itsaesw-.png"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('login-view/vendor/bootstrap/css/bootstrap.min.css') }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('login-view/fonts/font-awesome-4.7.0/css/font-awesome.min.css') }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('login-view/fonts/Linearicons-Free-v1.0.0/icon-font.min.css') }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('login-view/vendor/animate/animate.css') }}">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="{{ asset('login-view/vendor/css-hamburgers/hamburgers.min.css') }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('login-view/vendor/animsition/css/animsition.min.css') }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('login-view/vendor/select2/select2.min.css') }}">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="{{ asset('login-view/vendor/daterangepicker/daterangepicker.css') }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('login-view/css/util.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('login-view/css/main.css') }}">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100" style="background-color:#06446C;">
			<div class="wrap-login100 p-t-30 p-b-50">
                    <img src="https://res.cloudinary.com/dz5qeqamw/image/upload/v1567659150/itsaesw-logo-transparent_a.png" width="100%">

				<span class="login100-form-title p-b-41">
                    {{-- Account Login --}}
                </span>
                <form class="login100-form validate-form p-b-33 p-t-5" method="POST" action="{{ route('login') }}">
                    {{ csrf_field() }}
					<div class="wrap-input100 validate-input{{ $errors->has('username') ? ' has-error' : '' }}" data-validate = "Masukan username">
						<input class="input100" type="text" name="username" placeholder="Username" id="username" >
                        <span class="focus-input100" data-placeholder="&#xe82a;"></span>

					</div>

					<div class="wrap-input100 validate-input {{ $errors->has('password') ? ' has-error' : '' }}" data-validate="Masukan password">
						<input class="input100" type="password" name="password" placeholder="Password" id="password">
                        <span class="focus-input100" data-placeholder="&#xe80f;"></span>
                        
					</div>

					<div class="container-login100-form-btn m-t-32">
                        @if ($errors->has('username'))
                            <span class="help-block">
                                <strong>
                                    <p style="font-size:12pt;">
                                        {{ $errors->first('username') }}
                                    </p>
                                </strong>

                            </span>
						@endif
                        @if ($errors->has('password'))
                            <span class="help-block">
                                <strong>
                                    <p style="font-size:12pt;">
                                        {{ $errors->first('password') }}
                                    </p>
                                    <br>
                                </strong>
                            </span>
                        @endif
						<button type="submit" class="login100-form-btn">
                                Masuk
                        </button>
					</div>

				</form>
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>
	
<!--===============================================================================================-->
	<script src="{{ asset ('login-view/vendor/jquery/jquery-3.2.1.min.js') }}"></script>
<!--===============================================================================================-->
	<script src="{{ asset ('login-view/vendor/animsition/js/animsition.min.js') }}"></script>
<!--===============================================================================================-->
	<script src="{{ asset ('login-view/vendor/bootstrap/js/popper.js') }}"></script>
	<script src="{{ asset ('login-view/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
<!--===============================================================================================-->
	<script src="{{ asset ('login-view/vendor/select2/select2.min.js') }}"></script>
<!--===============================================================================================-->
	<script src="{{ asset ('login-view/vendor/daterangepicker/moment.min.js') }}"></script>
	<script src="{{ asset ('login-view/vendor/daterangepicker/daterangepicker.js') }}"></script>
<!--===============================================================================================-->
	<script src="{{ asset ('login-view/vendor/countdowntime/countdowntime.js') }}"></script>
<!--===============================================================================================-->
	

</body>
</html>