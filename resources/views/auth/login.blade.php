    @extends('layouts.app')

    @section('content')
    <div class="container login__container">
        <div class="row justify-content-center">
            <div class="col-md-6">

                <div class="logo mt-5">
                    <h1 class="text-center">Welcome to Kantaro</h1>
                </div>
                <div class="login-box p-5">
                    <form method="POST" class="" action="{{route('login')}}">
                        @csrf

                        <div class="form-group">
                            <label for="email" class="control-label">{{ __('E-Mail Address') }}</label>
                            <input name="email" id="email" type="email" class="form-control @error('email') is-invalid @enderror">
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="password" class="control-label">{{ __('Password') }}</label>
                            <input id="password" type="password" name="password" required autocomplete="current-password" class="form-control @error('password') is-invalid @enderror">
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <div class="utility">
                                <div class="animated-checkbox">
                                    <label>
                                        <input name="remember" type="checkbox" d="remember" {{ old('remember') ? 'checked' : '' }}><span class="label-text">{{ __('Remember me') }}</span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn_save btn-block"><i class="fa fa-sign-in fa-lg fa-fw"></i> {{ __('Sign in') }}</button>
                        </div>
                    </form>
                    <div class="form-group mt-4">
                        <p class="message">Don't have an account? <a class="btn btn_cancel btn-block mt-2" href="{{route('register')}}">Sign Up</a> </p>
                    </div>
                    <div class="text-center mt-4">
                        <a class=" message link" href="{{ route('impressum') }}">About Kantaro</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection