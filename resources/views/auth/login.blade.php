@extends('layouts.authapp')
@section('title', 'Login')'

@section('contents')
<div class="login-logo">
      <b>Login</b>
  </div>
  <!-- /.login-logo -->
  <div class="card">
<div class="card-body login-card-body">
    <p class="login-box-msg">Sign in to start your session</p>
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="input-group mb-3">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Enter Email" autofocus>
                            <div class="input-group-append">
                              <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                              </div>
                            </div>
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                      @enderror
                          </div>
                          <div class="input-group mb-3">
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Enter Password" required autocomplete="current-password">
                            <div class="input-group-append">
                              <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                              </div>
                            </div>
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                         @enderror
                          </div>
                          <div class="row">
                            <div class="col-5">
                              <div class="icheck-primary">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                <label class="form-check-label" for="remember">
                                    {{ __('Remember Me') }}
                                </label>
                              </div>
                            </div>
                            <!-- /.col -->
                            <div class="col-7">
                              @if (Route::has('password.request'))
                              <div class="text-right">
                                  <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                  </a>
                              </div>
                            @endif
                            </div>
                            <!-- /.col -->
                          </div>
                          <button type="submit" class="btn btn-primary float-right">
                              {{ __('Login') }}
                          </button>
                          </form>
                          <div class="text-center my-2">
                            Do not have an account?
                            <a class="btn btn-link" href="{{ route('register') }}"><b>
                                {{ __('Sign Up') }}</b>
                            </a>
                        </div>

                          <div class="text-center my-2">

                            <a class="btn btn-link" href="{{ route('login') }}"><b>
                                {{ __('Return to Home Page') }}</b>
                            </a>
                        </div>
                </div>
    <!-- /.login-card-body -->
</div>
@endsection
