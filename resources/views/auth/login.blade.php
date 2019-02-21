@extends('layouts.app')
@section('content')
<div class="container">
  <div class="row">
			<div class="col-md-6 col-md-offset-3">
				<div class="panel panel-login">
					<div class="panel-heading">
						<div class="row">
							<div class="col-xs-6">
								<a href="#" class="active" id="login-form-link">Login</a>
							</div>
							<div class="col-xs-6">
								<a href="#" id="register-form-link">Register</a>
							</div>
						</div>
						<hr>
					</div>
					<div class="panel-body">
						<div class="row">
							<div class="col-lg-12">
                <!-- login-form -->
								<form id="login-form" action="{{ route('login') }}" method="POST" role="form" style="display: block;">
                  {{ csrf_field() }}

                  <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
										<input for="email"type="text" name="email" id="email" class="form-control" placeholder="Email" value="{{ old('email') }}" autofocus>

                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                  </div>
									<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
										<input for="password" type="password" name="password" id="password" tabindex="2" class="form-control" placeholder="Password">

                    @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                  </div>
									<div class="form-group text-center">
										<input type="checkbox" tabindex="3" class="" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
										<label for="remember"> Remember Me</label>
									</div>
									<div class="form-group">
										<div class="row">
											<div class="col-sm-6 col-sm-offset-3">
												<input type="submit" name="login-submit" id="login-submit" tabindex="4" class="form-control btn btn-login" value="Log In">
											</div>
										</div>
									</div>
									<div class="form-group">
										<div class="row">
											<div class="col-lg-12">
												<div class="text-center">

													<a href="{{ route('password.request') }}" tabindex="5" class="forgot-password">Forgot Password?</a>
												</div>
											</div>
										</div>
									</div>
								</form>
                <!-- register-form -->
                <form id="register-form" action="{{ route('register') }}" method="post" role="form" style="display: none;">
                  {{ csrf_field() }}
                  <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
										<input for="name" type="text" name="name" id="username" tabindex="1" class="form-control" placeholder="Name" value="">
                    @if ($errors->has('name'))
                        <span class="help-block">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif
                  </div>
									<div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
										<input for="email" type="email" name="email" id="email" tabindex="1" class="form-control" placeholder="Email Address" value="">
                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                  </div>
									<div class="form-group {{ $errors->has('password') ? ' has-error' : '' }}">
										<input for="password" type="password" name="password" id="password" tabindex="2" class="form-control" placeholder="Password">
                    @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                  </div>
									<div class="form-group">
										<input for="password-confirm" type="password" name="password_confirmation" id="confirm-password" tabindex="2" class="form-control" placeholder="Confirm Password">
									</div>
									<div class="form-group">
										<div class="row">
											<div class="col-sm-6 col-sm-offset-3">
												<input type="submit" name="register-submit" id="register-submit" tabindex="4" class="form-control btn btn-register" value="Register Now">
											</div>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

  </div>
@endsection
